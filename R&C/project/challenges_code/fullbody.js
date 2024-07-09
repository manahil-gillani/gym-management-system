// script.js
document.addEventListener('DOMContentLoaded', function () {
    // Function to generate a random date within a range
    function getRandomDate(start, end) {
        return new Date(start.getTime() + Math.random() * (end.getTime() - start.getTime()));
    }

    // Generate random start and end dates
    const startDate = new Date(); // Today's date
    const endDate = new Date();
    endDate.setDate(startDate.getDate() + Math.floor(Math.random() * 30) + 15); // Random date within 15-45 days from today

    // Format dates as string (e.g., "MMM DD, YYYY")
    const options = { year: 'numeric', month: 'short', day: 'numeric' };
    const formattedStartDate = startDate.toLocaleDateString('en-US', options);
    const formattedEndDate = endDate.toLocaleDateString('en-US', options);

    // Update the HTML elements with the generated dates
    document.getElementById('start-date').textContent = formattedStartDate;
    document.getElementById('end-date').textContent = formattedEndDate;
});


//for video fetching

document.addEventListener('DOMContentLoaded', function () {
    const videos = document.querySelectorAll('.video');
    
    videos.forEach(video => {
        const videoId = video.dataset.videoId;
        const thumbnailUrl = `https://img.youtube.com/vi/${videoId}/maxresdefault.jpg`;
        const iframeUrl = `https://www.youtube.com/embed/${videoId}`;
        
        // Set thumbnail image
        const img = document.createElement('img');
        img.src = thumbnailUrl;
        img.alt = 'Video Thumbnail';
        video.prepend(img);
        
        // Redirect to YouTube when thumbnail is clicked
        img.addEventListener('click', function () {
            window.location.href = iframeUrl;
        });
    });
});

//for join button
document.addEventListener('DOMContentLoaded', function () {
    const joinButton = document.querySelector('.join-button');

    joinButton.addEventListener('click', function () {
        const formData = {
            // You can retrieve user information from input fields
            // For example:
            // name: document.getElementById('name').value,
            // email: document.getElementById('email').value,
        };

        // Send the form data to the PHP script using fetch API
        fetch('join.php', {
            method: 'POST',
            body: JSON.stringify(formData),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            console.log(data); // Log server response
            // You can display a success message or perform other actions here
            alert('Join successful!');
            // Update button text
            joinButton.textContent = 'Joined';
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
            // Handle errors here
        });
    });
});
