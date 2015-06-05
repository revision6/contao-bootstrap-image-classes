<?php

return array(
    'config'   => array(
        'types' => array(
            'icons_set' => 'Netzmacht\Bootstrap\Core\Config\Type\IconSetType',
            'dropdown'  => 'Netzmacht\Bootstrap\Core\Config\Type\DropdownType'
        ),
    ),
    'templates' => array(
        'modifiers' => array(
            'callback_replace-image-classes' => array(
                'type'      => 'callback',
                'callback'  => array('Revision6\Bootstrap\Templates\Modifier', 'replaceImageClasses'),
                'templates' => array('ce_*'),
            ),
        ),
    ),
);
