<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimalShop - Pets</title>
</head>

<body class="page">
    <main>
        <h1 class="heading">Pets</h1>
        <ul>
            @foreach ($pets as $pet)
            <li>
                <h2>{{ $pet['name'] }}</h2>
                <p>Status: {{ $pet['status'] }}</p>
            </li>
            @endforeach
        </ul>
    </main>
    <script src="{{ URL::asset('js/jquery-3.6.3.min.js') }}"></script>
</body>

</html>