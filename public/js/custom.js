/******/ (() => { // webpackBootstrap
/*!********************************!*\
  !*** ./resources/js/custom.js ***!
  \********************************/
//Nav bar button in responsive:
document.getElementById('nav-toggle').onclick = function () {
  var nav = document.querySelectorAll('.nav-content');
  var navLower = document.getElementById('lowerNavbar');
  navLower.classList.toggle('hidden');

  for (var i = 0; i < nav.length; i++) {
    nav[i].classList.toggle("hidden");
  }
}; //Dark mode on window load and on click:


window.onload = function checkIfDarkMode() {
  if (sessionStorage.getItem('darkMode') == 'active') {
    window.activateDarkMode();
  } else if (sessionStorage.getItem('darkMode') == 'inactive') {
    window.removeDarkMode();
  }
};

window.activateDarkMode = function () {
  sessionStorage.setItem('darkMode', 'active');
  var darkableElements = document.querySelectorAll('.darkable');
  var lessDarkableElements = document.querySelectorAll('.lessDarkable');

  for (var i = 0; i < lessDarkableElements.length; ++i) {
    if (lessDarkableElements[i].classList.contains("less-dark-mode") == false) {
      lessDarkableElements[i].classList.add("less-dark-mode");
    }
  }

  for (var _i = 0; _i < darkableElements.length; ++_i) {
    if (darkableElements[_i].classList.contains("dark-mode") == false) {
      darkableElements[_i].classList.add("dark-mode");
    }
  }

  document.getElementById('darkModBtn').checked = true;
};

window.removeDarkMode = function () {
  sessionStorage.setItem('darkMode', 'inactive');
  var darkableElements = document.querySelectorAll('.darkable');
  var lessDarkableElements = document.querySelectorAll('.lessDarkable');

  for (var i = 0; i < lessDarkableElements.length; ++i) {
    if (lessDarkableElements[i].classList.contains("less-dark-mode") == true) {
      lessDarkableElements[i].classList.remove("less-dark-mode");
    }
  }

  for (var _i2 = 0; _i2 < darkableElements.length; ++_i2) {
    if (darkableElements[_i2].classList.contains("dark-mode") == true) {
      darkableElements[_i2].classList.remove("dark-mode");
    }
  }

  document.getElementById('darkModBtn').checked = false;
};

window.toggleDark = function () {
  if (sessionStorage.getItem('darkMode') == 'active') {
    window.removeDarkMode();
  } else {
    window.activateDarkMode();
  }
}; //<-end dark mode

/* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
// --------> NOT USED CURRENTLY BUT MAYBE IN THE FUTURE
// let prevScrollpos = window.pageYOffset;
// window.onscroll = function() {
//   let currentScrollPos = window.pageYOffset;
//   if (prevScrollpos > currentScrollPos) {
//     document.getElementById("lowerNavbar").style.height = "inherit";
//     document.getElementById("lowerNavbar").style.width = "inherit";
//   } else {
// 	document.getElementById("lowerNavbar").style.height = "0";
// 	document.getElementById("lowerNavbar").style.width = "0";
//   }
//   prevScrollpos = currentScrollPos;
// } 
// Sidebar search for products pages:
// --------> NOT USED CURRENTLY BUT MAYBE IN THE FUTURE
// window.search = function () {
//     var input, filter, ul, li, a, i, txtValue;
//     input = document.getElementById('myInput');
//     filter = input.value.toUpperCase();
//     ul = document.getElementById('myUL');
//     li = ul.getElementsByTagName('li');
//     for (i = 0; i < li.length; i++) {
//         a = li[i].getElementsByTagName("a")[0];
//         txtValue = a.textContent || a.innerText;
//         if (txtValue.toUpperCase().indexOf(filter) > -1) {
//           li[i].style.display = "";
//         } else {
//           li[i].style.display = "none";
//         }
//     }
// }
//Drop down menu in dashboard sidebar:


document.querySelectorAll('.drop').forEach(function (item) {
  item.addEventListener('click', function (event) {
    item.nextElementSibling.classList.toggle("show");
    var iElement = item.querySelectorAll('i');

    for (var i = 0; i < iElement.length; ++i) {
      if (iElement[i].classList.contains('fa-angle-left')) {
        iElement[i].classList.toggle("rotateArrow");
      }
    }
  });
}); //Drop down menu stay open on current page :

var thisURL = window.location.pathname;
var lastSegment = thisURL.split("/").pop();
var aElements = document.querySelectorAll('a');

for (var i = 0; i < aElements.length; ++i) {
  if (aElements[i].id == lastSegment) {
    aElements[i].style.transform = 'translate(25px, -2px)';

    if (window.matchMedia("(min-width: 496px)").matches) {
      aElements[i].style.scale = '1.2';
    }

    var iElement = aElements[i].closest(".parentlist");
    iElement.querySelector(".drop").click();
  }
} //Show and hide search bar :


var navSearchBtn = document.getElementById('nav-search-btn');
var navSearchBar = document.getElementById('nav-search-bar');
navSearchBtn.addEventListener('click', function (event) {
  navSearchBar.classList.toggle('hidden');
});

if (navSearchBar.classList.contains('hidden')) {
  window.addEventListener('mouseup', function (event) {
    if (event.target.closest("#nav-search-bar") != navSearchBar && event.target.parentNode != navSearchBtn && event.target != navSearchBtn) {
      navSearchBar.classList.add('hidden');
    }
  });
} // For test:
// window.onclick = e => {
//     console.log(e.target);  // to get the element
//     console.log(e.target.tagName);  // to get the element tag name alone
// }
/******/ })()
;