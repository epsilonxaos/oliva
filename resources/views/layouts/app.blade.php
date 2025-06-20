<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .bg-blanco {
            background-image: url("../img/bg-blanco.webp");
        }

        .bg-negro {
            background-image: url("/img/bg-negro.png");
            background-color: #141414
        }
    </style>

    <title>{{ config('app.name', 'Laravel Clear') }}</title>

    {{-- <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff"> --}}

    {{-- <meta name="description"
        content="Desarrollamos estrategias integrales que permitan que lo inesperado sea una realidad en cada uno de nuestros rubros de especializaci&oacute;n." />
    <meta name="author" content="{{ config('app.name', 'Black Swan') }}" />
    <meta property="og:type" content="es_MX" />
    <meta property="og:locale" content="website" />
    <meta property="og:site_name" content="{{ config('app.name', 'Black Swan') }}" />
    <meta property="og:title" content="{{ config('app.name', 'Black Swan') }}" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:description"
        content="Desarrollamos estrategias integrales que permitan que lo inesperado sea una realidad en cada uno de nuestros rubros de especializaci&oacute;n." />
    <meta property="og:image" content="{{ asset('img/fb.jpg') }}" /> --}}



    {{-- Librerias empleadas para el feed de Instagram, aplicadas por dev externo --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    {{-- end --}}

    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/react/App.jsx'])

    @if (isset($st))
        {!! $st !!}
    @endif
</head>

<body class="antialiased min-h-svh bg-repeat bg-auto bg-center bg-blanco">
    <div id="root" class="min-h-svh"></div>
</body>

</html>
