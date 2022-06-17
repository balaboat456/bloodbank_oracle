"use strict";

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function clickMenu() {
  var menuid = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
  document.getElementById("headerbarElement").style.zIndex = 9999999;
  document.getElementById("menuDropdown" + menuid).classList.toggle("show");

  if (menuid == 6) {
    document.getElementById("menuDropdown6_2").classList.toggle("show");
    document.getElementById("menuDropdown6_3").classList.toggle("show");
    document.getElementById("menuDropdown6_4").classList.toggle("show");
  }

  if (menuid != 1) {
    var dropdowns = document.getElementsByClassName("dropdown-content1");
    var i;

    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];

      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }

  if (menuid != 2) {
    var dropdowns = document.getElementsByClassName("dropdown-content2");
    var i;

    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];

      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }

  if (menuid != 3) {
    var dropdowns = document.getElementsByClassName("dropdown-content3");
    var i;

    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];

      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }

  if (menuid != 4) {
    var dropdowns = document.getElementsByClassName("dropdown-content4");
    var i;

    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];

      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }

  if (menuid != 5) {
    var dropdowns = document.getElementsByClassName("dropdown-content5");
    var i;

    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];

      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }

  if (menuid != 6) {
    var dropdowns = document.getElementsByClassName("dropdown-content6");
    var i;

    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];

      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }

  if (menuid != 7) {
    var dropdowns = document.getElementsByClassName("dropdown-content7");
    var i;

    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];

      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }

  if (menuid != 8) {
    var dropdowns = document.getElementsByClassName("dropdown-content8");
    var i;

    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];

      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
} // Close the dropdown menu if the user clicks outside of it


window.onclick = function (event) {
  if (!event.target.matches('.dropbtn')) {
    document.getElementById("headerbarElement").style.zIndex = 999;
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;

    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];

      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
};