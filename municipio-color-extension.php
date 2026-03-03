<?php
/**
 * Plugin Name: Municipio Color Extension
 * Description: Lägger till utökade färgpaletter i Anpassa.
 * Version: 1.0.1
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('init', static function () {
    if (
        !class_exists('\Municipio\Customizer\KirkiField') ||
        !class_exists('\Municipio\Customizer')
    ) {
        return;
    }

    $palettes = [
        'primary'    => [
            'settings' => 'color_palette_primary_extended',
            'label'    => 'Primära färger utökad',
            'shades' => [
                '50'  => '#E8ECEF',
                '100' => '#CCD5DB',
                '200' => '#8095A4',
                '300' => '#5E798C',
                '400' => '#1F445F',
                '500' => '#002B49',
            ],
        ],
        'secondary'  => [
            'settings' => 'color_palette_secondary_extended',
            'label'    => 'Sekundära färger utökad',
            'shades' => [
                '50'  => '#EEE8E8',
                '100' => '#DACECE',
                '200' => '#B8A9A8',
                '300' => '#8F7473',
                '400' => '#684544',
                '500' => '#431F1E',
            ],
        ],
        'tertiary'   => [
            'settings' => 'color_palette_tertiary_extended',
            'label'    => 'Tredje färgvariant utökad',
            'shades' => [
                '50'  => '#EBE9E7',
                '100' => '#D7D3CE',
                '200' => '#B2A99F',
                '300' => '#877B6A',
                '400' => '#5E513F',
                '500' => '#362815',
            ],
        ],
        'quaternary' => [
            'settings' => 'color_palette_quaternary_extended',
            'label'    => 'Fjärde färgvariant utökad',
            'shades' => [
                '50'  => '#E7EBEB',
                '100' => '#CED6D5',
                '200' => '#9FAEAD',
                '300' => '#6A7E7B',
                '400' => '#405754',
                '500' => '#17302D',
            ],
        ],
    ];

    $priority = 1;
    foreach ($palettes as $slug => $palette) {
        $choices = [];
        $output  = [];

        foreach ($palette['shades'] as $shade => $hex) {
            $choices[$shade] = (string) $shade;
            $output[] = [
                'choice'   => $shade,
                'element'  => ':root',
                'property' => sprintf('--color-%s-%s', $slug, $shade),
            ];
        }

        \Municipio\Customizer\KirkiField::addField([
            'type'        => 'multicolor',
            'settings'    => $palette['settings'],
            'label'       => $palette['label'],
            'description' => esc_html__('Utökade temafärger', 'municipio'),
            'section'     => 'municipio_customizer_section_colors',
            'priority'    => $priority++,
            'transport'   => 'auto',
            'alpha'       => false,
            'choices'     => $choices,
            'default'     => $palette['shades'],
            'output'      => $output,
        ]);
    }
}, 20);
