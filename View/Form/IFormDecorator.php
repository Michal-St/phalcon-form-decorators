<?php

/*
 * Copyright 2014 Michał Strzelczyk
 * mail: kontakt@michalstrzelczyk.pl
 * 
 */

namespace Modules\View\Form;

/**
 *
 * @author Arrow
 */
interface IFormDecorator {
    
    /*
     * Set Phalcon\Forms\Element\
     */
    public function setElement($element);
    
    /*
     * Get Phalcon\Forms\Element\
     */
    public function getElement();
    
    /*
     * Generate $html
     */
    public function toHtml();
}
