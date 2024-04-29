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
