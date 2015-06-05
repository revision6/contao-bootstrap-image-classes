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

namespace Revision6\Bootstrap\Templates;

/**
 * Class Modifier provides modifier callbacks.
 *
 * @package Revision\Bootstrap\Templates
 */
class Modifier
{
    /**
     * Replace image classes.
     *
     * @param \Template $template The template being parsed.
     *
     * @return void
     */
    public static function replaceImageClasses(\Template $template)
    {
        if (empty($template->imgSize) && empty($template->picture['img'])) {
            return;
        }

        $cssClassesInside = $template->inlineClass;

        if ($cssClassesInside) {

            $template->imgSize = self::generateOrUpdateClass($template->imgSize, $cssClassesInside);

            if ($template->picture) {
                $picture = $template->picture;

                $picture['attributes'] = self::generateOrUpdateClass($picture['attributes'], $cssClassesInside);
                $template->picture     = $picture;
            }
        }
    }

    private function generateOrUpdateClass($source, $classes)
    {
        preg_match('/class=([^\/]+)/', $source, $matchesClass);

        if (count($matchesClass)) {
            return str_replace('class="', 'class="' . $classes . ' ', $source);
        } else {
            return $source .= sprintf(' class="%s"', $classes);
        }
    }
}
