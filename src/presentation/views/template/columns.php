<?php

namespace framework\presentation\views\template;

class columns {
    public function renderSection1Col($sectionHeight, $sectionBgColor, $content) {
        $this->renderSection($sectionHeight, $sectionBgColor, $content, 1);
    }

    public function renderSection2Col($sectionHeight, $sectionBgColor, $content) {
        $this->renderSection($sectionHeight, $sectionBgColor, $content, 2);
    }

    public function renderSection3Col($sectionHeight, $sectionBgColor, $content) {
        $this->renderSection($sectionHeight, $sectionBgColor, $content, 3);
    }

    public function renderSection4Col($sectionHeight, $sectionBgColor, $content) {
        $this->renderSection($sectionHeight, $sectionBgColor, $content, 4);
    }

    private function renderSection($sectionHeight, $sectionBgColor, $content, $columns) {
        $gridClasses = [
            '1' => 'grid-cols-1',
            '2' => 'md:grid-cols-2',
            '3' => 'lg:grid-cols-3',
            '4' => 'lg:grid-cols-4',
        ];

        $gridClass = $gridClasses[$columns] ?? 'grid-cols-1';

        echo "<section class=\"{$sectionHeight} {$sectionBgColor} card3-container py-10vh flex items-center justify-center h-full\">";
            echo "<div class=\"w-5/6 mx-auto h-full\">";
                echo "<div class=\"grid grid-cols-1 gap-6 {$gridClass} items-center justify-center h-full\">";

                    foreach ($content as $item) {
                        echo "<a class=\"flex items-center justify-center border p-4 h-full\">";
                            echo $item;
                        echo "</a>";
                    }

                echo "</div>";
            echo "</div>";
        echo "</section>";
    }
}
