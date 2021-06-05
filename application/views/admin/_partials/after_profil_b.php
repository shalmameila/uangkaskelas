<div class="col-sm-6">
    <div class="text-right">
        <a href="<?= base_url('bendahara/editprofil')  ?>" class="btn btn-success waves-effect waves-light">
            <i class="mdi mdi-account-settings-variant m-r-5"></i> Ubah Profil
        </a>
        <a href="<?= base_url('bendahara/ubahsandi')  ?>" class="btn btn-success waves-effect waves-light">
            <i class="mdi mdi mdi-key-variant m-r-5"></i> Ubah Kata Sandi
        </a>
    </div>
</div>
</div>
</div>
<!--/ meta -->
</div>
</div>
<div class="row">
    <div class="col-md">
        <div class="card m-b-30 text-white bg-secondary  text-xs-center">
            <div class="card-body">
                <blockquote class="card-bodyquote">
                    <div class="mb-5 mt-0">
                        <font size="6">
                            DATA UANG KAS
                        </font>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="ribbon-box m-b-30 text-white bg-danger text-xs-center">
                                <div class="card-body">
                                    <blockquote class="card-bodyquote">
                                        <div class="ribbon ribbon-info">TOTAL PEMASUKKAN</div>
                                        <p>
                                            <font size="6">
                                                Rp. <?= $totalpemasukkan; //var_dump($totalpemasukkan); 
                                                    ?>
                                            </font>
                                        </p>
                                        <a href="<?= base_url('bendahara/pemasukkan') ?>" class="btn btn-outline-light">Lihat dan Kelola Pemasukkan</a>
                                    </blockquote>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="ribbon-box m-b-30 text-white bg-warning text-xs-center">
                                <div class="card-body">
                                    <blockquote class="card-bodyquote">
                                        <div class="ribbon ribbon-pink">TOTAL PENGELUARAN</div>
                                        <p>
                                            <font size="6">
                                                Rp. <?= $totalpengeluaran; //var_dump($totalpengeluaran); 
                                                    ?>
                                            </font>
                                        </p>
                                        <a href="<?= base_url('bendahara/pengeluaran') ?>" class="btn btn-outline-light">Lihat dan Kelola Pengeluaran</a>
                                    </blockquote>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="ribbon-box m-b-30 text-white bg-custom text-xs-center">
                                <div class="card-body">
                                    <blockquote class="card-bodyquote">
                                        <div class="ribbon ribbon-purple">SALDO AKHIR</div>
                                        <p>
                                            <font size="6">
                                                Rp. <?= $saldo; //var_dump($saldo);
                                                    ?>
                                            </font>
                                        </p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </blockquote>
            </div>
        </div>
    </div>
</div>



</div>
<!-- end row -->