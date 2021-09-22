<?php
/*
 * Chart data
 */

require("connect.php");

$result = $conn->query("SELECT `Title`, `Score` FROM `Movies_DVDs` WHERE `Score` ORDER BY `Score` ASC;")->fetchAll(PDO::FETCH_ASSOC);

            $data = array();

            for($i = 0; $i < 10; $i++){
                $data += array($result[$i]['Title'] => $result[$i]['Score']);
            }
            
        



/*
 * Chart settings and create image
 */

// Image dimensions
$imageWidth = 1800;
$imageHeight = 900;

// Grid dimensions and placement within image
$gridTop = 40;
$gridLeft = 50;
$gridBottom = 900 - 40;
$gridRight = 1800 - 50;
$gridHeight = $gridBottom - $gridTop;
$gridWidth = $gridRight - $gridLeft;

// Bar and line width
$lineWidth = 1;
$barWidth = 120;

// Font settings
$font = '/var/www/30032159//Project/OpenSans-Regular.ttf';
$fontSize = 10;

// Margin between label and axis
$labelMargin = 8;

// Max value on y-axis
$yMaxValue = 100;

// Distance between grid lines on y-axis
$yLabelSpan = 40;

// Init image
$chart = imagecreate($imageWidth, $imageHeight);

// Setup colors
$backgroundColor = imagecolorallocate($chart, 255, 255, 255);
$axisColor = imagecolorallocate($chart, 85, 85, 85);
$labelColor = $axisColor;
$gridColor = imagecolorallocate($chart, 212, 212, 212);
$barColor = imagecolorallocate($chart, 47, 133, 217);
$barColor2 = imagecolorallocate($chart, 100, 15, 217);

imagefill($chart, 0, 0, $backgroundColor);

imagesetthickness($chart, $lineWidth);

/*
 * Print grid lines bottom up
 */

for($i = 0; $i <= $yMaxValue; $i += $yLabelSpan) {
    $y = $gridBottom - $i * $gridHeight / $yMaxValue;

    // draw the line
    imageline($chart, $gridLeft, $y, $gridRight, $y, $gridColor);

    // draw right aligned label
    $labelBox = imagettfbbox($fontSize, 0, $font, strval($i));
    $labelWidth = $labelBox[4] - $labelBox[0];

    $labelX = $gridLeft - $labelWidth - $labelMargin;
    $labelY = $y + $fontSize / 2;

    imagettftext($chart, $fontSize, 0, $labelX, $labelY, $labelColor, $font, strval($i));
}

/*
 * Draw x- and y-axis
 */

imageline($chart, $gridLeft, $gridTop, $gridLeft, $gridBottom, $axisColor);
imageline($chart, $gridLeft, $gridBottom, $gridRight, $gridBottom, $axisColor);

/*
 * Draw the bars with labels
 */

$barSpacing = $gridWidth / count($data);
$itemX = $gridLeft + $barSpacing / 2;

$colorToFill = $barColor2;

foreach($data as $key => $value) {
    // Draw the bar
    $x1 = $itemX - $barWidth / 2;
    $y1 = $gridBottom - $value / $yMaxValue * $gridHeight;
    $x2 = $itemX + $barWidth / 2;
    $y2 = $gridBottom - 1;

    $colorToFill = (($colorToFill == $barColor) ? $barColor2 : $barColor);
    imagefilledrectangle($chart, $x1, $y1, $x2, $y2, $colorToFill);
    

    // Draw the label
    $labelBox = imagettfbbox($fontSize, 0, $font, $key);
    $labelWidth = $labelBox[4] - $labelBox[0];

    $labelX = $itemX - $labelWidth / 2;
    $labelY = $gridBottom + $labelMargin + $fontSize;

    imagettftext($chart, $fontSize, 0, $labelX, $labelY, $labelColor, $font, $key);

    $itemX += $barSpacing;
}

/*
 * Output image to browser
 */

header('Content-Type: image/png');
imagepng($chart);

/*
 * Output image to file
 */

imagepng($chart, 'chart.png');

