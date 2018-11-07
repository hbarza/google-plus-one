<?php
/**
 * CODNITIVE
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE_EULA.html.
 * It is also available through the world-wide-web at this URL:
 * http://www.codnitive.com/en/terms-of-service-softwares/
 * http://www.codnitive.com/fa/terms-of-service-softwares/
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade to newer
 * versions in the future.
 *
 * @category   Codnitive
 * @package    Codnitive_GooglePlusOne
 * @author     Hassan Barza <support@codnitive.com>
 * @copyright  Copyright (c) 2012 CODNITIVE Co. (http://www.codnitive.com)
 * @license    http://www.codnitive.com/en/terms-of-service-softwares/ End User License Agreement (EULA 1.0)
 */

class Codnitive_GooglePlusOne_Block_Button extends Mage_Core_Block_Template
{
    public function getConfig()
    {
        return Mage::getModel('googleplusone/config');
    }
    
    public function getButtonAttributes()
    {
        $attributes= '';
        
        if ($this->getSize()) {
            $attributes .= $this->getSize() . ' ';
        }
        
        if ($this->getAnnotation()) {
            $attributes .= $this->getAnnotation() . ' ';
        }
        
        if ($this->getWidth()) {
            $attributes .= $this->getWidth() . ' ';
        }
        
        if ($this->getAlign()) {
            $attributes .= $this->getAlign() . ' ';
        }
        
        if ($this->getExpandTo()) {
            $attributes .= $this->getExpandTo() . ' ';
        }
        
        if ($this->getRecommendations()) {
            $attributes .= $this->getRecommendations() . ' ';
        }
        
        return rtrim($attributes);
    }
    
    public function getSize()
    {
        $size = $this->getConfig()->getProductSize();
        if ($size === 'standard') {
            return '';
        }
        
        return $this->isHtml5() 
                ? sprintf('data-size="%s"', $size)
                : sprintf('size="%s"', $size);
    }
    
    public function getAnnotation()
    {
        $annotation = $this->getConfig()->getProductAnnotation();
        if ($annotation === 'bubble') {
            return '';
        }
        
        return $this->isHtml5() 
                ? sprintf('data-annotation="%s"', $annotation)
                : sprintf('annotation="%s"', $annotation);
    }
    
    public function getWidth()
    {
        $width = $this->getConfig()->getInlineWidth();
        if ($width) {
            return $this->isHtml5() 
                    ? sprintf('data-width="%s"', $width)
                    : sprintf('width="%s"', $width);
        }
        return '';
    }
    
    public function getAlign()
    {
        $align = $this->getConfig()->getProductAlign();
        
        return $this->isHtml5() 
                ? sprintf('data-align="%s"', $align)
                : sprintf('align="%s"', $align);
    }
    
    public function getExpandTo()
    {
        $expandTo = $this->getConfig()->getProductExpandTo();
        if (!$expandTo) {
            return null;
        }
        
        return $this->isHtml5() 
                ? sprintf('data-expandTo="%s"', $expandTo)
                : sprintf('expandTo="%s"', $expandTo);
    }
    
    public function getRecommendations()
    {
        $recommendations = $this->getConfig()->getProductRecommendations();
        
        return $this->isHtml5() 
                ? sprintf('data-recommendations="%s"', $recommendations)
                : sprintf('recommendations="%s"', $recommendations);
    }
    
    public function getLanguage()
    {
        $language = $this->getConfig()->getProductLanguage();
        if ($language === 'custom') {
            return $this->getConfig()->getProductLanguageCustom();
        }
        return Mage::app()->getLocale()->getLocaleCode();
    }
    
    public function isAsynchronous()
    {
        return $this->getConfig()->isProductAsynchronous();
    }
    
    public function isHtml5()
    {
        return $this->getConfig()->isProductHtml5();
    }
    
    public function isExplicit()
    {
        return $this->getConfig()->getProductParseTags() === 'explicit';
    }
}
