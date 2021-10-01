<?php
$h1       = 'Informações';
$title    = 'Informações';
$desc     = 'Informações - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus ex sapiente mollitia voluptate, labore nemo. Illum corporis cupiditate non molestiae earum, sit, ipsum fugiat, incidunt vel, animi asperiores modi doloribus.';
$key      = 'yyyyyyyy, xxxxxxxxx, zzzzzzzzzz';
$var    = 'Informação';
include('inc/head.php');
?>
</head>
<body>
<?php include('inc/topo.php');?>
<div class="wrapper">
  <main>
    <div class="content">
      <section>
        <?=$caminho?>
        <h1><?=$h1?></h1>
        <article class="full">
          <?php include('inc/social-media.php');?>
          <section itemscope itemtype="http://schema.org/Service">
            <h2>Conheça todas as Informações da <?=$nomeSite.' '.$slogan?>:</h2>
            <ul class="thumbnails">
              <li>
                <a rel="nofollow" href="<?=$url;?>exemplo-mpi" title="Exemplo de MPI">
                  <img src="<?=$url;?>imagens/informacoes/exemplo-mpi-01.jpg" alt="Exemplo de MPI" title="Exemplo de MPI"/>
                </a>
                <h2><a href="<?=$url;?>exemplo-mpi" title="Exemplo de MPI">Exemplo de MPI</a></h2>
              </li>
              <li>
                <a rel="nofollow" href="<?=$url;?>exemplo-mpi" title="Exemplo de MPI">
                  <img src="<?=$url;?>imagens/informacoes/exemplo-mpi-01.jpg" alt="Exemplo de MPI" title="Exemplo de MPI"/>
                </a>
                <h2><a href="<?=$url;?>exemplo-mpi" title="Exemplo de MPI">Exemplo de MPI</a></h2>
              </li>
              <li>
                <a rel="nofollow" href="<?=$url;?>exemplo-mpi" title="Exemplo de MPI">
                  <img src="<?=$url;?>imagens/informacoes/exemplo-mpi-01.jpg" alt="Exemplo de MPI" title="Exemplo de MPI"/>
                </a>
                <h2><a href="<?=$url;?>exemplo-mpi" title="Exemplo de MPI">Exemplo de MPI</a></h2>
              </li>
              <li>
                <a rel="nofollow" href="<?=$url;?>exemplo-mpi" title="Exemplo de MPI">
                  <img src="<?=$url;?>imagens/informacoes/exemplo-mpi-01.jpg" alt="Exemplo de MPI" title="Exemplo de MPI"/>
                </a>
                <h2><a href="<?=$url;?>exemplo-mpi" title="Exemplo de MPI">Exemplo de MPI</a></h2>
              </li>
            </ul>
          </section>
        </article>
      </section>
    </div>
  </main>
</div>
<?php include('inc/footer.php');?>
</body>
</html>