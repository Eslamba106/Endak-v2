const showpassword = document.querySelector("#showPassword");
const password = document.querySelector("#password");

showpassword.addEventListener("click", function () {
    // toggle the type attribute
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);

    // toggle the icon
    this.classList.toggle("fe-eye-off");
});
