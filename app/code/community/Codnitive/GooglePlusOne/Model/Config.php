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

class Codnitive_GooglePlusOne_Model_Config
{
    
    const PATH_NAMESPACE      = 'codnitivegoogle';
    const EXTENSION_NAMESPACE = 'googleplusone';
    const PRODUCT_NAMESPACE = 'googleplusoneproduct';
    
    const EXTENSION_NAME    = 'Google +1 Button';
    const EXTENSION_VERSION = '1.0.00';
    const EXTENSION_EDITION = 'Basic';

    public static function getNamespace()
    {
        return self::PATH_NAMESPACE . '/' . self::EXTENSION_NAMESPACE . '/';
    }
    
    public function getExtensionName()
    {
        return self::EXTENSION_NAME;
    }
    
    public function getExtensionVersion()
    {
        return self::EXTENSION_VERSION;
    }
    
    public function getExtensionEdition()
    {
        return self::EXTENSION_EDITION;
    }

    public function isActive()
    {
        return Mage::getStoreConfigFlag(self::getNamespace() . 'active');
    }
    
    public static function getProductNamespace()
    {
        return self::PATH_NAMESPACE . '/' . self::PRODUCT_NAMESPACE . '/';
    }
    
    public function showInProductPage()
    {
        if (!$this->isActive()) {
            return false;
        }
        return Mage::getStoreConfigFlag(self::getProductNamespace() . 'enabled');
    }
    
    public function getProductPlace()
    {
        return Mage::getStoreConfig(self::getProductNamespace() . 'place');
    }
    
    public function getProductSize()
    {
        return Mage::getStoreConfig(self::getProductNamespace() . 'size');
    }
    
    public function getProductAnnotation()
    {
        return Mage::getStoreConfig(self::getProductNamespace() . 'annotation');
    }
    
    public function getInlineWidth()
    {
        if ($this->getProductAnnotation() !== 'inline') {
            return null;
        }
        
        $width = Mage::getStoreConfig(self::getProductNamespace() . 'inline_width');
        if ($width === 'custom') {
            return $this->getInlineCustomWidth();
        }
        return $width;
    }
    
    public function getInlineCustomWidth()
    {
        if ($this->getProductAnnotation() !== 'inline') {
            return null;
        }
        return Mage::getStoreConfig(self::getProductNamespace() . 'inline_width_custom');
    }
    
    public function getProductLanguage()
    {
        return Mage::getStoreConfig(self::getProductNamespace() . 'language');
    }
    
    public function getProductLanguageCustom()
    {
        return Mage::getStoreConfig(self::getProductNamespace() . 'language_custom');
    }
    
    public function isProductAsynchronous()
    {
        if ($this->getProductParseTags() === 'explicit') {
            return false;
        }
        return Mage::getStoreConfigFlag(self::getProductNamespace() . 'asynchronous');
    }
    
    public function isProductHtml5()
    {
        return Mage::getStoreConfigFlag(self::getProductNamespace() . 'html5');
    }
    
    public function getProductParseTags()
    {
        return Mage::getStoreConfig(self::getProductNamespace() . 'parse_tags');
    }
    
    public function getProductAlign()
    {
        return Mage::getStoreConfig(self::getProductNamespace() . 'align');
    }
    
    public function isProductCustomExpandTo()
    {
        return Mage::getStoreConfigFlag(self::getProductNamespace() . 'custom_expandto');
    }
    
    public function getProductExpandTo()
    {
        if (!$this->isProductCustomExpandTo()) {
            return '';
        }
        return Mage::getStoreConfig(self::getProductNamespace() . 'expandto');
    }
    
    public function getProductRecommendations()
    {
        return Mage::getStoreConfigFlag(self::getProductNamespace() . 'recommendations');
    }
    
}
