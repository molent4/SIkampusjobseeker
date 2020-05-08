        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('auth')?>" >
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-code-branch"></i>
                </div>
                <div class="sidebar-brand-text mx-3">JOKER Dashboard</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider ">

            <!-- Query dari menu -->
            <?php
            $role_id = $this->session->userdata('role');
            // var_dump($role_id);            
            $queryMenu = "SELECT `akun_menu`.`id_menu`,`menu`
                                FROM `akun_menu` JOIN `user_acces_menu`
                                ON `akun_menu`.`id_menu` = `user_acces_menu`.`menu_id`
                                WHERE `user_acces_menu`.`role_id` = '$role_id'
                                ORDER BY `user_acces_menu`.`menu_id` ASC
                                ";
            $menu = $this->db->query($queryMenu)->result_array();
            // var_dump($menu);

            ?>




            <!-- Looping Menu -->
            <!-- Nav Item - Dashboard -->
            <?php foreach ($menu as $m) : ?>
                <div class="sidebar-heading">
                    <?= $m['menu']; ?>
                </div>
                <!-- SUB menu sesuai menu -->
                <?php
                    // var_dump($m);
                    $menuID = $m['id_menu'];
                    $querySubMenu = "SELECT * FROM `akun_sub_menu`
                    JOIN `akun_menu` ON `akun_sub_menu`.`menu_id` = `akun_menu`.`id_menu`
                    WHERE `akun_sub_menu`.`menu_id` = '$menuID'
                    AND `akun_sub_menu`.`is_active` = '1'";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    // var_dump($subMenu);
                    // die;
                    ?>

                <?php foreach ($subMenu as $sm) : ?>
                <?php if($title == $sm['title']) : ?>     
                    <li class="nav-item active">
                <?php else : ?>
                    <li class="nav-item ">
                <?php endif; ?>    
                        <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                            <i class="<?= $sm['ikon']; ?>"></i>
                            <span> <?= $sm['title'];?> </span></a>

                    </li>
                <?php endforeach   ?>
                <hr class="sidebar-divider mt-3">

            <?php endforeach; ?>


           
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Log Out</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->