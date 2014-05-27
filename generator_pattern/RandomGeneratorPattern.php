<?php
namespace eduardocasas\ColorGenerator\generator_pattern;

use eduardocasas\ColorGenerator\generator_pattern\GeneratorPatternInterface;
use eduardocasas\ColorGenerator\generator_pattern\AbstractGeneratorPattern;

/**
 * Description of RandomGeneratorPattern
 *
 * @author eduardo
 */
class RandomGeneratorPattern extends AbstractGeneratorPattern implements GeneratorPatternInterface
{

    protected function generate()
    {
        return array(mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255 ));
    }

}
