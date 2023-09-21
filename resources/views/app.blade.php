<!DOCTYPE html>
<html style="scroll-behavior: smooth;">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php if ($_SERVER['REQUEST_URI'] === '/formular'): ?>
  <title>Austrittsschreiben | kirche-austreten.ch</title>
  <meta title="Austrittsschreiben | Kirche Austreten">
  <meta name="description" content="Austrittsschreiben für den Kirchenaustritt Schweiz.">


  <?php elseif ($_SERVER['REQUEST_URI'] === '/agb'): ?>
  <title>Datenschutz | kirche-austreten.ch</title>
  <meta title="Datenschutz | Kirche Austreten">
  <meta name="description" content="Austrittsschreiben für den Kirchenaustritt Schweiz.">

  <?php else: ?>
  <title>kirche-austreten.ch</title>
  <meta title="Kirchenaustritt Schweiz.">
  <meta name="description"
        content="Aus der Kirche austreten mit dem Austrittsformular. Schnell und einfach.">
  <?php endif ?>

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

    <!-- Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-CJ4WXHWCXT"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {dataLayer.push(arguments);}

    gtag('js', new Date());

    gtag('config', 'G-CJ4WXHWCXT');
  </script>

  <script>
    (function (h, o, t, j, a, r) {
      h.hj = h.hj || function () {
        (h.hj.q = h.hj.q || []).push(arguments);
      };
      h._hjSettings = { hjid: 3376166, hjsv: 6 };
      a = o.getElementsByTagName('head')[0];
      r = o.createElement('script');
      r.async = 1;
      r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
      a.appendChild(r);
    })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
  </script>
  <?php endif ?>


</head>

<body class="antialiased bg-body text-body font-body">
<div id="error-message"></div>
<div id="app"></div>

<?php if ($_SERVER['HTTP_HOST'] === 'kirche-austreten.ch' || $_SERVER['HTTP_HOST'] === 'www.kirche-austreten.ch'): ?>

@vite('resources/css/min/app.min.css')
<?php else: ?>
@vite('resources/css/app.css')
<?php endif ?>

@vite(['resources/js/app.js', 'resources/js/main.js'])
</body>
</html>
