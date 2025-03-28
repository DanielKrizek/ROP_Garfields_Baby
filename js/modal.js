document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById("imageModal");
    const modalImg = document.getElementById("modalImage");
    const closeBtn = modal.querySelector(".close");

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
        panzoom(modalImg).dispose();
    });

    window.addEventListener("click", function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
            panzoom(modalImg).dispose();
        }
    });

    const infoModal = document.getElementById("infoModal");
    const infoLink = document.getElementById("colorCodeInfo");
    const closeInfoModal = infoModal.querySelector(".close");

    infoLink.addEventListener("click", function() {
        infoModal.style.display = "block";
    });

    closeInfoModal.addEventListener("click", function() {
        infoModal.style.display = "none";
    });

    window.addEventListener("click", function(event) {
        if (event.target === infoModal) {
            infoModal.style.display = "none";
        }
    });

    document.querySelectorAll(".color-code").forEach(colorCode => {
        colorCode.addEventListener("click", function() {
            const color = this.dataset.color;
            const searchInput = document.getElementById("color_code");
            const infoModal = document.getElementById("infoModal");

            searchInput.value = color;
            infoModal.style.display = "none";
        });
    });
});
