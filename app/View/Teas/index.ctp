<!-- File: /app/View/Teas/index.ctp -->
<?php
$this->extend('/Teas/common');
$this->end(); ?>
<table class="table">
<tr>
    <td>
        <h4>Rated teas:</h4>
    </td>
</tr>
<tr>
    <th scope="col">Name</th>
    <th scope="col">Id</th>
</tr>

<?php foreach ($teas as $tea) : ?>
    <tr>
        <td scope="row"><?php echo $tea['Tea']['id']; ?></td>
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
        echo $this->Form->button($this->Html->link(
            'Edit',
            ['action' => 'edit', $tea['Tea']['id']]
        ), ['type'=> 'button']);
        ?>
        </td>
        <td>
        <?php
        echo $this->Form->button($this->Form->postLink(
            'Delete',
            ['action' => 'delete', $tea['Tea']['id']],
            ['confirm' => 'Are you sure?']
        ), ['type'=> 'button']);
        ?>
        </td>
    </tr>
    <?php endforeach;
     ?>
    </table>
    <?php
echo $this->Form->button(
         $this->Html->link('Add new tea', ['action' => 'add']),
         ['type'=> 'button']
     );
?>