// Bubbles Animation JavaScript
var canvasDiv = document.getElementById('boids-canvas');
var options = {
    density: 'medium',
    speed: 'medium',
    interactive: true,
    mixedSizes: true,
    boidColours: ["#34495e", "#e74c3c", '#2ecc71', '#9b59b6', '#f1c40f', '#1abc9c', '#fff']
};
var boidsCanvas = new BoidsCanvas(canvasDiv, options);
// Ensure the canvas has no background color and adjust the z-index
var canvasWrapper = canvasDiv.querySelector('div');
if (canvasWrapper) {
    canvasWrapper.style.background = 'none';
    canvasWrapper.style.zIndex = '0';
}


// Signin Form Validation JavaScript
function signinValidate() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('pwd').value;
    
    // Regular expression for email validation
    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if (!email.match(emailPattern)) {
        showToast("Please Enter Your Valid Email");
        return false;
    }
    if (password === "") {
        showToast("Please Enter Your Valid Password");
        return false;
    }

    showToast("Login Success: It Forwarding My Portfolio!", true);
    // Function to reload the page after 4 seconds
    setTimeout(function() {
        window.location.href = "https://saran.selfmade.one";
    }, 4000);
    return true;
}

// Signup Form Validation JavaScript
function signupValidate() {
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('pwd').value;
    const confirmPassword = document.getElementById('confirm_pwd').value;
    
    // Regular expression for email validation
    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    
    // Regular expression for password validation
    const passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    if (username === "") {
        showToast("Username is required");
        return false;
    }
    if (!email.match(emailPattern)) {
        showToast("Enter a valid email");
        return false;
    }
    if (!password.match(passwordPattern)) {
        showToast("Password must be at least 8 characters long and include at least one number, one uppercase letter, and one lowercase letter");
        return false;
    }
    if (password !== confirmPassword) {
        showToast("Passwords do not match");
        return false;
    }
    showToast("Form submitted successfully", true);
    // Function to reload the page after 4 seconds
    setTimeout(function() {
        window.location.href = "./index.html";
    }, 3000);
    return true;
}

function showToast(message, success = false) {
    const toast = document.getElementById("toast");
    toast.innerHTML = `<span id="desc">${message}</span>`;
    toast.style.backgroundColor = success ? "#4CAF50" : "#f44336";
    toast.className = "toast show";
    setTimeout(() => { toast.className = toast.className.replace("show", ""); }, 3000);
}
