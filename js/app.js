
function hideAlert() {
  const alertBox = document.getElementById("alertbox");
  alertBox.style.display = "none"; // Hide the alert box
}
delayToShowInMilliseconds = 5000;
setTimeout(hideAlert, delayToShowInMilliseconds);