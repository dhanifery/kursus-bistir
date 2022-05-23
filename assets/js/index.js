const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");

const zoom_icons =  document.querySelectorAll(".zoom-icon");
const modal_overlay = document.querySelector(".modal-overlay");
const images = document.querySelectorAll(".images img");


// show sidebar
menuBtn.addEventListener('click', () => {
     sideMenu.style.display = ' block';
})
// close sidebar
closeBtn.addEventListener('click', () => {
     sideMenu.style.display = ' none';
})

// change theme
let firstTheme = localStorage.getItem("dark");

changeTheme(+firstTheme);


function changeTheme(isDark) {
     if (isDark) {
             document.body.classList.add("dark");
             themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
             themeToggler.querySelector('span:nth-child(1)').classList.remove('active');
             localStorage.setItem("dark", 1);
     }
     else{
             document.body.classList.remove("dark");
             themeToggler.querySelector('span:nth-child(2)').classList.remove('active');
             themeToggler.querySelector('span:nth-child(1)').classList.add('active');
             localStorage.setItem("dark", 0);
     }
}

themeToggler.addEventListener('click', () => {
     changeTheme(!document.body.classList.contains("dark"));
});

// class active
$(document).on('click','a',function(){
    $(this).addClass('active').siblings().removeClass('active')
});


// profile active
$(document).ready(function(){
     $(".icon_wrap").click(function(){
       $(this).parent().toggleClass("active");    
     });
   });


//    modal


let currentIndex = 0;

zoom_icons.forEach((icn, i) => icn.addEventListener("click",() => {
        prt_section.classList.add("open");
        document.body.classList.add("stopScrolling");
        currentIndex = i;
        changeImage(currentIndex);
}));

modal_overlay.addEventListener("click", () => {
        prt_section.classList.remove("open")
        document.body.classList.remove("stopScrolling");
});

function changeImage(index) {
        images.forEach(img => img.classList.remove("showImage"));
        images[index].classList.add("showImage");
}