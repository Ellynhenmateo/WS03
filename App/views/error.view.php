<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>
<?php loadPartial('top-banner'); ?>

<section>
    <div class="container mx-auto p-4 mt-4">
        <div class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">
            <?php echo $status; ?>
        </div>
        <div class="text-center text-lg text-gray-700 mb-6">
            <?php echo $message; ?>
        </div>
</section>

<?= LoadPartial('bottom-banner') ?>
<?= LoadPartial('footer') ?>