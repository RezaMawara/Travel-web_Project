// clicked  menu for the bar

const bars = document.querySelector(".bar");
const menu = document.querySelector("#click-menu");

bars.addEventListener("click", () => {
  if (menu.style.display === "flex") {
    menu.style.display = "none";
  } else {
    menu.style.display = "flex";
  }
});



// scroll button in 30

const scrollTopBtn = document.querySelector('#scroll-top-btn');

window.addEventListener('scroll', () => {
  if (window.pageYOffset > 280) {
    scrollTopBtn.style.display = 'block'; // Show the button when scrolled down by 30 pixels
  } else {
    scrollTopBtn.style.display = 'none'; // Hide the button otherwise
  }
});

scrollTopBtn.addEventListener('click', () => {
  window.scrollTo({
    top: 0,
    behavior: 'smooth' // Add smooth scrolling animation
  });
});

