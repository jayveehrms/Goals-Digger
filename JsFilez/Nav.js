document.getElementById('nav-homepage').addEventListener('click', function() {
    document.getElementsByClassName('slider-preview')[0].scrollIntoView({ behavior: 'smooth' });
});

document.getElementById('nav-services').addEventListener('click', function() {
    document.getElementById('ride').scrollIntoView({ behavior: 'smooth' });
});

document.getElementById('nav-fleet').addEventListener('click', function() {
    document.getElementById('services').scrollIntoView({ behavior: 'smooth' });
});

document.getElementById('nav-contact').addEventListener('click', function() {
    document.getElementById('section3').scrollIntoView({ behavior: 'smooth' });
});