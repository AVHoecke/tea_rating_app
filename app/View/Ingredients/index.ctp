<!-- File: /app/View/Posts/index.ctp -->
<?php
$this->extend('/Ingredients/common');
$this->end(); ?>
<h2>Ingredients:</h2>
<table class="table">
    <tr>
        <th scope="col">Name:</th>
        <th scope="col">Origin:</th>
    </tr>
    <?php foreach ($ingredients as $ingredient) : ?>
        <tr>
            <td><?php echo $ingredient['Ingredient']['name']; ?></td>
            <td><?php echo $ingredient['Ingredient']['origin']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</table>