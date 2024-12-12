<?
function renderCard($cardType, $cardData) {
    extract($cardData);
    include __DIR__ . "/../cards/{$cardType}.php";
}
?>
