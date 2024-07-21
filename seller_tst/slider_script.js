const productSlider = document.querySelector('.product-slider');
const productTrack = document.querySelector('.product-track');
const scrollLeftBtn = document.querySelector('.product-scroll-left');
const scrollRightBtn = document.querySelector('.product-scroll-right');

scrollLeftBtn.addEventListener('click', () => {
  productSlider.scrollBy({ left: -300, behavior: 'smooth' });
});

scrollRightBtn.addEventListener('click', () => {
  productSlider.scrollBy({ left: 300, behavior: 'smooth' });
});

