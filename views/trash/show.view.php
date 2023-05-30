<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>
<?php require base_path('views/partials/modal_delete.php') ?>
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
                <button type="button" onclick="document.getElementById('id01').style.display='block'" class="mr-2 float-right justify-center rounded-md border border-transparent bg-red-800 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Delete Note
                </button>

                <div id="id01" class="modal">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                    <form class="modal-content" action="/action_page.php">
                        <div class="container">
                            <h1>Delete Note</h1>
                            <p>Are you sure you want to delete the note? This cannot be undone!</p>

                            <div class="clearfix">
                                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                <button type="button" onclick="document.querySelector('#delete-form').submit()" class="deletebtn">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>

                <form id="restore-form" class="hidden" method="POST" action="/trash">
                    <input type="hidden" name="_method" value="RESTORE">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                </form>
                <form id="delete-form" class="hidden" method="POST" action="/trash">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                </form>

                <script>
                    // Get the modal
                    var modal = document.getElementById('id01');

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>