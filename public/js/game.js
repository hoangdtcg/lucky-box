import confetti from "https://cdn.skypack.dev/canvas-confetti";

$(document).ready(function () {
    const gifted = window.localStorage.getItem('gift');
    const giftImg = window.localStorage.getItem('gift-img');
    const contacted = window.localStorage.getItem('user');
    if(contacted){
        $(".overlay").show();
        setTimeout(function () {
            swal({
                title: "Cảm ơn bạn đã tham gia quay thưởng!",
                icon: giftImg,
                imageWidth: 200,
                imageHeight: 200,
                imageAlt: giftImg,
                animation: false,
                text: "Mời bạn đến địa chỉ Nghé Xinh gần nhất để nhận quà!",
                type: "success"
            }).then(function() {
                window.location = "https://www.facebook.com/nghexinh.phukien";
            });
        },1)
    }
    else if (gifted){
        $(".giftId").val(gifted);
        $(".overlay").show();
        $("#open-gift").show();
        $("#open-anim").hide();
        $(".gift-content").show();
        $(".gift-footer").show();
    }

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
            const gift = $(".gift-id").val()
            const giftImg  = $("#img-gift").attr('src');
            window.localStorage.setItem('gift',gift)
            window.localStorage.setItem('gift-img',giftImg)
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

    $('.btn-receive').on('click',function () {
        window.localStorage.setItem('user',1);
    })
})
