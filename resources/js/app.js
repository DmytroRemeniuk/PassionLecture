document.addEventListener('DOMContentLoaded', () => {
    const stars = document.querySelectorAll('.star');
    const starsContainer = document.getElementById('stars');
    const userVote = parseInt(starsContainer.getAttribute('data-user-vote'), 10);

    // Highlight stars based on user's previous vote
    highlightStars(userVote);

    // Add hover effects
    stars.forEach((star, index) => {
        star.addEventListener('mouseover', () => {
            highlightStars(index + 1); // Temporarily highlight stars on hover
        });

        star.addEventListener('mouseout', () => {
            highlightStars(userVote); // Restore the user's vote after hover
        });
    });

    // Function to highlight stars
    function highlightStars(vote) {
        stars.forEach((star, index) => {
            if (index < vote) {
                star.classList.add('highlight'); // Highlight the star
            } else {
                star.classList.remove('highlight'); // Remove highlight
            }
        });
    }
});
