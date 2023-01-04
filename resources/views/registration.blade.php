<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimalShop - Registration</title>
    <link rel="stylesheet" href="{{ URL::asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
</head>

<body>
    <main class="page">
        <form class="form page__form form_centered" id="registration-form" enctype="multipart/form-data" method="post">
            @csrf

            <h1 class="heading">Register on site</h1>
            <p class="error" hidden>&lt;errors&gt;</p>
            <fieldset class="input">
                <label for="email" class="input__label">Email</label>
                <input id="email" class="input__text" type="email" name="email" autocomplete="email" required>
            </fieldset>
            <fieldset class="input">
                <label for="password" class="input__label">Password</label>
                <input id="password" class="input__text" type="password" name="password" autocomplete="new-password" required>
            </fieldset>
            <fieldset class="input">
                <label for="password" class="input__label">Retype password</label>
                <input id="new-password" class="input__text" type="password" name="new-password" autocomplete="new-password" required>
            </fieldset>
            <button class="button button_primary" id="registration-button" type="submit">Create account</button>
        </form>
        <img class="background page__background" src="{{ URL::asset('images/registration__background.jpg') }}" alt="a dog looking to the right" loading="eager">
    </main>
    <script src="{{ URL::asset('js/jquery-3.6.3.min.js') }}"></script>
    <script>
        $().ready(function() {
            $('.background').hide().fadeIn(1000);

            $('.page').css('background-color', 'white');

            $('.form').css('opacity', 0).delay(1000).fadeIn(1000);
            $('.form').height('90vh').animate({
                opacity: 1,
                height: '80vh'
            }, {
                duration: 2000,
                queue: false
            }, 'easeInOutQuint');

            $('#registration-button').click(function(event) {
                const form = new FormData($('#registration-form')[0]);
                const password1 = form.get('password');
                const password2 = form.get('new-password');

                if (password1 !== password2) {
                    alert('Passwords should match');
                    event.preventDefault();
                }
            });
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