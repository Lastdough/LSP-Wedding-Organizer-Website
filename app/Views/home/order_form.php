<?= $this->extend('home/template/layout') ?>
<?= $this->section('content') ?>

<div class="container mx-auto py-4">
    <h2 class="mb-8 text-3xl font-bold">Order Wedding Package</h2>

    <?php if (session()->has('error')) : ?>
        <div class="relative mb-4 rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline"><?= session('error') ?></span>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('order/submit') ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="package_id" value="<?= $package['id'] ?>">
        <div class="mb-4">
            <label for="package_name" class="mb-2 block text-sm font-bold text-gray-700">Selected Package:</label>
            <select id="package_name" name="package_name" class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none" disabled>
                <option value="<?= htmlspecialchars($package['id']) ?>"><?= htmlspecialchars($package['package_name']) ?></option>
            </select>
        </div>
        <div class="personal-information">
            <h3 class="text-lg font-bold">Personal Information</h3>
            <div class="mb-4">
                <label for="name" class="mb-2 block text-sm font-bold text-gray-700">Your Name:</label>
                <input type="text" id="name" name="name" value="<?= session()->get('name') ?>" class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none" required>
            </div>
            <div class="mb-4">
                <label for="email" class="mb-2 block text-sm font-bold text-gray-700">Email:</label>
                <input type="email" id="email" name="email" class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none" required>
            </div>
            <div class="mb-4">
                <label for="phone_number" class="mb-2 block text-sm font-bold text-gray-700">Phone Number:</label>
                <input type="tel" id="phone_number" name="phone_number" pattern="[0-9]+" inputmode="numeric" class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none" required oninput="validatePhoneNumber(this)">
            </div>
            <div class="mb-4">
                <label for="address" class="mb-2 block text-sm font-bold text-gray-700">Address:</label>
                <input type="text" id="address" name="address" class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none" required>
            </div>
        </div>
        <div class="wedding-detail flex flex-col gap-3">
            <h3 class="text-lg font-bold">Wedding Detail</h3>
            <div class="detail-top flex flex-row gap-4">
                <div class="flex flex-row items-center gap-2">
                    <label for="number_of_guests" class="text-sm font-bold text-gray-700">Number of Guests (max <?= $package['capacity'] ?>):</label>
                    <input type="number" id="number_of_guests" name="number_of_guests" max="<?= $package['capacity'] ?>" class="focus:shadow-outline w-24 appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none" required>
                </div>
                <div class="flex flex-row items-center gap-2">
                    <label for="wedding_date" class="block text-sm font-bold text-gray-700">Wedding Date:</label>
                    <input type="date" id="wedding_date" name="wedding_date" class="focus:shadow-outline w-fit appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none" required>
                </div>
            </div>
            <div class="flex flex-col">
                <label for="notes" class="mb-2 block text-sm font-bold text-gray-700">Additional Notes:</label>
                <textarea id="notes" name="notes" class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"></textarea>
            </div>
        </div>
        <div class="mt-4 flex justify-end">
            <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white transition-colors hover:bg-blue-700">Submit Order</button>
        </div>
    </form>
</div>

<script>
    function validatePhoneNumber(input) {
        input.value = input.value.replace(/[^0-9]/g, '');
    }
</script>

<?= $this->endSection() ?>