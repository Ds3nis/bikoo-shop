var btnEdit = document.querySelector(".form__button_edit");
var form = document.querySelector(".form-container");
var inputs = document.querySelectorAll(".input");

btnEdit.addEventListener("click", function () {
    inputs.forEach(input => {
        input.disabled = false;
    });
    form.classList.toggle("edit--active");
});