<?= $this->extend('\Modules\Master\Views\master') ?>
<?= $this->section('content') ?>

 <?php
  $edit= menu_access('roleupdate');
  $delete= menu_access('roledelete');
 ?>

<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Roles List  </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Roles List  </li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title --> 
  
                
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="card">
                        <div class="card-body ">
                            <h4 class="card-title mb-4">User Role List</h4>  
                             <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>  
                                        <th scope="col">Role Name</th>      
                                        <th scope="col">Actiom</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($roles as $role){ ?>
                                    <tr>   
                                        <td><?=$role['role_name'];?></td>  
                                        <td>

                                        <a type="button" class="view_details btn btn-outline-success btn-sm" data-index="<?=$role['id']?>">View</a>

                                        <?php if($edit){ if($role['status']==1){?>
                                            <a href="<?=site_url('admin/roleupdate/'.$role['id'])?>" type="button" class="btn btn-outline-success btn-sm">Edit</a>
                                            <?php }} if($delete){ if($role['status']==1){?>
                                            <a href="<?=site_url('admin/roledelete/'.$role['id'])?>" type="button" class="btn btn-outline-danger btn-sm">Delete</a>
                                            <?php  }}?>
                                        </td>
                                    </tr>  
                                   <?php }?>
                                </tbody>
                            </table>
                             
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div> 
                <!-- end col -->
            </div>
            <!-- end row -->
            
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
  <!--  Modal content for the above example -->
    <div id="show_access" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="float:center;" id="myExtraLargeModalLabel">User access</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="add_data">
                    <hr>
                    <h4>User access</h4>
                   
                       
                        <input type="checkbox"value="" checked>
                     
                   
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        function ucwords(str,force){
  str=force ? str.toLowerCase() : str;  
  return str.replace(/(\b)([a-zA-Z])/g,
           function(firstLetter){
              return   firstLetter.toUpperCase();
           });
}
      $(document).ready(function(){

      $(document).on("click",".view_details",function () {
    
        var role_id = $(this).attr('data-index');

        $.ajax({
      url:"<?php echo base_url('admin/view_access'); ?>",
      method:"POST",
      data:{role_id:role_id},
      dataType:'JSON',
      success:function(data)
      {
          var access= data['user_access'];
          var access= JSON.parse(access);
          const propertyNames = Object.keys(access);
        
        //console.log(access);
        console.log(propertyNames.length);
        var html1 = '<div class="modal-body">';
        var html='';
        var a=0;
        for(i=0;i<propertyNames.length;i++){
            // if(i % 2 == 0) {
                let value = propertyNames[i];
 
                if(access[value] != null){
                   if(a % 2 == 0) {
                   var text = access[value].replace("_", " ");
                   var text = text.replace("update", " Update");
                   var text = text.replace("add", " Add");
                   var text = text.replace("list", " List");
                   var text = text.replace("setup", " Setup");
                   var text = text.replace("delete", " Delete");
                   var text = text.replace("report", " Report");
                   var text = text.replace("salary", " Salary");
                   var text = text.replace("solution", " Solution");
                   text=ucwords(text,true);
                    html +='<div class="row"><div style="" class="col-md-6"><li>'+text+'</li></div>';
                   }else{
           
                    var text2 = access[value].replace("_", " ");
                    var text2 = text2.replace("update", " Update");
                    var text2 = text2.replace("add", " Add");
                    var text2 = text2.replace("list", " List");
                    var text2 = text2.replace("setup", " Setup");
                    var text2 = text2.replace("delete", " Delete");
                    var text2 = text2.replace("report", " Report");
                    var text2 = text2.replace("salary", " Salary");
                    var text2 = text2.replace("solution", " Solution");
                    text2=ucwords(text2,true);
                    html +='<div style="" class="col-md-6"><li>'+text2+'</li></div></div>';
                   }
                    a++
               }

         
            
         
            }

            var html3 = '</div>';

           var html2 = html1 + html + html3;
          $('#add_data').html(html2);

          $("#show_access").modal("show");

      }

});

});
});
</script>
<?php echo $this->endSection('content') ?>