<?php

// files
include __DIR__ . '/../layouts/public.php';
include dirname(__DIR__,4) . '/src/presentation/views/components/cards/render.php';
include dirname(__DIR__,4) . '/src/presentation/views/components/template/render.php';


// content - start
ob_start();

    // section 1
    renderTemplate(__DIR__ . '/../components/template/hero.php');

    // section 2
    $imageCards = [
        [
            'imageUrl' => 'path/to/image1.jpg',
            'title' => 'Image Card 1 Title',
            'bgColor' => 'one',
            'textColor' => 'text-four',
            'borderColor' => 'border-gray-900',
        ],
        [
            'imageUrl' => 'path/to/image2.jpg',
            'title' => 'Image Card 2 Title',
            'bgColor' => 'bg-white',
            'textColor' => 'text-three',
            'borderColor' => 'border-gray-900',
        ],
        [
            'imageUrl' => 'path/to/image3.jpg',
            'title' => 'Image Card 3 Title',
            'bgColor' => 'bg-white',
            'textColor' => 'text-five',
            'borderColor' => 'border-gray-900',
        ]
    ];

    renderTemplate(dirname(__DIR__,4) . '/src/presentation/views/components/template/cards3.php', [
        'cards' => $imageCards,
        'sectionBgColor' => 'bg-gray-100',
        'sectionHeight' => 'h',
        'cardType' => 'textImg'
    ]);

    // section 3
    $moreImageCards = [
        [
            'imageUrl' => 'path/to/image4.jpg',
            'title' => 'Image Card 3434 Title',
            'bgColor' => 'bg-white',
            'textColor' => 'text-two',
            'borderColor' => 'border-gray-900',
        ],
        [
            'imageUrl' => 'path/to/image5.jpg',
            'title' => 'Image Card 5 Title',
            'bgColor' => 'bg-white',
            'textColor' => 'text-two',
            'borderColor' => 'border-gray-900',
        ],
        [
            'imageUrl' => 'path/to/image6.jpg',
            'title' => 'Image Card 6 Title',
            'bgColor' => 'bg-white',
            'textColor' => 'text-white',
            'borderColor' => 'border-gray-900',
        ]
    ];

    renderTemplate(__DIR__ . '/../components/template/cards3.php', [
        'cards' => $moreImageCards,
        'sectionBgColor' => 'bg-gray-900',
        'sectionHeight' => '',
        'cardType' => 'textImg'
    ]);

// content - end
$content = ob_get_clean();

// render
renderLayout('Homepage', $content);

?>
