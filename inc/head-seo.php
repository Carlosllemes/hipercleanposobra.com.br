<?php
$getURL = trim(strip_tags(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
$setURL = (empty($getURL) ? 'index' : $getURL);
$URL = explode('/', $setURL);
$SEO = new Seo($setURL);
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-br" itemscope itemtype="https://schema.org/<?= $SEO->getSchema(); ?>"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <?php include('inc/jquery.php') ?>  

    <script>
                    <?
                        include('js/vendor/modernizr-2.6.2.min.js');
                        include('js/jquery-1.7.2.min.js');
                        include('js/jquery.slicknav.js');
                    ?>
                </script>
                <style>
                    <?
                        include('css/normalize.css');
                        include('css/style.css');
                        include('css/doutor.css');
                        include('css/font-awesome.css');
                    ?>
                </style>
      <!-- <link rel="stylesheet" href="<?= RAIZ; ?>/css/font-awesome.css"> -->

    <!-- /MENU  MOBILE -->
    <title><?= $SEO->getTitle(); ?></title>
    <base href="<?= RAIZ; ?>">
    <?php 
    $desc = $SEO->getDescription();
    $desc = strip_tags($desc);
    if (mb_strlen($desc,"UTF-8") > 160) {
    $desc = mb_substr($desc, 0, 159);
    $finalSpace = strrpos($desc, " ");
    $desc = substr($desc, 0, $finalSpace);
    $desc .= ".";
    }else if (mb_strlen($desc,"UTF-8") < 140 && mb_strlen($desc,"UTF-8") > 130 ) {
    $desc .= "... Saiba mais.";
    }
    ?>
    <meta name="description" content="<?= $desc; ?>">
    <meta name="keywords" content="<?= $SEO->getkeywords(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="geo.position" content="<?= $latitude . ";" . $longitude ?>">
    <meta name="geo.placename" content="<?= $cidade . "-" . $UF ?>">
    <meta name="geo.region" content="<?= $UF ?>-BR">
    <meta name="ICBM" content="<?= $latitude . ";" . $longitude ?>">
    <meta name="robots" content="index,follow">
    <meta name="rating" content="General">
    <meta name="revisit-after" content="7 days">
    <link rel="canonical" href="<?= RAIZ; ?>/<?= $getURL; ?>">
    <?php
    if (empty($author)):
    echo '<meta name="author" content="' . $nomeSite . '">';
    else:
    echo '<link rel="author" href="' . $author . '">';
    endif;
    ?>
    <link rel="shortcut icon" href="<?= RAIZ; ?>/imagens/favicon.png">
    <meta property="og:region" content="Brasil">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?= $SEO->getTitle(); ?>" />
    <meta property="og:description" content="<?= $desc; ?>" />
    <meta property="og:image" content="<?= $SEO->getImage(); ?>" />
    <meta property="og:url" content="<?= RAIZ; ?>/<?= $getURL; ?>" />
    <meta property="og:locale" content="pt_BR" />
    <meta property="og:site_name" content="<?= $nomeSite ?>">
    <?php
    if ($idFacebook <> '')
    {
    echo '<meta property="fb:admins" content="'.$idFacebook.'">';
    }
    ?>