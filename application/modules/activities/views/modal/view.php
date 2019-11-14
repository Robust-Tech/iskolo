<?php
$activity = App::get_data($id,'activities');
$activity_type =  App::get_data($activity->type_id,'activity_type');
 ?>
<div class="modal-dialog">
    <div class="modal-content portlet light portlet-fit bordered">
        <div class="modal-header portlet-title"> <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title caption-subject bold uppercase"><?=$activity->activity_name?></h4><p class="bold">Type: <?=$activity_type->name?></p> 
        </div>                                
        <div class="portlet-body modal-body"> 
        <div class="row">
        <div class="col-md-6"><p class="bold"> Start Date: <?=$activity->start_date?></p> </div> <div class="col-md-6"><p class="bold pull-right"> End Date: <?=$activity->end_date?></p> </div>                                  
        <div class="col-md-12"><p><?=$activity->description?></p></div>
        </div>
        </div>
        <div class="modal-footer form-actions"> 
        <a href="#" class="btn btn-default" data-dismiss="modal"><?='Close'?></a>
        </div>
</div>
</div>
</div>