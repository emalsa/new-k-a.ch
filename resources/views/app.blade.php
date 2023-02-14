<!DOCTYPE html>
<html style="scroll-behavior: smooth;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>kirche-austreten.ch</title>
    <meta title="Kirchenaustritt für die Schweiz. Auch Gratis">
    <meta name="description"
          content="Aus der Kirche austreten mit dem Gratis Austrittsformular. Schnell und einfach. Adresse der Kirchgemeinde suchen wir für dich.">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    {{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:wght@400;500;600;700&display=swap">--}}
    {{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap">--}}
    <link rel="apple-touch-icon" sizes="57x57" href={{URL::asset('static/favicon/apple-icon-57x57.png')}}>
    <link rel="apple-touch-icon" sizes="60x60" href={{URL::asset('static/favicon/apple-icon-60x60.png')}}>
    <link rel="apple-touch-icon" sizes="72x72" href={{URL::asset('static/favicon/apple-icon-72x72.png')}}>
    <link rel="apple-touch-icon" sizes="76x76" href={{URL::asset('static/favicon/apple-icon-76x76.png')}}>
    <link rel="apple-touch-icon" sizes="114x114" href={{URL::asset('static/favicon/apple-icon-114x114.png')}}>
    <link rel="apple-touch-icon" sizes="120x120" href={{URL::asset('static/favicon/apple-icon-120x120.png')}}>
    <link rel="apple-touch-icon" sizes="144x144" href={{URL::asset('static/favicon/apple-icon-144x144.png')}}>
    <link rel="apple-touch-icon" sizes="152x152" href={{URL::asset('static/favicon/apple-icon-152x152.png')}}>
    <link rel="apple-touch-icon" sizes="180x180" href={{URL::asset('static/favicon/favicon-16x16.png')}}>
    <link rel="icon" type="image/png" sizes="192x192" href={{URL::asset('static/favicon/android-icon-192x192.png')}}>
    <link rel="icon" type="image/png" sizes="32x32" href={{URL::asset('static/favicon/favicon-32x32.png')}}>
    <link rel="icon" type="image/png" sizes="96x96" href={{URL::asset('static/favicon/favicon-96x96.png')}}>
    <link rel="icon" type="image/png" sizes="16x16" href={{URL::asset('static/favicon/favicon-16x16.png')}}>
    <link rel="manifest" href={{URL::asset('static/favicon/manifest.json')}}>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content={{URL::asset('static/favicon/ms-icon-144x144.png')}}>
    <meta name="theme-color" content="#ffffff">

  <?php if ($_SERVER['HTTP_HOST'] === 'kirche-austreten.ch' || $_SERVER['HTTP_HOST'] === 'www.kirche-austreten.ch'): ?>

          <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CJ4WXHWCXT"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'G-CJ4WXHWCXT');
    </script>
  <?php endif ?>


</head>

<body class="antialiased bg-body text-body font-body">
<div id="app"></div>

<?php if ($_SERVER['HTTP_HOST'] === 'kirche-austreten.ch' || $_SERVER['HTTP_HOST'] === 'www.kirche-austreten.ch'): ?>

@vite('resources/css/min/app.min.css')
<?php else: ?>
@vite('resources/css/app.css')
<?php endif ?>

@vite('resources/js/app.js')
@vite('resources/js/main.js')
</body>
</html>