<?php

// Include the layout and class files
require_once __DIR__ . '/../layouts/public.php';

use framework\presentation\views\template\columns;

// Content - start
ob_start();

    // section 1
    include __DIR__ . '/../components/template/hero.php';

    // use template
    $template = new columns();

    // section 2
    $sectionHeight2 = 'h-full';
    $sectionBgColor2 = 'bg-white-100';
    $content2 = [
        '<div>Card 4 Content</div>',
        '<div>Card 5 Content</div>',
    ];
    $template->renderSection2Col($sectionHeight2, $sectionBgColor2, $content2);

    // section 1
    $sectionHeight1 = 'h-5/6';
    $sectionBgColor1 = 'bg-red-700';
    $content1 = [
        '<div>Card 1 Content</div>',
        '<div>Card 2 Content</div>',
        '<div>Card 3 Content</div>',
    ];
    $template->renderSection3Col($sectionHeight1, $sectionBgColor1, $content1);

    // section 3
    $sectionHeight3 = 'h-3/4';
    $sectionBgColor3 = 'bg-white-100';
    $content3 = [
        '<div>Card 6 Content</div>',
        '<div>Card 7 Content</div>',
        '<div>Card 8 Content</div>',
        '<div>Card 9 Content</div>',
    ];
    $template->renderSection4Col($sectionHeight3, $sectionBgColor3, $content3);

// Content - end
$content = ob_get_clean();

// Render
renderLayout('Home', $content);

?>
