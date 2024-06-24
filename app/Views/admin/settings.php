<?= $this->extend('admin/template/dashboard_layout') ?>
<?= $this->section('content') ?>

<div class="container mx-auto py-4">
    <h2 class="text-3xl font-bold mb-8">Settings</h2>

    <?php if (session()->has('message')) : ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline"><?= session('message') ?></span>
        </div>
    <?php endif; ?>

    <?php if (session()->has('error')) : ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline"><?= session('error') ?></span>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('admin/settings/update') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-4">
            <label for="website_name" class="block text-gray-700 text-sm font-bold mb-2">Website Name:</label>
            <input type="text" id="website_name" name="website_name" value="<?= htmlspecialchars($settings['website_name']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="phone_number1" class="block text-gray-700 text-sm font-bold mb-2">Phone Number 1:</label>
            <input type="tel" id="phone_number1" name="phone_number1" value="<?= htmlspecialchars($settings['phone_number1']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="phone_number2" class="block text-gray-700 text-sm font-bold mb-2">Phone Number 2:</label>
            <input type="tel" id="phone_number2" name="phone_number2" value="<?= htmlspecialchars($settings['phone_number2']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="email1" class="block text-gray-700 text-sm font-bold mb-2">Email 1:</label>
            <input type="email" id="email1" name="email1" value="<?= htmlspecialchars($settings['email1']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="email2" class="block text-gray-700 text-sm font-bold mb-2">Email 2:</label>
            <input type="email" id="email2" name="email2" value="<?= htmlspecialchars($settings['email2']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address:</label>
            <textarea id="address" name="address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?= htmlspecialchars($settings['address']) ?></textarea>
        </div>

        <div class="mb-4">
            <label for="maps" class="block text-gray-700 text-sm font-bold mb-2">Maps:</label>
            <textarea id="maps" name="maps" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?= htmlspecialchars($settings['maps']) ?></textarea>
        </div>

        <div class="mb-4">
            <label for="logo" class="block text-gray-700 text-sm font-bold mb-2">Logo URL:</label>
            <input type="text" id="logo" name="logo" value="<?= htmlspecialchars($settings['logo']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="facebook_url" class="block text-gray-700 text-sm font-bold mb-2">Facebook URL:</label>
            <input type="url" id="facebook_url" name="facebook_url" value="<?= htmlspecialchars($settings['facebook_url']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="instagram_url" class="block text-gray-700 text-sm font-bold mb-2">Instagram:</label>
            <input type="text" id="instagram_url" name="instagram_url" value="<?= htmlspecialchars($settings['instagram_url']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="youtube_url" class="block text-gray-700 text-sm font-bold mb-2">YouTube URL:</label>
            <input type="url" id="youtube_url" name="youtube_url" value="<?= htmlspecialchars($settings['youtube_url']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="header_business_hour" class="block text-gray-700 text-sm font-bold mb-2">Header Business Hour:</label>
            <input type="text" id="header_business_hour" name="header_business_hour" value="<?= htmlspecialchars($settings['header_business_hour']) ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="time_business_hour" class="block text-gray-700 text-sm font-bold mb-2">Time Business Hour:</label>
            <textarea id="time_business_hour" name="time_business_hour" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?= htmlspecialchars($settings['time_business_hour']) ?></textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors">Save Changes</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>