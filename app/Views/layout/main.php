<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scrapper</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body, html {
            height: 100%;

        }

        body {
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: 30px;
            justify-content: center;
        }
    </style>
</head>
<body>


<div class="container">
    <!--Buffering views content-->

    <div class="parser">
        <?= $scrapper ?>
    </div>

</div>


<script src="./app/resources/js/app.js"></script>
</body>
</html>

