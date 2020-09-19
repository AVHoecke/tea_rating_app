<!-- File: /app/View/Posts/index.ctp -->
<?php
$this->extend('/Ingredients/common');
$this->end(); ?>
<h1>Ingredients:</h1>
<table>
    <tr>
        <td>Name:</td>
        <td>Origin:</td>
    </tr>
    <?php foreach ($ingredients as $ingredient) : ?>
        <tr>
            <td><?php echo $ingredient['Ingredient']['name']; ?></td>
            <td><?php echo $ingredient['Ingredient']['origin']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</table>