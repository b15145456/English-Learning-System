<?php
require_once '../vendor/autoload.php';

// urls of your images
$img1 = 'https://cloud.githubusercontent.com/assets/15679329/10983577/c17a3948-8413-11e5-9f6b-9058712cb2ef.gif';
$img2 = 'https://cloud.githubusercontent.com/assets/15679329/10983576/c178cc20-8413-11e5-8bce-df569e90a92d.jpg';

// saving images
file_put_contents('img1.gif', file_get_contents($img1));
file_put_contents('img2.jpg', file_get_contents($img2));

$text1 = (new TesseractOCR('img1.gif'))
    ->run();

// i needed to grab the correct language first, with
// sudo apt-get install-tesseract-ocr-fra
$text2 = (new TesseractOCR('img2.jpg'))
    ->run();

echo $text1, PHP_EOL, $text2, PHP_EOL;
?>