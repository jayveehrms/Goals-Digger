let slider = document.querySelectorAll('.ember-preview-container');
let i = 0;

function next() {
    slider[i].classList.remove('active');
    i = (i + 1) % slider.length;
    slider[i].classList.add('active');

}

function prev() {
    slider[i].classList.remove('active');
    i = (i - 1 + slider.length) % slider.length;
    slider[i].classList.add('active');
}

setInterval(next, 4000);