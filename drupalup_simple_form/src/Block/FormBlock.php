<?php

namespace Drupal\drupalup_simple_form\Plugin\Block;

use Drupal\Core\Block\BlockBase;


class FormBlock extends BlockBase {

    public function build()
    {
        $form = \Drupal::formBuilder()->getForm('Drupal\drupalup_simple_form\Form\SimpleForm');
        return $form;
    }

    
}