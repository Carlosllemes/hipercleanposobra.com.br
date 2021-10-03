
<script>
  $(window).load(function() {
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.defer=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', '<?=$idAnalytics?>', 'auto');
      ga('send', 'pageview');

      $LAB
      .script("js/geral.js").wait()
      .script("js/jquery.scrollUp.min.js").wait()
      .script("js/scroll.js").wait(function(){
          initMyPage();
      });


      jQuery(document).ready(function ($) {
          jQuery('.btn-orc').on('click', function() {
              ga('send', 'event', 'Evento Orcamento','Clique', 'Clique Orcamento');
          });
      });
    });   

    // Disparando função através do scroll
    var keyscroll;
    $(window).on('scroll', function(e){
        // criando uma condição se a posição na tela for maior que 300px e o valor da variavel  for diferente de true executa
        if($(this).scrollTop() >= 100 && !keyscroll){
        	(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
            // aleterando o valor da variável para que não dispare novamente a função
            keyscroll = true;
        }
    });
</script>

<script>
    var myTime = window.performance.now();
    var items = window.performance.getEntriesByType('mark');
    var items = window.performance.getEntriesByType('measure');
    var items = window.performance.getEntriesByName('mark_fully_loaded');
    window.performance.mark('mark_fully_loaded');
    window.performance.measure('measure_load_from_dom', 'mark_fully_loaded');  
    window.performance.clearMarks();
    window.performance.clearMeasures('measure_load_from_dom');
</script>