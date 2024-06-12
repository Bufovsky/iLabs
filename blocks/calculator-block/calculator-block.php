<?php

/**
 * Plugin Name: Calculator Block.
 * Description: Business logic of Calculator Block Template.
 */

require __DIR__ . '/vendor/autoload.php';

use KolektywKreatywny\CalculatorBlock\CalculatorTemplate;
use KolektywKreatywny\CalculatorBlock\DataStorage;

$background = get_field('background-color');
$calculatorTemplate = CalculatorTemplate::createTemplate($background);
$calculator = esc_attr(wp_json_encode($calculatorTemplate));

$dataFile = 'calculations.csv';
$dataStorage = new DataStorage();
$dataStorage->setFile($dataFile)->store();
$dataTemplate = $dataStorage->getData();
$data = esc_attr(wp_json_encode($dataTemplate));

?>

<InnerBlocks template="<?= $calculator; ?>" templateLock="all" />

<?php print_r($dataTemplate); ?>