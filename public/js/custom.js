/******/ (() => { // webpackBootstrap
/*!********************************!*\
  !*** ./resources/js/custom.js ***!
  \********************************/
//Nav bar button in responsive:
document.getElementById('nav-toggle').onclick = function () {
  var nav = document.querySelectorAll('.nav-content');

  for (var i = 0; i < nav.length; i++) {
    nav[i].classList.toggle("hidden");
  }
}; //Dark mode on load and on click:


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
};
/* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
// if (window.matchMedia('(max-width: 600px)').matches) {
// 	console.log('ksdjfsdjflsjdlfkjsdf');
// }


var prevScrollpos = window.pageYOffset;

window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;

  if (prevScrollpos > currentScrollPos) {
    document.getElementById("lowerNavbar").style.height = "inherit";
    document.getElementById("lowerNavbar").style.width = "inherit";
  } else {
    document.getElementById("lowerNavbar").style.height = "0";
    document.getElementById("lowerNavbar").style.width = "0";
  }

  prevScrollpos = currentScrollPos;
}; // Sidebar search for products pages:


window.search = function () {
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById('myUL');
  li = ul.getElementsByTagName('li');

  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;

    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}; //Drop down menu in dashboard sidebar:


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
}); // window.onclick = e => {
//     console.log(e.target);  // to get the element
//     console.log(e.target.tagName);  // to get the element tag name alone
// }
//Drop down menu stay open on current page :

var thisURL = window.location.pathname;
var lastSegment = thisURL.split("/").pop(); //console.log(thisURL);
//If last part of the URL match a link in the sidebar,
//simulate a click to open the corresponding section :
// if (lastSegment == "modifier-profil" || lastSegment == "changer-mot-de-passe" || lastSegment == "mes-commentaires") {
// 	document.getElementById('myProfileBtn').click();
// }

var aElements = document.querySelectorAll('a');

for (var i = 0; i < aElements.length; ++i) {
  if (aElements[i].id == lastSegment) {
    aElements[i].style.backgroundColor = '#3b82f6';
    aElements[i].style.color = 'white';
    var iElement = aElements[i].closest(".parentlist");
    iElement.querySelector(".drop").click();
  }
} //Filter on search:
/******/ })()
;