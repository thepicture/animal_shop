<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimalShop - Auth</title>
    <link rel="stylesheet" href="{{ URL::asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
</head>

<body>
    <main class="page">
        <img class="background page__background" src="{{ URL::asset('images/background.jpg') }}" alt="a dog looking to the right" loading="eager">
        <form class="form page__form form_centered" enctype="multipart/form-data" method="post">
            @csrf

            <h1 class="heading">AnimalShop</h1>
            <p class="error" hidden>Incorrect email or password</p>
            <fieldset class="input">
                <label for="email" class="input__label">Email</label>
                <input id="email" class="input__text" type="email" name="email" autocomplete="email" required>
            </fieldset>
            <fieldset class="input">
                <label for="password" class="input__label">Password</label>
                <input id="password" class="input__text" type="password" name="password" autocomplete="current-password" required>
            </fieldset>
            <button class="button button_primary" type="submit">Authenticate</button>
        </form>
    </main>
    <script src="{{ URL::asset('js/jquery-3.6.3.min.js') }}"></script>
    <script>
        $().ready(function() {
            $('.background').hide().fadeIn(1000);

            $('.page').css('background-color', 'white');

            $('.form').hide().delay(1000).fadeIn(1000);
            $('.form').height(0).animate({
                height: '90vh'
            }, {
                duration: 2000,
                queue: false
            }, 'easeInOutQuint');
        })
    </script>
    <script src="{{ URL::asset('css/common.blocks/input/input.js') }}"></script>
    <script>
        if (location.search.includes('state=rejected')) {
            $('.error').toggle();
        }
    </script>
</body>

</html>