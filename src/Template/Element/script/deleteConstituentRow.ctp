<?php echo $this->Form->button('Delete', [
    'onclick' => 'deleteConstituent('.$constituentNumber.')',
    'type' => 'button',
    'class' => 'basicButton',
]); ?>
<script>
function deleteConstituent(constituentNumber) {
    $(".TeaConstituent"+constituentNumber).remove();
    $.post('<?= $this->Url->build(['controller' => 'teaConstituents', 'action' => 'delete']) ?>/'+constituentNumber);
};
</script>