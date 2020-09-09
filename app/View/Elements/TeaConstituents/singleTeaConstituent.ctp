<?php
if (!isset($constituentNumber)) {
    $constituentNumber = 0;
}
?>
<tr class="<?='TeaConstituent'.$constituentNumber?>">
    <td><?php echo $this->Form->input('TeaConstituent.'.$constituentNumber.'.Ingredient.name'); ?></td>
    <td><?php echo $this->Form->input('TeaConstituent.'.$constituentNumber.'.Ingredient.origin'); ?></td>
    <td><?php echo $this->Form->input('TeaConstituent.'.$constituentNumber.'.Quantity.amount'); ?></td>
    <td><?php 
    /**
     *  Bug patch:
     *  */ 
    $parseEnumArray = Configure::read('Quantity.type');
    $EnumArray[] = $parseEnumArray[0];
    $EnumArray = array_merge_recursive($EnumArray,$parseEnumArray);
    
    echo $this->Form->input('TeaConstituent.'.$constituentNumber.'.Quantity.type', [
        'options' => $EnumArray,
        'default' => '0',
    ]); ?></td>
    <td><?php echo $this->Form->button('Delete', [
        'onclick' => '$(\'.TeaConstituent'.$constituentNumber.'\').remove()',
        'type' => 'button',
    ]); ?></td>
</tr>