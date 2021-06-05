    <!-- HOME -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="wrapper-page">
                        <div class="account-pages">
                            <div class="account-box">
                                <div class="account-content">
                                    <?= $this->session->flashdata('message'); ?>
                                    <div class="text-center m-b-20">
                                        <h4>
                                            <p>
                                                LUPA KATA SANDI?
                                            </p>
                                        </h4>
                                        <p class="text-muted m-b-0">Masukkan email anda lalu kami akan mengirimkan email berisi link untuk mengatur ulang kata sandi anda</p>
                                    </div>
                                    <form class="form-horizontal" method="POST" action="<?= base_url('auth/lupasandi') ?>">

                                        <div class="form-group row m-b-20">
                                            <div class="col-12">
                                                <label for="email">Alamat Email</label>
                                                <input class="form-control" type="text" id="email" name="email" value="<?= set_value('email'); ?>">
                                                <?php echo form_error('email', '<small class="text-danger pl-1">', '</small>') ?>

                                            </div>
                                        </div>

                                        <div class="form-group row text-center m-t-10">
                                            <div class="col-12">
                                                <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Atur Ulang Password</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                    <div class="row m-t-40">
                                        <div class="col-sm-12 text-center">
                                            <p class="text-muted">Kembali ke halaman<a href="<?= base_url('auth/login') ?>" class="text-dark m-l-5"><b>Masuk</b></a></p>
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