const alert = document.getElementById("alert");
const closeBtn = document.querySelector(".closeBtn");

 // listen for close click
 closeBtn.addEventListener('click',closeAlert);

 function closeAlert(){
     alert.style.display = 'none';
 }