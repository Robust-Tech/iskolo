
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
                                        <table class="table table-striped order-column" id="table">
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
                                                <td><?=$parent->firstname?> <?=$parent->lastname?></td>
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
                                                                    <a href="" onclick="">
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
