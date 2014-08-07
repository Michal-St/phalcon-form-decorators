<?php

/*
 * Copyright 2014 Michał Strzelczyk
 * mail: kontakt@michalstrzelczyk.pl
 * 
 */
namespace Modules;

/**
 * Description of Form
 *
 * @author Arrow
 */
class Form extends \Phalcon\Forms\Form
{
   /**
     * Form http method
     *
     * @var string
     */
    protected $method = 'POST';

    /**
     * Form action url
     *
     * @var string
     */
    protected $action;

    /**
     * Css class
     * 
     * @var type 
     */
    protected $cssClass;
    
    /**
     * CssId
     * 
     * @var type 
     */
    protected $cssId;
    
    /**
     * Form enctype
     * 
     * @var type 
     */
    protected $enctype;
    
    /**
     * Form custom user tags
     * 
     * @var array 
     */
    protected $customTags = array();
    
    /**
     * Get current form method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Get css class
     * 
     * @return string | null
     */
    public function getCssClass()
    {
        return $this->cssClass;
    }

    /**
     * Get css id
     * 
     * @return string | null
     */
    public function getCssId()
    {
        return $this->cssId;
    }

    /**
     * Get form Enctype
     * 
     * @return string | null
     */
    public function getEnctype()
    {
        return $this->enctype;
    }

    /**
     * Get form Enctype
     * 
     * @return array
     */
    public function getCustomTags()
    {
        return $this->customTags;
    }

    /**
     * Set form action
     *
     * @param string $method
     * @return $this
     */
    public function setMethod($method)
    {
        $method = strtoupper($method);

        if (in_array($method, array('POST', 'GET'))) {
            $this->method = $method;
        }

        return $this;
    }

    /**
     * Set form action
     * 
     * @param type $action
     * @return \Modules\Form
     */
    public function setAction($action)
    {
        $this->action = $action;
        
        return $this;
    }

    /**
     * Set css Id 
     * 
     * @param type $action
     * @return \Modules\Form
     */
    public function setCssId($cssId)
    {
        $this->cssId = $cssId;
        
        return $this;
    }

    /**
     * Set css class 
     * 
     * @param type $action
     * @return \Modules\Form
     */
    public function setCssClass($cssClass)
    {
        $this->cssClass = $cssClass;
        
        return $this;
    }
    
    /**
     * Set form enctype
     * 
     * @param type $enctype
     * @return \Modules\Form
     */
    public function setEnctype($enctype)
    {
        $this->enctype = $enctype;
        
        return $this;
    }
    
    /**
     * Set custom tag
     * 
     * @param type $customTags
     * @return \Modules\Form
     */
    public function addCustomTag($key, $value)
    {
        $this->customTags[$key] = $value;
        
        return $this;
    }
    
    /**
     * Render all Form
     */
    public function toHtml()
    {
         $helper = new \Modules\View\Helpers\Form();
         return $helper->toHtml($this);
    }
    
}
