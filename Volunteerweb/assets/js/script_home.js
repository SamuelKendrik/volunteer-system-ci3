const BASE_URL =
    window.BASE_URL || "";

const IMAGE_URL =
    window.IMAGE_URL || "";



/* ================= REVIEW SLIDER ================= */

let currentIndex = 0;

function moveReviews(direction)
{
    const track =
        document.getElementById("reviewsTrack");

    const cards =
        document.querySelectorAll(".review-card");

    if (cards.length === 0) {
        return;
    }

    const cardWidth =
        cards[0].offsetWidth + 20;

    const visibleCards = 3;

    const maxIndex =
        cards.length - visibleCards;

    currentIndex += direction;

    if (currentIndex < 0) {
        currentIndex = 0;
    }

    if (currentIndex > maxIndex) {
        currentIndex = maxIndex;
    }

    track.style.transform =
        `translateX(-${currentIndex * cardWidth}px)`;
}



/* ================= HERO SLIDER ================= */

const hero =
    document.querySelector(".hero-section");

const images = [
    IMAGE_URL + "hero1.jpg",
    IMAGE_URL + "hero2.jpg",
    IMAGE_URL + "hero3.jpg"
];

let heroIndex = 0;

function changeHeroBackground()
{
    if (!hero) {
        return;
    }

    hero.style.backgroundImage =
        `url('${images[heroIndex]}')`;

    heroIndex++;

    if (heroIndex >= images.length) {
        heroIndex = 0;
    }
}

changeHeroBackground();

setInterval(changeHeroBackground, 5000);