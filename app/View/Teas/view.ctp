<!-- File: /app/View/Posts/view.ctp -->


<?php
$this->extend('/Teas/common');
$this->Html->addCrumb($tea['Tea']['name'], [
    'controller' => 'teas',
    'action' => 'view',
    $tea['Tea']['id'],
    ]);
$this->end(); ?>

<h2>Name: <?php echo h($tea['Tea']['name']); ?></h2>
<h3>Taste: <?php echo $tea['Tea']['taste']; ?></h3>
<h3>Score: <?php echo $tea['Rating']['RatingScore']['score']; ?></h3>
<h3>Comment: <?php echo $tea['Rating']['comment']; ?></h3>
<br>
<table class="table">
    <tr>
        <h3>Ingredients:</h3>
    </tr>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Origin</th>
        <th scope="col">Amount</th>
        <th scope="col">Symbol</th>
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