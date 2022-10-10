import confetti from "https://cdn.skypack.dev/canvas-confetti";

$(document).ready(function () {
    $('img.item').click(function(){
        $(".overlay").show();
        $(".gift-content").hide();
        $(".modal-footer").hide();
        setTimeout(function () {
            $("#open-anim").hide();
            $(".gift-content").show();
            $(".modal-footer").show();
            confetti(
                {
                    particleCount: 500,
                    spread: 700,
                    origin: { y: 0.4 }
                }
            );
        },1500)
    })

    $('#back-gift').click(function(){
        window.location.reload();
    });

})
