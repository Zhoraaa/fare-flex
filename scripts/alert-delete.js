window.addEventListener('DOMContentLoaded', function() {
    const alert = this.document.getElementById("alert")
    const deleter = this.document.getElementById("deleter");

    function delAlert() {
        alert.classList.add('go-out');
        setTimeout(() => {
            alert.remove();            
        }, 200);
    }


    deleter.addEventListener('click', delAlert);
});