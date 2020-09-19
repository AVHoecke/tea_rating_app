<?php
if (!isset($constituentNumber)) {
    $constituentNumber = 0;
}
?>
<tr class="<?='TeaConstituent'.$constituentNumber?>">
    <td><?php echo $this->Form->input('TeaConstituent.'.$constituentNumber.'.Ingredient.name'); ?></td>
    <td><?php echo $this->Form->input('TeaConstituent.'.$constituentNumber.'.Ingredient.origin'); ?></td>
    <td><?php echo $this->Form->input('TeaConstituent.'.$constituentNumber.'.Measurement.amount'); ?></td>
    <td><?php 
    echo $this->Form->input('TeaConstituent.'.$constituentNumber.'.Measurement.measurement_type_id', [
        'options' => $measurementTypeNames,
        'default' => '0',
    ]); ?></td>
    <td><?php 
    echo $this->element('script/deleteConstituentRow', [
        'constituentNumber' => $constituentNumber,
    ]);?></td>
</tr>