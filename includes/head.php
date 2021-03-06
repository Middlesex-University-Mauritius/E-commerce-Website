<!-- HTML head section that loads some javascript libraries -->
<!-- Load stylesheet -->
<!-- Libraries used: Tailwindcss for some styling, Fontawesome for icons, Axios for http request -->

<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/web" ."/includes/helpers/session.helper.php";

function head($requiresLogin=false)
{
  if ($requiresLogin) {
    $session = new SessionHelper();

    if (!$session->isSignedIn()) {
      header("Location: /web/home");
      exit();
    }
  }

  echo <<<DEV
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/f2f51db1ed.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.min.css" />
    <script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" type="text/javascript" ></script>
    <script type="module" src="/web/includes/js/scripts/cart.js"></script>
    <script type="module" src="/web/includes/js/scripts/search.js"></script>
    <link rel="stylesheet" href="/web/styles.css">

    <title>Tixx | Ticket booking</title>
  DEV;
}
