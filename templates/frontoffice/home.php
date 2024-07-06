<?php
require_once "headerHome.php";
require_once "../controllers/noticia.php";
?>
<main class="container">
  <section class="row quemSomos-home">
    <div class="col-12 col-lg-7">
      <h2>Quem Somos</h2>
      <div class="linhaTitulo"></div>
      <span class="slogan">Há 40 anos realizando sonhos...</span>
      <div class="texto">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in hendrerit urna.
        Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis
        tellus. Nullam quis imperdiet augue. Vestibulum auctor ornare leo, non suscipit magna interdum eu. Curabitur
        pellentesque nibh nibh, at maximus ante fermentum sit amet. Pellentesque commodo lacus at sodales sodales.
        Quisque sagittis orci ut diam condimentum, vel euismod erat placerat.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in hendrerit urna.
        Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis
        tellus. Nullam quis imperdiet augue.
      </div>
      <div class="col-12 dadosEmpresa d-flex flex-wrap w-100 align-items-center">
        <div class="col-6 d-flex align-items-center flex-column mb-5">
          <div class="counter">
            <h4>+</h4>
            <h4 class="counter-value" data-final="40">0</h4>
            <span class="slogan">anos</span>
          </div>
          <div class="slogan">de trabalho</div>
        </div>
        <div class="col-6 d-flex align-items-center flex-column mb-5">
          <div class="counter">
            <h4>+</h4>
            <h4 class="counter-value" data-final="510000">0</h4>
            <span class="slogan">m<sup>2</sup></span>
          </div>
          <div class="slogan">construídos</div>
        </div>
        <div class="col-6 d-flex align-items-center flex-column">
          <div class="counter">
            <h4>+</h4>
            <h4 class="counter-value" data-final="5200">0</h4>
            <span class="slogan">obras</span>
          </div>
          <div class="slogan">entregues</div>
        </div>
        <div class="col-6 d-flex align-items-center flex-column">
          <div class="counter">
            <h4>+</h4>
            <h4 class="counter-value" data-final="25000">0</h4>
            <span class="slogan">sonhos</span>
          </div>
          <div class="slogan">realizados</div>
        </div>
      </div>
    </div>
    <div class="col-lg-5 col-12">
      <img src="img/obraLimpa.png" alt="" class="imagem-ajustada ">
    </div>
  </section>
  <section class="destaques-home row">
    <div>
      <h2>Destaques</h2>
      <div class="linhaTitulo"></div>
    </div>
    <div class="cards-destaque d-flex flex-wrap justify-content-between">
      <?php foreach ($news as $noticia) { ?>
        <div class="card-noticia  col-12 col-md-4">
          <div class="img-card-noticia">
            <img src="<?php echo ($noticia['img_capa']) ?>" alt="">
          </div>
          <div class="texto-card-noticia d-flex flex-column">
            <h3><?php echo ($noticia['titulo']) ?></h3>
            <span class="data-noticia"><?php echo (formatarData($noticia['data_noticia'])) ?></span>
            <div class="linhaCard"></div>
            <div id="texto" class="texto"><?php echo ($noticia['descricao_noticia']) ?></div>
            <a class="align-self-center" href="<?php echo url_generate(['route' => 'noticia', 'id' => $noticia['id_noticia']], true); ?>"><button class="botaoVerde">+ Ver Mais</button></a>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>
</main>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const counters = document.querySelectorAll('.counter-value');
    const duration = 10000; // 20 segundos em milissegundos

    function isElementInViewport(el) {
      let rect = el.getBoundingClientRect();
      return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
      );
    }

    function startCounter(el, finalValue) {
      const startTime = performance.now();
      const endTime = startTime + duration;
      const formatter = new Intl.NumberFormat('pt-BR');

      function updateCounter(currentTime) {
        if (currentTime >= endTime) {
          el.textContent = formatter.format(finalValue);
        } else {
          const elapsed = currentTime - startTime;
          const progress = Math.min(elapsed / duration, 1);
          const currentValue = Math.ceil(progress * finalValue);
          el.textContent = formatter.format(currentValue);
          requestAnimationFrame(updateCounter);
        }
      }
      requestAnimationFrame(updateCounter);
    }

    function onScroll() {
      counters.forEach(function(counter) {
        if (isElementInViewport(counter) && !counter.started) {
          counter.started = true;
          const finalValue = parseInt(counter.getAttribute('data-final'), 10);
          startCounter(counter, finalValue);
        }
      });
    }

    window.addEventListener('scroll', onScroll);
    window.addEventListener('load', onScroll); // Para verificar se o elemento já está visível ao carregar a página
  });
</script>
<?php
require_once "footerHome.php";
?>