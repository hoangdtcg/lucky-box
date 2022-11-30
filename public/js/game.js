import confetti from "https://cdn.skypack.dev/canvas-confetti";

$(document).ready(function () {
    $('img.item').click(function(){
        const img = $(this).attr("src");
        $(".overlay").show();
        $("#open-anim").attr("src", img).show();
        $("#open-gift").show();
        $(".gift-content").hide();
        $(".gift-footer").hide();
        setTimeout(function () {
            $("#open-anim").hide();
            $(".gift-content").show();
            $(".gift-footer").show();
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

    $('.receive-gift').click(function(){
        $(".overlay").hide();
        $('#open-gift').hide();
        $('#user-info').show();
    });
})
