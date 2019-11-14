
<div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-layers font-dark"></i>
                                            <span class="caption-subject bold uppercase"> Announcements </span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="btn-group">
                                                        <a  href="<?=base_url().'announcement/create'?>" class="btn sbold green"  data-toggle="Modal" title="Add New Announcement"> Add New
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
                                        <table class="table table-striped  table-hover table-checkable order-column" id="table">
                                            <thead>
                                                <tr>
                                                    <th> Title </th>
                                                    <th> Description </th>
                                                    <th> Date </th>
                                                    <th> Priority </th>
                                                    <th> Actions </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if(!empty($announcements)){
                                                    $slog = 1;
                                                    foreach($announcements as $announcement){
                                                ?>
                                                <tr class="<?php echo ($slog & 1)?"odd gradeX":"even gradeC" ?>">
                                                <td><?=$announcement->title?></td>
                                                <td><?=$announcement->description?></td>
                                                <td><?=$announcement->created_date?></td>
                                                <td><?=$announcement->visible?></td>
                                                                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-left" role="menu">
                                                                <li>
                                                                    <a  href="<?=base_url().'announcement/view/'.$announcement->id?>" data-toggle="Modal">
                                                                        <i class="icon-docs"></i> View </a>
                                                                </li>
                                                                
                                                                <li>
                                                                    <a  href="<?=base_url().'announcement/delete/'.$announcement->id?>" data-toggle="Modal">
                                                                        <i class="icon-user"></i> Delete </a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </td>
                                                
                                                </tr> 
                                                <?php    $slog++;}
                                                } else{ ?>
                                                <tr><td>No announcements yet</td></tr>
                                                <?php
                                                }
                                                ?>
    
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>