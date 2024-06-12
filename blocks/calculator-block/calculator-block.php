<?php

/**
 * Plugin Name: Calculator Block.
 * Description: Business logic of Calculator Block Template.
 */

require __DIR__ . '/vendor/autoload.php';

use KolektywKreatywny\CalculatorBlock\CalculatorTemplate;

$background = get_field('background-color');
$calculatorTemplate = CalculatorTemplate::createTemplate($background);
$calculator = esc_attr(wp_json_encode($calculatorTemplate));

?>

<InnerBlocks template="<?= $calculator; ?>" templateLock="all" />