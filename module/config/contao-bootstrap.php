<?php

/**
 *
 * PHP version 5
 *
 * @package    BootstrapImageClasses
 * @author     Christopher Boelter <c.boelter@revision6.de>
 * @copyright  Revision6 UG
 * @license    LGPL.
 * @filesource
 */

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
