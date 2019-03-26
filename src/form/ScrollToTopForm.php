<?php

 namespace Drupal\scroll_to_top\Form;

 use Drupal\Core\Form\ConfigFormBase;
 //use Drupal\Core\Form\FormStateInterface;


 class ScrollToTopForm extends ConfigFormBase
 {

     public function getFormId()
     {
         return 'ScrollToTop_Form';
     }

     /**
      * {@inheritdoc}
      */
     protected function getEditableConfigNames()
     {
         //name_module.id_form
         return [
             'scroll_to_top.ScrollToTop_Form'
         ];
     }


 }