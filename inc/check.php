<?php if ($nomeSite == 'Doutores da Web') { $erro .= '$nomeSite ERRO\n';
 } if ($slogan == 'Marketing Digital') { $erro .= '$slogan ERRO\n';
 } if ($fone == '9999-0000') { $erro .= '$fone ERRO\n';
 } $emailvalid = strpos($emailContato, 'doutoresdaweb');
 if ($emailvalid !== false or empty($emailContato)) { $erro .= '$emailContato ERRO\n';
 } if ($rua == 'Rua Pequetita, 179') { $erro .= '$rua ERRO\n';
 } if ($cep == 'CEP: 04552-060') { $erro .= '$cep ERRO\n';
 } if ($latitude == '-22.546052') { $erro .= '$latitude ERRO\n';
 } if ($longitude == '-48.635514') { $erro .= '$longitude ERRO\n';
 } if ($idCliente == 'ID_do_cliente_no_mpi_sistema') { $erro .= '$idCliente ERRO\n';
 } if ($erro == '') { } else{ echo "<script> alert('Favor alterar as seguintes variáveis:\\n$erro');
 </script>";
 } include 'inc/check-description.php';
 
?>