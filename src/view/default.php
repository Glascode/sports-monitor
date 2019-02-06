<!DOCTYPE html>
<html lang="fr">
<?php include __DIR__ . '/partials/head.html'; ?>

<body>
<div class="master">
    <?php include __DIR__ . '/partials/header.php'; ?>

    <main class="content w-lg">
        <?php include __DIR__ . '/views/' . $this->page . '.view.php'; ?>
    </main>
</div>

<?php include __DIR__ . '/partials/footer.html'; ?>

<script type="text/javascript"
        src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
</body>

</html>