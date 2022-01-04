var mainImg = document.getElementById('main_img');
var smallImg = document.querySelectorAll('.small-img');

smallImg.forEach(function(item) {
    item.onclick = function() {
        mainImg.src = item.src;
    };
});

