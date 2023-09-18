<!DOCTYPE html>
<html style="scroll-behavior: smooth;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if ($_SERVER['REQUEST_URI'] === '/'): ?>
    <title>Kirche Austreten</title>
    <meta title="Kirchenaustritt Schweiz.">
    <meta name="description"
          content="Aus der Kirche austreten mit dem Austrittsformular. Schnell und einfach.">
  <?php endif ?>
  <?php if ($_SERVER['REQUEST_URI'] === '/formular'): ?>
    <title>Austrittsschreiben | Kirche Austreten</title>
    <meta title="Austrittsschreiben | Kirche Austreten">
    <meta name="description" content="Austrittsschreiben für den Kirchenaustritt Schweiz.">
  <?php endif ?>
  <?php if ($_SERVER['REQUEST_URI'] === '/agb'): ?>
    <title>Datenschutz | Kirche Austreten</title>
    <meta title="Datenschutz | Kirche Austreten">
    <meta name="description" content="Austrittsschreiben für den Kirchenaustritt Schweiz.">
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

    <script>
        (function (h, o, t, j, a, r) {
            h.hj = h.hj || function () {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {hjid: 3376166, hjsv: 6};
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>

      <!-- Event snippet for kirche-austreten.ch Bezahlt conversion page -->
      <script>
          gtag('event', 'conversion', {'send_to': 'AW-757997418/aacsCKH6y-AYEOq-uOkC'});
      </script>
  <?php endif ?>


</head>

<body class="antialiased bg-body text-body font-body">
<!-- Load Stripe.js on your website. -->
<script src="https://js.stripe.com/v3"></script>

<!-- Create a button that your customers click to complete their purchase. Customize the styling to suit your branding. -->
<button
    style="background-color:#6772E5;color:#FFF;padding:8px 12px;border:0;border-radius:4px;font-size:1em;cursor:pointer"
    id="checkout-button-price_1MeGCjHTUtbeMPfHy83uTrf4"
    role="link"
    type="button"
>
    Checkout
</button>

<div id="error-message"></div>

<script>
    (function() {
        var stripe = Stripe('pk_live_qtsGhSPe9n4PCfsMzcJ3cY2A00smGJEGkt');

        var checkoutButton = document.getElementById('checkout-button-price_1MeGCjHTUtbeMPfHy83uTrf4');
        checkoutButton.addEventListener('click', function () {
            /*
             * When the customer clicks on the button, redirect
             * them to Checkout.
             */
            stripe.redirectToCheckout({
                lineItems: [{price: 'price_1MeGCjHTUtbeMPfHy83uTrf4', quantity: 1}],
                mode: 'payment',
                /*
                 * Do not rely on the redirect to the successUrl for fulfilling
                 * purchases, customers may not always reach the success_url after
                 * a successful payment.
                 * Instead use one of the strategies described in
                 * https://stripe.com/docs/payments/checkout/fulfill-orders
                 */
                successUrl: window.location.protocol + '//kirche-austreten.ch/success',
                cancelUrl: window.location.protocol + '//kirche-austreten.ch/canceled',
            })
                .then(function (result) {
                    if (result.error) {
                        /*
                         * If `redirectToCheckout` fails due to a browser or network
                         * error, display the localized error message to your customer.
                         */
                        var displayError = document.getElementById('error-message');
                        displayError.textContent = result.error.message;
                    }
                });
        });
    })();
</script>
<div id="app"></div>

<?php if ($_SERVER['HTTP_HOST'] === 'kirche-austreten.ch' || $_SERVER['HTTP_HOST'] === 'www.kirche-austreten.ch'): ?>

@vite('resources/css/min/app.min.css')
<?php else: ?>
@vite('resources/css/app.css')
<?php endif ?>

@vite(['resources/js/app.js', 'resources/js/main.js'])
</body>
</html>
