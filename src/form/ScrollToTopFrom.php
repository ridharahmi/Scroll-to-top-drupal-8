<?php

namespace Drupal\scroll_to_top\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ScrollToTopFrom extends FormBase
{

    public function getFormId()
    {
        return 'ScrollToTop_From';
    }

}