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

$GLOBALS['TL_DCA']['tl_content']['palettes']['image'] =
    str_replace('caption', 'caption,inlineClass', $GLOBALS['TL_DCA']['tl_content']['palettes']['image']);

$GLOBALS['TL_DCA']['tl_content']['fields']['inlineClass'] = array(
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['inlineClass'],
    'exclude'   => true,
    'search'    => true,
    'inputType' => 'text',
    'eval'      => array('maxlength' => 255, 'tl_class' => 'clr long'),
    'sql'       => "varchar(255) NOT NULL default ''"
);