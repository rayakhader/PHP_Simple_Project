<?php require("partials/head.php") ?>

<?php require("partials/nav.php") ?>

<?php require("partials/banner.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p>Hello , <?= $_SESSION['user']['email'] ?? 'Guest' ?> Now you are in the home page.</p>
    </div>
</main>
<?php require("partials/footer.php") ?>