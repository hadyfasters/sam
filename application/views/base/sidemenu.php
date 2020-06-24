<div class="col-md-3 left_col" id="left-content">
    <div class="left_col scroll-view" >
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"><i class="fa fa-line-chart"></i> <span style="font-size: 25px; letter-spacing: 2px;">SAM</span></a>
        </div>

        <div class="clearfix"></div>
<!--  -->
        <!-- menu profile quick info -->
        <div class="profile">
            <!-- <div class="profile_pic">
                <img src="<?php echo base_url()?>assets/img/user.png" alt="..." class="img-circle profile_img">
            </div> -->
            <div class="profile_info mt-2">
                <h2><?php echo isset($userdata['nama']) ? $userdata['nama']:'Anonymous'; ?></h2>
                <h6><?php echo isset($userdata['npp']) ? $userdata['npp']:'00000'; ?></h6>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <div class="clearfix"></div>

        <br />

        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3 style="margin-left: -8px;">Main Menu</h3>
                <?php 
                    if(!empty($menulist)) : 
                        foreach ($menulist as $menu) {
                            $have_sub = '';

                            // var_dump($menulist);
                            
                            if(!empty($menu->sub)){
                                $have_sub = '<span class="fa fa-chevron-down"></span>';
                            }
                            echo '<ul class="nav side-menu">';
                            echo '<li><a href="'.$menu->parent->link.'">'.$menu->parent->nama_menu.' '.$have_sub.'</a>';

                            if(!empty($menu->sub)){
                                echo '<ul class="nav child_menu">';
                                foreach ($menu->sub as $sub) {
                                    echo '<li><a href="'.site_url($sub->link).'">'.$sub->nama_menu.'</a></li>';
                                }
                                echo '</ul>';
                            }
                            echo '</li>';
                            echo '</ul>';

                            // var_dump($have_sub);
                        }
                    endif;

                ?>
                <!-- <ul class="nav side-menu">
                    <li><a >Dashboard <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo site_url('dashboard/produkchart') ?>">Produk Chart</a></li>
                            <li><a href="<?php echo site_url('dashboard/proseschart') ?>">Proses Chart</a></li>
                        </ul>
                    </li>
                </ul> -->
                <!-- <ul class="nav side-menu">
                    <li><a >Input & View <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo site_url('lead') ?>">Lead</a></li>
                            <li><a href="<?php echo site_url('call') ?>">Call</a></li>
                            <li><a href="<?php echo site_url('meet') ?>">Meet</a></li>
                            <li><a href="<?php echo site_url('close') ?>">Close</a></li>
                        </ul>
                    </li>
                </ul> -->
                <!-- <ul class="nav side-menu">
                    <li><a >Approval and View <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo site_url('lead_approve') ?>">Lead</a></li>
                            <li><a href="<?php echo site_url('call_approve') ?>">Call</a></li>
                            <li><a href="<?php echo site_url('meet_approve') ?>">Meet</a></li>
                            <li><a href="<?php echo site_url('close_approve') ?>">Close</a></li>
                        </ul>
                    </li>
                </ul> -->
                <!-- <ul class="nav side-menu">
                    <li><a >Reporting <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo site_url('report/activityreport') ?>">Activity Report</a></li>
                            <li><a href="<?php echo site_url('report/performancereport') ?>">Performance Report</a></li>
                        </ul>
                    </li>
                </ul> -->
                <!-- <ul class="nav side-menu">
                    <li><a href="<?php echo site_url('user') ?>">User Management</a>
                    </li>
                </ul> -->
                 <!--<ul class="nav side-menu">
                    <li><a >Outlet Managemet <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo site_url('outlet/wilayah') ?>">Wilayah</a></li>
                            <li><a href="<?php echo site_url('outlet/cabang') ?>">Cabang</a></li>
                        </ul>
                    </li>
                </ul> -->
                <!-- <ul class="nav side-menu">
                    <li><a >Master Data <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo site_url('masterdata/userhistory') ?>">User History</a></li>
                            <li><a href="<?php echo site_url('masterdata/activitylog') ?>">Activity Log</a></li>
                            <li><a href="<?php echo site_url('') ?>">Location History</a></li>
                        </ul>
                    </li>
                </ul> -->
                <!-- <ul class="nav side-menu">
                    <li><a >Menu Setting <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo site_url('menu') ?>">Menu Management</a></li>
                            <li><a href="<?php echo site_url('message') ?>">Message After Login/Logout</a></li>
                            <li><a href="<?php echo site_url('userposition') ?>">User Position</a></li>
                            <li><a href="<?php echo site_url('product') ?>">Produk Sumber Dana</a></li>
                        </ul>
                    </li>
                </ul> -->
            </div>
        </div>  
    </div>
</div>