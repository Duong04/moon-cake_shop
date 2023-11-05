document.addEventListener("DOMContentLoaded", function() {
    const decreaseBtn = document.querySelector(".decrease");
    const increaseBtn = document.querySelector(".increase");
    const countInput = document.querySelector(".count");

    decreaseBtn.addEventListener("click", function() {
        let count = parseInt(countInput.value);
        if (count > 1) {
            count--;
            countInput.value = count;
        }
    });

    increaseBtn.addEventListener("click", function() {
        let count = parseInt(countInput.value);
        count++;
        countInput.value = count;
    });
});
