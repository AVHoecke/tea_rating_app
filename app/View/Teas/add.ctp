<?php
echo $this->Form->create('TeaComponent');
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
        <td><?php echo $this->Form->input('Tea.Rating.score');   ?></td>
        <td><?php echo $this->Form->input('Tea.Rating.comment'); ?></td>
    </tr>
</table>
<table class="table table-ingredient">
    <tr>
        <td>Ingredients:</td>
    </tr>
    <?php
    echo $this->element('Teas/component', ['componentNumber' => 0]);
    echo $this->Form->button('Add component', [
        'onclick' => 'showNextTeaComponentRow()',
        'type' => 'button',
    ])
    ?>
    <!-- Ik zou een vooringevuld ingredient kunnen gebruiken door: 
Common Options For Specific Controls 'deafult' te gebruiken. cookbook page 319 -->
    <!-- 
Ik wil meerdere ingredienten voor een Thee kunnen invullen. 
Denkpistes:
    -met javascript een extra optie toevoegen.
    -met een button de controller vragen naar een upgedate form ("FormHelper::button")
    -verwijzen naar een Ingredienten pagina.
     -->
</table>
<script>
    componentNumber = 0

    function showNextTeaComponentRow() {
        $('#teaComponent').last().append(
            $.get("/component/htmlElement" + componentNumber, function(data) {
                $(".result").html(data);
                alert("Load was performed.");
            })
        )
    };
</script>
<?php
echo $this->Form->end('Save new THEÉ');
?>