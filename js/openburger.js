document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.querySelector('.hamburger');
  const links = document.querySelector('.links');

  hamburger.addEventListener('click', function () {
      links.classList.toggle('active'); // Alterna la clase 'active'
  });
});
