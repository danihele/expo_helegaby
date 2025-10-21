let currentIndex = 0;
const slides = document.querySelectorAll('.carrossel-card');
const totalSlides = slides.length;
const inner = document.querySelector('.carrossel-inner');
const dots = document.querySelectorAll('.dot');

// Mostra o slide atual
function showSlide(index) {
    if (index >= totalSlides) {
        currentIndex = 0;
    } else if (index < 0) {
        currentIndex = totalSlides - 1;
    } else {
        currentIndex = index;
    }
    
    // Calcula o deslocamento com base no tamanho do card
    const offset = -currentIndex * (slides[0].offsetWidth + 20); // 20 é a margem
    inner.style.transform = `translateX(${offset}px)`;
    
    // Atualiza os dots
    dots.forEach((dot, i) => {
        dot.classList.toggle('active', i === currentIndex);
    });
}

// Navega para o slide anterior ou próximo
function moveSlide(direction) {
    showSlide(currentIndex + direction);
}

// Navega para um slide específico
function currentSlide(index) {
    showSlide(index - 1);
}

// Inicializa o carrossel
function initCarrossel() {
    // Clona os primeiros slides e adiciona ao final para efeito infinito
    const firstFew = Array.from(slides).slice(0, 3);
    firstFew.forEach(slide => {
        const clone = slide.cloneNode(true);
        inner.appendChild(clone);
    });
    
    // Configura o tamanho do container interno
    const slideWidth = slides[0].offsetWidth + 20; // largura + margem
    inner.style.width = `${(totalSlides + 3) * slideWidth}px`;
    
    showSlide(0);
}

// Inicia o carrossel quando a página carrega
window.onload = initCarrossel;

// Opcional: Navegação automática
let slideInterval = setInterval(() => {
    moveSlide(1);
}, 3000);

// Pausa a navegação automática quando o mouse está sobre o carrossel
document.querySelector('.carrossel').addEventListener('mouseenter', () => {
    clearInterval(slideInterval);
});

// Retoma a navegação automática quando o mouse sai do carrossel
document.querySelector('.carrossel').addEventListener('mouseleave', () => {
    slideInterval = setInterval(() => {
        moveSlide(1);
    }, 3000);
});