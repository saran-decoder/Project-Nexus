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


// Signup Form Validation JavaScript
function validateForm() {
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
    return true;
}

function showToast(message, success = false) {
    const toast = document.getElementById("toast");
    toast.innerHTML = `<span id="desc">${message}</span>`;
    toast.style.backgroundColor = success ? "#4CAF50" : "#f44336";
    toast.className = "toast show";
    setTimeout(() => { toast.className = toast.className.replace("show", ""); }, 30000000);
}
