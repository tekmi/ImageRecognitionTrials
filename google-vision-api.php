<?php

// run GOOGLE_APPLICATION_CREDENTIALS=/Users/tekmi/PhpstormProjects/ImageRecognitionTrials/Tekmi-78f3ab836bb3.json php google-vision-api.php

require 'vendor/autoload.php';

use Google\Cloud\Vision\VisionClient;

date_default_timezone_set('Europe/Amsterdam');

$projectId = 'tekmi-1189';
$path = __DIR__ . '/screen-feed.PNG';

$vision = new VisionClient([
    'projectId' => $projectId,
]);


$image = $vision->image(file_get_contents($path), ['TEXT_DETECTION']);
$result = $vision->annotate($image);

//var_dump($result);

print "Texts:\n";
foreach ((array) $result->text() as $key => $text) {
    print "$key: " . $text->description() . PHP_EOL;
}