<?php
namespace eduardocasas\ColorGenerator\format;

use eduardocasas\ColorGenerator\format\FormatInterface;
use eduardocasas\ColorGenerator\generator_pattern\GeneratorPatternInterface;

/**
 * Description of AbstractFormat
 *
 * @author eduardocasas
 */
abstract class AbstractFormat implements FormatInterface
{

    protected $color;
    protected $collection;
    protected $generator_pattern;
    
    abstract protected function getColor();
    
    abstract protected function getCss(&$color);
    
    public function setGeneratorPattern(GeneratorPatternInterface $generator_pattern = null)
    {
        $this->generator_pattern = $generator_pattern;
        
        return $this;
    }

    public function generate($collection_length)
    {
        $this->collection = array();
        for ($i = 1; $i <= $collection_length; ++$i) {
            $this->collection[] = $this->getNewColor();
        }
    }
    
    public function getCollection()
    {
        return $this->collection;
    }
    
    public function getCssCollection()
    {
        $collection = $this->collection;
        array_walk($collection, array($this, 'getCss'));
        
        return $collection;
    }

    private function getNewColor()
    {
        $this->generateColor();
        
        return $this->getColor();
    }
    
    private function generateColor()
    {
        $this->color = $this->generator_pattern->create();
    }
    
}
