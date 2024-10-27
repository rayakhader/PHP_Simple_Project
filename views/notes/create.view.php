<?php require base_path("views/partials/head.php") ?>

<?php require base_path("views/partials/nav.php") ?>

<?php require base_path("views/partials/banner.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST">
            <label for="body" class="font-bold">Description</label>
            <div>
                <textarea rows="3" class="mt-1 block w-full rounded-md border-grey-300 shadow-sm" name="body" id="body" placeholder="Here's an idea for a note..."><?= isset($_POST['body']) ? $_POST['body'] : '' ?></textarea>
            </div>

            <?php if (isset($errors['body'])) : ?>
                <p class="font-bold text-red-500 mt-2"><?= $errors['body'] ?></p>
            <?php endif ?>
            <p>
                <button class="rounded-lg border-2 p-2 font-bold mt-2 border-gray-500 text-blue-500" type="submit">Create</button>
            </p>
        </form>
        <a href="/notes" class="underline font-semibold	mt-8 text-blue-300">Go back</a>
    </div>
</main>
<?php require base_path("views/partials/footer.php") ?>