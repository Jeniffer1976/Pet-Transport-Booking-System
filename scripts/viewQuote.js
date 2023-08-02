

var viewQuote = anime({
    targets: '.quote_wrap',
    translateY: [200, 0],
    duration: 300,
    easing: 'easeInOutExpo',
});

function exitAnim() {
    // e.preventDefault(); //will stop the link href to call the blog page

    var closeQuote = anime({
        targets: '.quote_wrap',
        translateY: [0, 300],
        duration: 300,
        easing: 'easeInSine',
    });

    closeQuote.play();
    setTimeout(function () {
        window.location.href = "admin_quotes.php";
    }, 400);
}

function exitAnim2() {
    // e.preventDefault(); //will stop the link href to call the blog page

    var closeQuote = anime({
        targets: '.quote_wrap',
        translateY: [0, 300],
        duration: 300,
        easing: 'easeInSine',
    });

    closeQuote.play();
    setTimeout(function () {
        window.location.href = "editAdmin.php";
    }, 400);
}

$(document).load(function () {
    viewQuote.play();
});

$(document).ready(function () {
    const nav = document.querySelector("nav");

    nav.classList.contains("sticky-top") &&
        nav.classList.remove("sticky-top");


});

