<?php

return array(
    'templates' => array(
        'modifiers' => array(
            'callback_replace-revision6-image-classes' => array(
                'type'      => 'callback',
                'callback'  => array('Revision6\Bootstrap\Templates\Modifier', 'replaceImageClasses'),
                'templates' => array('ce_*'),
            ),
        ),
    ),
);
