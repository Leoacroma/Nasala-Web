// var navItem = document.querySelectorAll(".nav-item");
// for (var i = 0; i < navItem.length; i++) {
//     navItem[i].addEventListener("click", function() {
//         this.classList.add('active');
//     });
// }

$(document).ready(function() {
    $('ul li a').click(function() {
        $('li a').removeClass("active");
        $(this).addClass("active");
    });
});