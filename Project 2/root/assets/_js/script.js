// Form Validation
$(document).ready(function() {
    // Toastr options
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    // Function to shake the element
    function shake(element) {
        element.addClass('shake');
        setTimeout(() => element.removeClass('shake'), 300);
    }

    // Function to display toast error message
    function displayToastMessage(message) {
        toastr.error(message);
    }

    // Function to validate a field with regex and custom message
    function validateField(field, regex, message) {
        if (field.val().trim() === "" || (regex && !regex.test(field.val().trim()))) {
            shake(field);
            displayToastMessage(message);
            field.addClass('error-message');
            return false;
        } else {
            field.removeClass('error-message');
            return true;
        }
    }

    // Function to handle form submission
    function handleFormSubmission(form, fields) {
        form.on('submit', function(e) {
            e.preventDefault();

            let allFieldsEmpty = fields.every(field => field.element.val().trim() === "");

            if (allFieldsEmpty) {
                shake($('#form-contain'));
                fields.forEach(field => displayToastMessage('This field is required'));
            } else {
                fields.forEach(field => validateField(field.element, field.regex, field.message));
            }
        });
    }

    // Validation regex patterns
    const emailRegex = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    const passwordRegex = /^(?=.*\d)(?=.*[a-zA-Z])(?=.*[\W_]).{8,}$/;
    const phoneRegex = /^\d+$/;

    // Handle login form submission
    handleFormSubmission($('#loginForm'), [
        { element: $('#loginEmail'), regex: emailRegex, message: 'Enter a valid email address' },
        { element: $('#loginPassword'), regex: passwordRegex, message: 'Password must be at least 8 characters long and include a number and a special character' }
    ]);

    // Handle signup form submission
    handleFormSubmission($('#signupForm'), [
        { element: $('#signupName'), message: 'This field is required' },
        { element: $('#signupEmail'), regex: emailRegex, message: 'Enter a valid email address' },
        { element: $('#signupPhone'), regex: phoneRegex, message: 'Phone number must contain only numbers' },
        { element: $('#signupPassword'), regex: passwordRegex, message: 'Password must be at least 8 characters long and include a number and a special character' }
    ]);
});






// This is the form change and password show JQuery
$(document).ready(function() {
    
    const pwShowHide = $(".eye-icon");

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
});