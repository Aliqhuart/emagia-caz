<?php

namespace Emagia\Traits;

use TypeError;

/**
 * Trait TestValueProvider
 *
 * @package Emagia\Traits
 */
trait TestValueProvider
{
    /**
     * @return array
     */
    public function provideForTestInt(): array
    {
        return [
            'case numbers 1' => [
                3455,
                3455,
            ],
            'case numbers 2' => [
                03522,
                1874,
            ],
            'case numbers 3' => [
                -8.9333,
                -8,
            ],
            'case numbers 4' => [
                1e02,
                100,
            ],
            'case numbers 5' => [
                1E02,
                100,
            ],
            'case numbers 6' => [
                0xfd343422,
                4248056866,
            ],
            'case numbers 7' => [
                -0.0,
                -0,
            ],

            'case numbers 8'  => [
                '3455',
                3455,
            ],
            'case numbers 9'  => [
                '03522',
                3522,
            ],
            'case numbers 10' => [
                '-8.9333',
                -8,
            ],
            'case numbers 11' => [
                '1e02',
                100,
            ],
            'case numbers 12' => [
                '1E02',
                100,
            ],

            'case numbers 14' => [
                '-0.0',
                -0,
            ],
        ];
    }

    /**
     * @return array
     */
    public function provideForTestExceptionInt(): array
    {
        return [
            'case null'                          => [
                null,
                TypeError::class,
            ],
        ];
    }

    /**
     * @return array
     */
    public function provideForTestFloat(): array
    {
        return [
            'case numbers 1' => [
                3455,
                3455.0,
            ],
            'case numbers 2' => [
                03522,
                1874.0,
            ],
            'case numbers 3' => [
                -8.9333,
                -8.9333,
            ],
            'case numbers 4' => [
                1e02,
                100.0,
            ],
            'case numbers 5' => [
                1E02,
                100.0,
            ],
            'case numbers 6' => [
                0xfd343422,
                4248056866.0,
            ],
            'case numbers 7' => [
                -0.0,
                -0.0,
            ],

            'case numbers 8'  => [
                '3455',
                3455.0,
            ],
            'case numbers 9'  => [
                '03522',
                3522.0,
            ],
            'case numbers 10' => [
                '-8.9333',
                -8.9333,
            ],
            'case numbers 11' => [
                '1e02',
                100.0,
            ],
            'case numbers 12' => [
                '1E02',
                100.0,
            ],

            'case numbers 14' => [
                '-0.0',
                -0.0,
            ],
        ];
    }

    /**
     * @return array
     */
    public function provideForTestExceptionFloat(): array
    {
        return [
            'case null'                          => [
                null,
                TypeError::class,
            ],
        ];
    }

    /**
     * @return array
     */
    public function provideForTestString(): array
    {
        return [
            'case normal 1'         => [
                'asdcc',
                'asdcc',
            ],
            'case empty'            => [
                '',
                '',
            ],
            'case numbers 1'        => [
                3455,
                '3455',
            ],
            'case numbers 2'        => [
                03522,
                '1874',
            ],
            'case numbers 3'        => [
                -8.9333,
                '-8.9333',
            ],
            'case numbers 4'        => [
                1e02,
                '100',
            ],
            'case numbers 5'        => [
                1E02,
                '100',
            ],
            'case numbers 6'        => [
                0xfd343422,
                '4248056866',
            ],
            'case numbers 7'        => [
                -0.0,
                '-0',
            ],
            'case normal 2'         => [
                '!@#$%^&*()_+{}:"?>',
                '!@#$%^&*()_+{}:"?>',
            ],
            'case normal 3'         => [
                '{}}\'\"d   asdfff}',
                '{}}\'\"d   asdfff}',
            ],
            'case special chars 1'  => [
                '�����',
                '�����',
            ],
            'case special chars 2'  => [
                '� � � � � � � � � � � � � � � �                                           |
    � � � � � � � � � � � � � � � � ',
                '� � � � � � � � � � � � � � � �                                           |
    � � � � � � � � � � � � � � � � ',
            ],
            'case special chars 3'  => [
                '������',
                '������',
            ],
            'case special chars 4'  => [
                'しとはちてきいきすきいくかすく',
                'しとはちてきいきすきいくかすく',
            ],
            'case special chars 5'  => [
                'يبلقصلاثقفثقبلثسصاقتىاغفغعتةغعمه',
                'يبلقصلاثقفثقبلثسصاقتىاغفغعتةغعمه',
            ],
            'case special chars 6'  => [
                '☹️🙁😠😡😞😟😣😖',
                '☹️🙁😠😡😞😟😣😖',
            ],
            'case special chars 7'  => [
                'ӽd̲̅a̲̅r̲̅w̲̅i̲̅ɳ̲̅ᕗ',
                'ӽd̲̅a̲̅r̲̅w̲̅i̲̅ɳ̲̅ᕗ',
            ],
            'case special chars 8'  => [
                'Quizdeltagerne spiste jordbær med fløde, mens cirkusklovnen',
                'Quizdeltagerne spiste jordbær med fløde, mens cirkusklovnen',
            ],
            'case special chars 9'  => [
                'Γαζέες καὶ μυρτιὲς δὲν θὰ βρῶ πιὰ στὸ χρυσαφὶ ξέφωτο',
                'Γαζέες καὶ μυρτιὲς δὲν θὰ βρῶ πιὰ στὸ χρυσαφὶ ξέφωτο',
            ],
            'case special chars 10' => [
                ' เป็นมนุษย์สุดประเสริฐเลิศคุณค่า ',
                ' เป็นมนุษย์สุดประเสริฐเลิศคุณค่า ',
            ],
        ];
    }

    /**
     * @return array
     */
    public function provideForTestExceptionString(): array
    {
        return [
            'case null' => [
                null,
                TypeError::class,
            ],
        ];
    }
}