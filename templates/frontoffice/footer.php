
<footer>
  <section class="container">
    <div class="row">
      <div class="col-lg-3 col-12 d-flex align-items-center justify-content-center">
        <img src="img/logo.svg" alt="" class="img-footer">
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
  function toggleMenu() {
    const menu = document.querySelector(".navMenu");
    const menuToggle = document.querySelector(".menu-toggle");
    menu.classList.toggle("ativado");
    menuToggle.classList.toggle("ativado");
  }
</script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="js/script.js"></script>
</body>

</html>