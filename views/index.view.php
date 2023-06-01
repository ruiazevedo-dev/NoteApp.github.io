<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>

<main>
    <section>
        <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 md:px-12 lg:px-24 lg:py-24">
            <div class="flex flex-col w-full mb-12 text-center">
                <h1 class="max-w-5xl text-2xl font-bold leading-none tracking-tighter text-neutral-600 md:text-5xl lg:text-6xl lg:max-w-7xl">
                    <?php if (isset($_SESSION['user']['email'])) {
                        echo "Welcome " . $_SESSION['user']['name'] . "</h1>" . "<p class='max-w-xl mx-auto mt-8 text-base leading-relaxed text-center text-gray-500'> Go to the Notes tab to view all your notes. </p>";
                    } else {
                        echo "Welcome to the Notes App" . "</h1>" . "<p class='max-w-xl mx-auto mt-8 text-base leading-relaxed text-center text-gray-500'>Here you can create view update and delete all your notes.</p>" . "<p class='max-w-xl mx-auto mt-2 text-base leading-relaxed text-center text-gray-500'>Login or Register to start.</p>";
                    }  ?>
            </div>
        </div>
    </section>
</main>

<?php require('partials/footer.php') ?>