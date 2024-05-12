document.addEventListener('DOMContentLoaded', function() {
  const body = document.querySelector("body");
  const darkLight = document.querySelector("#darkLight");
  const sidebar = document.querySelector(".sidebar");
  const submenuItems = document.querySelectorAll(".submenu_item");
  const sidebarOpen = document.querySelector("#sidebarOpen");
  const sidebarClose = document.querySelector(".collapse_sidebar");
  const sidebarExpand = document.querySelector(".expand_sidebar");
  const mainBody = document.querySelector('.main_body');

  sidebarOpen.addEventListener("click", () => sidebar.classList.toggle("close"));

  sidebarClose.addEventListener("click", () => {
    sidebar.classList.add("close", "hoverable");
    mainBody.style.marginLeft = '80px'; // Adjust main body margin when sidebar collapses
  });

  sidebarExpand.addEventListener("click", () => {
    sidebar.classList.remove("close", "hoverable");
    mainBody.style.marginLeft = '290px'; // Adjust main body margin when sidebar expands
  });

  sidebar.addEventListener("mouseenter", () => {
    if (sidebar.classList.contains("hoverable")) {
      sidebar.classList.remove("close");
      mainBody.style.marginLeft = '290px';
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


  const formatter = new Intl.NumberFormat("en-US", {
    style: "currency",
    currency: "USD",
    signDisplay: "always",
  });

});
