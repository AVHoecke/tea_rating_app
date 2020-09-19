<!-- File: /app/View/Posts/edit.ctp -->

<?php
$this->extend('/Teas/common');
$this->Html->addCrumb($tea['Tea']['name'], 'view/'.$tea['Tea']['id']);
$this->end();
echo $this->Form->create('Tea');
echo $this->Html->script('//ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.0.min.js');
?>
<table class="table table-tea">
    <tr>
        <td>Tea:</td>
        <?php
        echo $this->Form->input('id', ['type' => 'hidden']);
        ?>
    </tr>
    <tr>
        <td><?php echo $this->Form->input('name'); ?></td>
        <td><?php echo $this->Form->input('taste'); ?></td>
    </tr>
</table>
<table class="table table-rating">
    <tr>
        <td>Rating:</td>
    </tr>
    <tr>
        <td><?php
        echo $this->Form->input('Rating.id', ['type' => 'hidden']);
        echo $this->Form->input('Rating.rating_score_id', [
            'options' => $ratingScores,
            ]); ?></td>
        <td><?php echo $this->Form->input('Rating.comment'); ?></td>
    </tr>
</table>
<?php
echo $this->Form->button('Add ingredient', [
    'onclick' => 'showNextTeaConstituentRow()',
    'type' => 'button',
]);
?>
<table class="table table-ingredient">
    <tr>
        <td>Ingredients:</td>
    </tr>
    <?php
    foreach ($this->request->data['TeaConstituent'] as $teaConstituentId => $teaConstituentValue) {
        // This is might not be needen. Using singleTeaConstituent would be preferred.?>
        <tr class="<?='TeaConstituent'.$teaConstituentValue['id']?>">
        <?php
        echo $this->Form->input('TeaConstituent.'.$teaConstituentValue['id'].'.id', [
            'type' => 'hidden',
            'value' => $teaConstituentValue['id'],
            ]);
        echo $this->Form->input('TeaConstituent.'.$teaConstituentValue['id'].'.Ingredient.id', [
            'type' => 'hidden',
            'value' => $teaConstituentValue['ingredient_id'],
            ]);
        ?>
        <td><?php
        echo $this->Form->input('TeaConstituent.'.$teaConstituentValue['id'].'.Ingredient.name', [
            'value' => $teaConstituentValue['Ingredient']['name'],
            ]); ?></td>
        <td><?php
        echo $this->Form->input('TeaConstituent.'.$teaConstituentValue['id'].'.Ingredient.origin', [
            'value' => $teaConstituentValue['Ingredient']['origin'],
            ]); ?></td>
        <?php
        echo $this->Form->input('TeaConstituent.'.$teaConstituentValue['id'].'.Measurement.id', [
            'type' => 'hidden',
            'value' => $teaConstituentValue['Measurement']['id'],
            ]); ?>
        <td><?php
        echo $this->Form->input('TeaConstituent.'.$teaConstituentValue['id'].'.Measurement.amount', [
            'value' => $teaConstituentValue['Measurement']['amount'],
            ]); ?></td>
        <td><?php
        echo $this->Form->input('TeaConstituent.'.$teaConstituentValue['id'].'.Measurement.measurement_type_id', [
            'options' => $measurementTypeNames,
            'value' => $teaConstituentValue['Measurement']['measurement_type_id'],
            ]); ?></td>
        <td><?php
            echo $this->element('script/deleteConstituentRow', [
                'constituentNumber' => $teaConstituentValue['id'],
            ]);
        ?></td>
    <?php
    }
    ?>
</table>
<?php
echo $this->element('script/addConstituentRow', [
    'constituentIds' => $constituentIds,
]);
echo $this->Form->end('Save new THEÉ');
?>
