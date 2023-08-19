<?php
    echo $this->include('\Modules\Master\Views\header_super');
    echo $this->include('\Modules\Master\Views\sidebar_super');
?>   

<?php echo $this->renderSection('content'); ?>

<?php
    echo $this->include('\Modules\Master\Views\footer');
?> 
