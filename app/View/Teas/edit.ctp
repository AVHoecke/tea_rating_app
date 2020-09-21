<!-- File: /app/View/Teas/edit.ctp -->

<?php
$this->extend('/Teas/common');
$this->Html->addCrumb('Edit', 'edit/'.$this->request->data['Tea']['id']);
$this->end();
echo $this->Form->create('Tea', [
    'inputDefaults' => [
        'label' => false,
        'div' => false
    ]]);
?>
<table class="table table-tea">
    <tr>
        <h1>Tea:</h1>
        <?php
        echo $this->Form->input('id', ['type' => 'hidden']);
        ?>
    </tr>
    <tr>
        <th scope="col"><?php echo $this->Form->label('name'); ?></th>
        <th scope="col"><?php echo $this->Form->label('taste'); ?></th>
    </tr>
    <tr>
        <td><?php echo $this->Form->input('name'); ?></td>
        <td><?php echo $this->Form->input('taste'); ?></td>
    </tr>
</table>
<table class="table table-rating">
    <tr>
        <h3>Rating:</h3>
    </tr>
    <tr>
        <th scope="col"><?php echo $this->Form->label('Rating.rating_score_id'); ?></th>
        <th scope="col"><?php echo $this->Form->label('Rating.comment'); ?></th>
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
<table class="table table-ingredient">
    <tr>
        <h3>Ingredients:</h3>
    </tr>
    <tr>
        <th scope="col"><?php echo $this->Form->label('Ingredient.name'); ?></th>
        <th scope="col"><?php echo $this->Form->label('Ingredient.origin'); ?></th>
        <th scope="col"><?php echo $this->Form->label('Measurement.amount'); ?></th>
        <th scope="col"><?php echo $this->Form->label('Measurement.measurement_type_id'); ?></th>
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
        ]); ?>
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
            ]); ?></td>
    <?php
    }
    ?>
</table>
<?php
echo $this->Form->button('Add ingredient', [
    'onclick' => 'showNextTeaConstituentRow()',
    'type' => 'button',
]);
echo $this->element('script/addConstituentRow', [
    'constituentIds' => $constituentIds,
]);
echo $this->Form->end('Save new THEÉ');
?>