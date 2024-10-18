<section class="<?php echo $sectionHeight; ?> <?php echo $sectionBgColor; ?> card3-container py-10vh">
    <div class="w-5/6 mx-auto">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($cards as $card): ?>
                <a>
                    <?php renderCard($cardType, $card); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
