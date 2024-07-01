<footer class="copyright w-100 text-center">
    Copyright © 2024 Construtora BoaVista. Created by <a href="https://www.camilamonteiro.me/">Camila
      Monteiro</a>.
  </footer>

  <script>
    function toggleMenu() {
      const menu = document.querySelector(".navMenu");
      const menuToggle = document.querySelector(".menu-toggle");
      menu.classList.toggle("ativado");
      menuToggle.classList.toggle("ativado");
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
  <script>
    function selectFile(fileUrl) {
      document.getElementById('img_capa').value = fileUrl;
      $('#fileManagerModal').modal('hide');
    }
  </script>
</body>

</html>
