<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nghé Xinh Event</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
</head>
<style>
    body {
        font-family: 'Nunito', sans-serif;
        background-color: #ebc7d5;
        /*background: url(images/bg.jpg) no-repeat center center fixed;*/
        /*-webkit-background-size: cover;*/
        /*-moz-background-size: cover;*/
        /*-o-background-size: cover;*/
        /*background-size: cover;*/
    }

    img.item#open-anim {
        /* Start the shake animation and make the animation last for 0.5 seconds */
        animation: shake 0.5s;

        /* When the animation is finished, start again */
        animation-iteration-count: infinite;
        cursor: pointer;
    }

    .gift-name{
        text-transform: uppercase;
    }

    .btn-pinky{
        background-color: hotpink;
        color: white;
    }

    @keyframes shake {
        0% {
            transform: translate(1px, 1px) rotate(0deg);
        }
        10% {
            transform: translate(-1px, -2px) rotate(-1deg);
        }
        20% {
            transform: translate(-3px, 0px) rotate(1deg);
        }
        30% {
            transform: translate(3px, 2px) rotate(0deg);
        }
        40% {
            transform: translate(1px, -1px) rotate(1deg);
        }
        50% {
            transform: translate(-1px, 2px) rotate(-1deg);
        }
        60% {
            transform: translate(-3px, 1px) rotate(0deg);
        }
        70% {
            transform: translate(3px, 1px) rotate(-1deg);
        }
        80% {
            transform: translate(-1px, -1px) rotate(1deg);
        }
        90% {
            transform: translate(1px, 2px) rotate(0deg);
        }
        100% {
            transform: translate(1px, -2px) rotate(-1deg);
        }
    }

    .overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: black;
        opacity: 0.5;
        z-index: 99;
        display: none;
    }

</style>
<body>
<div class="overlay"></div>
<div class="container-fluid pt-5 mb-5">
    <div class="row no-gutters">
        <div class="col-12 text-center">
            <img src="images/logo.png" alt="" class="h-75">
        </div>
        <div class="col-12 text-center pl-5 pr-5">
            <img src="images/text-logo.png" alt="" class="w-100">
        </div>
    </div>
</div>
<div class="container-fluid p-5">
    <div class="row no-gutters">
        <div class="col-6 text-center mb-5" data-toggle="modal" data-target="#open-gift">
            <img class="item w-50" src="images/box/box.png" alt="">
        </div>
        <div class="col-6 text-center mb-5" data-toggle="modal" data-target="#open-gift">
            <img class="item w-50" src="images/box/box.png" alt="">
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-6 text-center mb-5" data-toggle="modal" data-target="#open-gift">
            <img class="item w-50" src="images/box/box.png" alt="">
        </div>
        <div class="col-6 text-center mb-5" data-toggle="modal" data-target="#open-gift">
            <img class="item w-50" src="images/box/box.png" alt="">
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-6 text-center mb-5" data-toggle="modal" data-target="#open-gift">
            <img class="item w-50" src="images/box/box.png" alt="">
        </div>
        <div class="col-6 text-center mb-5" data-toggle="modal" data-target="#open-gift">
            <img class="item w-50" src="images/box/box.png" alt="">
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="open-gift" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-xl modal-dialog modal-dialog-centered w-75" role="document">
        <div class="modal-content" style="background-color: transparent;border: none;box-shadow: none">
            <div class="modal-body text-center mt-2 mb-5">
                <img id="open-anim" class="item pt-2 pb-2 w-100" src="images/box/box.png"  alt="">
                <div class="gift-content">
                    <h2 class="text-white mb-3">Phần quà của bạn</h2>
                    <h2 class="text-white gift-name">{{ $gift->name }}</h2>
                    <img src="{{$gift->image ? asset("storage/".$gift->image) : "images/default.png" }}" class="pt-2 pb-2 w-100" alt="">
                    <h1 class="text-warning">{{ number_format($gift->price) }} VNĐ</h1>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-block btn-lg btn-secondary" data-dismiss="modal" id="back-gift">Quay lại</button>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('confirm-gift',[$gift->id]) }}" type="button" class="btn btn-block btn-lg btn-pinky">Nhận Quà</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
        crossorigin="anonymous"></script>
<script type="module" src="js/game.js"></script>
</body>
</html>
