// Sidebar search for products pages:
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
}

//Drop down menu in dashboard sidebar:
document.querySelectorAll('.drop').forEach(item => {
	item.addEventListener('click', event => {
		item.nextElementSibling.classList.toggle("show");
		const iElement = item.querySelectorAll('i');

		for (let i = 0; i < iElement.length; ++i) {
			if (iElement[i].classList.contains('fa-angle-left')) {
				iElement[i].classList.toggle("rotateArrow");
			}
		}
	})
})


// window.onclick = e => {
//     console.log(e.target);  // to get the element
//     console.log(e.target.tagName);  // to get the element tag name alone
// }


//Drop down menu stay open on current page :
    const thisURL = window.location.pathname;
	const lastSegment = thisURL.split("/").pop();

	console.log(thisURL);

    //If last part of the URL match a link in the sidebar,
	//simulate a click to open the corresponding section :
    if (lastSegment == "modifier-profil" || lastSegment == "changer-mot-de-passe" || lastSegment == "mes-commentaires") {
    	document.getElementById('myProfileBtn').click();
    }

	const aElements = document.querySelectorAll('a');

	for (let i = 0; i < aElements.length; ++i) {
		if (aElements[i].id == lastSegment ) {
			aElements[i].style.backgroundColor = 'rgba(255,255,255,.9)';
			aElements[i].style.color = '#343a40';

		}
	}


//Filter on search: