<?php

/*
 * Copyright 2014 Michał Strzelczyk
 * mail: kontakt@michalstrzelczyk.pl
 * 
 */

namespace Modules\View\Form;

use Phalcon\Tag as Tag;

/**
 * Description of FormAbstract
 *
 * @author Arrow
 */
abstract class DecoratorAbstract implements IFormDecorator {

    /**
     * Element
     * 
     * @var Phalcon\Forms\Element\
     */
    protected $element;
    
    /**
     * HTML string
     * 
     * @var string 
     */
    protected $html = '';
    
    /**
     * Get Element
     * 
     * @return Phalcon\Forms\Element\
     */
    public function getElement() {

        return $this->element;
    }

    /**
     * Set Element
     * 
     * @param \Modules\View\Form\Phalcon\Forms\Element $element
     */
    public function setElement($element) {
        $this->element = $element;
    }

    /**
     * Generate label html
     * 
     * @return void
     */
    public function generateLabel()
    {
        if(is_null($this->getElement()->getLabel()))
            return;
        
        $this->html.= "\t\t\t".Tag::tagHtml('label');
        $this->html.= $this->getElement()->getLabel();
        $this->html.= Tag::tagHtmlClose('label').PHP_EOL;
    }
    
    /**
     * Generate element html
     * 
     * @return void
     */
    public function generateElement()
    {
        $this->html.= "\t\t\t".$this->element->render().PHP_EOL;
    }
    
    /**
     * Generate error list
     * 
     * If you woudlike to view all error messages you shoud
     * overlow this message and create a loop for $error array
     * 
     */
    public function generateErrors()
    {
        $errors = $this->element->getForm()->getMessagesFor($this->getElement()->getName());
        
        if($errors->count() > 0){
            $this->html.= "\t\t\t".Tag::tagHtml('ul', array(
                'class' => 'error'
            )).PHP_EOL;
            $this->html.= "\t\t\t".Tag::tagHtml('li').PHP_EOL;
            $this->html.= "\t\t\t".$errors->offsetGet(0)->getMessage();
            $this->html.= "\t\t\t".Tag::tagHtmlClose('li').PHP_EOL;
            $this->html.= "\t\t\t".Tag::tagHtmlClose('ul').PHP_EOL;
            
        }        
    }
    
    /**
     * Generate HTML
     * 
     * @param string $html
     */
    public function toHtml() {
        
        $this->html.=  "\t".Tag::tagHtml('div').PHP_EOL;
        
        $this->generateLabel();
        $this->generateElement();
        $this->generateErrors();
        
        $this->html.=  "\t".Tag::tagHtmlClose('div').PHP_EOL;;
        
        return $this->html;
    }

}
