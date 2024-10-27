<?php require base_path("views/partials/head.php") ?>

<?php require base_path("views/partials/nav.php") ?>

<?php require base_path("views/partials/banner.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/note">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">

            <label for="body" class="font-bold">Description</label>
            <div>
                <textarea rows="3" class="mt-1 block w-full rounded-md border-grey-300 shadow-sm" name="body" id="body" placeholder="Here's an idea for a note..."><?= $note['body'] ?></textarea>
            </div>

            <?php if (isset($errors['body'])) : ?>
                <p class="font-bold text-red-500 mt-2"><?= $errors['body'] ?></p>
            <?php endif ?>
            <p class="mt-6">
                <a href="/notes" class="rounded-lg border-2 p-2 font-bold mt-2 border-gray-500 text-blue-500">Cancel</a>
                <button class="rounded-lg border-2 p-2 font-bold mt-2 border-gray-500 text-blue-500" type="submit">Update</button>
            </p>
        </form>
        <form class="mt-6" method="post">
            <!-- if there is no name there is not the part of the post request -->
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <input type="hidden" name="_method" value="DELETE">
            <button class="text-sm text-red-500">Delete</button>
        </form>
        <a href="/notes" class="underline font-semibold	mt-8 text-blue-300">Go back</a>
    </div>
</main>
<?php require base_path("views/partials/footer.php") ?>