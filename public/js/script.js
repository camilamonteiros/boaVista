function goBack() {
  window.history.back();
}
document.addEventListener("DOMContentLoaded", function () {
  const textoElemento = document.getElementById("texto");
  const paragrafo = textoElemento.querySelector("p");
  if (
    paragrafo &&
    paragrafo.firstElementChild &&
    paragrafo.firstElementChild.tagName === "IMG"
  ) {
    paragrafo.removeChild(paragrafo.firstElementChild);
  }
});
document.addEventListener("DOMContentLoaded", function () {
  const urlParams = new URLSearchParams(window.location.search);
  const route = urlParams.get("route");
  switch (route) {
    case "home":
      document.getElementById("nav-home").classList.add("navAtivo");
      break;
    case "quemSomos":
      document.getElementById("nav-quemSomos").classList.add("navAtivo");
      break;
    case "projetos":
      document.getElementById("nav-projetos").classList.add("navAtivo");
      break;
    case "noticiasEventos":
      document.getElementById("nav-noticiasEventos").classList.add("navAtivo");
      break;
      case "noticia":
        document.getElementById("nav-noticiasEventos").classList.add("navAtivo");
        break;
    case "contatos":
      document.getElementById("nav-contatos").classList.add("navAtivo");
      break;
    default:
      // Se não houver correspondência, você pode adicionar uma classe padrão ou não fazer nada
      break;
  }
});
