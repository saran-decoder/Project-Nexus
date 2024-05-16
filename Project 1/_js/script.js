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

// Make A Form Validation JavaScript
function validateForm() {
    var x = document.forms["myForm"]["fname"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}
