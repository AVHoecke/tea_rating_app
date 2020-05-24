<!-- File: /app/View/Posts/index.ctp -->
<?php
$this->Html->addCrumb('Teas', '/Teas', ['prepend' => true]);
?>
<?php
echo $this->Html->link('Add new THEÉ', ['action' => 'add']);
?>
<table>
<tr>
    <td>
        <h4>Rated teas:</h4>
    </td>
</tr>
<tr>
    <th>Id</th>
    <th>Name</th>
</tr>

<?php foreach ($teas as $tea) : ?>
    <tr>
    <td><?php echo $tea['Tea']['id']; ?></td>
    <td>
    <?php
    echo $this->Html->link(
    $tea['Tea']['name'],
    ['action' => 'view', $tea['Tea']['id']]
);
    ?>
    </td>
    <td>
    <?php
    echo $this->Form->postLink(
        'Delete',
        ['action' => 'delete', $tea['Tea']['id']],
        ['confirm' => 'Are you sure?']
    );
    ?>
    <?php
    echo $this->Html->link(
        'Edit',
        ['action' => 'edit', $tea['Tea']['id']]
    );
    ?>
    </td>
    </tr>
    <?php endforeach; ?>
    
    </table>