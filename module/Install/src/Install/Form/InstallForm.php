<?php
namespace Install\Form;

use Zend\Form\Form;

class InstallForm extends Form
{
 public function __construct($name = null)
 {
     // we want to ignore the name passed
     parent::__construct('install');


     $this->add(array(
         'name' => 'server',
         'type' => 'Text',
         'options' => array(
             'label' => 'Server',
         ),
     ));
     $this->add(array(
         'name' => 'username',
         'type' => 'Text',
         'options' => array(
             'label' => 'Username',
         ),
     ));

     $this->add(array(
         'name' => 'password',
         'type' => 'Text',
         'options' => array(
             'label' => 'Password',
         ),
     ));
     
     $this->add(array(
         'name' => 'submit',
         'type' => 'Submit',
         'attributes' => array(
             'value' => 'Install Now !',
             'id' => 'submitbutton',
         ),
     ));
 }
}
