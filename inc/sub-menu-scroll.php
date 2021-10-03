<script>
  $(document).ready(function(){
    $('header [id*="menu"] ul ul').each(function(){
      if($(this).children().length > 15) $(this).addClass('sub-menu-scroll');
    });
  });
</script>