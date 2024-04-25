const ExpandingFlexCard = document.querySelectorAll('.expanding-flex-cards')

  ExpandingFlexCard.forEach(efcEl => {
    efcEl.querySelectorAll('.expanding-flex-cards-item:not(active)').forEach(item => {
      item.addEventListener('click', function (e) {
        e.preventDefault()
        efcEl.querySelector('.expanding-flex-cards-item.active').classList.remove('active')
        this.classList.add('active')
      })
    })
  });

  const expandingFlexCards = document.querySelectorAll('.expanding-flex-cards-item');
  let previousCard = null; // To keep track of the previously clicked card

  expandingFlexCards.forEach(expandingFlexCard => {
    expandingFlexCard.addEventListener('click', function () {
      // Check if this card was previously clicked
      if (this === previousCard) {
        const page = this.getAttribute('data-page');
        if (page) {
          // Trigger animation before redirecting
          this.classList.add('redirect-animation');
          // Redirect to the specified page after the animation
          setTimeout(() => {
            window.location.href = page;
          }, 800); // Adjust delay as needed to match the animation duration
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

      // Update the previous card
      previousCard = this;
    });
  });
