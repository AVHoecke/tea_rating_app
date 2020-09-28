<!-- File: /app/View/Teas/add.ctp -->

<?php
$this->extend('/Teas/common');
$this->Html->addCrumb(
    'Add tea',
    ['controller' => 'teas','action' => 'add']
);
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
        <td><?php echo $this->Form->input('Rating.rating_score_id', [
            'options' => $ratingScores
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
    echo $this->requestAction('teaConstituents/getConstituentHtmlElement/0');
    ?>
</table>
<?php
    echo $this->Form->button('Add ingredient', [
        'onclick' => 'showNextTeaConstituentRow()',
        'type' => 'button',
        'class' => 'basicButton',
    ]);
echo $this->element('script/addConstituentRow');
echo $this->Form->end('Save new THEÉ');
?>