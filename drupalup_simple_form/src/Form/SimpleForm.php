<?php

namespace Drupal\drupalup_simple_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Simple Form
 */
class SimpleForm extends FormBase{

/**
 * (@inheritdoc)
 */
public function getFormId(){
    return 'drupalup_simple_form';
}

/**
 * (@inheritdoc)
 */
public function buildForm($form, FormStateInterface $form_state){

$form['name'] = [
    '#type' => 'textfield',
    '#title' => $this->t('Name'),
];

$form['passwd'] = [
    '#type' => 'textfield',
    '#title' => $this->t('Password'),
];


$form['submit'] = [
    '#type' => 'submit',
    '#value' => $this->t('Submit'),
];

return $form;
}

/**
 * (@inheritdoc)
 */

public function validateForm(array &$form, FormStateInterface $form_state) {
    if (strlen($form_state->getValue('passwd')) < 6) {
      $form_state->setErrorByName('passwd', $this->t('The password is too short.'));
    }
    else{
               drupal_set_message('Succes validate');
            }
  } 

public function submitForm(array &$form, FormStateInterface $form_state ){
    $values = array(
		'name' => $form_state->getValue('name'),
		'passwd' => $form_state->getValue('passwd'),
				
	);
	$insert = db_insert('form')
		-> fields(array(
			'name' => $values['name'],
			'passwd' => $values['passwd'],
		))
		->execute();
	
	drupal_set_message(t('The data have been saved'));
     
 }

}
