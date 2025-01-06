import './bootstrap';
const stars = document.querySelectorAll('.star');

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
