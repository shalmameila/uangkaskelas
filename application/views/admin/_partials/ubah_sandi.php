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
                                    <h2 class="text-uppercase text-center font-bold m-b-5 m-t-5">Ubah Kata Sandi</h2>
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" method="post" action="<?= base_url('auth/ubahsandi') ?>">

                                        <div class="form-group row m-b-20">
                                            <div class="col-12">
                                                <label for="password1">Ubah Kata Sandi untuk <?= $this->session->userdata('reset_email'); ?></label>
                                                <input class="form-control" type="password" id="password1" name="password1" placeholder="Masukkan Kata Sandi Baru Anda">
                                                <?php echo form_error('password1', '<small class="text-danger pl-1">', '</small>') ?>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row m-b-20">
                                            <div class="col-12">
                                                <label for="password2">Masukkan Ulang</label>
                                                <input class="form-control" type="password" id="password2" name="password2" placeholder="Masukkan Ulang Kata Sandi Baru Anda">
                                                <?php echo form_error('password2', '<small class="text-danger pl-1">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group row text-center m-t-10">
                                            <div class="col-12">
                                                <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Ubah</button>
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