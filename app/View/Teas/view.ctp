<!-- File: /app/View/Posts/view.ctp -->


<?php
// $this->Html->addCrumb('Teas', '/Teas',array('prepend' /*prepend pushes the Crumb in front? */ => true));
$this->Html->addCrumb('Ingredient', 'ingredient/'.$tea['Tea']['id']);
?>
<h2>Name: <?php echo h($tea['Tea']['name']); ?></h2>
<h3>Score: <?php echo $tea['Rating']['RatingScore']['score']; ?></h3>
<h3>Taste: <?php echo $tea['Tea']['taste']; ?></h3>
<br>
<table>
    <tr>
        <h1>Ingredients:</h1>
    </tr>
    <tr>
        <th>Name</th>
        <th>Origin</th>
        <th>Amount</th>
        <th>Symbol</th>
    </tr>
    <?php foreach ($tea['TeaConstituent'] as $teaConstituent) : ?>
        <tr>
            <td><?php echo $teaConstituent['Ingredient']['name']; ?></td>
            <td>
                <?php echo $teaConstituent['Ingredient']['origin']; ?>
            </td>
            <td>
                <?php echo $teaConstituent['Measurement']['amount']; ?>
            </td>
            <td>
                <?php echo $teaConstituent['Measurement']['MeasurementType']['symbol']; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>