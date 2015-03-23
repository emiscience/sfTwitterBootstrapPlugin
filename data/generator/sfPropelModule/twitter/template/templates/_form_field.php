[?php if ($field->isPartial()): ?]
  [?php include_partial('<?php echo $this->getModuleName() ?>/'.$name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php elseif ($field->isComponent()): ?]
  [?php include_component('<?php echo $this->getModuleName() ?>', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php else: ?]
  <div class="control-group [?php echo $class ?][?php $form[$name]->hasError() and print ' error' ?]">

      <div class="col-sm-2 control-label">
        [?php echo $form[$name]->renderLabel($label) ?]
      </div>

    <div class="col-sm-8">
        [?php $attributes = $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes ?]
        [?php if ($field->getType() == "Boolean"): ?]
            [?php $attributes = $attributes ?]
        [?php elseif (isset($attributes['class'])): ?]
            [?php $attributes['class'] .= " form-control" ?]
        [?php else: ?]
            [?php $attributes['class'] = " form-control" ?]
        [?php endif; ?]
        [?php echo $form[$name]->renderError() ?]
        [?php echo $form[$name]->render($attributes) ?]

        [?php if ($help): ?]
            <p class="help-block">[?php echo __(html_entity_decode($help), array(), '<?php echo $this->getI18nCatalogue() ?>') ?]</p>
        [?php elseif ($help = $form[$name]->renderHelp()): ?]
            <p class="help-block">[?php echo $help ?]</p>
        [?php endif; ?]
    </div>
  </div>
[?php endif; ?]
