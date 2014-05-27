<?php
namespace eduardocasas\ColorGenerator\generator_pattern;

use eduardocasas\ColorGenerator\generator_pattern\GeneratorPatternInterface;
use eduardocasas\ColorGenerator\generator_pattern\AbstractGeneratorPattern;

/**
 * Description of RangeGeneratorPattern
 *
 * @author eduardo
 */
class RangeGeneratorPattern extends AbstractGeneratorPattern implements GeneratorPatternInterface
{

    const DEFAULT_CONSTRAST = 25;
    
    private $base_color;
    private $contrast;

    public function __construct($base_color, $contrast = null)
    {
        $this->base_color = $base_color;
        $this->contrast = ($contrast == null) ? self::DEFAULT_CONSTRAST : $contrast;
    }

    protected function generate()
    {
        return array(
            rand($this->getBottomNumber(0), $this->getTopNumber(0)),
            rand($this->getBottomNumber(1), $this->getTopNumber(1)),
            rand($this->getBottomNumber(2), $this->getTopNumber(2))
        );
    }
    
    private function getTopNumber($position)
    {
        $num = abs($this->base_color[$position]+$this->contrast);
        
        return ($num > 255) ? 255 : $num;
    }
    
    private function getBottomNumber($position)
    {
        $num = abs($this->base_color[$position]-$this->contrast);
        
        return ($num < 0) ? 0 : $num;
    }

}
