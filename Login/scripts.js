


var cardItems = [
  "Such a cool course is web technology",
  "Data should be fetch fron database",
  "Everything should be responsive?",
  "add a data to array to see the changes",
  "1",
  "2",
  "3"
];

function loadItems() {
  document.getElementById("items").innerHTML = cardItems.map(
    a =>
      '<div class="col-4 col-s-4"><img src="https://picsum.photos/200/120/?random" width="100%" height="auto"/>' +
      a +
      "</div>"
  );

  document.getElementById("hint").innerHTML = items[1].title;
}

function showSubMenu(option) {
  if (option === "beauty") {
    document.getElementById("sub-items").innerHTML =
      '<div class="subnav"> <ul> <li><a href="#" >Hair Cut</a></li> <li><a href="#">Hair Color</a></li><li><a href="#">Barber</a></li><li><a href="#">Nail</a></li><li><a href="#">SPA</a></li><li><a href="#">Makeup</a></li></ul> </div >';
  }
  if (option === "sport") {
    document.getElementById("sub-items").innerHTML =
      '<div class="subnav"> <ul> <li><a href="#" >Gym</a></li> <li><a href="#">Sport</a></li><li><a href="#">Dental </a></li><li><a href="#">Vison</a></li><li><a href="#">Weight Loss</a></li></ul> </div >';
  }
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}




function changeTab(evt,tabname){
  var i, tabcontent,tablinks;
  tabcontent=document.getElementsByClassName("tabcontent");
  for(i=0;i<tabcontent.length;i++){
    tabcontent[i].style.display="none";
  }

  
  tablinks=document.getElementsByClassName("tablinks");
  for(i=0;i<tablinks.length;i++)
  {
    tablinks[i].className=tablinks[i].className.replace("active","");
  }
  document.getElementById(tabname).style.display="block";
  evt.currentSlide.className+="active"
}