<?php
namespace eduardocasas\ColorGenerator\format;

use eduardocasas\ColorGenerator\generator_pattern\GeneratorPatternInterface;

/**
 * Description of FormatInterface
 *
 * @author eduardo
 */
interface FormatInterface
{

    public function generate($collection_length);
    
    public function getCollection();
    
    public function getCssCollection();
    
    public function setGeneratorPattern(GeneratorPatternInterface $generator_pattern = null);
    
}
