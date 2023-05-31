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
                <button type="button" onclick="document.querySelector('#restore-form').submit()" class="float-left justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Restore Note
                </button>
                <button type="button" id="delete-btn" class="mr-2 float-right justify-center rounded-md border border-transparent bg-red-800 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Delete Note
                </button>


                <div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center" id="overlay">
                    <div class="bg-gray-200 max-w-sm py-2 px-3 rounded shadow-xl text-gray-800">
                        <div class="flex justify-between items-center">
                            <h4 class="text-lg font-bold">Delete Note?</h4>
                            <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="mt-2 text-sm">
                            <p>Are you sure you want to delete the note? This cannot be undone!</p>
                        </div>
                        <div class="mt-3 flex justify-end space-x-3">
                            <button class="px-3 py-1 rounded hover:bg-red-300 hover:bg-opacity-50 hover:text-red-900" id="cancelBtn">Cancel</button>
                            <button class="px-3 py-1 bg-red-800 text-gray-200 hover:bg-red-600 rounded" onclick="document.querySelector('#delete-form').submit()" id="deleteBtn">Delete</button>
                        </div>
                    </div>
                </div>

                <script>
                    window.addEventListener('DOMContentLoaded', () => {

                        const overlay = document.querySelector('#overlay')
                        const closeBtn = document.querySelector('#close-modal')
                        const openModal = document.querySelector('#delete-btn')
                        const cancelBtn = document.querySelector('#cancelBtn')

                        const toggleModal = () => {
                            overlay.classList.toggle('hidden')
                            overlay.classList.toggle('flex')
                        }

                        closeBtn.addEventListener('click', toggleModal);
                        openModal.addEventListener('click', toggleModal);
                        cancelBtn.addEventListener('click', toggleModal);
                    })
                </script>

                <form id="restore-form" class="hidden" method="POST" action="/trash">
                    <input type="hidden" name="_method" value="RESTORE">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                </form>
                <form id="delete-form" class="hidden" method="POST" action="/trash">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                </form>

            </div>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>