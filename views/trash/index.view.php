<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>

    <div class="mt-6">
        <div class="px-4 sm:px-8 max-w-3xl m-auto">
            <ul class="border border-gray-200 rounded overflow-hidden shadow-md">
                <?php foreach ($notes as $note) : ?>
                    <li class="px-4 py-2 text-slate-900 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                        <a href="/trashed?id=<?= $note['id'] ?>">
                            <?= htmlspecialchars($note['excerpt']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>