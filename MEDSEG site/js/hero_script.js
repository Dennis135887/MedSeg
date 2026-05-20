
/*animação das sections
Sistema de Gestão Integrado compatível com eSocial e
e-Social de um jeito simples e seguro*/



const observer = new IntersectionObserver((entries)=>{
  entries.forEach(entry=>{
    if(entry.isIntersecting){
      entry.target.classList.add("show");
    }
  });
});

document.querySelectorAll(
".hero2-img-animate, .hero2-text-animate, .create-text-animate, .create-img-animate"
).forEach(el => observer.observe(el));
