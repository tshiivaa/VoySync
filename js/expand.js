window.addEventListener('DOMContentLoaded', () => {
  const expandingFlexCards = document.querySelectorAll('.expanding-flex-cards-item');
  let previousCard = null; // To keep track of the previously clicked card

  // Simulate click on the first card to trigger its functionality
  expandingFlexCards[0].click();

  // Show title of the active card
  const activeCardTitle = expandingFlexCards[0].querySelector('.expanding-flex-cards-title');
  activeCardTitle.style.display = 'block';

  expandingFlexCards.forEach(expandingFlexCard => {
      expandingFlexCard.addEventListener('click', function() {
          // Check if this card was previously clicked
          if (this === previousCard) {
              const page = this.getAttribute('data-page');
              if (page) {
                  // Fade out the image gradually
                  const image = this.querySelector('img');
                  image.style.transition = 'opacity 0.5s ease';
                  image.style.opacity = '0';

                  // Redirect to the specified page after a delay
                  setTimeout(() => {
                      window.location.href = page;
                  }, 500); // Adjust delay as needed to match the transition duration
                  return;
              }
          }

          // Show text of the clicked card
          const title = this.querySelector('.expanding-flex-cards-title');
          title.style.display = 'block';

          // Hide text of other cards
          expandingFlexCards.forEach(card => {
              if (card !== this) {
                  card.querySelector('.expanding-flex-cards-title').style.display = 'none';
              }
          });

          // Add active class to the clicked card
          this.classList.add('active');

          // Remove active class from other cards
          expandingFlexCards.forEach(card => {
              if (card !== this) {
                  card.classList.remove('active');
              }
          });

          // Update the previous card
          previousCard = this;
      });
  });
});
