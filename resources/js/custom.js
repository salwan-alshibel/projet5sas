console.log('test : custom.js');


// Search bar:
window.search = function () {
    console.log('test : search');
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById('myUL');
    li = ul.getElementsByTagName('li');
    console.log(li);
    console.log(li[1].getElementsByTagName("a")[0]);

    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
    }
}


//Filter on search: