document.addEventListener(
    "click",
    function(event) {
        var target = event.target;
        var replyForm;
        if (target.matches("[data-bs-toggle='reply-form']")) {
            replyForm = document.getElementById(target.getAttribute("data-bs-target"));
            replyForm.classList.toggle("d-none");
        }
    },
    false
);