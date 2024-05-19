// Form Validation
$(document).ready(function() {
    function shake(element) {
        element.addClass('shake');
        setTimeout(() => element.removeClass('shake'), 300);
    }

    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        let email = $('#loginEmail').val().trim();
        let password = $('#loginPassword').val().trim();

        if (email === "" || password === "") {
            shake($('.login .form-content'));
        } else {
            // Proceed with login
        }
    });

    $('#signupForm').on('submit', function(e) {
        e.preventDefault();
        let email = $('#signupEmail').val().trim();
        let password = $('#signupPassword').val().trim();
        let confirmPassword = $('#confirmPassword').val().trim();

        if (email === "" || password === "" || confirmPassword === "" || password !== confirmPassword) {
            shake($('.signup .form-content'));
        } else {
            // proceed with signup code
        }
    });
});

// 
$(document).ready(function() {
    const forms = $(".forms"),
          pwShowHide = $(".eye-icon"),
          links = $(".link");

    pwShowHide.each(function() {
        $(this).on("click", function() {
            let pwFields = $(this).closest('.input-field').siblings('.input-field').find('.password');
            pwFields.add($(this).siblings('.password')).each(function() {
                if (this.type === "password") {
                    this.type = "text";
                    $(this).siblings('.eye-icon').removeClass("bx-hide").addClass("bx-show");
                } else {
                    this.type = "password";
                    $(this).siblings('.eye-icon').removeClass("bx-show").addClass("bx-hide");
                }
            });
        });
    });

    links.each(function() {
        $(this).on("click", function(e) {
            e.preventDefault();
            forms.toggleClass("show-signup");
        });
    });
});






// const forms = document.querySelector(".forms"),
// pwShowHide = document.querySelectorAll(".eye-icon"),
// links = document.querySelectorAll(".link");

// pwShowHide.forEach(eyeIcon => {
    // eyeIcon.addEventListener("click", () => {
        // let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");

        // pwFields.forEach(password => {
        //     if(password.type === "password"){
        //         password.type = "text";
        //         eyeIcon.classList.replace("bx-hide", "bx-show");
        //         return;
        //     }
        //     password.type = "password";
        //     eyeIcon.classList.replace("bx-show", "bx-hide");
        // })

    // })
// })      

// links.forEach(link => {
    // link.addEventListener("click", e => {
        // e.preventDefault(); //preventing form submit
        // forms.classList.toggle("show-signup");
    // })
// })