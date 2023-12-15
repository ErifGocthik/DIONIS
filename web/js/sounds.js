(function playsound() {
    var paper = new Audio('../sounds/paper_1.wav');
    var paper_click = new Audio('../sounds/paper_2.wav');
    $(document).ready(function () {
        $('.buy-ticket-sound').mouseover(function () {
           paper.play();
           $('.buy-ticket-sound').on('click', function () {
               paper_click.play();
           });
        });
    });
})();