<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        /*background-color: #ebc7d5;*/
        background: url("images/noel/bg-noel.png") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    img#open-anim {
        /* Start the shake animation and make the animation last for 0.5 seconds */
        animation: shake 0.5s;

        /* When the animation is finished, start again */
        animation-iteration-count: infinite;
        cursor: pointer;
    }

    .gift-name {
        text-transform: uppercase;
    }

    .btn-pinky {
        background-color: hotpink;
        color: white;
    }

    .font-mobile{
        font-size: 60px;
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
        height: 200%;
        background-color: black;
        opacity: 0.5;
        z-index: 99;
        display: none;
    }

    #open-gift {
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: transparent;
        z-index: 100;
        display: none;
    }

    .gift-content, .gift-img {
        margin: 60% auto auto;
        text-align: center;
    }

    @media only screen and (min-width: 1440px) {
        .gift-content, .gift-img {
            margin: 10% auto auto;
            text-align: center;
        }

        .box-gift{
            margin-top: 10px!important;
        }
    }

    .modal-dialog{
        max-width: 800px;
    }

    .font-mobile{
        font-size: 45px;
    }

    .container {
        padding: 2rem 0rem;
    }

    .form-title {
        margin: -2rem 0rem 2rem;
    }

    input#username, input#phone {
        height: 80px;
        font-size: 45px;
    }

    .standard-mobile{
        position: relative;
        max-width: 800px;
        margin: auto;
    }
</style>
<body>
@include('sweetalert::alert')
<div class="overlay"></div>
<div class="standard-mobile">
    <div id="open-gift">
        <div class="gift-img w-75">
            <img id="open-anim" src="images/box/box.png" alt="">
        </div>
        <div class="gift-content w-75">
            <div class="gift-content">
                <h2 class="text-white mb-3">Phần quà của bạn</h2>
                <h2 class="text-white gift-name font-mobile">{{ $gift->name }}</h2>
                <img src="{{$gift->image ? asset("storage/".$gift->image) : "images/default.png" }}"
                     class="pt-4 pb-4 w-100" alt="">
            </div>
            <div class="gift-footer">
                <div class="col-12 text-center">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-block btn-lg btn-pinky receive-gift font-mobile" data-toggle="modal"
                                    data-target="#user-info">Nhận Quà
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-5 mb-5">
        <div class="row no-gutters">
            <div class="col-12 text-center">
                {{--            <img src="images/logo.png" alt="" class="h-75">--}}
            </div>
            <div class="col-12 text-center pl-5 pr-5">
                {{--            <img src="images/text-logo.png" alt="" class="w-100">--}}
            </div>
        </div>
    </div>
    <div class="container-fluid p-5 box-gift" style="margin-top: 60%">
        <div class="row no-gutters">
            <div class="col-6 text-center mb-5">
                <img class="item w-50" src="images/noel/box-1.png" alt="">
            </div>
            <div class="col-6 text-center mb-5">
                <img class="item w-50" src="images/noel/box-2.png" alt="">
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-6 text-center mb-5">
                <img class="item w-50" src="images/noel/box-3.png" alt="">
            </div>
            <div class="col-6 text-center mb-5">
                <img class="item w-50" src="images/noel/box-4.png" alt="">
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-6 text-center mb-5">
                <img class="item w-50" src="images/noel/box-5.png" alt="">
            </div>
            <div class="col-6 text-center mb-5">
                <img class="item w-50" src="images/noel/box-6.png" alt="">
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="modal fade" id="user-info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-5">
                        <div class="form-title text-center">
                            <h1 class="text-uppercase">Thông tin nhận quà</h1>
                        </div>
                        <div class="d-flex flex-column text-center">
                            <form method="post" name="info-customer" action="{{route("customer.store")}}">
                                @csrf
                                <input type="hidden" class="form-control" name="giftId" value="{{ $gift->id }}">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Tên khách hàng...">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Số điện thoại...">
                                </div>
                                <button type="submit" class="btn btn-success btn-lg btn-round font-mobile mt-2">Gửi thông tin</button>
                            </form>
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
