<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="<?php echo site_url('user') ?>" class="logo">
                <span>
                    <img src="<?php echo base_url('assets/images/money.png') ?>" alt="" height="50">
                </span>
                <i>
                    <img src="<?php echo base_url('assets/images/money.png') ?>" alt="" height="28">
                </i>
            </a>
        </div>

        <nav class="navbar-custom">

            <ul class="list-inline float-right mb-0">
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <?php $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                        echo $data['user']['nama']; ?>
                        <img src="<?php echo base_url('assets/images/profil/') . $data['user']['image'] ?>" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <small>
                                <h5 class="text-overflow"> Hai! <?= $data['user']['nama']; ?></h5>
                            </small>

                        </div>

                        <a onclick="logoutConfirm('<?= base_url('auth/logout') ?>')" href="javascript: void(0); " class="dropdown-item notify-item">
                            <i class="fi-power"></i>   
                                <span>
                                    Keluar
                                </span>
                        </a>


                    </div>
                </li>

            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left waves-light waves-effect">
                        <i class="dripicons-menu"></i>
                    </button>
                </li>

            </ul>

        </nav>

    </div>
    <!-- Top Bar End -->
    