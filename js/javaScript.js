// js/javaScript.js
window.addEventListener('scroll', function() {
    const marquee = document.getElementById('marquee');
    const scrollPosition = window.scrollY;

    // Điều chỉnh vị trí của marquee theo cuộn chuột
    marquee.style.transform = `translateY(${scrollPosition}px)`;
});

function toggleMenu() {
    const navContainer = document.querySelector('.nav-container');
    navContainer.classList.toggle('active'); // Bật tắt menu
}

