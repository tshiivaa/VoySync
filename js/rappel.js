const sortableList = document.querySelector(".sortable-list");
const items = sortableList.querySelectorAll(".item");

items.forEach(item => {
    item.addEventListener("dragstart", () => {
        // Adding dragging class to item after a delay
        setTimeout(() => item.classList.add("dragging"), 0);
    });
    // Removing dragging class from item on dragend event
    item.addEventListener("dragend", () => item.classList.remove("dragging"));
});

const initSortableList = (e) => {
    e.preventDefault();
    const draggingItem = document.querySelector(".dragging");
    // Getting all items except currently dragging and making array of them
    let siblings = [...sortableList.querySelectorAll(".item:not(.dragging)")];

    // Finding the sibling after which the dragging item should be placed
    let nextSibling = siblings.find(sibling => {
        return e.clientY <= sibling.offsetTop + sibling.offsetHeight / 2;
    });

    // Inserting the dragging item before the found sibling
    sortableList.insertBefore(draggingItem, nextSibling);
}

sortableList.addEventListener("dragover", initSortableList);
sortableList.addEventListener("dragenter", e => e.preventDefault());

document.addEventListener("DOMContentLoaded", function() {

    const modDocumentBtns = document.querySelectorAll(".modifierR-btn");
    // Add click event listener to each "Modifier" button
    modDocumentBtns.forEach(btn => {
      btn.addEventListener("click", function() {

        window.location.href = `Document.php`;
      });
    });
  });
   // JavaScript to handle alert functionality
   $(document).ready(function() {
    // Show alert initially if there's a document
    if ($('.alert').length > 0) {
        $('.alert').addClass("show");
        $('.alert').removeClass("hide");
        $('.alert').addClass("showAlert");
        setTimeout(function() {
            $('.alert').removeClass("show");
            $('.alert').addClass("hide");
        }, 50000);
    }

    // Click event for closing the alert
    $('.close-btn').click(function() {
        $('.alert').removeClass("show");
        $('.alert').addClass("hide");
    });
});