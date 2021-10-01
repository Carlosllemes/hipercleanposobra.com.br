<?php
/**
 * <b>Cadastro de newslleter</b>
 * Sistema somenta para captação de lista de e-mails, é possível exportar as listas em CSV
 * para outros sistemas.
 * Sistema de captação em ajax/real time. É enviado um e-mail para o cliente confirmar o cadastro, 
 * e autententicar se o e-mail é verídico.
 */

?>

<div class="col-12 col-m-12">  
  <form method="post" enctype="multipart/form-data" class="newsletter j_submit">
    <div class="j_load"></div>
    <h2>Cadastre-se e receba nossas novidades!</h2>   
    <input type="hidden" name="action" value="GravaNewsletter"/>
    <input type="hidden" name="user_empresa" value="<?= EMPRESA_CLIENTE; ?>"/>
    <div class="col-4 col-m-12">
      <label class="col-4 col-m-12">Nome:</label>
      <div class="col-8 col-m-12">
        <input type="text" name="news_nome" required/>
      </div>
    </div>

    <div class="col-6 col-m-12">
      <label class="col-4 col-m-12">E-mail:</label>
      <div class="col-8 col-m-12">
        <input type="text" name="news_email" required/>
      </div>
    </div>

    <div class="col-2">
      <input type="submit" name="CadastraNews" value="Cadastrar" class="btn"/>
    </div>
  </form>
</div>
<div class="clear"></div>
<hr>