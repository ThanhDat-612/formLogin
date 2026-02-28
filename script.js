document.addEventListener("DOMContentLoaded", function() {

    const dog = document.getElementById("dog");
    const bg = document.querySelector(".bg");

    let targetLeft = 120;
    let currentLeft = 120;

    let bgOffset = 0;
    let bgSpeed = 0;

    document.addEventListener("mousemove", function(e) {

        const screenWidth = window.innerWidth;
        const mouseX = e.clientX;

        if (mouseX < screenWidth / 2) {
            targetLeft = 20;
            dog.style.transform = "scaleX(1)";
            bgSpeed = 2;   // background chạy phải
        } else {
            targetLeft = 220;
            dog.style.transform = "scaleX(-1)";
            bgSpeed = -2;  // background chạy trái
        }
    });

    function animate() {

        // Di chuyển chó (mượt)
        currentLeft += (targetLeft - currentLeft) * 0.05;
        dog.style.left = currentLeft + "px";

        // Di chuyển background
        bgOffset += bgSpeed;
        bg.style.backgroundPositionX = bgOffset + "px";

        requestAnimationFrame(animate);
    }

    animate();
});