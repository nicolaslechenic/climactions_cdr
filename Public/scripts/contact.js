   // ANIMATION SEND BUTTON     

   let button = document.querySelector('.send-contact');
   let checkbox = document.getElementById('autorisation');

   checkbox.addEventListener('click', () => {
   button.classList.toggle('activeBtn');
   
})