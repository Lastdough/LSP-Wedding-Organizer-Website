<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Wedding Package</title>
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

    <div class="container mx-auto mt-8">
        <div class="bg-white p-6 rounded shadow-md">
            <h2 class="text-2xl font-bold mb-6">Edit Wedding Package</h2>
            <?php if (isset($error)) : ?>
                <div id="errorPopup" class="fixed bottom-5 right-5 bg-red-500 text-white p-4 rounded-lg shadow-lg z-50">
                    <?= htmlspecialchars($error); ?>
                    <button onclick="document.getElementById('errorPopup').style.display='none'" class="text-lg ml-2">&nbsp;&times;</button>
                </div>
            <?php endif; ?>

            <form id="packageForm" method="POST" action="<?= site_url('admin/package/update?id=' . $package['id']) ?>" enctype="multipart/form-data" novalidate>
                <div class="mb-4">
                    <label for="package_name" class="block text-gray-700 text-sm font-bold mb-2">Package Name:</label>
                    <input type="text" id="package_name" name="package_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required value="<?= old('package_name', $package['package_name']) ?>">
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price (IDR):</label>
                    <input type="number" id="price" name="price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required value="<?= old('price', $package['price']) ?>">
                </div>

                <div class="mb-4">
                    <label for="capacity" class="block text-gray-700 text-sm font-bold mb-2">Capacity:</label>
                    <input type="number" id="capacity" name="capacity" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required value="<?= old('capacity', $package['capacity']) ?>">
                </div>

                <!-- Picture Input -->
                <div class="mb-4">
                    <label for="picture" class="block text-gray-700 text-sm font-bold mb-2">Picture:</label>
                    <input type="file" id="picture" name="picture" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="previewImage();">
                    <!-- Image Preview Container -->
                    <div id="imagePreviewContainer" class="mt-2">
                        <?php if ($package['image']) : ?>
                            <img id="imagePreview" src="data:image/jpeg;base64,<?= base64_encode($package['image']) ?>" alt="Image Preview" class="max-w-xs mt-2" />
                        <?php else : ?>
                            <img id="imagePreview" src="#" alt="Image Preview" class="hidden max-w-xs mt-2" />
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required><?= old('description', $package['description']) ?></textarea>
                </div>

                <!-- Buttons for Draft and Publish -->
                <div class="flex justify-end">
                    <button type="submit" name="status_publish" value="draft" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition-colors mr-2">Save as Draft</button>
                    <button type="submit" name="status_publish" value="publish" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors">Publish</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        setTimeout(function() {
            const errorPopup = document.getElementById('errorPopup');
            if (errorPopup) {
                errorPopup.style.display = 'none';
            }
        }, 3000);

        function previewImage() {
            var preview = document.getElementById('imagePreview');
            var file = document.getElementById('picture').files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                preview.classList.remove('hidden');
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                preview.classList.add('hidden');
            }
        }

        document.getElementById('packageForm').addEventListener('submit', function(event) {
            tinymce.triggerSave();
        });
    </script>
</body>

</html>