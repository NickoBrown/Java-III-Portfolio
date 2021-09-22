<?php
/*
Created with aid from tutorial by github user 'inf123' aka 'Inf Scripts'
At https://gist.github.com/inf123/a1a4d3986731b94bc058
And https://www.infscripts.com/how-to-create-a-bar-chart-in-php
*/


//Create random data and load into associative array
$numbers = array(100);

 for($i = 0; $i < 100; $i++)
 {
     $numbers[$i] = rand(1, 10);
 }

 $data = array_count_values($numbers);

// Image dimensions
$imageWidth = 1400;
$imageHeight = 800;

// Grid dimensions and placement within image
$gridTop = 40; //Top offset
$gridLeft = 50; //Left offset
$gridBottom = 740; //Y dimension
$gridRight = 1350; //X dimension
$gridHeight = $gridBottom - $gridTop;
$gridWidth = $gridRight - $gridLeft;

// Bar width
$barWidth = 120;

// Max value for bars
$yMaxValue = 12;

// Distance between grid lines
$gridLineSeparation = 40;

// Init image
$chart = imagecreate($imageWidth, $imageHeight);

// Set up colors
$backgroundColor = imagecolorallocate($chart, 0, 0, 0);
$axisColor = imagecolorallocate($chart, 85, 85, 85);
$gridColor = imagecolorallocate($chart, 212, 212, 212);
$barColor = imagecolorallocate($chart, 235, 64, 52);
$barColor2 = imagecolorallocate($chart, 0, 212, 32);

imagefill($chart, 0, 0, $backgroundColor);
imagesetthickness($chart, $lineWidth);

//Bars
$barSpacing = $gridWidth / count($data);
$itemX = $gridLeft + $barSpacing / 2;

$colorcount = true;

for($i = 1; $i <= 10; $i++) {

    $x1 = $itemX - $barWidth / 2;
    $y1 = $gridBottom - $data[$i] / $yMaxValue * $gridHeight;
    $x2 = $itemX + $barWidth / 2;
    $y2 = $gridBottom - 1;
    $colorToUse = $colorcount? $barColor : $barColor2;
    imagefilledrectangle($chart, $x1, $y1, $x2, $y2, $colorToUse);
    $colorcount = !$colorcount;

    $itemX += $barSpacing;
}

//Output
header('Content-Type: image/png');
imagepng($chart);

?>