// l'input de la barre de recherche
const searchInput = document.getElementById("search");
console.log(searchInput);
// l'écouteur d'événement keyup
searchInput.addEventListener("keyup", (e) => {
  // accéder à l'entrée de l'utilisateur
  let search = e.target.value.toLowerCase().replace(/[éèê]/g,"e");
  
  console.log(search);
  // filter les caractères de la recherche
  let res = document.querySelectorAll(".table-results");
  // console.log(res);
  for (i = 0; i < res.length; i++) {
    if (res[i].innerHTML.toLowerCase().includes(search)) {
        res[i].style.display = "block";
    } else {
        res[i].style.display = "none";
    }
  }
});