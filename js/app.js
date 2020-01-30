const navSlide = () => {
  const burger = document.querySelector('.burger');
  const nav = document.querySelector('.nav-links');
  //const navLinks = document.querySelectorAll('.nav-links a');

  //navLinks.forEach((link, index) => {
  //  console.log(index);
  //  link.addEventListener('click', (e) => {
  //    e.preventDefault();
  //    burger.classList.toggle('toggle');
  //    nav.classList.toggle('nav-active');
  //    navLinks.forEach(setStyleLink)
  //  })
  //});

  burger.addEventListener('click', () => {
    // Toggle Nav
    nav.classList.toggle('nav-active');
    // animate navlinks
    //navLinks.forEach(setStyleLink);
    // burger animation
    burger.classList.toggle('toggle');
  });
}

function setStyleLink(el, index) {
  if (el.style.animation) {
    el.style.animation = ''
  } else {
    el.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 +0.5}s`;
  }
}
navSlide();

//https://stackoverflow.com/questions/55165303/how-to-hide-dropdown-menu-when-clicking-on-menu-link-with-vanilla-js
