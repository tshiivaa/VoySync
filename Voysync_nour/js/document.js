document.addEventListener("DOMContentLoaded", function() {
  // Get the button elements
  const addDocumentBtn = document.getElementById("addDocumentBtn");
  const modDocumentBtns = document.querySelectorAll(".modifier-btn");

  // Add click event listener to the "Ajouter" button
  addDocumentBtn.addEventListener("click", function() {
    // Redirect to AddDoc.php with action=add
    window.location.href = "AddDoc.php?action=add";
  });

  // Add click event listener to each "Modifier" button
  modDocumentBtns.forEach(btn => {
    btn.addEventListener("click", function() {
      // Get the details of the document item
      const expenseItem = this.closest('.expense-item');
      const numSerie = expenseItem.querySelector('.NumSerie').textContent;
      const lieuSto = expenseItem.querySelector('.lieuSto').textContent;
      const dateExp = expenseItem.querySelector('.name p').textContent;
      const type = expenseItem.querySelector('.name h4').textContent;

      // Redirect to AddDoc.php with action=modify and document details
      window.location.href = `AddDoc.php?action=modify&NumSerie=${numSerie}&LieuSto=${lieuSto}&DateExp=${dateExp}&Type=${type}`;
    });
  });
});

function bannerSwitcher() {
  next = $('.sec-1-input').filter(':checked').next('.sec-1-input');
  if (next.length) next.prop('checked', true);
  else $('.sec-1-input').first().prop('checked', true);
}

var bannerTimer = setInterval(bannerSwitcher, 5000);

$('nav .controls label').click(function () {
  clearInterval(bannerTimer);
  bannerTimer = setInterval(bannerSwitcher, 5000)
});

function viewPhoto(encodedImage) {
var modal = document.getElementById('modal-overlay');
var img = document.getElementById('modal-image');
img.src = 'data:image/jpeg;base64,' + encodedImage;
modal.style.display = 'block';
}

function closeModal() {
var modal = document.getElementById('modal-overlay');
modal.style.display = 'none';
}
function goBack() {
window.history.back();
}
function confirmDelete(event) {
// Prompt the user for confirmation
if (!confirm("Voulez-vous vraiment supprimer ce document ?")) {
  // If the user cancels, prevent the default link behavior
  event.preventDefault(); // Prevent the default link behavior
  return false; // Cancel the action
}
// If the user confirms, continue with the default link behavior
return true; // Proceed with the action
}
