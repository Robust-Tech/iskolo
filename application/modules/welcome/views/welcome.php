<div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.html">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <small></small>
                                </li>
                            </ul>
                        </div>
                         <h1 class="page-title"><?='Welcome back'?> ,
				<?php echo User::displayName(User::get_id()); ?> 
                        </h1>
<div class="row">
                 <?php
			$user_id = User::get_id();
			$name = User::profile_info($user_id)->firstname;
			$belongs_to = json_decode($name);
			$subjects = App::counter('users',array('role_id'=>1));
            $student =App::counter('users',array('role_id'=> 4));
    		$parents = App::counter('users',array('role_id'=>3));
            $teacher =App::counter('users',array('role_id'=> 2));
    
			?>          
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 blue" href="<?=base_url()?>student">
                                    <div class="visual">
                                        <i class="fa fa-group"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="1349"><?=$student?></span>
                                        </div>
                                        <div class="desc"> Students</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 red" href="<?=base_url()?>teacher/">
                                    <div class="visual">
                                        <i class="icon-users"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="12,5"><?=$teacher?></span> </div>
                                        <div class="desc"> Teachers</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 green" href="<?=base_url()?>parenter/">
                                    <div class="visual">
                                        <i class="icon-user"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="549"><?=$parents?></span>
                                        </div>
                                        <div class="desc"> Parents</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 purple" href="<?=base_url()?>account">
                                    <div class="visual">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number"> 
                                            <span data-counter="counterup" data-value="89"><?=$subjects?></span></div>
                                        <div class="desc"> Administrators </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
<div class="row">
                            <div class="col-lg-6 col-xs-12 col-sm-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption">
                                            <i class="icon-bubbles font-dark hide"></i>
                                            <span class="caption-subject font-dark bold uppercase">Top Students</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="portlet_comments_1">
                                                <!-- BEGIN: Comments -->
                                                </div>
                                                <!-- END: Comments -->
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            
                            <div class="col-lg-6 col-xs-12 col-sm-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption">
                                            <i class=" icon-social-twitter font-dark hide"></i>
                                            <span class="caption-subject font-dark bold uppercase">Actvities</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_actions_pending">
                                                <!-- BEGIN: Actions -->
                                                <div class="mt-actions">
                                                

                                                </div>
                                                <!-- END: Actions -->
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<div class="row">
                                                        
    <div class="col-lg-12 col-xs-12 col-sm-12">
                                <!-- BEGIN PORTLET-->
                                <div class="portlet light calendar bordered">
                                    <div class="portlet-title ">
                                        <div class="caption">
                                            <i class="icon-calendar font-dark hide"></i>
                                            <span class="caption-subject font-dark bold uppercase">Timetable</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div id="calendar"> </div>
                                    </div>
                                </div>
                                <!-- END PORTLET-->
                            </div>
                            </div>