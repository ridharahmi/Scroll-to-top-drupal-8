<?php

namespace Drupal\scroll_to_top\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;


class ScrollForm extends ConfigFormBase
{
    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return 'ScrollToTop_Form';
    }

    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames()
    {
        return [
            'scroll_to_top.ScrollToTop_Form'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $config = $this->config('scroll_to_top.settings');
        $form['scroll_to_top_label'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Label'),
            '#default_value' => $config->get('scroll_to_top_label'),
            '#description' => $this->t('label displayed in scroll to top link, default "Back to top".'),
            '#size' => 15,
        );

        $form['scroll_to_top_position'] = array(
            '#title' => $this->t('Position'),
            '#description' => $this->t('Sroll to top button position'),
            '#type' => 'select',
            '#options' => array(
                1 => $this->t('left'),
                2 => $this->t('middle'),
                3 => $this->t('right'),
            ),
            '#default_value' => $config->get('scroll_to_top_position'),
        );

        $form['scroll_to_top_bg_color_out'] = array(
            '#type' => 'color',
            '#title' => $this->t('Background color on mouse out.'),
            '#description' => $this->t('Button background color on mouse over default #555555'),
            '#default_value' => $config->get('scroll_to_top_bg_color_out'),
        );

        $form['scroll_to_top_bg_color_hover'] = array(
            '#type' => 'color',
            '#title' => $this->t('Background color on mouse hover.'),
            '#description' => $this->t('Button background color on mouse over default #777777'),
            '#default_value' => $config->get('scroll_to_top_bg_color_hover'),
        );

        $form['scroll_to_top_display_text'] = array(
            '#type' => 'checkbox',
            '#title' => $this->t('Display label'),
            '#description' => $this->t('Display "BACK TO TOP" text under the button'),
            '#default_value' => $config->get('scroll_to_top_display_text'),
        );
        $form['scroll_to_top_enable_admin_theme'] = array(
            '#type' => 'checkbox',
            '#title' => $this->t('Enable on administration theme.'),
            '#description' => $this->t('Enable scroll to top button on administartion theme.'),
            '#default_value' => $config->get('scroll_to_top_enable_admin_theme'),
        );
        $form['scroll_to_top_preview'] = array(
            '#type' => 'item',
            '#title' => $this->t('Preview'),
            '#markup' => '<div id="scroll-to-top-prev-container">' . $this->t('Change a setting value to see a preview. "Position" and "enable on admin theme" not included.') . '</div>',
        );

        return parent::buildForm($form, $form_state);

    }


    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {

        $config = $this->configFactory->getEditable('scroll_to_top.settings');
        $form_values = $form_state->getValues();

        $config->set('scroll_to_top_label', $form_values['scroll_to_top_label'])
            ->set('scroll_to_top_position', $form_values['scroll_to_top_position'])
            ->set('scroll_to_top_bg_color_hover', $form_values['scroll_to_top_bg_color_hover'])
            ->set('scroll_to_top_bg_color_out', $form_values['scroll_to_top_bg_color_out'])
            ->set('scroll_to_top_display_text', $form_values['scroll_to_top_display_text'])
            ->set('scroll_to_top_enable_admin_theme', $form_values['scroll_to_top_enable_admin_theme'])
            ->save();

        parent::submitForm($form, $form_state);
    }


}