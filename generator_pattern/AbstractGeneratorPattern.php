<?php
namespace eduardocasas\ColorGenerator\generator_pattern;

use eduardocasas\ColorGenerator\generator_pattern\GeneratorPatternInterface;

/**
 * Description of AbstractGeneratorPattern
 *
 * @author eduardocasas
 */
abstract class AbstractGeneratorPattern implements GeneratorPatternInterface
{

    protected $collection = array();
    
    abstract protected function generate();
    
    public function create()
    {
        while (in_array($rgb = $this->generate(), $this->collection));
        $this->collection[] = $rgb;

        return array('r' => $rgb[0], 'g' => $rgb[1], 'b' => $rgb[2]);
    }

}
