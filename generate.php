<?php 
require "vendor/autoload.php";

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

$writer = new PngWriter();

$result = Builder::create()
    ->writer(new PngWriter())
    ->writerOptions([])
    // ->data('https://www.youtube.com/watch?v=dQw4w9WgXcQ') //Rick Astley - Youtube
    ->data('https://www.magnocafe.com.mx')
    ->encoding(new Encoding('UTF-8'))
    ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
    ->size(300)
    ->margin(10)
    ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
    // ->logoPath(__DIR__.'/magno_cafe_logo.png')
    // ->labelText('This is the label')
    // ->labelFont(new NotoSans(20))
    // ->labelAlignment(new LabelAlignmentCenter())
    ->build();

// Directly output the QR code
header('Content-Type: '.$result->getMimeType());
echo $result->getString();

// // Save it to a file
$result->saveToFile(__DIR__.'/generated/MagnoCafe-QR-autismo.png');

// // Generate a data URI to include image data inline (i.e. inside an <img> tag)
$dataUri = $result->getDataUri();   