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
  
  if (!route) {
    document.getElementById("nav-home").classList.add("navAtivo");
  } else {
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
      case "projeto":
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
        document.getElementById("nav-home").classList.add("navAtivo");
        break;
    }
  }
});


if (images) {
  let currentIndex = 0;
  const galleryImg = document.getElementById("gallery-img");
  const modal = document.querySelector(".modal");
  const modalImg = modal.querySelector("img");
  const prevBtn = document.getElementById("prev-btn");
  const nextBtn = document.getElementById("next-btn");
  const closeModalBtn = document.getElementById("close-modal");
  const modalPrevBtn = document.getElementById("modal-prev-btn");
  const modalNextBtn = document.getElementById("modal-next-btn");

  function updateGalleryImage(index) {
    galleryImg.src = images[index];
    galleryImg.style.display = "block";
  }

  function showNextImage() {
    currentIndex = (currentIndex + 1) % images.length;
    updateGalleryImage(currentIndex);
    if (modal.classList.contains("open")) {
      modalImg.src = galleryImg.src;
    }
  }

  function showPrevImage() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    updateGalleryImage(currentIndex);
    if (modal.classList.contains("open")) {
      modalImg.src = galleryImg.src;
    }
  }

  updateGalleryImage(currentIndex);

  nextBtn.addEventListener("click", showNextImage);
  prevBtn.addEventListener("click", showPrevImage);

  galleryImg.addEventListener("click", () => {
    modalImg.src = galleryImg.src;
    modal.classList.add("open");
  });

  closeModalBtn.addEventListener("click", () => {
    modal.classList.remove("open");
  });

  modalNextBtn.addEventListener("click", showNextImage);
  modalPrevBtn.addEventListener("click", showPrevImage);

  document.addEventListener("keydown", (e) => {
    if (modal.classList.contains("open")) {
      if (e.key === "ArrowRight") {
        showNextImage();
      } else if (e.key === "ArrowLeft") {
        showPrevImage();
      } else if (e.key === "Escape") {
        modal.classList.remove("open");
      }
    }
  });
}


