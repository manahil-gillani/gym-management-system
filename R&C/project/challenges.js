document.addEventListener('DOMContentLoaded', function () {
    const menuIcon = document.querySelector('.menu-icon');
    const navList = document.querySelector('.nav-list');

    // Toggle navigation menu on clicking the menu icon
    menuIcon.addEventListener('click', function () {
        navList.classList.toggle('active');
    });

    // Handle form submission for searching challenges
    const searchForm = document.querySelector('.search-box');

    searchForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Get the search query entered by the user
        const searchQuery = document.querySelector('.search-box input').value.trim();

        // You can perform additional actions here, such as sending the search query to the server via AJAX
        // For demonstration purposes, let's just log the search query to the console
        console.log('Search Query:', searchQuery);
    });
});
