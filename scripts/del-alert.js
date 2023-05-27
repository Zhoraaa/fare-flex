window.addEventListener('DOMContentLoaded', function() {
    const deleter = document.querySelector("#alert-deleter");
    const alert = document.getElementById("alert");

    deleter.addEventListener('click', () => {
        alert.classList.add("glass");
        setTimeout(() => {
        }, 200);
    });
});