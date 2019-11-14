<div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.html">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span><?='Timetable'?></span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        
                                        <li>
                                           <a href="<?=base_url()?>timetable/settings" data-toggle="ajaxModal" ><i class="fa fa-cog"></i> <?='Timetable settings'?></a>
                                        </li>
                                        <li>
                                            <?php  if(User::is_admin()){ ?>
          <a href="<?=base_url()?>timetable/add_event" data-toggle="ajaxModal"><i class="fa fa-calendar-plus-o"></i> <?='Add Event'?></a>
          <?php } ?>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>


<div class="row">
                            <div class="col-md-12">
                                <div class="portlet light portlet-fit bordered calendar">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-green"></i>
                                            <span class="caption-subject font-green sbold uppercase"><?='Timetable'?></span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row">
                                         
                                            <div class="col-md-12 col-sm-12">
                                                <div id="calendar" class="has-toolbar"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



