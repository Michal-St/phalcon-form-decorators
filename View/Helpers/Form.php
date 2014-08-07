<?php

/*
 * Copyright 2014 Michał Strzelczyk
 * mail: kontakt@michalstrzelczyk.pl
 * 
 */

namespace Modules\View\Helpers;

use \Phalcon\Tag as Tag;

class Form {

    /**
     *
     * @var string 
     */
    public $html = '';

    /**
     *
     * @var translate 
     */
    protected $t;

    /**
     * Budowanie
     */
    public function __construct() {
        if (is_null($this->t))
            $this->t = \Phalcon\DI::getDefault()->get('translate');
    }

    /**
     * 
     * @param type $name
     * @return type
     */
    private function _getElementType($name)
    {
        $tab = explode("\\",$name);
        return end($tab);
        unset($tab);
    }
    
    /**
     * Tworzy element
     * 
     * @param type $node
     */
    private function _generateElements(\Modules\Form $form) {
        $elements = $form->getElements();
        foreach($elements as $element){
            
            //element doesn't have any decorator
            if(!isset($element->decorator)){
                $type = $this->_getElementType(get_class($element));
                //create default decorator
                $className = '\Modules\View\Form\Decorators\\'.$type;
                
                if(!class_exists($className))
                    throw new \Exception("$className doesn't exists");
                
                $class = new $className();
                $class->setElement($element);
                $this->html.= $class->toHtml().PHP_EOL;
                
            }elseif($element->decorator instanceof \Modules\View\Form\FormDecoratorInterface){
                $tahis->html.= $element->decorator->toHtml();
            }else{
                throw new \Exception(get_class($element). "doesn't have decorator");
            }
        }
    }

    /**
     * Generate all HTML
     * 
     * @param \Modules\Form $form
     * @return string
     */
    public function toHtml(\Modules\Form $form) {

        $formParams = array(
            'action' => $form->getAction(),
            'method' => $form->getMethod(),
        );

        if (!is_null($form->getCssClass()))
            $formParams['class'] = $form->getCssClass();

        if (!is_null($form->getCssId()))
            $formParams['id'] = $form->getCssId();

        if (!is_null($form->getEnctype()))
            $formParams['enctype'] = $form->getEnctype();

        $this->html .= "\t".Tag::form(array_merge($formParams, $form->getCustomTags())).PHP_EOL;

        $this->_generateElements($form);

        $this->html .= "\t".Tag::endForm().PHP_EOL;

        return $this->html;
    }

}
