let selectBlock = document.getElementById('select-block');

let formCreate = document.getElementById('form-create-article');

selectBlock.onchange = function(){

    if(this.value == 'game'){
        formCreate.action = 'indexAdmin.php?action=create-game';
    }
    else if(this.value == 'flyer'){
        formCreate.action = 'indexAdmin.php?action=create-flyer';
    }
    else{
        formCreate.action = 'indexAdmin.php?action=create';
    }
}
function changeAction(val){
    selectBlock.setAttribute('action', val);
}

// --------------------------------------------------------

// ((val) => {

//     selectBlock.setAttribute("action", val) = this.value;
   
//     selectBlock.addEventListener("change", () =>{
          
//       if (this.value == "game") {  
//         formCreate.action = "indexAdmin.php?action=create-game";
//       } else if (this.value == "flyer") {
//         formCreate.action = "indexAdmin.php?action=create-flyer";
//       } else {
//         formCreate.action = "indexAdmin.php?action=create";
//       }

//       changeAction($this.value);
      
//     });
//   })();






