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
                                    <?= $this->session->flashdata('gagalaktivasi'); ?>
                                    <h2 class="text-uppercase text-center font-bold m-b-5 m-t-5">Daftar</h2>
                                    <p class="m-b-0 text-center">Buat akun baru anda!</p>
                                </div>
                                <div class="account-content">

                                    <form class="form-horizontal" method="post" action="<?php echo base_url('auth') ?>">
                                        <div class="form-group row m-b-20">
                                            <div class="col-12">
                                                <label for="emailaddress">Nama Lengkap</label>
                                                <input class="form-control" type="text" id="nama" name="nama" value="<?= set_value('nama') ?>" placeholder="Masukkan Nama Lengkap Anda">
                                                <?php echo form_error('nama', '<small class="text-danger pl-1">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-20">
                                            <div class="col-12">
                                                <label for="username">Alamat Email</label>
                                                <input class="form-control" type="text" id="email" name="email" value="<?= set_value('email') ?>" placeholder="Masukkan Email Anda">
                                                <?php echo form_error('email', '<small class="text-danger pl-1">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-20">
                                            <div class="col-12">
                                                <label for="password">Kata Sandi</label>
                                                <input class="form-control" type="password" id="password1" name="password1" placeholder="Masukkan Password">
                                                <?php echo form_error('password1', '<small class="text-danger pl-1">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-20">
                                            <div class="col-12">
                                                <input class="form-control" type="password" id="password2" name="password2" placeholder="Masukkan Ulang Password">
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-20">
                                            <div class="col-12">
                                            </div>
                                        </div>

                                        <div class="form-group row text-center m-t-10">
                                            <div class="col-12">
                                                <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Daftar</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="row m-t-10">
                                        <div class="col-12 text-center">
                                            <p class="text-muted">Sudah Punya Akun? <a href="<?php echo base_url('auth/login') ?>" class="text-dark m-l-5"><b>Masuk</b></a></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end card-box-->
                        </div>


                    </div>
                    <!-- end wrapper -->

                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->
</body>