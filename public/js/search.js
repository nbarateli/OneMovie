const SEARCH_ROUTE = document.getElementById('search_route').value;

function ajax(url, stateReady) {
    let request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200)
            stateReady(this.responseText)
    };
    request.open('GET', url, true);
    request.send()
}

function displayMovies(data) {
    console.log(JSON.parse(data));
}

function search(e) {
    // e.preventDefault();
    // console.log($(this).serialize());
    // ajax(SEARCH_ROUTE + '?' + $(this).serialize(), displayMovies);
}

function ready() {
    let form = document.getElementById('search')
    form.addEventListener('submit', search, true);

}

document.addEventListener('DOMContentLoaded', ready);
