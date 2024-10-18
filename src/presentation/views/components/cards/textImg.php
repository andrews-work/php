<!-- cards/textImg.php -->

<div class="overflow-hidden <?php echo $card['bgColor']; ?> border <?php echo $card['borderColor']; ?> rounded-lg shadow-md transition-transform transform hover:scale-105">
    
    <div class="p-4">
        <h3 class="text-lg font-semibold text-center <?php echo $card['textColor']; ?>"><?php echo $title; ?></h3>
    </div>

    <img src="<?php echo $imageUrl; ?>" alt="<?php echo $title; ?>" class="object-cover w-full h-48">
    
</div>