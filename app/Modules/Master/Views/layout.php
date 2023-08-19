<?php
    echo $this->include('\Modules\Master\Views\print_header');
?>   

    <?php echo $this->renderSection('content'); ?>

<?php
    echo $this->include('\Modules\Master\Views\print_footer');
?> 
