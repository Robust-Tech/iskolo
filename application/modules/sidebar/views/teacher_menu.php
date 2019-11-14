

        <div class="page-sidebar navbar-collapse collapse">
    
            <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                            <li class="sidebar-search-wrapper">
                                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                                    <a href="javascript:;" class="remove">
                                        <i class="icon-close"></i>
                                    </a>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <a href="javascript:;" class="btn submit">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </span>
                                    </div>
                                </form>
                                <!-- END RESPONSIVE QUICK SEARCH FORM -->
                            </li>
            <?php
                $user_id = User::get_id();
                $badge = array();

                $unread = App::counter('messages',array('user_to'=>User::get_id(),'status' => 'Unread'));
                if($unread > 0){ $badge['menu_messages'] = '<b class="badge bg-primary pull-right">'.$unread.'</b>'; }


                $menus = $this->db->where('access',3)->where('visible',1)->where('parent','')->where('hook','main_menu_teacher')->order_by('order','ASC')->get('hooks')->result();
                foreach ($menus as $menu) {
                    $sub = $this->db->where('access',3)->where('visible',1)->where('parent',$menu->module)->where('hook','main_menu_teacher')->order_by('order','ASC')->get('hooks');
                    $perm = TRUE;
                    ?>

                  <?php if($menu->permission != '') { $perm = User::perm_allowed($user_id, $menu->permission); } ?>

                    <?php if($perm){ ?>
                    <?php if ($sub->num_rows() > 0) {
                        $submenus = $sub->result(); ?>
                        <li class="<?php
                            foreach ($submenus as $submenu) {
                                if($page == lang($submenu->name)){echo  "active"; }
                            }
                        ?> nav-item ">
                            <a href="<?=base_url()?><?=$menu->route?>">
                                <i class="fa <?=$menu->icon?> icon"> <b class="bg-<?=config_item('theme_color');?>"></b></i>
                                <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i></span>
                                <span><?=lang($menu->name)?></span> </a>
                            <ul class="sub-menu">
                            <?php foreach ($submenus as $submenu) { ?>
                            <li class="<?php if($page == lang($submenu->name)){echo  "active"; }?>">
                                <a href="<?=base_url()?><?=$submenu->route?> nav-item  ">
                                    <?php if (isset($badge[$submenu->module])) { echo $badge[$menu->module]; } ?>
                                    <i class="fa <?=$submenu->icon?> icon"> <b class="bg-<?=config_item('theme_color');?>"></b></i>
                            <span><?=lang($submenu->name)?></span> </a> </li>
                            <?php } ?>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li class="<?php if($page == lang($menu->name)){echo  "active"; }?>nav-item start ">
                            <a href="<?=base_url()?><?=$menu->route?>">
                            <?php if (isset($badge[$menu->module])) { echo $badge[$menu->module]; } ?>
                            <i class="fa <?=$menu->icon?> icon"> <b class="bg-<?=config_item('theme_color');?>"></b>
                        </i>
                        <span><?=lang($menu->name)?></span> </a> </li>
                    <?php } ?>
                <?php } ?>
                <?php } ?>

              </ul>
              <!-- / nav -->
            </div>
<!-- /.aside -->
