var next = document.getElementById("next");
var prev = document.getElementById("prev");
var quantityInputs = document.getElementById("qty");

function clickNext() {
  var currentQuantity = parseInt(quantityInputs.value);
  quantityInputs.value = currentQuantity + 1;
}

function clickPrev() {
  if (quantityInputs.value > 0) {
    var currentQuantity = parseInt(quantityInputs.value);
    quantityInputs.value = currentQuantity - 1;
  }
}

next.addEventListener("click", clickNext);
prev.addEventListener("click", clickPrev);

/* Carousel */

var slideIndex = 0;
var slides = document.querySelectorAll(".carousel-slide img");
var totalSlides = slides.length;
var slideWidth = slides[0].clientWidth;
var interval = 4000; // 4 seconds
var slideInterval; // Variable to hold the interval
var isMouseOverCarousel = false; // Flag to track mouse hover state

function showSlides() {
  slideIndex++;
  if (slideIndex >= totalSlides) {
    slideIndex = 0;
  }
  moveSlide();
}

function moveSlide() {
  var moveAmount = -slideIndex * slideWidth;
  document.querySelector(".carousel-slide").style.transform =
    "translateX(" + moveAmount + "px)";
}

// Function to start auto slide
function startAutoSlide() {
  slideInterval = setInterval(function () {
    if (!isMouseOverCarousel) {
      showSlides();
    }
  }, interval);
}

// Stop auto slide when mouse enters the carousel
document
  .querySelector(".carousel-container")
  .addEventListener("mouseenter", function () {
    isMouseOverCarousel = true;
  });

// Restart auto slide when mouse leaves the carousel
document
  .querySelector(".carousel-container")
  .addEventListener("mouseleave", function () {
    isMouseOverCarousel = false;
  });

startAutoSlide();
