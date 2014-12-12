<?php

/**
 * Default formatter class for forms
 */
class sfWidgetFormSchemaFormatterTwitterBootstrap extends sfWidgetFormSchemaFormatter
{
    protected $rowFormat    = "%error%%label%\n  <div class=\"col-sm-9\">%field%%help%\n%hidden_fields%</div>\n";
    protected $errorRowFormat = "%errors%";
    protected $errorListFormatInARow = "%errors%";
    protected $errorRowFormatInARow = "<span class=\"help-block error-block\">%error%</span>";
    protected $helpFormat = '<span class="help-block">%help%</span>';
    protected $decoratorFormat = "<ul class=\"man\">\n  %content%</ul>";

    protected $validatorSchema;

    /**
     * Generates a label for the given field name.
     *
     * @param string $name       The field name
     * @param array  $attributes Optional html attributes for the label tag
     *
     * @return string The label tag
     */
    public function generateLabel($name, $attributes = array())
    {
        $labelName = $this->generateLabelName($name);

        if (false === $labelName) {
            return '';
        }

        if (!isset($attributes['for'])) {
            $attributes['for'] = $this->widgetSchema->generateId($this->widgetSchema->generateName($name));
        }

        if ($this->validatorSchema) {
            $fields = $this->validatorSchema->getFields();
            if (isset($fields[$name]) && $fields[$name] != null) {
                $field = $fields[$name];
                if ($field->hasOption('required') && $field->getOption('required')) {
                    $attributes['class'] = isset($attributes['class']) ? $attributes['class'] : '';
                    $attributes['class'] .= 'input-obligation';
                }
            }
        }

        $attributes['class'] = isset($attributes['class']) ? $attributes['class'] : '';
        $attributes['class'].= ' col-sm-3';

        return $this->widgetSchema->renderContentTag('label', $labelName, $attributes);
    }

    public function setValidatorSchema(sfValidatorSchema $validatorSchema)
    {
        $this->validatorSchema = $validatorSchema;
    }

    /**
     * {@inheritdoc}
     *
     * @param        $label
     * @param        $field
     * @param array  $errors
     * @param string $help
     * @param null   $hiddenFields
     *
     * @return string
     */
    public function formatRow($label, $field, $errors = array(), $help = '', $hiddenFields = null)
    {
        return strtr($this->getRowFormat(), array(
            '%label%'         => "$label",
            '%field%'         => $field,
            '%error%'         => $this->formatErrorsForRow($errors),
            '%error-class%'   => ($this->formatErrorsForRow($errors) == '') ? '' : 'error',
            '%help%'          => $this->formatHelp($help),
            '%hidden_fields%' => null === $hiddenFields ? '%hidden_fields%' : $hiddenFields,
        ));
    }
}
