<?

// Include the layout and class files
require_once __DIR__ . '/../layouts/public.php';

use framework\presentation\views\template\columns;
use framework\presentation\views\components\cards\Cards;

// Instantiate the Cards class
$cards = new Cards();

// Content - start
ob_start();

    // use template
    $template = new columns();

    // section 2
    $sectionHeight2 = 'h-full';
    $sectionBgColor2 = 'bg-gray-900';
    $content2 = [
        $cards->renderCard('textImg', [
            'bgColor' => 'bg-gray-900',
            'borderColor' => 'border-blue-200',
            'textColor' => 'text-white',
            'title' => 'Sample Title',
            'imageUrl' => 'path/to/image.jpg',
        ]),
        $cards->renderCard('textImg', [
            'bgColor' => 'bg-gray-900',
            'borderColor' => 'border-blue-500',
            'textColor' => 'text-white',
            'title' => 'Sample Title',
            'imageUrl' => 'path/to/image.jpg',
        ]),
    ];
    $template->renderSection2Col($sectionHeight2, $sectionBgColor2, $content2);

    // section 1
    $sectionHeight1 = 'h-5/6';
    $sectionBgColor1 = 'bg-gray-100';
    $content1 = [
        $cards->renderCard('imgText', [
            'imageUrl' => 'path/to/image.jpg',
            'title' => 'Sample Title',
        ]),
        $cards->renderCard('imgText', [
            'imageUrl' => 'path/to/image.jpg',
            'title' => 'Sample Title',
        ]),
        $cards->renderCard('imgText', [
            'imageUrl' => 'path/to/image.jpg',
            'title' => 'Sample Title',
        ]),
    ];
    $template->renderSection3Col($sectionHeight1, $sectionBgColor1, $content1);

    // section 3
    $sectionHeight3 = 'h-3/4';
    $sectionBgColor3 = 'bg-gray-900';
    $content3 = [
        $cards->renderCard('text', [
            'header' => 'Sample Header',
            'body' => 'This is the body of the card.',
            'footer' => 'This is the footer of the card.',
        ]),
        $cards->renderCard('text', [
            'header' => 'Sample Header',
            'body' => 'This is the body of the card.',
            'footer' => 'This is the footer of the card.',
        ]),
        $cards->renderCard('text', [
            'header' => 'Sample Header',
            'body' => 'This is the body of the card.',
            'footer' => 'This is the footer of the card.',
        ]),
        $cards->renderCard('text', [
            'header' => 'Sample Header',
            'body' => 'This is the body of the card.',
            'footer' => 'This is the footer of the card.',
        ]),
    ];
    $template->renderSection4Col($sectionHeight3, $sectionBgColor3, $content3);

// Content - end
$content = ob_get_clean();

// Render
renderLayout('Contact', $content);

?>
