<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">

    <title>Sports Monitor</title>

    <link rel="icon" type="image/png" href="">

    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
          integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX"
          crossorigin="anonymous">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <?php if (isset($this->style)): ?>
        <!-- Specific page style -->
        <link href="/css/<?= $this->page ?>.css" rel="stylesheet">
    <?php else: ?>
        <!-- Main style -->
        <link href="/css/main.css" rel="stylesheet">
    <?php endif; ?>
</head>