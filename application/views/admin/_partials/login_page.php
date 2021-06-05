<body class="bg-accpunt-pages">

    <!-- HOME -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="wrapper-page">

                        <div class="account-pages">
                            <div class="account-box">
                                <div class="account-logo-box">
                                    <?= $this->session->flashdata('message'); ?>
                                    <?= $this->session->flashdata('gagalaktivasi'); ?>
                                    <h2 class="text-uppercase text-center font-bold m-b-5 m-t-5">Masuk</h2>
                                    <p class="m-b-0 text-center">Masuk dengan akun yang telah terdaftar</p>
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" method="post" action="<?= base_url('auth/login') ?>">

                                        <div class="form-group m-b-20 row">
                                            <div class="col-12">
                                                <label for="emailaddress">Alamat Email</label>
                                                <input class="form-control" type="text" id="email" name="email" value="<?= set_value('email'); ?>" placeholder="Masukkan Email Anda">
                                                <?php echo form_error('email', '<small class="text-danger pl-1">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-20">
                                            <div class="col-12">
                                                <a href="<?php echo base_url('auth/lupasandi') ?>" class="text-muted pull-right"><small>Lupa Kata Sandi?</small></a>
                                                <label for="password">Kata Sandi</label>
                                                <input class="form-control" type="password" id="password" name="password" placeholder="Masukkan Kata Sandi Anda">
                                                <?php echo form_error('password', '<small class="text-danger pl-1">', '</small>') ?>

                                            </div>
                                        </div>

                                        <div class="form-group row text-center m-t-10">
                                            <div class="col-12">
                                                <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Masuk</button>
                                            </div>
                                        </div>

                                        <div class="row m-t-10">
                                            <div class="col-sm-12 text-center">
                                                <p class="text-muted">Belum Punya Akun? <a href="<?php echo base_url('auth') ?>" class="text-dark m-l-5"><b>Daftar</b></a></p>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-box-->


                    </div>
                    <!-- end wrapper -->

                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->