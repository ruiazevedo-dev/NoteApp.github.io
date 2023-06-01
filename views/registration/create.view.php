<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<!-- <main>
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Register for a new
                    account</h2>
            </div>

            <form class="mt-8 space-y-6" action="/register" method="POST">
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="email" class="sr-only">Email address</label>
                        <input id="email" name="email" type="email" autocomplete="email" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Email address">
                    </div>

                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Password">
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Register
                    </button>
                </div>

                <ul>
                    <?php if (isset($errors['email'])) : ?>
                        <li class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></li>
                    <?php endif; ?>

                    <?php if (isset($errors['password'])) : ?>
                        <li class="text-red-500 text-xs mt-2"><?= $errors['password'] ?></li>
                    <?php endif; ?>
                </ul>
            </form>
        </div>
    </div>
</main> -->
<main>
    <form class="p-4 max-w-md mx-auto bg-white border-t-8 border-indigo-700 mt-10 rounded" action="/register" method="POST">
        <h1 class="font-medium text-3xl text-center py-4 text-gray-800">Create a new account</h1>
        <label class="font-medium block mb-1 mt-6 text-gray-700" for="name">
            Name
        </label>
        <input class="appearance-none border-2 rounded w-full py-3 px-3 leading-tight border-gray-300 bg-gray-100 focus:outline-none focus:border-indigo-700 focus:bg-white text-gray-700 pr-16 font-mono" id="name" name="name" type="text" autocomplete="name" required />
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
            <?php if (isset($errors['name'])) : ?>
                <li class="text-red-500 text-xs mt-2"><?= $errors['name'] ?></li>
            <?php endif; ?>
            <?php if (isset($errors['email'])) : ?>
                <li class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></li>
            <?php endif; ?>

            <?php if (isset($errors['password'])) : ?>
                <li class="text-red-500 text-xs mt-2"><?= $errors['password'] ?></li>
            <?php endif; ?>
            <?php if (isset($errors['user'])) : ?>
                <li class="text-red-500 text-xs mt-2"><?= $errors['user'] ?></li>
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