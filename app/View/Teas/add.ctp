<?php
echo $this->Form->create('TeaComponent');
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
    <?php echo $this->element('teaComponent', [0]);
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
<script type="text/javascript">
    function showNextTeaComponentRow(){
console.log("Working!");
var thisTable = document.getElementsByClassName("table-ingredient")[0];
thisTable.firstElementChild.children[2].removeAttribute('hidden');
};
</script>
<?php
echo $this->Form->end('Save new THEÉ');
?>