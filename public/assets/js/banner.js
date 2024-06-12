document.addEventListener('DOMContentLoaded', () => {
  bannerSlideShow(models, backgrounds);
});

/*Array of objects that stored information about our models */

const models = [
  {
    id: 1,
    name: 'model-1',
    img: '/assets/images/models/model-1.png',
  },

  {
    id: 2,
    name: 'model-2',
    img: '/assets/images/models/model-2.png',
  },

  {
    id: 3,
    name: 'model-3',
    img: '/assets/images/models/model-3.png',
  },

  {
    id: 4,
    name: 'model-4',
    img: '/assets/images/models/model-4.png',
  },
];

/* Backgrounds colors for implementing slideshow on the banner*/
const backgrounds = [
  '#ffffff linear-gradient(135deg, #484349, #ff0000, #4d86be, #ffffff, #0000ff ',
  '#ffffff linear-gradient(135deg, #787878, #484349, #ff0000, #4d86be, #e74739, #ffffff, #0000ff, #273469)',
  'gray linear-gradient(135deg, #273469, #273469, #4d86be, #ff0000, #484349, #FFFAFF, #000000, #e74739, #ffffff, #0000ff)',
  '#4d86be linear-gradient(135deg, #FFFAFF, #273469, gray, #4d86be, #ff0000, #e74739, #FFFAFF, #e74739)',
  // '#f5f5f5 linear-gradient(135deg, #ffffff, #4d86be, #FFfFAFF, #484349)'
];

/* Handles the banner slideshow, updates background-color, change model images*/
const bannerSlideShow = (models, backgrounds) => {
  const prev = document.querySelector('.banner-prev');
  const next = document.querySelector('.banner-next');
  const img = document.querySelector('.model-pic');
  const banner = document.querySelector('.banner');

  let currentSlideShow = Math.floor(Math.random() * models.length);

  const updateSlideShow = () => {
    const model = models[currentSlideShow];
    img.src = model.img;
    img.alt = model.name;
    banner.style.background =
      backgrounds[Math.floor(Math.random() * backgrounds.length)];
  };

  const nextSlide = () => {
    currentSlideShow = (currentSlideShow + 1) % models.length;
    updateSlideShow();
  };

  const prevSlide = () => {
    currentSlideShow = (currentSlideShow - 1 + models.length) % models.length;
    updateSlideShow();
  };

  updateSlideShow();

  prev.addEventListener('click', prevSlide);
  next.addEventListener('click', nextSlide);

  setInterval(nextSlide, 3000);
};
