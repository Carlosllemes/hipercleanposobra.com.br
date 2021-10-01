<?php
include('inc/vetKey.php');
$h1             = "Exemplo de MPI";
$title          = $h1;
$desc           = "Exemplo de MPI - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt eos eaque aliquid nisi ipsa modi, sed reprehenderit dicta harum est ratione nulla, doloremque dolor atque maxime aliquam, tenetur nam deleniti!";
$key            = "mpi,sample,lorem,ipsum";
$legendaImagem  = "Foto ilustrativa de Armário de aço tipo roupeiro preço";
$pagInterna     = "Informações";
$urlPagInterna  = "informacoes";
include('inc/head.php');
include('inc/fancy.php');
?>
<script src="<?=$url?>js/organictabs.jquery.js" ></script>
</head>
<body>
<?php include('inc/topo.php');?>
<div class="wrapper">
  <main>
    <div class="content" itemscope itemtype="https://schema.org/Product">
      <section>
        <?=$caminho2?>
        <h1><?=$h1?></h1>
        <article>
          <?php $quantia = 3; include('inc/gallery.php');?>
          <p class="alerta">Clique nas imagens para ampliar</p>
          <h2>SUBTÍTULO DA MPI</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus vero, recusandae consequatur natus commodi ratione dolores hic voluptas, facere illo rerum asperiores pariatur debitis itaque voluptatem. Debitis modi, provident saepe.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint similique commodi quaerat, eius! Nisi recusandae adipisci quod, vitae sequi cumque soluta dolorem necessitatibus id dolore blanditiis veniam molestias nemo illum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex hic rem velit cumque mollitia consequuntur ipsum eveniet, repudiandae, et enim blanditiis veniam autem explicabo animi perspiciatis atque vitae iure. Et.</p>
          <ul class="list">
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit;</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit;</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit;</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit;</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
          </ul>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit iste vero nesciunt libero esse aut ad repudiandae possimus maiores saepe, quaerat porro inventore. Tempora voluptatum fugit id animi, eligendi deleniti!</p>
          <h2>SUBTÍTULO DA MPI</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo soluta excepturi distinctio molestias facere animi possimus quos deleniti odit totam, quas explicabo natus assumenda perferendis, modi vitae vero quam, qui?</p>
          <?php include('inc/saiba-mais.php');?>
          <?php include('inc/social-media.php');?>
        </article>
        <?php include('inc/coluna-lateral.php');?>
        <br class="clear" />
        <?php include('inc/paginas-relacionadas.php');?>
        <?php include('inc/regioes.php');?>
        <br class="clear">
        <?php include('inc/copyright.php');?>
      </section>
    </div>
  </main>
  </div><!-- .wrapper -->
  <?php include('inc/footer.php');?>
</body>
</html>