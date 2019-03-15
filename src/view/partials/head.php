<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">

    <title>Sports Monitor</title>

    <link rel="icon" type="image/png" href="">   

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <?php if (isset($this->style)): ?>
        <!-- Specific page style -->
        <link href="/css/<?= $this->style ?>.css" rel="stylesheet">
    <?php else: ?>
        <!-- Main style -->
        <link href="/css/main.css" rel="stylesheet">
    <?php endif; ?>
</head>