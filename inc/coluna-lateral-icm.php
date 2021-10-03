<aside>
    <div class="aside-form">
        <h2>FAÇA UM ORÇAMENTO</h2>
        <form enctype="multipart/form-data" method="post">
            <label>Digite seu email</label>
            <input type="text" placeholder="email@exemplo.com.br" onKeyUp="minusculas(this)" name="email" value="<?php isset($post['email']) ? $post['email'] : ''?>" required/>            
            <label>Digite seu telefone</label>
            <input type="text" placeholder="(11) 1234-5678" name="telefone" value="<?php isset($post['telefone']) ? $post['telefone'] : ''?>" required/>
            <label>Mensagem</label>
            <textarea rows="5" name="mensagem" placeholder="Gostaria de saber mais sobre <?=$h1?>" required><?php isset($post['mensagem']) ? $post['mensagem'] : ''?></textarea>
            <div class="g-recaptcha" style="transform:scale(0.8);-webkit-transform:scale(0.76);transform-origin:0 0;-webkit-transform-origin:0 0;" data-sitekey="<?= $siteKey; ?>"></div>
            <input type="submit" name="EnviaContato" style="display: none;" class="submit-aside-form">
            <a href="javascript:;" class="btn btn-aside-submit" title="Solicitar meu Orçamento">Solicitar meu Orçamento</a>
            <a href="https://web.whatsapp.com/send?phone=55<?=$whatsapp?>&text=<?=rawurlencode("Olá! Gostaria de mais informações sobre as ofertas da ".$nomeSite." - ".$slogan)?>" target="_blank" rel="nofollow" class="btn btn-aside-whatsapp" title="Orçamento por Whatsapp">Orçamento por Whatsapp</a>
            <a href="tel:<?=$fone[0][1]?>" class="btn btn-aside-phone" title="Compre pelo Telefone">Compre pelo Telefone</a>
        </form>
        <div class="aside-social">
            <a href="https://web.whatsapp.com/send?phone=55<?=$whatsapp?>&text=<?=rawurlencode("Olá! Gostaria de mais informações sobre as ofertas da ".$nomeSite." - ".$slogan)?>" title="Whatsapp" target="_blank" rel="nofollow" class="call-whatsapp"><i class="fa fa-whatsapp"></i></a>
            <a href="tel:<?=$fone[0][1]?>" class="call-phone" title="Compre pelo Telefone"><i class="fa fa-phone"></i></a>
        </div>
    </div>
    <h2 class="collapse-aside">Páginas Relacionadas</h2>
    <nav style="display: none;">
        <ul>
            <? include('inc/sub-menu.php');?>
        </ul>
    </nav>
    </aside>
    <script>
        $(document).ready(function(){

            $('.expand-content span').on('click', function(){
                $('.mpi-content').slideToggle(function(){
                    if($('.mpi-content').css('display') == 'block'){
                        $('.expand-content span').html(`<i class="fa fa-chevron-up"></i>`);
                    }
                    else {
                        $('.expand-content span').html(`Leia mais`);
                    }
                });
            });

            $('.tabs-btn [data-tab]').on('click', function(){
                let currentTab = $(this).attr('data-tab');
                if(!$(this).hasClass('active-tab')){
                    $('.tabs-btn [data-tab]').removeClass('active-tab');
                    $(this).addClass('active-tab');
                }
                if($('.tabs-content .active-tab').attr('data-tab') != currentTab){
                    $('.tabs-content .active-tab').fadeOut(function(){
                        $(this).removeClass('active-tab');
                        $(`.tabs-content [data-tab='${currentTab}']`).addClass('active-tab');
                        $(`.tabs-content [data-tab='${currentTab}']`).fadeIn();
                    });
                }
            });

            $('aside .collapse-aside').on('click', function(){
                $(this).next().slideToggle();
            });

            $('aside .btn-aside-submit').on('click', function(){
                $('aside .submit-aside-form').trigger('click');
            });

            if($(window).width() <= 765){
                $('aside .aside-form .aside-social .call-whatsapp').attr('href', 'https://api' + $('aside .aside-social .call-whatsapp').attr('href').split('https://web')[1]);
                $('aside .aside-form .btn-aside-whatsapp').attr('href', 'https://api' + $('aside .aside-form .btn-aside-whatsapp').attr('href').split('https://web')[1]);
                $('.topo-contato .btn-whatsapp').attr('href', 'https://api' + $('.topo-contato .btn-whatsapp').attr('href').split('https://web')[1]);
            }

        });
    </script>