<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />
    <title>Atix Söri</title>
    <meta name="description" content="Nem létező oldal.">
    <meta name="author" content="Atix">
    <link rel="icon" type="image/png" href="{{ asset('kepek/beer.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="mx-4 bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Atix Söri</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Regisztráció</a>
                        <a class="nav-link" href="{{ route('login') }}">Bejelentkezés</a>
                        <a class="nav-link" href="{{ route('profile') }}">Profil megtekintése</a>
                        <a class="nav-link" href="{{ route('startgame') }}">Játék indítása</a>
                        <a class="nav-link" href="{{ route('toplist') }}">Ranglista</a>
                        <a class="nav-link" href="{{ route('history') }}">A játék története</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn">Kijelentkezés</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="card mb-3">
        <div class="card-body" style="text-align: center;">
            <img src="kepek/sor.jpg" class="rounded img-fluid" alt="Beer" style="max-width: 80vmin">
            <p class="card-text">Hello, ez itt a főoldal, csak sajna még nincs kész.</p>
            <p class="card-text"><small class="text-body-secondary">
                    Ha szeretnéd hogy hamarabb elkészüljön, segíts.
                </small></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
        integrity="sha384-oBqDVmMz4fnFO9gybE6dZ7Vh5L1hbGOcKZSA7yjbaGTyckjv0u9f/2DzVVAPF4c6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
