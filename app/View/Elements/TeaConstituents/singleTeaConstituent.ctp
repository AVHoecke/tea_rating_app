<?php
if (!isset($constituentNumber)) {
    $constituentNumber = 0;
}
?>
<tr class="<?='TeaConstituent'.$constituentNumber?>">
    <td><?php echo $this->Form->input('TeaConstituent.'.$constituentNumber.'.Ingredient.name'); ?></td>
    <td><?php echo $this->Form->input('TeaConstituent.'.$constituentNumber.'.Ingredient.origin'); ?></td>
    <td><?php echo $this->Form->input('TeaConstituent.'.$constituentNumber.'.Quantity.type'); ?></td>
    <td><?php echo $this->Form->input('TeaConstituent.'.$constituentNumber.'.Quantity.amount'); ?></td>
    <td><?php echo $this->Form->button('Delete', [
        'onclick' => '$(\'.TeaConstituent'.$constituentNumber.'\').remove()',
        'type' => 'button',
    ]); ?></td>
    
</tr>