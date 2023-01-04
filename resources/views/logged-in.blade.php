<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimalShop - Logged In</title>
    <link rel="stylesheet" href="{{ URL::asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
</head>

<body class="page page_children_centered page__background_logged_in">
    <main class="form form_children_centered page__form">
        <h1 class="heading">Authenticated!</h1>
        <noscript><a class="button button_primary" href="/">Main Page</a></noscript>
    </main>
    <script src="{{ URL::asset('js/jquery-3.6.3.min.js') }}"></script>
    <script>
        $().ready(function() {
            $('.form').append('<p>You will be redirected to the main page shortly...</p>');
            setTimeout(() => window.location = '/', 3200);

            $('.form').css({
                'position': 'relative',
                'margin-left': '-5em'
            }).hide().fadeIn(1000).animate({
                'margin-left': '+=5em'
            }, {
                duration: 1000,
                queue: false
            });
        })
    </script>
</body>

</html>