document.addEventListener("DOMContentLoaded", function () {
    fetch("navbar.php")
      .then(response => response.text())
      .then(data => {
        document.getElementById("navbar").innerHTML = data;
      })
      .catch(error => console.error("Chyba při načítání navigace:", error));
});