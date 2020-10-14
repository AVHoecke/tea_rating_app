<!-- File: /app/View/Teas/index.ctp -->
<?php $this->extend('/Teas/common');
$this->end(); ?>
<div class="row">
    <div class="col">
        <div class="row">
            <div class="col-4">
                <h4>Rated teas:</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                    </tr>
                    <?php foreach ($teas as $tea) : ?>
                        <tr>
                            <td scope="row">
                                <?php echo $tea['Tea']['id']; ?>
                            </td>
                            <td>
                                <?php echo $this->Html->link(
                                    $tea['Tea']['name'],
                                    [
                                        'action' => 'view',
                                        $tea['Tea']['id']
                                    ]
                                ); ?>
                            </td>
                            <td scope="row">
                                <?php echo $this->Form->button(
                                    $this->Html->link(
                                        'Edit',
                                        [
                                            'action' => 'edit',
                                            $tea['Tea']['id']
                                        ]
                                    ),
                                    [
                                        'type' => 'button',
                                        'class' => 'basicButton'
                                    ]
                                ); ?>
                            </td>
                            <td scope="row">
                                <?php echo $this->Form->button(
                                    $this->Form->postLink(
                                        'Delete',
                                        [
                                            'action' => 'delete',
                                            $tea['Tea']['id']
                                        ],
                                        [
                                            'confirm' => 'Are you sure?'
                                        ]
                                    ),
                                    [
                                        'type' => 'button',
                                        'class' => 'basicButton'
                                    ]
                                ); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php echo $this->Form->button(
                    $this->Html->link(
                        'Add new tea',
                        [
                            'action' => 'add',
                        ]
                    ),
                    [
                        'type' => 'button',
                        'class' => 'button basicButton'
                    ]
                ); ?>
            </div>
        </div>
    </div>
</div>