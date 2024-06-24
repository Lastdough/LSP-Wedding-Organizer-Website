<?= $this->extend('home/template/layout') ?>
<?= $this->section('content') ?>

<div class="container mx-auto py-16">
    <div class="flex flex-col md:flex-row items-center md:space-x-8">
        <img src="data:image/jpeg;base64,<?= base64_encode($package['image']) ?>" alt="Package Image" class="w-full md:w-1/2 h-64 object-cover rounded">
        <div class="flex flex-col mt-8 md:mt-0 md:w-1/2 gap-2">
            <h2 class="text-3xl font-bold"><?= htmlspecialchars($package['package_name']) ?></h2>
            <div class="description-content max-w-none mt-4">
                <?= $package['description'] ?>
            </div>
            <p class="text-lg font-bold">IDR <?= number_format($package['price'], 0, ',', '.') ?></p>
            <p class="text-lg">Capacity: <?= htmlspecialchars($package['capacity']) ?> guests</p>
            <button onclick="location.href='<?= site_url('order/form?id=' . $package['id']) ?>'" type="button" class=" bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                Order This Package
            </button>
        </div>
    </div>
</div>

<?= $this->endSection() ?>