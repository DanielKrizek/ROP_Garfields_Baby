document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById("imageModal");
    const modalImg = document.getElementById("modalImage");
    const closeBtn = document.querySelector(".close"); // Use querySelector to select the close button

    document.querySelectorAll(".enlargeable").forEach(img => {
        img.addEventListener("click", function() {
            modal.style.display = "block";
            modalImg.src = this.src;
            panzoom(modalImg, {
                maxZoom: 5,
                minZoom: 1,
                bounds: true,
                boundsPadding: 0.1
            });
        });
    });

    closeBtn.addEventListener("click", function() {
        modal.style.display = "none";
        panzoom(modalImg).dispose(); // Dispose panzoom instance when closing modal
    });

    window.addEventListener("click", function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            panzoom(modalImg).dispose(); // Dispose panzoom instance when closing modal
        }
    });
});
