let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
let header = document.querySelector('.header-3');

menu.addEventListener('click',()=>{
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
});

window.onscroll = () =>{
  menu.classList.remove('fa-times');
  navbar.classList.remove('active');
  if(window.screenY > 250){
    header.classList.add('active')
  }else{
    header.classList.remove('active')
  }
}

var swiper = new swiper(".home-slider",{
pagination:{
  el:"swiper-pagination",
  clickable: true,
},
  autoplay: {
  delay: 3000
,
disableOnInteraction: false,
}
});