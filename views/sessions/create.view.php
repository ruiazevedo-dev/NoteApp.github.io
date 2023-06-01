<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<main>
    <form class="p-4 max-w-md mx-auto bg-white border-t-8 border-indigo-700 mt-10 rounded" action="/sessions" method="POST">
        <h1 class="font-medium text-3xl text-center py-4 text-gray-800">Log in to create notes</h1>
        <label class="font-medium block mb-1 mt-6 text-gray-700" for="email">
            Email
        </label>
        <input class="appearance-none border-2 rounded w-full py-3 px-3 leading-tight border-gray-300 bg-gray-100 focus:outline-none focus:border-indigo-700 focus:bg-white text-gray-700 pr-16 font-mono" id="email" name="email" type="email" autocomplete="email" required />

        <label class="font-medium block mb-1 mt-6 text-gray-700" for="password">
            Password
        </label>
        <div class="relative w-full">
            <div class="absolute inset-y-0 right-0 flex items-center px-2">
                <input class="hidden js-password-toggle" id="toggle" type="checkbox" />
                <label class="bg-gray-300 hover:bg-gray-400 rounded px-2 py-1 text-sm text-gray-600 font-mono cursor-pointer js-password-label" for="toggle">show</label>
            </div>
            <input class="appearance-none border-2 rounded w-full py-3 px-3 leading-tight border-gray-300 bg-gray-100 focus:outline-none focus:border-indigo-700 focus:bg-white text-gray-700 pr-16 font-mono js-password" name="password" id="password" type="password" autocomplete="off" />
        </div>
        <ul>
            <?php if (isset($errors['email'])) : ?>
                <li class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></li>
            <?php endif; ?>

            <?php if (isset($errors['password'])) : ?>
                <li class="text-red-500 text-xs mt-2"><?= $errors['password'] ?></li>
            <?php endif; ?>
        </ul>
        <button class="w-full bg-indigo-700 hover:bg-indigo-900 text-white font-medium py-3 px-4 mt-10 rounded focus:outline-none focus:shadow-outline" type="submit">
            Log in
        </button>

    </form>
</main>
<script>
    const passwordToggle = document.querySelector('.js-password-toggle')

    passwordToggle.addEventListener('change', function() {
        const password = document.querySelector('.js-password'),
            passwordLabel = document.querySelector('.js-password-label')

        if (password.type === 'password') {
            password.type = 'text'
            passwordLabel.innerHTML = 'hide'
        } else {
            password.type = 'password'
            passwordLabel.innerHTML = 'show'
        }

        password.focus()
    })
</script>
<?php require base_path('views/partials/footer.php') ?>