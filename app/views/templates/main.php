<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Admin</title>
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    <script
            src="http://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
<!--    <script src="../../slick/slick.js"></script>-->
    <script>
        jQuery(function () {

            // $('.single-item').slick();

            $('button:contains("Добавить")').on('click', function (event) {
                let body = {
                    name: $('input[name="name"]').val(),
                    author: $('input[name="author"]').val(),
                    textNews: $.trim($("#text-news").val())
                };

                $.ajax({
                    url: 'news/create',
                    type: 'post',
                    dataType: 'json',
                    data: body,
                    success: function (data) {
                        location.reload();
                    }
                });
            });
        })
    </script>
    <style>
        section {
            background-color: slategray;
        }
    </style>
<!--    <link rel="stylesheet" type="text/css" href="../../slick/slick.css"/>-->
<!--    <link rel="stylesheet" type="text/css" href="../../slick/slick-theme.css"/>-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/news">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="btn btn-success" data-toggle="modal" data-target="#createNews">Create news</a>
            </li>
        </ul>
    </div>
</nav>
<section>
    <?php include 'app/views/' . $this->content_view; ?>
</section>
<div class="container" style="margin-top: 20%;">
        <hr>
        <div class="text-center center-block">
            <p class="txt-railway">- PHP-BLOG 2019 -</p>
            <br />
            <a href="https://www.facebook.com/bootsnipp"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
            <a href="https://twitter.com/bootsnipp"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
            <a href="https://plus.google.com/+Bootsnipp-page"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
            <a href="mailto:bootsnipp@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
        </div>
        <hr>
    </div>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>