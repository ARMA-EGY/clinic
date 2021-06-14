<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>500 </title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,900" rel="stylesheet">

	<!-- Custom Style -->
	<style>
        * {
        -webkit-box-sizing: border-box;
                box-sizing: border-box;
        }

        body {
        padding: 0;
        margin: 0;
        background-color: #333333;
        }

        #notfound {
        position: relative;
        height: 100vh;
        }

        #notfound .notfound {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
        }

        .notfound {
        max-width: 920px;
        width: 100%;
        line-height: 1.4;
        text-align: center;
        padding-left: 15px;
        padding-right: 15px;
        }

        .notfound .notfound-404 {
        position: absolute;
        height: 100px;
        top: 0;
        left: 50%;
        -webkit-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
                transform: translateX(-50%);
        z-index: -1;
        }

        .notfound .notfound-404 h1 {
        font-family: 'Maven Pro', sans-serif;
        color: #ececec;
        font-weight: 900;
        font-size: 276px;
        margin: 0px;
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
        }

        .notfound h2 {
            font-family: 'Maven Pro', sans-serif;
            font-size: 27px;
            font-weight: 900;
            text-transform: uppercase;
            margin: 0px;
            margin-bottom: 20px;
        }

        .notfound p {
        font-family: 'Maven Pro', sans-serif;
        font-size: 16px;
        color: #000;
        font-weight: 400;
        text-transform: uppercase;
        margin-top: 15px;
        }

        .notfound a {
        font-family: 'Maven Pro', sans-serif;
        font-size: 14px;
        text-decoration: none;
        text-transform: uppercase;
        background: #fff;
        display: inline-block;
        padding: 16px 38px;
        border: 2px solid transparent;
        border-radius: 40px;
        color: #000;
        font-weight: 400;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
        }

        .notfound a:hover {
        background-color: #fff;
        border-color: #293490;
        color: #293490;
        }

        @media only screen and (max-width: 480px) 
        {
            .notfound .notfound-404 h1 
            {
                font-size: 162px;
            }

            .notfound h2 
            {
                font-size: 26px;
            }

            .container 
            {
                width: 100% !important;
            }
        }

          .full-screen {
            background-color: #333333;
            width: 100vw;
            height: 100vh;
            color: white;
            font-family: "Arial Black";
            text-align: center;
            }

            .container {
            padding-top: 4em;
            width: 50%;
            display: block;
            margin: 0 auto;
            }

            .error-num {
            font-size: 8em;
            }

            .eye {
            background: #fff;
            border-radius: 50%;
            display: inline-block;
            height: 100px;
            position: relative;
            width: 100px;
            }
            .eye::after {
            background: #000;
            border-radius: 50%;
            bottom: 56.1px;
            content: " ";
            height: 33px;
            position: absolute;
            right: 33px;
            width: 33px;
            }

            .italic {
            font-style: italic;
            }

            p {
            margin-bottom: 4em;
            }

            a {
            color: white;
            text-decoration: none;
            text-transform: uppercase;
            }
            a:hover {
            color: lightgray;
            }

    </style>


</head>

<body>

	<div class="full-screen">
        <div class='container notfound'>
          <span class="error-num">5</span>
          <div class='eye'></div>
          <div class='eye'></div>
  
          <h2 class="sub-text">Something went wrong. We're <span class="italic">looking</span> to see what happened.</h2>
          <a href="{{ url()->previous() }}">Go back</a>
        </div>
    </div>

</body>

</html>

<script type="application/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script>

    $(".full-screen").mousemove(function(event) {
    var eye = $(".eye");
    var x = (eye.offset().left) + (eye.width() / 2);
    var y = (eye.offset().top) + (eye.height() / 2);
    var rad = Math.atan2(event.pageX - x, event.pageY - y);
    var rot = (rad * (180 / Math.PI) * -1) + 180;
    eye.css({
        '-webkit-transform': 'rotate(' + rot + 'deg)',
        '-moz-transform': 'rotate(' + rot + 'deg)',
        '-ms-transform': 'rotate(' + rot + 'deg)',
        'transform': 'rotate(' + rot + 'deg)'
    });
    });

</script>