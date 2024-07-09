document.addEventListener('DOMContentLoaded', function () {
    // JavaScript for toggle menu and smooth scrolling
    const menuIcon = document.querySelector('.menu-icon');
    const navList = document.querySelector('.nav-list');

    // Toggle navigation menu on clicking the menu icon
    menuIcon.addEventListener('click', function () {
        navList.classList.toggle('active');
    });

    // Smooth scrolling for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(anchorLink => {
        anchorLink.addEventListener('click', function (e) {
            e.preventDefault();

            const targetId = this.getAttribute('href').slice(1);
            const targetElement = document.getElementById(targetId);
            const offsetTop = targetElement.offsetTop;

            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });
        });
    });

    // JavaScript for search functionality
    const searchForm = document.querySelector('.search-box');

    searchForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Get the search query entered by the user
        const searchQuery = document.querySelector('.search-box input').value.trim();

        // Send the search query to the server for processing via AJAX
        fetch('search.php', {
            method: 'POST', // Send the data via POST method
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'query=' + encodeURIComponent(searchQuery) // Encode the search query for safe transmission
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response from the server
            // You can update the UI to display the search results
            console.log(data); // For example, log the data to the console
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
