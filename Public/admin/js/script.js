document.addEventListener("DOMContentLoaded", function (event) {
  // <-- add this wrapper
  let links = document.querySelectorAll(".bloc-link");
  if (links) {
    links.forEach(function (link, key) {
      link.addEventListener("click", function () {

        link.classList.toggle("active");

        links.forEach(function (ell, els) {
          if (key !== els) {
            ell.classList.remove("active");
          }
        });
      });
    });
  }
});
