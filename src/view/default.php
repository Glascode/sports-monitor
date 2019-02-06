<!DOCTYPE html>
<html lang="fr">
<?php include __DIR__ . '/partials/head.html'; ?>

<body>
<div class="master">
    <?php include __DIR__ . '/partials/header.php'; ?>

    <main class="content">
        <div class="page">
            <?php include __DIR__ . '/views/' . $this->page . '.view.php'; ?>
        </div>
    </main>
</div>

<?php include __DIR__ . '/partials/footer.html'; ?>

<?php include __DIR__ . '/partials/scripts.html'; ?>
</body>

</html>