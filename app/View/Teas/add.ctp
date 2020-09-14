<?php
echo $this->Form->create('Tea');
echo $this->Html->script('//ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.0.min.js');
?>
<table class="table table-tea">
    <tr>
        <td>Tea:</td>
    </tr>
    <tr>
        <td><?php echo $this->Form->input('Tea.name'); ?></td>
        <td><?php echo $this->Form->input('Tea.taste'); ?></td>
    </tr>
</table>
<table class="table table-rating">
    <tr>
        <td>Rating:</td>
    </tr>
    <tr>
        <td><?php echo $this->Form->input('Tea.Rating.rating_score_id', [
            'options' => $ratingScores
            ]); ?></td>
        <td><?php echo $this->Form->input('Tea.Rating.comment'); ?></td>
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
    echo $this->element('/TeaConstituents/singleTeaConstituent');
    ?>
</table>
<script>
    
        constituentNumber = 0
    function showNextTeaConstituentRow() {
            $.get("/teaConstituents/htmlElement/"+ ++constituentNumber, function(data) {
                $(data).appendTo(".table-ingredient > tbody")
            })
    };
</script>
<?php
echo $this->Form->end('Save new THEÉ');
?>