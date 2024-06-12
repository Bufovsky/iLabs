<?php

namespace KolektywKreatywny\CalculatorBlock;

class CalculatorTemplate
{
    public static function createTemplate(string $background): array
    {
        $template = [
            [
                'core/columns',
                [
                    'className' => 'calculator',
                    'style' => [
                        'backgroundColor' => $background,
                    ]
                ],
                [
                    [
                        ['core/column', ['className' => 'calculator__calculations']],
                        ['core/column', ['className' => 'calculator__result']],
                        [
                            'core/column',
                            ['className' => 'calculator__buttonRow'],
                            [
                                ['core/column', ['className' => 'calculator__buttonRow__button calculator__buttonRow__button--cancel button_cancel']],
                                ['core/column', ['className' => 'calculator__buttonRow__button button_save']],
                                ['core/column', ['className' => 'calculator__buttonRow__button calculator__buttonRow__button--disabled']],
                                ['core/column', ['className' => 'calculator__buttonRow__button calculator__buttonRow__button--action button_division']],
                                ['core/column', ['className' => 'calculator__buttonRow__button button_7']],
                                ['core/column', ['className' => 'calculator__buttonRow__button button_8']],
                                ['core/column', ['className' => 'calculator__buttonRow__button button_9']],
                                ['core/column', ['className' => 'calculator__buttonRow__button calculator__buttonRow__button--action button_multiply']],
                                ['core/column', ['className' => 'calculator__buttonRow__button button_4']],
                                ['core/column', ['className' => 'calculator__buttonRow__button button_5']],
                                ['core/column', ['className' => 'calculator__buttonRow__button button_6']],
                                ['core/column', ['className' => 'calculator__buttonRow__button calculator__buttonRow__button--action button_subtraction']],
                                ['core/column', ['className' => 'calculator__buttonRow__button button_1']],
                                ['core/column', ['className' => 'calculator__buttonRow__button button_2']],
                                ['core/column', ['className' => 'calculator__buttonRow__button button_3']],
                                ['core/column', ['className' => 'calculator__buttonRow__button calculator__buttonRow__button--action button_addition']],
                                ['core/column', ['className' => 'calculator__buttonRow__button calculator__buttonRow__button--disabled']],
                                ['core/column', ['className' => 'calculator__buttonRow__button button_0']],
                                ['core/column', ['className' => 'calculator__buttonRow__button calculator__buttonRow__button--disabled']],
                                ['core/column', ['className' => 'calculator__buttonRow__button calculator__buttonRow__button--action calculator__buttonRow__button--result button_result']],
                            ]
                        ]
                    ]
                ]
            ]
        ];

        return $template;
    }
}