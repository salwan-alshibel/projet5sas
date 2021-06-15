/******/ (() => { // webpackBootstrap
/*!******************************!*\
  !*** ./resources/js/ajax.js ***!
  \******************************/
//Search products with AJAX (in nav bar):
var searchForm = document.getElementById('search-form');
searchForm.addEventListener('keyup', function (e) {
  e.preventDefault();
  var url = this.getAttribute('action');
  var searchValue = document.getElementById('search-input').value;
  var tokenNav = document.getElementById('token-input-nav').value;

  if (searchValue !== '') {
    fetch(url, {
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': tokenNav
      },
      method: 'post',
      body: JSON.stringify({
        searchValueForController: searchValue
      })
    }).then(function (response) {
      // console.log(response);
      response.json().then(function (data) {
        // console.log(Object.entries(data));
        var searchResultDiv = document.getElementById('search-result-div');
        searchResultDiv.innerHTML = '';
        Object.entries(data)[0][1].forEach(function (element) {
          searchResultDiv.innerHTML += "<a href=\"http://projet5sas/product/".concat(element.id, "/").concat(element.slug, "\" class='rounded-lg block p-2 border border-solid border-gray-400 w-full sm:w-96 bg-white text-black hover:bg-blue-500 hover:text-white'>").concat(element.title, "</a>");
        });
      });
    })["catch"](function (error) {
      console.log(error);
    });
  }
});
/******/ })()
;