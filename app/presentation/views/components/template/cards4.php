<section class="p-6 bg-gray-100 card3-container">
    <div class="w-5/6 mx-auto">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($cards4 as $card): ?>
                <div>
                    <?php
                        $imageUrl = $card['imageUrl'];
                        $title = $card['title'];
                        include __DIR__ . '/../cards/card3.php';
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
