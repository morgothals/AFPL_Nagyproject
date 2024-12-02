<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />
    <title>@yield('title', 'Plinko')</title>
    <meta name="author" content="Csapatnev">
    <link rel="icon" type="image/png" href="{{ asset('kepek/beer.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/menusor.css') }}">
</head>
<body class="mx-4 bg-light">

    <div class="card mb-3">
        <div class="card-body" style="text-align: center;">
            <img src="{{ asset('kepek/404beer.jpg') }}" class="rounded img-fluid" alt="404" style="max-width: 80vmin">
            <p class="card-text">Sajnos ez az oldal még nem létezik, vagy karbantartás alatt van.</p>
            <p class="card-text"><small class="text-body-secondary">
                    Ha szeretnéd hogy hamarabb elkészüljön, segíts.
                </small></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gybE6dZ7Vh5L1hbGOcKZSA7yjbaGTyckjv0u9f/2DzVVAPF4c6"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>