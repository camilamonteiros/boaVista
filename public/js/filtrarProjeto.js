document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('searchInput');
  const statusConstrucao = document.getElementById('statusConstrucao');
  const statusVenda = document.getElementById('statusVenda');
  const projectContainer = document.getElementById('projectContainer');
  const projects = Array.from(projectContainer.getElementsByClassName('card-noticia'));

  function filterProjects() {
    const searchTerm = searchInput.value.toLowerCase();
    const construcaoValue = statusConstrucao.value;
    const vendaValue = statusVenda.value;

    projects.forEach(project => {
      const projectName = project.getAttribute('data-nome');
      const projectConstrucao = project.getAttribute('data-status-construcao');
      const projectVenda = project.getAttribute('data-status-venda');

      const matchesSearch = projectName.includes(searchTerm);
      const matchesConstrucao = !construcaoValue || projectConstrucao === construcaoValue;
      const matchesVenda = !vendaValue || projectVenda === vendaValue;

      if (matchesSearch && matchesConstrucao && matchesVenda) {
        project.style.display = 'block';
      } else {
        project.style.display = 'none';
      }
    });
  }

  searchInput.addEventListener('input', filterProjects);
  statusConstrucao.addEventListener('change', filterProjects);
  statusVenda.addEventListener('change', filterProjects);
});
