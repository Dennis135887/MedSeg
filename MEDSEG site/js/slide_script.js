window.addEventListener('DOMContentLoaded', function () {
    const hash = window.location.hash;

    if (hash === '#artigo') {
      const targetSlide = document.querySelector(hash);
      const carouselElement = document.querySelector('#matrizSlide');

      if (targetSlide && carouselElement) {
        const slideItems = carouselElement.querySelectorAll('.carousel-item');

        slideItems.forEach((item, index) => {
          if (item.id === 'artigo') {
            const carousel = bootstrap.Carousel.getOrCreateInstance(carouselElement);
            carousel.to(index); // Vai para o slide correto
          }
        });
      }
    }
  });