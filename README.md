phalcon-form-decorators
=======================

Phalcon Framework Form Decorators

In my opinion one of the bigest disadvantage Phalcon Framework is generating form.
For example in Zend Framework this process is very easy for programmer. In view I make
"$form->render()" and just it. All form with error messages is automatic generated.
It's easy and quick and I think that Phalcon should have the same idea.

=======================

## Installation

Copy the main folder into your project where you keep libraries or modules.
For example (libs/ or app/vendor or /vendor). 

## Usage

Now you can create form and set all necessary data

```php

class MyForm extends \Modules\Form
{

    public function initialize()
    {
        $this
                ->setAction('')
                ->setEnctype('multipart/form-data')
                ->setMethod('post')
                ->setCssClass('myForm')
                ->setCssId('formRegister')
                ->addCustomTag('data-id', 12)
                ->addCustomTag('data-gropu', 'first')
        ;
        
        ...
        //add all another elements to form

    }

```

When you send form to view you can generate form in easy way:

for volt

```php

    {{ form.toHtml() }}

```

for html

```php

    <?php echo $form->toHtml() ?>;

```

It's simple, isn't it?

## Configuration

In my opinion each class of Phalcon\Forms\Element need to have method setDecorator().
Each element in each form can have another dedicated decorators.

My example (Modules\View\Form) generate all html to each form element in the followin order:

<div>
1. generate labels
2. generate element
3. generate errors
</div>

When you want to have another html code you can override generate method into one of the Elements class in Modules\View\Form\Decorators