                    <!-- ========== Left Sidebar Start ========== -->
                    <div class="left side-menu">
                        <div class="slimscroll-menu" id="remove-scroll">

                            <!--- Sidemenu -->
                            <div id="sidebar-menu">
                                <!-- QUERY MENU -->

                                <?php
                                $role_id =  $this->session->userdata('role_id');
                                $queryMenu = "SELECT `user_menu`.`id`,`menu`
                                                    FROM `user_menu` JOIN `user_access_menu`
                                                      ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                                                   WHERE `user_access_menu`.`role_id` = $role_id
                                                ORDER BY `user_access_menu`.`menu_id` ASC
                                    ";

                                $menu = $this->db->query($queryMenu)->result_array();

                                ?>

                                <!-- LOOPING MENU -->
                                <ul class="metismenu" id="side-menu">
                                    <?php foreach ($menu as $m) : ?>

                                        <li class="menu-title">
                                            <?= $m['menu']; ?>
                                        </li>

                                        <?php
                                        $MenuId = $m['id'];
                                        $querySubMenu = " SELECT * FROM `user_sub_menu`
                                                           WHERE `menu_id` = $MenuId
                                                             AND `is_active` = 1
                                        ";

                                        $subMenu = $this->db->query($querySubMenu)->result_array();
                                        ?>

                                        <?php foreach ($subMenu as $sm) : ?>

                                            <li>
                                                <a href="<?= base_url($sm['url']); ?>"><i class="<?= $sm['icon']; ?>"></i><span> <?= $sm['title']; ?> </span>
                                                </a>
                                            </li>

                                        <?php endforeach; ?>
                                    <?php endforeach; ?>

                                    <li>
                                        <a onclick="logoutConfirm('<?= base_url('auth/logout') ?>')" href="javascript: void(0); "><i class="fi-power"></i><span>Keluar</span></a>
                                    </li>

                                </ul>

                            </div>
                            <!-- Sidebar -->
                            <div class="clearfix"></div>

                        </div>
                        <!-- Sidebar -left -->

                    </div>
                    <!-- Left Sidebar End -->

                    <div id="logoutModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">KELUAR</h4>
                                </div>
                                <!-- <form action="// base_url('admin/hapus') " method="POST"> -->
                                <div class="modal-body">
                                    <p> Anda yakin ingin keluar dari akun anda? </p>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Batal</button>
                                    <a id="btn-logout" class="btn btn-danger waves-effect waves-light" href="#">Keluar</a>
                                </div>
                                </form>
                            </div>
                            </form>
                        </div>
                    </div><!-- /.modal -->