
<div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">  Parents</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="btn-group">
                                                        <a id="sample_editable_1_new" class="btn sbold green"  data-toggle="modal" href="#addnew"> Add New
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group pull-right">
                                                        <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-print"></i> Print </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th> Name </th>
                                                    <th> Email </th>
                                                    <th> Phone </th>
                                                    <th> Address </th>
                                                    <th> Actions </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if(!empty($parents)){
                                                    $slog = 1;
                                                    foreach($parents as $parent){
                                                ?>
                                                <tr class="<?php echo ($slog & 1)?"odd gradeX":"even gradeC" ?>">
                                                <td><?=$parent->parent_name?> <?=$parent->mid_name?> <?=$parent->parent_surname?></td>
                                                <td><?=$parent->email?></td>
                                                <td><?=$parent->cell_number?></td>
                                                <td><?=$parent->home_address?></td>
                                                                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-left" role="menu">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="icon-docs"></i> View </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="icon-note"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="icon-user"></i> Delete </a>
                                                                </li>
                                                                <li class="divider"> </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="icon-flag"></i> MarkSheet
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                
                                                </tr> 
                                                <?php    $slog++;}
                                                } else{ ?>
                                                <tr><td>No parents are registered yet</td></tr>
                                                <?php
                                                }
                                                ?>
    
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
<div id="addnew" class="modal fade draggable-modal modal-scroll" tabindex="-1" data-replace="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Add New Parent</h4>
                                                    </div>
                                                    <?=form_open()?>
                                                    <div class="modal-body">
                                                        
                                                    </div>  
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                                    </div>
                                                    <?= form_close()?>
                                                </div>
                                            </div>
                                        </div>