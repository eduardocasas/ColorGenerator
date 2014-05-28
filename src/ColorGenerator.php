<?php
namespace eduardocasas\ColorGenerator;

use eduardocasas\ColorGenerator\format\FormatInterface;
use eduardocasas\ColorGenerator\format\HexadecimalFormat;
use eduardocasas\ColorGenerator\format\RgbFormat;
use eduardocasas\ColorGenerator\generator_pattern\RandomGeneratorPattern;
use eduardocasas\ColorGenerator\generator_pattern\RangeGeneratorPattern;

/**
 * Scope Interface.
 *
 * @author Eduardo Casas <http://www.eduardocasas.com>
 *
 * @api
 */
class ColorGenerator
{
    public static $WHITE   = array(255, 255, 255);
    public static $SILVER  = array(192, 192, 192);
    public static $GRAY    = array(128, 128, 128);
    public static $BLACK   = array(0, 0, 0);
    public static $RED     = array(255, 0, 0);
    public static $MAROON  = array(128, 0, 0);
    public static $YELLOW  = array(255, 255, 0);
    public static $OLIVE   = array(128, 128, 0);
    public static $LIME    = array(0, 255, 0);
    public static $GREEN   = array(0, 128, 0);
    public static $AQUA    = array(0, 255, 255);
    public static $TEAL    = array(0, 128, 128);
    public static $BLUE    = array(0, 0, 255);
    public static $NAVY    = array(0, 0, 128);
    public static $FUCHSIA = array(255, 0, 255);
    public static $PURPLE  = array(128, 0, 128);
    public static $ORANGE  = array(255, 165, 0);
    
    public $format;
    private $generator_pattern;
    
    public function setHexadecimalFormat()
    {
        $this->setFormat(new HexadecimalFormat);
        
        return $this;
    }

    public function setRgbFormat()
    {
        $this->setFormat(new RgbFormat);
        
        return $this;
    }

    public function setRandomGeneratorPattern()
    {
        $this->setGeneratorPattern(new RandomGeneratorPattern);
        
        return $this;
    }
    
    public function setRangeGeneratorPattern(array $base_color, $contrast = null)
    {
        $this->setGeneratorPattern(new RangeGeneratorPattern($base_color,$contrast));
        
        return $this;
    }

    public function generate($collection_length)
    {
        $this->format->generate($collection_length);
        
        return $this;
    }

    public function getCollection()
    {
        return $this->format->getCollection();
    }
    
    public function getCssCollection()
    {
        return $this->format->getCssCollection();
    }
    
    public function paintCollection()
    {
        $html = '';
        $collection = $this->format->getCssCollection();
        $width = 100/count($collection);
        foreach ($collection as $color) {
            $html .= $this->getHtmlElement($color, $width);
        }

        return $html;
    }

    public function createHtmlFile($file_path = 'file.html')
    {
        $html = '<html><body>'.$this->paintCollection().'</body></html>';
        $this->createFile($file_path, $html);
    }

    private function getHtmlElement($color, $width)
    {
        return '<span style="background-color: '.$color.'; display: block;
                width: '.$width.'%; height: 100%; float: left; cursor: help;"
                title="'.$color.'"></span>';
    }
    
    private function createFile($file_path, $html_content)
    {
        $handle = fopen($file_path, 'w') or die('Cannot open file:  '.$file_path);
        fwrite($handle, $html_content);
        fclose($handle);
    }
    
    private function setGeneratorPattern($generator_pattern)
    {
        $this->generator_pattern = $generator_pattern;
        if (is_object($this->format)) {
            $this->format->setGeneratorPattern($this->generator_pattern);
        }
    }
    
    private function setFormat(FormatInterface $format)
    {
        $this->format = $format->setGeneratorPattern($this->generator_pattern);
    }

}
