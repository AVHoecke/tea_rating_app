<?php echo $this->Form->button('Delete', [
        'onclick' => 'deleteConstituent('.$constituentNumber.')',
        'type' => 'button',
    ]); ?>
<script>
function deleteConstituent(constituentNumber) {
    $(".TeaConstituent"+constituentNumber).remove();
    $.post('<?= $this->Html->url(['controller' => 'teaConstituents', 'action' => 'delete']) ?>/'+constituentNumber);
};
</script>