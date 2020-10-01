<script>
        constituentNumber = 1;
        <?php if(isset($constituentIds)) {
            echo "constituentIds = ".json_encode($constituentIds).';';
        } 
        ?>
    function showNextTeaConstituentRow() {
        function checkIdInList() {
            if (typeof constituentIds !== "undefined" && constituentIds.includes(String(constituentNumber))) {
            constituentNumber++ ;
            checkIdInList();
            }
        }
        checkIdInList();   
        $.get('<?= $this->Html->url(['controller' => 'teaConstituents', 'action' => 'getConstituentHtmlElement']) ?>/'+ constituentNumber++, function(data) {
            $(data).appendTo(".table-ingredient > tbody")
        })
    };
</script>   