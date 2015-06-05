<?php

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

        $cssClasses   = $template->class;
        $cssClasses   = trimsplit(' ', $cssClasses);
        $imageClasses = array();

        foreach ($cssClasses as $index => $cssClass) {
            if (substr($cssClass, 0, 4) == 'img-') {
                $imageClasses[] = $cssClass;
                unset($cssClasses[$index]);
            }
        }

        if (count($imageClasses)) {
            $imageClasses       = implode(' ', $imageClasses);
            $template->class    = implode(' ', $cssClasses);
            $template->imgSize .= sprintf(' class="%s"', $imageClasses);

            if ($template->picture) {
                $picture                = $template->picture;
                $picture['attributes'] .= sprintf(' class="%s"', $imageClasses);

                $template->picture = $picture;
            }
        }
    }

    /**
     * Replace table classes.
     *
     * @param \Template $template The template being parsed.
     *
     * @return void
     */
    public static function replaceTableClasses(\Template $template)
    {
        $cssClasses   = $template->class;
        $cssClasses   = trimsplit(' ', $cssClasses);
        $tableClasses = array('table');

        foreach ($cssClasses as $index => $cssClass) {
            if (substr($cssClass, 0, 6) == 'table-') {
                $tableClasses[] = $cssClass;
                unset($cssClasses[$index]);
            }
        }

        if (count($tableClasses) > 1) {
            $template->class = implode(' ', $cssClasses);

            // reset sortable, to avoid double class attributes
            if ($template->sortable) {
                $tableClasses[]     = 'sortable';
                $template->sortable = null;
            }

            $template->id = sprintf('%s" class="%s', $template->id, implode(' ', $tableClasses));
        }
    }
}
