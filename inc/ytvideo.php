<script>
    // INSTRUÇÕES
    // Faça a chama deste arquivo via include no footer da página em questão
    // Ex.: include('inc/ytvideo.php')
    // Insira o atributo 'data-video' e atribua a ele a URL do vídeo
    // Ex.: <div data-video="https://www.youtube.com/watch?v=iONPHwtYoTU"></div>
    // FIM INSTRUÇÕES
    
    // Armazena todos os placeholders para os iframes numa variável.
    const videos = new Array();
    const videoUrl = new Array();
    $('[data-video]').each(function(){
        videos.push($(this));
        videoUrl.push($(this).attr('data-video'));
    });
    // Defina aqui asclasses a serem adicionadas aos iframes.
    const videoClasses = [
      'fwidth',
    ]
    // Cria a thumbnail dos vídeos nas divs criadas.
    window.addEventListener("load", () => {
      for(let i = 0; i < videos.length; i++) {
        // Cria a imagem de thumbnail
        // Adiciona a classe ytvideo para que seja exibido o botão do YouTube
        $(videos[i]).addClass('ytvideo');
        let image = document.createElement('img');
        // Define o src da imagem.
        image.src = `https://img.youtube.com/vi/${videoUrl[i].split('=')[1]}/0.jpg`
        // Gera o tamanho da width considerando o tamanho da div pai.
        let width = $(videos[i]).width();
        // Define a height da imagem com matemática
        image.height = (width / 16) * 9;
        // Implicita o valor da width pois caso não expecificado o video redimensiona
        image.width = width;
        // Define o alt e title da imagem
        image.alt = "Confira mais um vídeo da <?=$nomeSite?>";
        image.title = "Confira mais um vídeo da <?=$nomeSite?>";
        // Adiciona a classe necessária para remover as bordas pretas
        image.classList.add('object-fit-cover');
        // Insere a imagem no DOM
        $(videos[i]).append(image);
      }
      // Aqui é onde a magia acontece.
        for(let i = 0; i < videos.length; i++){
          // Loopa por todos os videos e adiciona um "escutador" de evento para o click em cada um deles
          $(videos[i]).click(function(){
            //Cria o iframe a partir do indice do element que foi clicado
            let videoToInsert = document.createElement('iframe');
            videoToInsert.src = `${videoUrl[i].replace('watch?v=', 'embed/')}?&autoplay=1`;
            videoToInsert.classList.add(...videoClasses);
            let width = $(videos[i]).width();
            videoToInsert.height = (width / 16) * 9;
            // Remove a classe ytvideo para o botão do YouTube seja removido
            $(videos[i]).removeClass('ytvideo');
            // Remove o placeholder
            $(videos[i]).empty();
            // Adiciona o Iframe
            $(videos[i]).append(videoToInsert);
          })
        }
    })
</script>