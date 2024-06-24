<?= $this->extend('home/template/layout') ?>
<?= $this->section('content') ?>

<div class="container mx-auto py-16">
    <h2 class="text-3xl font-bold mb-8">Wedding Packages</h2>
    <div class="flex flex-col gap-8">
        <?php foreach ($packages as $package) : ?>
            <div class="flex flex-col p-6 bg-white rounded shadow gap-4">
                <img src="data:image/jpeg;base64,<?= base64_encode($package['image']) ?>" alt="Package Image" class="w-full h-48 object-cover rounded">
                <div class="flex flex-col gap-2">
                    <h3 class="text-2xl font-bold mt-4"><?= htmlspecialchars($package['package_name']) ?></h3>
                    <span class="text-lg font-bold">IDR <?= number_format($package['price'], 0, ',', '.') ?></span>
                    <span class="text-lg">Capacity: <?= htmlspecialchars($package['capacity']) ?> guests</span>
                </div>
                <button onclick="location.href='<?= site_url('package/view?id=' . $package['id']) ?>'" type="button" class=" bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition w-fit self-end">
                    View Details
                </button>
            </div>

        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>