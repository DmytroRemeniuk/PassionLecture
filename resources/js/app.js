// Get the userVote from the data attribute in the HTML
document.addEventListener('DOMContentLoaded', () => {
    const stars = document.querySelectorAll('.star');
    const starsContainer = document.getElementById('stars');
    const userVote = parseInt(starsContainer.getAttribute('data-user-vote'), 10);

    // Highlight the stars based on the user's vote on page load
    for (let i = 0; i < userVote; i++) {
        stars[i].classList.add('highlight');
    }

    stars.forEach((star, index) => {
        star.addEventListener('mouseover', () => {
            highlightStars(index);
        });

        star.addEventListener('mouseout', () => {
            resetStars();
        });
    });

    function highlightStars(index) {
        for (let i = 0; i <= index; i++) {
            stars[i].classList.add('highlight');
        }
    }

    function resetStars() {
        stars.forEach(star => star.classList.remove('highlight'));
    }
});
