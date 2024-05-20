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

        if (email === "" && password === "") {
            shake($('.contain.forms'));
        } else {
            // Proceed with login
            if (email === "") {
                shake($('#loginEmail'));
            } else {
                // remove the error message
            }
            if (password === "") {
                shake($('#loginEmail'));
            } else {
                // remove the error message
            }
        }
    });

    $('#signupForm').on('submit', function(e) {
        e.preventDefault();
        let email = $('#signupEmail').val().trim();
        let password = $('#signupPassword').val().trim();
        let confirmPassword = $('#confirmPassword').val().trim();

        if (email === "" || password === "" || confirmPassword === "" || password !== confirmPassword) {
            shake($('.contain.forms'));
        } else {
            // proceed with signup code
        }
    });
});

// This is the form change and password show JQuery
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