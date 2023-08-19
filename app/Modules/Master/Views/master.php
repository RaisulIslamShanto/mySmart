<?php
    echo $this->include('\Modules\Master\Views\header');
    echo $this->include('\Modules\Master\Views\sidebar');
?>   

    <?php echo $this->renderSection('content'); ?>

<?php
    echo $this->include('\Modules\Master\Views\footer');
?> 
