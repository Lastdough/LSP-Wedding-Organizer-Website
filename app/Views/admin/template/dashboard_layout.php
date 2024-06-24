<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/uylud4u1jsb5qj6yu5s2w33twij11lpjevd75rdgj4nv2x6i/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#description',
            height: 290,
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            setup: function(editor) {
                editor.on('change', function() {
                    tinymce.triggerSave();
                });
            }
        });
    </script>
    <link rel="stylesheet" href="<?= base_url('assets/css/output.css') ?>">
</head>

<body class="bg-gray-200">

    <nav class="bg-white p-4 shadow">
        <div class="container mx-auto flex justify-between">
            <a href="<?= site_url('admin/dashboard') ?>" aria-label="Dashboard" class="relative flex items-center space-x-4 text-black">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-240v-32q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v32q0 33-23.5 56.5T720-160H240q-33 0-56.5-23.5T160-240Z" />
                </svg>
                <h2 class="text-2xl font-bold">Welcome! <?= $adminName ?></h2>
            </a>
            <div class="flex space-x-2">
                <a href="<?= site_url('/') ?>" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors">Homepage</a>
                <a href="<?= site_url('admin/package') ?>" class="inline-block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700 transition-colors">Manage Package</a>
                <a href="<?= site_url('admin/orders') ?>" class="inline-block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700 transition-colors">Manage Orders</a>
                <a href="<?= site_url('admin/settings') ?>" class="inline-block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700 transition-colors">Manage About</a>
                <a href="<?= site_url('admin/logout') ?>" class="inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition-colors">Log Out</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto my-4">
        <div class="bg-white p-6 rounded shadow-md">
            <?php if (!empty($message)) : ?>
                <div id="messagePopup" class="fixed bottom-5 right-5 bg-green-500 text-white p-4 rounded-lg shadow-lg z-50">
                    <?= htmlspecialchars($message); ?>
                    <button onclick="document.getElementById('messagePopup').style.display='none'" class="float-right">&nbsp;&times;</button>
                </div>
            <?php endif; ?>
            <?php if (!empty($error)) : ?>
                <div id="errorPopup" class="fixed bottom-5 right-5 bg-red-500 text-white p-4 rounded-lg shadow-lg z-50">
                    <?= htmlspecialchars($error); ?>
                    <button onclick="document.getElementById('errorPopup').style.display='none'" class="float-right">&nbsp;&times;</button>
                </div>
            <?php endif; ?>
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <script>
        window.onload = () => {
            const messagePopup = document.getElementById('messagePopup');
            if (messagePopup) {
                setTimeout(() => {
                    messagePopup.style.display = 'none';
                }, 3000);
            }
            const errorPopup = document.getElementById('errorPopup');
            if (errorPopup) {
                setTimeout(() => {
                    errorPopup.style.display = 'none';
                }, 3000);
            }
        };

        document.getElementById('searchInput')?.addEventListener('input', function() {
            const searchQuery = this.value.toLowerCase();
            const rows = document.querySelectorAll('table tbody tr');

            rows.forEach((row) => {
                const title = row.querySelector('td:first-child').textContent.toLowerCase();
                if (title.includes(searchQuery)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>

</body>

</html>