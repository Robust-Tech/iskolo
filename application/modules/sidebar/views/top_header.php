<div class="page-header navbar navbar-fixed-top">
	<div class="page-header-inner">
		<div class="page-logo">
			
			<a href="<?=base_url()?>">
				<?php echo config_item('website_name'); ?>
			</a>
			  <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
		</div>
         <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
        <div class="top-menu">
            
        		<ul class="nav navbar-nav pull-right">
			<?php $role = $this->User->login_role_name(); 
			$mystudent = App::mystudent($this->User->get_id());
			if(User::is_parent()){
			?>
			
			        
			        <?php
			        if(!empty($mystudent)){
			            
			            $i = 1;?>
			            <li class="dropdown dropdown-user">
			    <ul>
			            <?php
			        foreach($mystudent  as $student){ ?>
			        
			        <li><a href="<?=base_url()?>/student/get_mystudent/<?=$student->user_id?>"> <?=$student->firstname .' '. $student->surname?></a></li>
			    <?php
			    $i++;}
			    ?>
			    </ul>
			</li>
			<?php } else{ echo '<li> <a>                                    <span class="username username-hide-on-mobile"> No Students Registered</span></a><li>';}
			}?>
			<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle"  data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<?php
						$user = $this->User->get_id();
						$user_email = $this->User->login_info($user)->email;
						?>
                         <img alt="" class="img-circle" src="<?php echo User::avatar_url($user);?>" />
                                    <span class="username username-hide-on-mobile"> <?php echo User::displayName($user);?> </span>
                                    <i class="fa fa-angle-down"></i> 
				</a>
				                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="<?=base_url()?>profile">
                                            <i class="icon-user"></i> My Profile </a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>timetable">
                                            <i class="icon-calendar"></i> My Calendar </a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>messages">
                                            <i class="icon-envelope-open"></i> Inbox
                                           
                                        </a>
                                    </li>
                                    <li>
                                        <a href="app_todo.html">
                                            <i class="icon-rocket"></i> Activities
                                        </a>
                                    </li>
                                    <li class="divider"> </li>
                                                    <li><a href="<?=base_url()?>profile/settings">settings</a></li>
                <li> <a href="<?=base_url()?>logout" > <i class="icon-logout"></i></a> </li>
                                </ul>
			</li>

		</ul>
        </div>

	</div>
</div>
