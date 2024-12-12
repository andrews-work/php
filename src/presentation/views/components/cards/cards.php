<?

namespace framework\presentation\views\components\cards;

class Cards
{
    public function renderCard($cardType, $card)
    {
        ob_start();
        switch ($cardType) {
            case 'imgText':
                $this->renderImgTextCard($card);
                break;
            case 'textImg':
                $this->renderTextImgCard($card);
                break;
            case 'text':
                $this->renderTextCard($card);
                break;
            default:
                echo 'Unknown card type';
        }
        return ob_get_clean();
    }

    private function renderImgTextCard($card)
    {
        // Render imgText card
        echo '<div class="overflow-hidden bg-white rounded-lg shadow-md">';

            echo '<img src="' . htmlspecialchars($card['imageUrl']) . '" alt="' . htmlspecialchars($card['title']) . '" class="object-cover w-full h-48">';
            
            echo '<div class="p-4">';
                echo '<h3 class="text-lg font-semibold text-gray-800">' . htmlspecialchars($card['title']) . '</h3>';
            echo '</div>';
            
        echo '</div>';
    }

    private function renderTextImgCard($card)
    {
        // Render textImg card
        echo '<div class="overflow-hidden ' . htmlspecialchars($card['bgColor']) . ' border ' . htmlspecialchars($card['borderColor']) . ' rounded-lg shadow-md transition-transform transform hover:scale-105">';

            echo '<div class="p-4">';
                echo '<h3 class="text-lg font-semibold text-center ' . htmlspecialchars($card['textColor']) . '">' . htmlspecialchars($card['title']) . '</h3>';
            echo '</div>';

            echo '<img src="' . htmlspecialchars($card['imageUrl']) . '" alt="' . htmlspecialchars($card['title']) . '" class="object-cover w-full h-48">';
            
        echo '</div>';
    }

    private function renderTextCard($card)
    {
        // Render text card
        echo '<div class="overflow-hidden bg-white rounded-lg shadow-md">';

            // Header
            echo '<div class="p-4">';
                echo '<h3 class="text-lg font-semibold text-gray-800">' . htmlspecialchars($card['header']) . '</h3>';
            echo '</div>';

            // Body
            echo '<div class="p-4">';
                echo '<p class="text-gray-600">' . htmlspecialchars($card['body']) . '</p>';
            echo '</div>';

            // Footer
            echo '<div class="p-4 border-t">';
                echo '<small class="text-gray-500">' . htmlspecialchars($card['footer']) . '</small>';
            echo '</div>';

        echo '</div>';
    }
}
