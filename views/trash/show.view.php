<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20 m-auto">
            <div>
                <h2 class="text-gray-800 text-3xl font-semibold"><?= htmlspecialchars($note['excerpt']) ?></h2>
                <p class="mt-2 text-gray-600"><?= htmlspecialchars($note['body']) ?></p>
            </div>
            <div class="flex justify-end mt-4">
                <p class="text-l font-medium text-indigo-500"><?= htmlspecialchars(date("d-m-Y", strtotime($note['created_at']))) ?></p>
            </div>
            <div class="mt-6 flow-root">
                <a href="/trash" class="float-left justify-center rounded-md border border-transparent bg-red-400 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Trash
                </a>
                <a href="/note/edit?id=<?= $note['id'] ?>" class="float-right justify-center rounded-md border border-transparent bg-blue-400 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Edit
                </a>
            </div>

        </div>

    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>