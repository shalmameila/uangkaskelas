<div class="row">
    <div class="col-lg-10">
        <div class="card-box">
            <h3 class="mt-11 mb-12343  title">Ubah Pengeluaran</h3>

            <form action="<?= base_url('bendahara/ubahpengeluaran') ?>" method="POST">
            <?= $this->session->flashdata('ubahkeluar'); ?>
            <input type="hidden" name="id" value="<?= $keluar['id'] ?>">
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <div>
                        <div class="input-group">
                            <input name=" tanggal" type="text" class="form-control" placeholder="tahun/bulan/hari" id="datepicker-autoclose" value="<?= $keluar['tanggal']; ?>">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('tanggal', '<small class="text-danger pl-1">', '</small>') ?>
                </div>

                <div class="form-group ">
                    <label for="keterangan " class="col-2 col-form-label">Keterangan</span></label>
                    <div class="col">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $keluar['keterangan'] ?>">
                        <?php echo form_error('keterangan', '<small class="text-danger pl-1">', '</small>') ?>

                    </div>
                </div>

                <div class="form-group">
                    <label for="jumlah" class=" col col-form-label">Jumlah (Rp.) <small> jangan gunakan karakter! </small></span></label>
                    <input id="jumlah" name="jumlah" type="text" placeholder="" class="form-control" value="<?= $keluar['jumlah'] ?>">
                    <?php echo form_error('jumlah', '<small class="text-danger pl-1">', '</small>') ?>

                </div>
                <div class="form-group justify-content-end">
                    <div class="col-sm-11">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>