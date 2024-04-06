const body = document.querySelector("body");
const darkLight = document.querySelector("#darkLight");
const sidebar = document.querySelector(".sidebar");
const submenuItems = document.querySelectorAll(".submenu_item");
const sidebarOpen = document.querySelector("#sidebarOpen");
const sidebarClose = document.querySelector(".collapse_sidebar");
const sidebarExpand = document.querySelector(".expand_sidebar");
const mainBody = document.querySelector('.main_body'); // Add this line to select the main body

sidebarOpen.addEventListener("click", () => sidebar.classList.toggle("close"));

sidebarClose.addEventListener("click", () => {
  sidebar.classList.add("close", "hoverable");
  mainBody.style.marginLeft = '80px'; // Adjust main body margin when sidebar collapses
});

sidebarExpand.addEventListener("click", () => {
  sidebar.classList.remove("close", "hoverable");
  mainBody.style.marginLeft = '260px'; // Adjust main body margin when sidebar expands
});

sidebar.addEventListener("mouseenter", () => {
  if (sidebar.classList.contains("hoverable")) {
    sidebar.classList.remove("close");
    mainBody.style.marginLeft = '260px';
  }
});

sidebar.addEventListener("mouseleave", () => {
  if (sidebar.classList.contains("hoverable")) {
    sidebar.classList.add("close");
    mainBody.style.marginLeft = '80px';
  }
});

darkLight.addEventListener("click", () => {
  body.classList.toggle("dark");
  if (body.classList.contains("dark")) {
    document.setI;
    darkLight.classList.replace("bx-sun", "bx-moon");
  } else {
    darkLight.classList.replace("bx-moon", "bx-sun");
  }
});

submenuItems.forEach((item, index) => {
  item.addEventListener("click", () => {
    item.classList.toggle("show_submenu");
    submenuItems.forEach((item2, index2) => {
      if (index !== index2) {
        item2.classList.remove("show_submenu");
      }
    });
  });
});

if (window.innerWidth < 768) {
  sidebar.classList.add("close");
  mainBody.style.marginLeft = '0'; // Adjust main body margin for smaller screens
} else {
  sidebar.classList.remove("close");
  mainBody.style.marginLeft = '260px'; // Adjust main body margin for larger screens
}

const ExpandingFlexCard = document.querySelectorAll('.expanding-flex-cards')

ExpandingFlexCard.forEach(efcEl =>{
    efcEl.querySelectorAll('.expanding-flex-cards-item:not(active)').forEach(item => {
        item.addEventListener('click', function(e){
            e.preventDefault()
            efcEl.querySelector('.expanding-flex-cards-item.active').classList.remove('active')
            this.classList.add('active')
        })
    })
})
