var currentButton = null; // Variable to keep track of the button that triggered the popup

function changeText(button) {
    var popup = document.getElementById("popup");
    if (button.innerText === "Join") {
        popup.style.display = "block";
        currentButton = button; // Update currentButton to the button that triggered the popup
    } else {
        button.innerText = "Joined";
    }
}

function closePopup() {
    var popup = document.getElementById("popup");
    popup.style.display = "none";
    if (currentButton !== null) {
        currentButton.innerText = "Joined"; // Change only the specific button to "Joined"
        currentButton = null; // Reset currentButton
    }
}
