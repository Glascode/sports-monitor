<!DOCTYPE html>
<html lang="fr">
<?php include __DIR__ . '/partials/head.php'; ?>

<body>
<?php include __DIR__ . '/partials/header.php'; ?>

<main>
    <?php include __DIR__ . '/views/' . $this->view . '.view.php'; ?>
</main>

<?php include __DIR__ . '/partials/footer.html'; ?>

<?php include __DIR__ . '/partials/scripts.php'; ?>
</body>

</html>