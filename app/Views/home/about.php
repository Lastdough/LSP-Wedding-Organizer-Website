<?= $this->extend('home/template/layout') ?>
<?= $this->section('content') ?>

<div class="container mx-auto py-4">
    <h2 class="text-3xl font-bold mb-8">About Us</h2>
    <p class="text-lg">
        Welcome to our Wedding Organizer website. We are dedicated to helping you plan your perfect wedding.
        Our services include a variety of packages to suit your needs, and our team is here to assist you every step of the way.
    </p>
    <p class="text-lg mt-4">
        For more information, please contact us using the details provided below.
    </p>

    <div class="mt-8">
        <h3 class="text-2xl font-semibold" id="contact">Contact Information</h3>
        <p class="mt-2"><strong>Phone:</strong> <?= htmlspecialchars($settings['phone_number1']) ?></p>
        <p class="mt-2"><strong>Email:</strong> <?= htmlspecialchars($settings['email1']) ?></p>
        <p class="mt-2"><strong>Address:</strong> <?= htmlspecialchars($settings['address']) ?></p>
        <?php if (!empty($settings['maps'])) : ?>
            <div class="mt-4">
                <iframe src="<?= htmlspecialchars($settings['maps']) ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        <?php endif; ?>
    </div>

    <div class="mt-8">
        <h3 class="text-2xl font-semibold">Follow Us</h3>
        <?php if (!empty($settings['facebook_url'])) : ?>
            <p class="mt-2"><strong>Facebook:</strong> <a href="<?= htmlspecialchars($settings['facebook_url']) ?>" target="_blank"><?= htmlspecialchars($settings['facebook_url']) ?></a></p>
        <?php endif; ?>
        <?php if (!empty($settings['instagram_url'])) : ?>
            <p class="mt-2"><strong>Instagram:</strong> <a href="<?= htmlspecialchars($settings['instagram_url']) ?>" target="_blank"><?= htmlspecialchars($settings['instagram_url']) ?></a></p>
        <?php endif; ?>
        <?php if (!empty($settings['youtube_url'])) : ?>
            <p class="mt-2"><strong>YouTube:</strong> <a href="<?= htmlspecialchars($settings['youtube_url']) ?>" target="_blank"><?= htmlspecialchars($settings['youtube_url']) ?></a></p>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>