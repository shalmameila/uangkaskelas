<div class="col-sm-6">
    <div class="text-right">
        <a href="<?= base_url('user/editprofil')  ?>" class="btn btn-success waves-effect waves-light">
            <i class="mdi mdi-account-settings-variant m-r-5"></i> Ubah Profil
        </a>
        <a href="<?= base_url('user/ubahsandi')  ?>" class="btn btn-success waves-effect waves-light">
            <i class="mdi mdi mdi-key-variant m-r-5"></i> Ubah Kata Sandi
        </a>
    </div>
</div>
</div>
</div>
<!--/ meta -->
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
                        <div class="col-md-6">
                            <div class="ribbon-box m-b-30 text-white bg-danger text-xs-center">
                                <div class="card-body">
                                    <blockquote class="card-bodyquote">
                                        <div class="ribbon ribbon-info"> TOTAL PEMASUKKAN</div>
                                        <p>
                                            <font size="6">
                                                Rp. <?= $totalpemasukkan; //var_dump($pembayaransiswa); 
                                                    ?>
                                            </font>
                                        </p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="ribbon-box m-b-30 text-white bg-purple text-xs-center">
                                <div class="card-body">
                                    <blockquote class="card-bodyquote">
                                        <div class="ribbon ribbon-warning">TOTAL PEMBAYARAN ANDA</div>
                                        <p>
                                            <font size="6">
                                                Rp. <?= $pembayaransiswa; //var_dump($totalpemasukkan); 
                                                    ?>
                                            </font>
                                        </p>
                                        <a href="<?= base_url('user/pembayaran') ?>" class="btn btn-outline-light">Lihat Laporan Pembayaran Kas</a>
                                    </blockquote>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
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
                                        <a href="<?= base_url('user/laporan') ?>" class="btn btn-outline-light">Lihat Laporan Pengeluaran</a>
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
</div>
<!-- end row -->