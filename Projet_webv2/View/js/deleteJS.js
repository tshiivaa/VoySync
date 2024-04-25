// Get the modal
var modal = document.getElementById("myModal");

// Get the delete button and cancel button
var deleteBtn = document.querySelector("button[name='delete']");
var cancelBtn = document.getElementById("cancelDelete");

// Get the <span> element that closes the modal
var closeBtn = document.getElementsByClassName("close")[0];

// When the user clicks on the delete button, open the modal
deleteBtn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on cancel, close the modal
cancelBtn.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
closeBtn.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
