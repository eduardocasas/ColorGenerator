<?php
namespace eduardocasas\ColorGenerator\format;

use eduardocasas\ColorGenerator\format\FormatInterface;
use eduardocasas\ColorGenerator\format\AbstractFormat;

/**
 * Description of HexadecimalFormat
 *
 * @author eduardo
 */
class HexadecimalFormat extends AbstractFormat implements FormatInterface
{

    protected function getColor()
    {
        return $this->convertRgbToHex($this->color['r']).
               $this->convertRgbToHex($this->color['g']).
               $this->convertRgbToHex($this->color['b']);
    }
    
    protected function getCss(&$color)
    {
        $color = '#'.$color;
    }
    
    private function convertRgbToHex($rgb_part)
    {
        return str_pad(dechex($rgb_part), 2, '0', STR_PAD_LEFT);
    }

}
