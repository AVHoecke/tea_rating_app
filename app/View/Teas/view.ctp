<!-- File: /app/View/Posts/view.ctp -->


<?php
//can this be more automated? how the the 'prepend' function work?
$this->Html->addCrumb('Teas', '/Teas',array('prepend' /*prepend pushes the Crumb in front? */ => true));
$this->Html->addCrumb('View', 'view/'.$tea['Tea']['id'] );
?>
<h2>Name: <?php echo h($tea['Tea']['name']); ?></h2>
<h3>Score: <?php echo $tea['Rating']['score']; ?></h3>
<h3>Taste: <?php echo $tea['Tea']['taste']; ?></h3>
<?php 
// echo var_dump($tea);
 ?>
<br>
<table>
    <?php foreach ($tea['TeaComponent'] as $teaComponent) : ?>
        <tr>
            <td>
                <?php 
                // echo print_r($ingredient); 
                ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $teaComponent['Ingredient']['name']; ?></td>
            <td>
                <?php echo $teaComponent['Ingredient']['origin']; ?>
            </td>
            <td>
                <?php echo $teaComponent['Quantity']['type']; ?>
            </td>
            <td>
                <?php echo $teaComponent['Quantity']['amount']; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>