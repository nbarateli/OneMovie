const SEARCH_ROUTE = document.getElementById('search_route').value;

function ajax(url, stateReady) {
    let request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200)
            stateReady(this.responseText)
    };
    request.open('GET', url, true);
    request.send();
}

function renderMustache(template, data, elemType, classList) {
    let result = document.createElement(elemType);
    result.classList.add(classList);
    result.innerHTML = Mustache.render(template, data);
    return result;
}

function displayMovies(data) {
    let container = document.querySelector('#search-results');
    container.innerHTML = "";
    let template = document.querySelector('#search-item').innerHTML;
    data.forEach(el => {
        container.appendChild(renderMustache(template, el, 'li', 'movie-entry'))
    })
}

function toParams(param) {
    return Object.keys(param).reduce((prev, cur, i) =>
        prev + (i === 0 ? cur + '=' + param[cur] :
        '&' + cur + '=' + param[cur])
        , '?');
}

async function searchMovies(title) {

    let response = await fetch(SEARCH_ROUTE + toParams({title: title, json_response: true}));
    let result;
    await response.json().then(data => result = data);
    return result;
}

function ready() {
    let form = document.getElementById('search');

    function search(e) {
        searchMovies(e.target.value).then(displayMovies);
    }

    let template = document.querySelector('#search-item').innerHTML;
    Mustache.parse(template);
    form.addEventListener('input', _.debounce(search, 200), true);
    form.addEventListener('focus', _.debounce(search, 200), true);
    form.addEventListener('focusout', () => document.getElementById('search-results').innerHTML = "");
}

document.addEventListener('DOMContentLoaded', ready);
