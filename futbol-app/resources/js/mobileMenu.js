// Function to toggle the visibility of the mobile menu
document.addEventListener("DOMContentLoaded", function () {
    // Get references to the elements
    const mobileMenuButton = document.getElementById("mobile-menu-button");
    const mobileMenu = document.getElementById("mobile-menu");

    // Add an event listener to the mobile menu button
    mobileMenuButton.addEventListener("click", function () {
        // Toggle the visibility of the mobile menu
        mobileMenu.classList.toggle("hidden");
    });
});
