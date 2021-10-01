<?php
//LISTAGEM DE MODULOS E SEUS ITENS PARA OS MENUS
/**
 * <b>Como funciona</b>
 * Como alguns modulos podem deixar o menu muito grande, pode ser necessário comentar algumas
 * consultas para não ficar muito extenso no menu.
 * Você pode ter muitas postagens de blogs, então não é interessante exibir os itens do blog no menu
 * porém serão exibidas as categorias do blogs, a mesma dinâmica serve para outros modulos.
 * ###TODAS AS LISTAGENS DE CADA MODULO DE MENU ESTÃO DISPONÍVEIS ABAIXO###
 */
###PRODUTOS####
$Read->ExeRead(TB_PRODUTO, "WHERE user_empresa = :emp AND prod_status = :stats AND FIND_IN_SET(:cat, cat_parent) ORDER BY prod_title ASC", "emp=" . EMPRESA_CLIENTE . "&stats=2&cat={$itemCat}");
if ($Read->getResult()):
  foreach ($Read->getResult() as $prodItem):
    ?>
<li><a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($prodItem['cat_parent'], EMPRESA_CLIENTE) . $prodItem['prod_name'], '/'); ?>" title="<?= $prodItem['prod_title'] ?>" class="itemFinal"> <?= $prodItem['prod_title'] ?></a></li>
    <?php
  endforeach;
endif;

###BLOG###
$Read->ExeRead(TB_BLOG, "WHERE user_empresa = :emp AND blog_status = :stats AND cat_parent = :cat ORDER BY blog_title ASC", "emp=" . EMPRESA_CLIENTE . "&stats=2&cat={$itemCat}");
if ($Read->getResult()):
  foreach ($Read->getResult() as $blogItem):
    ?>
    <li><a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($blogItem['cat_parent'], EMPRESA_CLIENTE) . $blogItem['blog_name'], '/'); ?>" title="<?= $blogItem['blog_title'] ?>"><?= $blogItem['blog_title'] ?></a></li>
    <?php
  endforeach;
endif;

###QUEM SOMOS###
$Read->ExeRead(TB_QUEMSOMOS, "WHERE user_empresa = :emp AND quem_status = :stats AND cat_parent = :cat ORDER BY quem_title ASC", "emp=" . EMPRESA_CLIENTE . "&stats=2&cat={$itemCat}");
if ($Read->getResult()):
  foreach ($Read->getResult() as $quemItem):
    ?>
    <li><a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($quemItem['cat_parent'], EMPRESA_CLIENTE) . $quemItem['quem_name'], '/'); ?>" title="<?= $quemItem['quem_title'] ?>"><?= $quemItem['quem_title'] ?></a></li>
    <?php
  endforeach;
endif;

###NOVIDADES/NOTÍCIAS####
$Read->ExeRead(TB_NOTICIA, "WHERE user_empresa = :emp AND noti_status = :stats AND cat_parent = :cat ORDER BY noti_title ASC", "emp=" . EMPRESA_CLIENTE . "&stats=2&cat={$itemCat}");
if ($Read->getResult()):
  foreach ($Read->getResult() as $notiItem):
    ?>
    <li><a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($notiItem['cat_parent'], EMPRESA_CLIENTE) . $notiItem['noti_name'], '/'); ?>" title="<?= $notiItem['noti_title'] ?>"><?= $notiItem['noti_title'] ?></a></li>
    <?php
  endforeach;
endif;

###SERVIÇOS####
$Read->ExeRead(TB_SERVICO, "WHERE user_empresa = :emp AND serv_status = :stats AND cat_parent = :cat ORDER BY serv_title ASC", "emp=" . EMPRESA_CLIENTE . "&stats=2&cat={$itemCat}");
if ($Read->getResult()):
  foreach ($Read->getResult() as $servItem):
    ?>
    <li><a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($servItem['cat_parent'], EMPRESA_CLIENTE) . $servItem['serv_name'], '/'); ?>" title="<?= $servItem['serv_title'] ?>"><?= $servItem['serv_title'] ?></a></li>
    <?php
  endforeach;
endif;

###CASES####
$Read->ExeRead(TB_CASE, "WHERE user_empresa = :emp AND case_status = :stats AND cat_parent = :cat ORDER BY case_title ASC", "emp=" . EMPRESA_CLIENTE . "&stats=2&cat={$itemCat}");
if ($Read->getResult()):
  foreach ($Read->getResult() as $caseItem):
    ?>
    <li><a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($caseItem['cat_parent'], EMPRESA_CLIENTE) . $caseItem['case_name'], '/'); ?>" title="<?= $caseItem['case_title'] ?>"><?= $caseItem['case_title'] ?></a></li>
    <?php
  endforeach;
endif;

###DOWNLOADS####
$Read->ExeRead(TB_DOWNLOAD, "WHERE user_empresa = :emp AND dow_status = :stats AND cat_parent = :cat ORDER BY dow_title ASC", "emp=" . EMPRESA_CLIENTE . "&stats=2&cat={$itemCat}");
if ($Read->getResult()):
  foreach ($Read->getResult() as $dowItem):
    ?>
    <li><a href="<?= BASE . '/uploads/' . $dowItem['dow_file']; ?>" title="<?= $dowItem['dow_title'] ?>" target="_blank"><?= $dowItem['dow_title'] ?></a></li>
    <?php
  endforeach;
endif;