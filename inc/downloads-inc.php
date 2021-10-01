<?php
if (isset($URL[0]) && empty($URL[1])):
    $Read->ExeRead(TB_DOWNLOAD, "WHERE user_empresa = :emp AND dow_status = :stats ORDER BY dow_date DESC", "emp=" . EMPRESA_CLIENTE . "&stats=2");
    if ($Read->getResult()):
        foreach ($Read->getResult() as $dados):
            extract($dados);
            ?>
            <li class='download-item' id="<?= $dow_name; ?>">  
                <img src="<?= RAIZ; ?>/imagens/pdf-icone.png" alt="<?= $dow_title; ?>" title="<?= $dow_title; ?>" />
                <h2><?= $dow_title; ?></h2>                  
                <a href="<?= RAIZ . '/doutor/uploads/' . $dow_file; ?>" title="<?= $dow_description; ?>" target="_blank">
                    <div class="button">BAIXAR</div>                    
                </a>
            </a>
            </li> 
            <?php
        endforeach;
    endif;
endif;

