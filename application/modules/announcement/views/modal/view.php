<?php
$announcement = App::get_data($id,'announcements');
$role =  App::get_data($announcement->role_id,'roles');
 ?>
<div class="modal-dialog">
    <div class="modal-content portlet light portlet-fit bordered">
        <div class="modal-header portlet-title"> <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title caption-subject bold uppercase"><?=$announcement->title?></h4> 
        </div>                                
        <div class="portlet-body modal-body"> 
        <div class="row">
        <div class="col-md-6"><p class="bold"> Assigned to: <?=$role->role?>s</p> </div> <div class="col-md-6"></div>                                  
        <div class="col-md-12"><p><?=$announcement->description?></p></div>
        </div>
        </div>
        <div class="modal-footer form-actions"> 
        <a href="#" class="btn btn-default" data-dismiss="modal"><?='Close'?></a>
        </div>
</div>
</div>
</div>