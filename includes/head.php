<!-- HTML head section that loads some javascript libraries -->
<!-- Load stylesheet -->
<!-- Libraries used: Tailwindcss for some styling, Fontawesome for icons, Axios for http request -->

<?php

function head()
{
  echo <<<DEV
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://cdn.tailwindcss.com"></script>
      <script src="https://kit.fontawesome.com/f2f51db1ed.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <link rel="stylesheet" href="../styles.css">

      <title>Tixx | Event booking</title>
    </head>
  DEV;
}