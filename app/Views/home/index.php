<?= $this->extend('home/template/layout') ?>
<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="bg-cover bg-center h-screen" style="background-image: url('<?= base_url('assets/images/hero.jpg') ?>');">
    <div class="container h-full flex items-center justify-center flex-col gap-10">
        <div class="text-center text-white">
            <h1 class="text-5xl font-bold">Make Your Dream Wedding Come True</h1>
            <p class="text-xl">We organize the wedding of your dreams</p>
        </div>
        <button onclick="location.href='<?= site_url('/packages') ?>'" type="button" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
            Get Started
        </button>
    </div>
</section>
<?= $this->endSection() ?>