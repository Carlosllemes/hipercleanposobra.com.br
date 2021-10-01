<?php



/*******************AONO*******************

02/01/2016 - 21h

/*******************AONO*******************/



class strFuncoes {

	



	//Função Limitadora de Strings	

	public function StrMax($str, $max, $strComplemento='')

	{



		$strN = substr($str, 0, $max);

		

		if (strlen($str)>$max) {

			

			$strN .= $strComplemento; 	

			

		}

		

		return $strN;

		

	}



	//Função para formatação de string (textos)

	public function FormatStr($strTemp) {



	  $strTemp=str_replace(chr(13),"",$strTemp);

	  $strTemp=str_replace(chr(10),"<br>",$strTemp);

	  return $strTemp;

	  

	}

	

	//Função para retirar traços entre as palavras

	public function RetiraTraco($str){

		

		$strN = str_replace("-"," ",$str);

		

		return $strN;



	}





	//Função para retirar pontuacao

	public function RetiraPontuacao($palavras){

	

		$vetStr = explode(" ", $palavras);



		$tam = count($vetStr);

		//$strBase = " ',' , '.', '!', '?', '''', '""' ";

		$strBase = " \, , . , !, ?, :, - ";

		



		for ($x=0; $x<=$tam; $x++){



			$ret = strpos($strBase,$vetStr[$x]);

		

			if ($ret){



				unset($vetStr[$x]);

				ksort($vetStr);



			}



		}



		

		return $vetStr;



	}





	public function PreparaConteudo($conteudo, $key){



		$retira = isset($conteudo) ? $conteudo : "";

		$a = strip_tags($retira);

		$key = isset($key) ? $key : "";



		$array = explode("\n", $a);



		$result = "";



		$set = 0;



		foreach($array as $p){

			

			$p = trim($p);





			if( (!empty($p)) AND ($p != "\n") AND ($p != "") AND ($p != " ")){

				

				//$tte = $this->RetiraPontuacao($p);

				//$tte = str_replace(" ", "", $tte);



				$tot = strlen($p);

				$strCompare = $this->removeAcentos($p);

				$strCompare = str_replace(" ", "", $strCompare);

				$cmp = substr($strCompare, 0, 4);



			

				if (ctype_upper($cmp)) {



					//$new_p = ucfirst(strtolower($p));

					//$new_p = $this->TrocaUpperLower($new_p);

					$new_p = $p;

					$result .= "<h2>".$new_p."</h2>\n\n";				

					

				}



				else {

					

					$cmp = substr($p, 0, 5);

					$cmp = str_replace("-", "-", $cmp);

					$cmp = str_replace(" ", "", $cmp);

					$li = stripos($cmp, chr(45));



					//echo $cmp."***";



					if ($li){



						if ($set==0){



							//echo $cmp."***";



							$result .= '

							<ul class="list" itemscope itemtype="http://schema.org/ListItem">';



						}



						$p = str_replace("- ", "", $p);

						$result .= "<li itemprop=\"name\">".$p."</li>\n\n";



						$set=1;



					}



					else {



						if ($set>0){



							$result .= '

							</ul>';

						}



						$p = str_replace($key, "<strong>".$key."</strong>", $p);

						

						//$result .= "&#60;p&#62;".$p."&#60;/p&#62;\n\n";

						$result .= "<p>".$p."</p>\n\n";				



						$set=0;





					}





				}





				

			}

		}



		return $result;





	}



	//Função para trocar letras e acentuação ç ã Maiuscula/minuscula

	public function TrocaUpperLower($str){



		$str = str_replace(chr(128), chr(135), $str);

		$str = str_replace("Ã", "ã", $str);

		$str = str_replace("Í", "í", $str);



		return $str;



	}

	









	//Função para retirar preposicoes da string

	public function RetiraPreposicao($palavras){

	

		$vetStr = explode(" ", $palavras);



		$tam = count($vetStr) -1;

		$strBase = "a,ante,até,após,de,desde,em,entre,com,contra,para,por,perante,sem,sob,sobre";

		



		for ($x=0; $x<=$tam; $x++){



			$ret = strpos($strBase,$vetStr[$x]);

		

			if ($ret){



				unset($vetStr[$x]);

				ksort($vetStr);



			}



		}



		

		return $vetStr;



	}



//Funcao para buscar ID do vetor conforme string

public function buscaVetorAprox($palavra, $vetKey, $resultados=1, $buscaExata="") {



$limit = $resultados;



  $newVet = explode(" ", $palavra);



  $xxx=0;

  $ix=0;

  

  

  foreach ($newVet as $key2 => $val2) {  

 

    foreach ($vetKey as $key => $val) {    

         

      if (stripos($val['key'], $val2)===0 and $val['key']!=$buscaExata and $key!=$vetFinal[0] and $key!=$vetFinal[1] and $key!=$vetFinal[2]){



        $vetFinal[$ix]=$key;

        $ix++;



        if ($ix==$resultados) { return $vetFinal ; }



      }      



    }



  }



  $tam = sizeof($vetFinal);



  if ($tam<$limit){



    $falta = $limit-$tam;

    



    for ($x=0; $x<$falta; $x++){



      $r = rand(1, count($vetkey) - 1);



     if ($vetKey[$r]['key']!=$buscaExata and $r!=$vetFinal[0] and $r!=$vetFinal[1] and $r!=$vetFinal[2]){



	      $vetFinal[$ix]=$r;

	      $ix++;



  	 }



    }



  }



  

   return $vetFinal;

}



//Funcao para buscar no vetor pelo ID



public function buscaVetor($palavra, $vetKey) {

   foreach ($vetKey as $key => $val) {

       if ($val['key'] === $palavra) {

           return $key;

       }

   }

   return null;

}





	

	//Função para inserir traços entre as palavras	

	public function PreencheTraco($str){

		

		$tam = strlen($str);

		

		$strN = str_replace(" ","-",$str);

		

		return $strN;

	

	}

	

	//Função para definir como maiuscula a primeira letra da string 

	public function PrimeiraMaiuscula($str) {



	  $tam=strlen($str);

	  $n1=substr($str,0,1);

	  $n2=substr($str,1,$tam-1);

	  $n3=strtolower($n2);

	  return $n1.$n3;

	  

	}



	//Função que verifica se é utf8

	public function is_utf8( $string ){

		return preg_match( '%^(?:

			 [\x09\x0A\x0D\x20-\x7E]

			| [\xC2-\xDF][\x80-\xBF]

			| \xE0[\xA0-\xBF][\x80-\xBF]

			| [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}

			| \xED[\x80-\x9F][\x80-\xBF]

			| \xF0[\x90-\xBF][\x80-\xBF]{2}

			| [\xF1-\xF3][\x80-\xBF]{3}

			| \xF4[\x80-\x8F][\x80-\xBF]{2}

			)*$%xs',

			$string

		);

	}

	

	//Função para remoção de acentos

	public function removeAcentos($string ){

		

		return preg_replace(

			array(

				//Maiúsculos

				'/\xc3[\x80-\x85]/',

				'/\xc3\x87/',

				'/\xc3[\x88-\x8b]/',

				'/\xc3[\x8c-\x8f]/',

				'/\xc3([\x92-\x96]|\x98)/',

				'/\xc3[\x99-\x9c]/',

	

				//Minúsculos

				'/\xc3[\xa0-\xa5]/',

				'/\xc3\xa7/',

				'/\xc3[\xa8-\xab]/',

				'/\xc3[\xac-\xaf]/',

				'/\xc3([\xb2-\xb6]|\xb8)/',

				'/\xc3[\xb9-\xbc]/',

			),

			str_split( 'ACEIOUaceiou' , 1 ),

			$this->is_utf8( $string ) ? $string : utf8_encode( $string )

		);

	}

	

	//Função para Descriptografia

	public function StrDescript($str) {

	

	  $tam=strlen($str); 

	  $VetDescript=array();

	  $VetApoio=array();

	  

	  $BaseCript="J,S,R,Q,P,Y,W,X,V,A";

	  $BaseCript=explode(",",$BaseCript);

	  $BaseCriptN="34,23,47,73,33,79,74,27,17,99,77,44,41,69,11,19,28,24,67,97,37,31,51,89,90,18";

	  $BaseCriptN=explode(",",$BaseCriptN);

	  $BaseNum="0,1,2,3,4,5,6,7,8,9";

	  $BaseNum=explode(",",$BaseNum); 

	  $BaseABC="A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,X,W,Y,Z"; 

	  $BaseABC=explode(",",$BaseABC);

	

	  

	  $x=0;

	  

	  

	  $cont=0;

	  

	

	for ($x=0; $x<$tam; $x++) {	

		

		$VetApoio[$x]=substr($str,$x,1); 

		

		if (is_numeric($VetApoio[$x])){

			

			$nApoio=$VetApoio[$x];

			$x++;

			$VetApoio[$x]=substr($str,$x,1); 

			$nApoio.=$VetApoio[$x];

			

			

			for ($i=0; $i<sizeof($BaseCriptN); $i++) {

	

				$ret = strcasecmp($nApoio,$BaseCriptN[$i]); 

					

				if ($ret==0){

						

					$VetDescript[$cont]=$BaseABC[$i]; 

							

				}

					

			}

			

		}

		else {

			

			$nApoio=$VetApoio[$x]; 

			$x++;

			$VetApoio[$x]=substr($str,$x,1); 

			

			if (is_numeric($VetApoio[$x])){

				

				$x+=2;

					

				for ($i=0; $i<sizeof($BaseCript); $i++) {

		

					$ret = strcasecmp($nApoio,$BaseCript[$i]); 

						

					if ($ret==0){

							

						$VetDescript[$cont]=$BaseNum[$i]; 

								

					}

						

				}

				

			

			}

	

			else{

	

				$VetDescript[$cont]=chr(32);

				

			}

		

		

		}

		

		$cont++;

	

	}

	

	

	

	  for ($i=0; $i<count($VetDescript); $i++) {

		$strFinal.=$VetDescript[$i];

	  }



	  $strFinal = strtolower($strFinal);



	  return $strFinal;

	}

	

	

	//Função para Criptografia

	public function StrCript($str) {

	

	  

	  $str = $this->removeAcentos($str);

	  

	  $tam=strlen($str);

	  

	  $VetApoio=array();

	

	  $VetCript=array();

	

	

	  $BaseCript="J,S,R,Q,P,Y,W,X,V,A";

	  $BaseCript=explode(",",$BaseCript);

	  $BaseCriptN="34,23,47,73,33,79,74,27,17,99,77,44,41,69,11,19,28,24,67,97,37,31,51,89,90,18";

	  $BaseCriptN=explode(",",$BaseCriptN);

	  $BaseNum="0,1,2,3,4,5,6,7,8,9";

	  $BaseNum=explode(",",$BaseNum); 

	  $BaseABC="A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,X,W,Y,Z"; //39

	  $BaseABC=explode(",",$BaseABC);

	

	  

	  $x=0;

	  

	  $cont=0;

	  

	

	for ($x=0; $x<$tam; $x++) {	

		

		$VetApoio[$x]=substr($str,$x,1); 

		

		if (is_numeric($VetApoio[$x])){

			

			$VetCript[$cont]=$BaseCript[$VetApoio[$x]]; 

			

			for ($xx=0; $xx<3; $xx++){

				

				$cont++;

				

				$min=0;

				$max=9;

				$sorte=rand($min,$max); 

				

				$VetCript[$cont]=$sorte; 

			

			}

			

			$cont++;

			

		

		}

		

		else {

			

			if ($VetApoio[$x]==chr(32)){			

					

				for ($xx=0; $xx<2; $xx++){

					

					$min=0;

					$max=25;

					$sorte=rand($min,$max); 

					

					$VetCript[$cont]=$BaseABC[$sorte]; 

					$cont++;

				

				}

				

			

			}

			

			else {

				

				

				for ($i=0; $i<sizeof($BaseABC); $i++) {

	

					$ret = strcasecmp($VetApoio[$x],$BaseABC[$i]); 

					

					if ($ret==0){

						

						$VetCript[$cont]=$BaseCriptN[$i]; 

						$cont++;

					

					}

					

				}

			

				

				

			}

			

		}

		

	

		

	}

		

		

	  for ($i=0; $i<sizeof($VetCript); $i++) {

		$strFinal.=$VetCript[$i];

	  }

	  

	  return $strFinal;

	  

	}

	

	

	//Função para Criptografia

	public function StrCript2($str) {

	  $tam=strlen($str);

	  $Numero=array();

	

	  $NumeroCript=array();

	

	  $BaseCript="J,S,R,Q,P,Y,W,X,V,A";

	  $BaseCript=explode(",",$BaseCript);

	  $BaseABC="A,B,C,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,X,W,Y,Z";

	  $BaseABC=explode(",",$BaseABC);

	  $x=0;

	  

	  //63

	  //tam=2

	  

	  while ($x <= $tam) {

		$Numero[$x]=substr($str,$x,1); //6 //3

		if ($Numero[$x] == 0) {

		  $n1=$Numero[$x];

		  $n2=$Numero[$x];

		  $n11=$BaseCript[$Numero[$x]];

		  $n22=$BaseCript[$Numero[$x]];

		}

		else {

			

		  $Numero[$x]=($Numero[$x] * 9) + 1; //55 //28

		  $n1=substr($Numero[$x],0,1); //5 //2

		  $n2=substr($Numero[$x],1,1); //5 //8

		  $n11=$BaseCript[$n1]; //Y //R

		  $n22=$BaseCript[$n2]; //Y //V

		}

		for ($i=1; $i<=4; $i++) {

		  $min=1;

		  $max=23;

		  $sorte=(($max-$min + 1) * rand($min,$max) + $min); 

		  $sABC=$BaseABC[$sorte];

		  $lx.=$sABC;

		}

		for ($i=1; $i<=3; $i++) {

		  $min=1;

		  $max=8;

		  $sorte=(($max-$min + 1) * rand($min,$max) + $min); 

		  $nx.=$sorte;

		}

		

		$NumeroCript[$x]=$n22.$n1.$lx.$n2.$n11.$nx; 

		$x++;

		$lx="";

		$nx="";

	  }

	  for ($i=0; $i<=sizeof($NumeroCript)-1; $i++) {

		$strFinal.=$NumeroCript[$i];

	  }

	  return $strFinal;

	}

	

	

	//Função para Descriptografia

	public function StrDescript2($str) {

	  $tam=strlen($str); 

	  $Numero=array();

	  $x=0;

	  while ($x == ($tam / 11)) {

		$Numero[$x]=substr($str,(($x-1) * 11),11);

		$n1=substr($Numero[$x],1,1);

		$n2=substr($Numero[$x],6,1);

		if ($n1 == 0 && $n2 == 0) {

		  $Numero[$x]=$n1;

		}

		else {

		  $Numero[$x]=$n1.$n2;

		  $Numero[$x]=($Numero[$x]-1) / 9;

		}

		$x++;

	  }

	  for ($i=0; $i<=count($Numero)-1; $i++) {

		$strFinal.=$Numero[$i];

	  }

	  return $strFinal;

	}



	

	

	//Função para string semanal		

	public function SemanaExtenso($strNumero) {

	  switch ($strNumero) {

	

		case "1":

		  $_retval="Domingos";

		  break;

	

		case "2":

		  $_retval="Segundas-Feiras";

		  break;

	

		case "3":

		  $_retval="Terças-Feiras";

		  break;

	

		case "4":

		  $_retval="Quartas-Feiras";

		  break;

	

		case "5":

		  $_retval="Quintas-Feiras";

		  break;

	

		case "6":

		  $_retval="Sextas-Feiras";

		  break;

	

		case "7":

		  $_retval="Sábados";

		  break;

	  }

	  return $_retval;

	}

	

	//Função para string mensal		

	public function MesExtenso($strNumero) {

	  switch ($strNumero) {

	

		case "1":

		  $_retval="Janeiro";

		  break;

	

		case "2":

		  $_retval="Fevereiro";

		  break;

	

		case "3":

		  $_retval="Março";

		  break;

	

		case "4":

		  $_retval="Abril";

		  break;

	

		case "5":

		  $_retval="Maio";

		  break;

	

		case "6":

		  $_retval="Junho";

		  break;

	

		case "7":

		  $_retval="Julho";

		  break;

	

		case "8":

		  $_retval="Agosto";

		  break;

	

		case "9":

		  $_retval="Setembro";

		  break;

	

		case "10":

		  $_retval="Outubro";

		  break;

	

		case "11":

		  $_retval="Novembro";

		  break;

	

		case "12":

		  $_retval="Dezembro";

		  break;

	  }

	  return $_retval;

	}









}



?>