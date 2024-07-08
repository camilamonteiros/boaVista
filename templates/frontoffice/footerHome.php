<footer>
  <section class="container">
    <div class="row">
      <div class="col-lg-3 col-12 d-flex align-items-center justify-content-center">
        <img src="img/logo.svg" alt="logomarca Construtora Boa Vista" class="img-footer">
      </div>
      <div class="col-lg-9 col-12">
        <ul class="nav-footer d-none d-lg-flex align-items-center justify-content-between d-none">
          <li>
            <a href="<?php echo url_generate(['route' => 'home']); ?>" class="navText" id="navFooter-home">Home</a>
          </li>
          <li>
            <a href="<?php echo url_generate(['route' => 'quemSomos']); ?>" class="navText" id="navFooter-quemSomos">Quem Somos</a>
          </li>
          <li>
            <a href="<?php echo url_generate(['route' => 'projetos']); ?>" class="navText" id="navFooter-projetos">Projetos</a>
          </li>
          <li>
            <a href="<?php echo url_generate(['route' => 'noticiasEventos']); ?>" class="navText" id="navFooter-noticiasEventos">Notícias e Eventos</a>
          </li>
          <li><a href="<?php echo url_generate(['route' => 'contatos']); ?>" class="navText" id="navFooter-contatos">Contatos</a></li>
        </ul>
        <div class="footer-line"></div>
        <div class="d-lg-flex">
          <div class="contatos-footer">
            <div class="d-flex endereco-box justify-content-center text-center">
              <i class="bi bi-geo-alt-fill"></i>
              <div class="endereco">
                <p>Rua Taumaturgo de Azevedo, 3237</p>
                <p>Ilhotas, Teresina - PI</p>
                <p>64001-340</p>
              </div>
            </div>
            <div class="d-flex justify-content-center text-center">
              <i class="bi bi-telephone-fill"></i>
              <div class="endereco">
                <p>(86) 3221-8064</p>
              </div>
            </div>
          </div>
          <div class="d-flex flex-column justify-content-between">
            <div class="socialMedia-footer d-flex justify-content-center justify-content-lg-end w-100">
              <a href="#"><i class="bi bi-whatsapp"></i></a>
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
            </div>
            <div class="copyright w-100 text-lg-end text-center">
              Copyright © 2024 Construtora BoaVista. Created by <a href="https://www.camilamonteiro.me/">Camila Monteiro</a>.
            </div>
          </div>
        </div>
      </div>
  </section>
</footer>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const counters = document.querySelectorAll('.counter-value');
    const duration = 10000;

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
<script>
  function toggleMenu() {
    const menu = document.querySelector(".navMenu");
    const menuToggle = document.querySelector(".menu-toggle");
    menu.classList.toggle("ativado");
    menuToggle.classList.toggle("ativado");
  }
</script>
<script src="js/bootstrap.bundle.min.js.map"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="js/script.js"></script>
</body>

</html>