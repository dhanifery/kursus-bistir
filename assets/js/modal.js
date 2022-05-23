//  get the modal element
var modal = document.getElementById('simpleModal');
// get opem modal button
var modalBtn = document.getElementById('modalBtn');
//  get close modal button
var btnClose = document.getElementsByClassName('btnClose')[0];

// listen for open click
modalBtn.addEventListener('click', openModal);
// listen for close click
btnClose.addEventListener('click', closeModal);
//  listen for outside Click
window.addEventListener('click', outsideClick);

// function to open modal
function openModal(){
    modal.style.display = 'block';
    document.body.classList.add("stopScrolling");
}
// function to open modal
function closeModal(){
    modal.style.display = 'none';
}
// function to open modal
function outsideClick(e){
     if (e.target == modal ) {
          modal.style.display = 'none';
     }
}
