<?
$h1         = 'Home';
$title      = 'Home';
$desc       = 'Home - ';
$key        = 'uuuuuuuuuu, jjjjjjjjjjjj, lllllllllll';
$var        = 'Home';
include('inc/head.php');
include('inc/fancy.php');

?>
<!--STARTSCRIPTSHEADER-->
<style><?include ('slick/slick.css');?>
<?php
if(!$isMobile):
include ('slick/slick-banner.css');
endif;
?>
</style>
<!--ENDSCRIPTSHEADER-->
</head>
<body>
<? include('inc/topo.php'); ?>
<main>
    <?php if(!$isMobile): ?>
    <div class="slick-container hide-mobile">
        <div class="slick-banner single-item">
            <div style="--background:url(<?=$url?>imagens/slider/conservacao-limpeza-empresarial-sp-sao-paulo.png)">
            </div>
            <div style="--background:url(<?=$url?>imagens/slider/empresa-limpeza-carpete-residencial-empresarial.png)">
              
            </div>
            <div style="--background:url(<?=$url?>imagens/slider/limpeza-higienizacao-empresa-residencial-sp-sao-paulo.png)">
              
            </div>
            <div style="--background:url(<?=$url?>imagens/slider/servico-limpeza-pos-obra-sp-sao-paulo-regiao.png)">
              
            </div>
        </div>
        <div class="progress-bar--container">
            <div class="item">
                <span data-slick-index="0" class="progress-bar"></span>
            </div>
            <div class="item">
                <span data-slick-index="1" class="progress-bar"></span>
            </div>
            <div class="item">
                <span data-slick-index="2" class="progress-bar"></span>
            </div>
            <div class="item">
                <span data-slick-index="3" class="progress-bar"></span>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="content">
        <section>
            <!--STARTCOMPONENTS-->
            <div class="container">
                <div class="wrapper">
                    <div class="about__content">
                        <h1>Sobre <span class="title">Nos</span></h1>
                        <p>Consiste num minucioso trabalho de eliminação de sujeiras, respingos e manchas de tinta e excesso de rejuntes deixados durante a obra.
                            É muito comum construtora, arquitetos e mesmo particulares, enfrentarem o problema da sujeira ao final da obra.
                        Para arquitetos, engenheiros e construtoras, entregar ao seu cliente um projeto lindo, porém sujo, é desmerecer o seu próprio trabalho. Para o cliente final que aguardou meses a construção ou reforma do seu imóvel, estressar-se com a limpeza ou correr o risco...</p>
                        <a href="<?=$url?>sobre-nos" title="Saiba mais sobre a <?=$nomeSite?>" class="about__btn">Sobre <?=$nomeSite?><i class="fa fa-link" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <!-- carousel -->
            <div class="container">
                <div class="wrapper">
                    <h2 class="text-center">Nossos <span class="title">Clientes</span></h2>
                    <div class="carousel__simple_two">
                        <?php for ($i = 1; $i <= 16; $i++){;?>
                            <?php if($i <= 9) {?>
                                <a href="<?=$url?>imagens/clientes/cliente-limpeza-pos-obra-em-sp-0<?=$i?>.png" class="lightbox">
                                    <img class="m-5" src="<?=$url?>imagens/clientes/cliente-limpeza-pos-obra-em-sp-0<?=$i?>.png" alt="Imagem de <?=$nomeSite?>" title="Imagem de <?=$nomeSite?>">
                                </a>
                            <?php }else{?>
                                <a href="<?=$url?>imagens/clientes/cliente-limpeza-pos-obra-em-sp-<?=$i?>.png" class="lightbox">
                                    <img class="m-5" src="<?=$url?>imagens/clientes/cliente-limpeza-pos-obra-em-sp-<?=$i?>.png" alt="Imagem de <?=$nomeSite?>" title="Imagem de <?=$nomeSite?>">
                                </a>
                            <?php }?>
                        <?php }?>

                    </div>
                </div>
            </div>

            <!-- end carousel -->
                <hr>    
            <div class="container">
                <div class="wrapper">
                    <h2 class="text-center">Nossos <span class="title">Serviços</span></h2>
                    <div class="grid-col-3">
                        <div class="card--mod-4">
                            <div class="card__front">
                                <img src="<?=$url?>imagens/servicos/limpeza-pos-obra-servicos.jpg" alt="Imagem de <?=$nomeSite?>" title="Imagem de <?=$nomeSite?>"/>
                                <h2>Limpeza pré Mudança</h2>
                            </div>
                            <div class="card__back">
                                <div>
                                    <p>Hiper Clean sempre visando melhorias na prestação de serviços aos clientes se preocupando com o meio ambiente e a sustentabilidade efetua</p>
                                    
                                    <a href="<?=$url?>servicos" title="<?=$h1?>" class="card__btn">Saiba Mais</a>
                                </div>
                            </div>
                        </div>
                    
                       <div class="card--mod-4">
                            <div class="card__front">
                                <img src="<?=$url?>imagens/servicos/limpeza-pisos-pos-obra.jpg" alt="Imagem de <?=$nomeSite?>" title="Imagem de <?=$nomeSite?>"/>
                                <h2>Limpeza pós Obra em SP</h2>
                            </div>
                            <div class="card__back">
                                <div>
                                    <p>Somos uma empresa com mais de 10 anos de experiência e que traz para o mercado a inovação da higienização de ambientes e equipamentos comerciais e industriais através da limpeza a vapor, método mais seguro...</p>
                                    
                                    <a href="<?=$url?>servicos" title="<?=$h1?>" class="card__btn">Saiba Mais</a>
                                </div>
                            </div>
                        </div>
                        <div class="card--mod-4">
                            <div class="card__front">
                                <img src="<?=$url?>imagens/servicos/limpeza-fachada.jpg" alt="Imagem de <?=$nomeSite?>" title="Imagem de <?=$nomeSite?>"/>
                                <h2>Limpeza de Fachadas</h2>
                            </div>
                            <div class="card__back">
                                <div>
                                    <p>Lavagem e limpeza de fachada vidros e letreiros dando vida e cara nova estabelecimento uso de lavadora de alta pressão limpeza e remoção de sujidades em vidros uso de cadeirinha e balancim equipe treinada e com certificado NR-18</p>
                                    
                                    <a href="<?=$url?>servicos" title="<?=$h1?>" class="card__btn">Saiba Mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
            <!-- carousel -->
            <div class="container">
                    <hr>
                <div class="wrapper">
                    <h2 class="text-center">Antes <span class="title">Depois</span></h2>
                    <div class="carousel__simple">
                         <a href="<?=$url?>imagens/antes-depois/empresa-limpeza-pos-obra-sp-01.png" class="lightbox"><img class="m-5" src="<?=$url?>imagens/antes-depois/empresa-limpeza-pos-obra-sp-01.png" alt="Imagem de <?=$nomeSite?>" title="Imagem de <?=$nomeSite?>"></a>
                         <a href="<?=$url?>imagens/antes-depois/empresa-limpeza-pos-obra-sp-02.png" class="lightbox"><img class="m-5" src="<?=$url?>imagens/antes-depois/empresa-limpeza-pos-obra-sp-02.png" alt="Imagem de <?=$nomeSite?>" title="Imagem de <?=$nomeSite?>"></a>
                         <a href="<?=$url?>imagens/antes-depois/empresa-limpeza-pos-obra-sp-03.png" class="lightbox"><img class="m-5" src="<?=$url?>imagens/antes-depois/empresa-limpeza-pos-obra-sp-03.png" alt="Imagem de <?=$nomeSite?>" title="Imagem de <?=$nomeSite?>"></a>
                         <a href="<?=$url?>imagens/antes-depois/empresa-limpeza-pos-obra-sp-04.png" class="lightbox"><img class="m-5" src="<?=$url?>imagens/antes-depois/empresa-limpeza-pos-obra-sp-04.png" alt="Imagem de <?=$nomeSite?>" title="Imagem de <?=$nomeSite?>"></a>
                         <a href="<?=$url?>imagens/antes-depois/empresa-limpeza-pos-obra-sp-05.png" class="lightbox"><img class="m-5" src="<?=$url?>imagens/antes-depois/empresa-limpeza-pos-obra-sp-05.png" alt="Imagem de <?=$nomeSite?>" title="Imagem de <?=$nomeSite?>"></a>
                         <a href="<?=$url?>imagens/antes-depois/empresa-limpeza-pos-obra-sp-06.png" class="lightbox"><img class="m-5" src="<?=$url?>imagens/antes-depois/empresa-limpeza-pos-obra-sp-06.png" alt="Imagem de <?=$nomeSite?>" title="Imagem de <?=$nomeSite?>"></a>
                         <a href="<?=$url?>imagens/antes-depois/empresa-limpeza-pos-obra-sp-07.png" class="lightbox"><img class="m-5" src="<?=$url?>imagens/antes-depois/empresa-limpeza-pos-obra-sp-07.png" alt="Imagem de <?=$nomeSite?>" title="Imagem de <?=$nomeSite?>"></a>
                        <a href="<?=$url?>imagens/antes-depois/empresa-limpeza-pos-obra-sp-08.png" class="lightbox"><img class="m-5" src="<?=$url?>imagens/antes-depois/empresa-limpeza-pos-obra-sp-08.png" alt="Imagem de <?=$nomeSite?>" title="Imagem de <?=$nomeSite?>"></a>
                    </div>
                </div>
            </div>

            <!-- end carousel -->
            <div class="learn-more__container">
                <img src="<?=$url?>imagens/slider/limpeza-pos-obra-banner-footer.png" alt="Imagem de <?=$nomeSite?>" title="Imagem de <?=$nomeSite?>" class="learn-more__cover">
                <div class="content">
                    <div class="wrapper">
                        <div class="content__description">
                            <h2>EMPRESA DE <span class="title">LIMPEZA PÓS OBRA SP</span></h2>
                            <p>
                                O setor de construção civil é um dos que mais cresce em todo o país.
                                Porém para que essa área seja bem aproveitada e realmente ofereça crescimento, é preciso atentar-se a alguns detalhes essenciais.
                                Um deles é a limpeza após a obra, seja ela de pequeno ou grande porte. Contudo, essa limpeza não pode ser feita de forma comum, pois alguns elementos usados na construção civil não podem ser simplesmente descartados como um resíduo doméstico, eles precisam ser direcionados aos locais corretos para evitar danos à natureza e também prováveis multas à empresa que realiza a obra. Se tratando de obras residências, a limpeza precisa ser minuciosa para, além de tornar o local mais agradável, evitar problemas de saúde que podem ser desencadeados com a poeira.
                                Para esse serviço, o mais indicado é a contratação da empresa de limpeza pós-obra SP Serv-San.
                            </p>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!--ENDCOMPONENTS-->
        </section>
        </div> <!-- end content -->
    </main>
    <? include('inc/footer.php'); ?>
    <!--STARTSCRIPTSFOOTER-->
    <script><?include ('slick/slick.min.js');?>
    <?php
    if(!$isMobile):
    include ('js/slick-banner.js');
    endif;
    ?></script>
    <script>
        $(document).ready(function(){
    $('.carousel__simple').slick({
    centerMode: true,
    autoplaySpeed: 1500,
    autoplay: true,
    infinite: true,
    cssEase: 'ease',
    slidesToShow: 2,
    arrows: true,
    responsive: [
    {
    breakpoint: 1024,
    settings: {
    slidesToShow: 2,
    arrows: false,
    }
    },
    {
    breakpoint: 768,
    settings: {
    slidesToShow: 1,
    arrows: false,
    }
    }
    ]
    });
    });
    </script>
<script>
    $(document).ready(function(){
        $('.carousel__simple_two').slick({
            centerMode: true,
            autoplaySpeed: 1500,
            autoplay: true,
            infinite: true,
            cssEase: 'ease',
            slidesToShow: 4,
            arrows: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                    }
                }
            ]
        });
    });
</script>

    <!--ENDSCRIPTSFOOTER-->
</body>
</html>