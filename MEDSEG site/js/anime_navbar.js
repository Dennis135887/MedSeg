// ==========================================
// SELEÇÃO DE ELEMENTOS
// ==========================================
const toggler = document.querySelector('.custom-toggler');
const nav = document.querySelector('.custom-mobile-nav');
const body = document.body;
const navbar = document.querySelector(".navbar");

const openCadastro = document.getElementById('openCadastro');
const submenu = document.querySelector('.submenu-cadastro');
const btnBack = document.querySelector('.btn-back');
const mainMenu = document.querySelector('.nav-list-mobile');
const navLinks = document.querySelectorAll('.nav-list-mobile .nav-link');

// ==========================================
// FUNÇÕES DE CONTROLE
// ==========================================

function closeMenu() {
    nav.classList.remove('open');
    toggler.classList.remove('open');
    body.classList.remove('no-scroll');

    // Reseta posições do submenu ao fechar tudo
    submenu.classList.remove('active');
    if (mainMenu) mainMenu.style.transform = "translateX(0)";
}

// ==========================================
// EVENTOS PRINCIPAIS
// ==========================================

// 1. MENU HAMBURGUER (ABRIR/FECHAR)
toggler.addEventListener('click', function (e) {
    e.stopPropagation();
    nav.classList.toggle('open');
    toggler.classList.toggle('open');
    body.classList.toggle('no-scroll');

    if (nav.classList.contains('open')) {
        navbar.classList.remove('navbar-scrolled');
    }
});

// 2. FECHAR AO CLICAR NO OVERLAY (Fundo escuro)
// Ajustado para ignorar cliques que venham de dentro do submenu
nav.addEventListener('click', function (e) {
    if (e.target === nav && !submenu.contains(e.target)) {
        closeMenu();
    }
});

// 3. FECHAR AO CLICAR EM LINKS (Exceto o que abre submenu)
navLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        // Se for o link que apenas abre o submenu, não fecha a navegação
        if (link.id === 'openCadastro') return;

        if (window.innerWidth < 992) {
            closeMenu();
        }
    });
});

// ==========================================
// LÓGICA DO SUBMENU (MOBILE)
// ==========================================

// ABRIR SUBMENU
if (openCadastro) {
    openCadastro.addEventListener('click', function (e) {
        if (window.innerWidth < 992) {
            e.preventDefault();
            e.stopPropagation();
            mainMenu.style.transform = "translateX(-100%)";
            submenu.classList.add('active');
        }
    });
}

// BOTÃO VOLTAR (A grande correção!)
if (btnBack) {
    btnBack.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation(); // Impede que o clique chegue na nav e feche tudo
        
        submenu.classList.remove('active');
        mainMenu.style.transform = "translateX(0)";
    });
}

// IMPEDIR QUE CLIQUES DENTRO DO SUBMENU FECHEM O MENU PAI
submenu.addEventListener('click', function(e) {
    e.stopPropagation();
});

// ==========================================
// EFEITOS VISUAIS
// ==========================================

// RESET AO REDIMENSIONAR TELA
window.addEventListener('resize', function () {
    if (window.innerWidth >= 992) {
        closeMenu();
    }
});

// EFEITO DE SCROLL NA NAVBAR
window.addEventListener("scroll", function () {
    if (nav.classList.contains('open')) return;

    if (window.scrollY > 50) {
        navbar.classList.add("navbar-scrolled");
    } else {
        navbar.classList.remove("navbar-scrolled");
    }
});