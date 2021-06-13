//Search products with AJAX (in nav bar):
const searchForm = document.getElementById('search-form');

searchForm.addEventListener('keyup', function (e) {
    e.preventDefault();

    const url = this.getAttribute('action');
    const searchValue = document.getElementById('search-input').value;
    const tokenNav = document.getElementById('token-input-nav').value;

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
        }).then(response => {
            // console.log(response);
            response.json().then(data => {
                // console.log(Object.entries(data));

                const searchResultDiv = document.getElementById('search-result-div');
                searchResultDiv.innerHTML = '';

                Object.entries(data)[0][1].forEach(element => {
                    searchResultDiv.innerHTML += `<a href="http://projet5sas/product/${element.id}/${element.slug}" class='rounded-lg block p-2 border border-solid border-gray-400 w-full sm:w-96 bg-white text-black hover:bg-blue-500 hover:text-white'>${element.title}</a>`
                });
            })
        }).catch(error => {
            console.log(error);
        })
    }

})
