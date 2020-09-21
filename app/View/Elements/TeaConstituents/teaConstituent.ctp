<?php
if (!isset($constituentNumber)) {
    $constituentNumber = 0;
}
?>
<tr class="<?='TeaConstituent'.$constituentNumber?>">
    <td><?php echo $this->Form->input('TeaConstituent.'.$constituentNumber.'.Ingredient.name', [
        'label' => false,
    ]); ?></td>
    <td><?php echo $this->Form->input('TeaConstituent.'.$constituentNumber.'.Ingredient.origin', [
        'label' => false,
    ]); ?></td>
    <td><?php echo $this->Form->input('TeaConstituent.'.$constituentNumber.'.Measurement.amount', [
        'label' => false,
    ]); ?></td>
    <td><?php
    echo $this->Form->input('TeaConstituent.'.$constituentNumber.'.Measurement.measurement_type_id', [
        'options' => $measurementTypeNames,
        'default' => '0',
        'label' => false,
    ]); ?></td>
    <td><?php
    echo $this->element('script/deleteConstituentRow', [
        'constituentNumber' => $constituentNumber,
    ]);?></td>
</tr>