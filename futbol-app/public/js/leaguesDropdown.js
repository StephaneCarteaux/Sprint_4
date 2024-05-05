// Function to close the mobile menu if the user clicks outside of it
document.addEventListener("DOMContentLoaded", function () {
    // Get references to the elements
    const activeLeagueButton = document.getElementById("activeLeagueButton");
    const activeLeagueButtonIcon = document.getElementById("activeLeagueButtonIcon");
    const activeLeagueMenu = document.getElementById("activeLeagueMenu");

    // Add an event listener to the active league menu button
    activeLeagueButton.addEventListener("click", function () {
        // Toggle the visibility of the active league menu
        activeLeagueMenu.classList.toggle("hidden");
    });

    // Event listener to close the active league menu if the user clicks outside of it
    document.addEventListener("click", function (event) {
        const isClickInsideMenu = activeLeagueMenu.contains(event.target);
        const isClickOnButton = (event.target === activeLeagueButton);
        const isClickOnButtonIcon = (event.target === activeLeagueButtonIcon);

        if (!isClickInsideMenu && !isClickOnButton && !isClickOnButtonIcon) {
            activeLeagueMenu.classList.add("hidden");
        }
    });
});
