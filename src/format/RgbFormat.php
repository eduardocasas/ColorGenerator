<?php
namespace eduardocasas\ColorGenerator\format;

use eduardocasas\ColorGenerator\format\FormatInterface;
use eduardocasas\ColorGenerator\format\AbstractFormat;

/**
 * Description of RgbFormat
 *
 * @author eduardo
 */
class RgbFormat extends AbstractFormat implements FormatInterface
{
    
    protected function getColor()
    {
        return array($this->color['r'], $this->color['g'], $this->color['b']);
    }
    
    protected function getCss(&$color)
    {
        $color = 'rgb('.implode(',', $color).')';
    }
    
}
