<div class="row">
    <div class="col-lg-10">
        <div class="card-box">
            <h3 class="mt-11 mb-12343  title">Tambah Pemasukkan</h3>

            <form action="<?= base_url('bendahara/ubahpemasukkan') ?>" method="POST">
                <?= $this->session->flashdata('ubahmasuk'); ?>
                <input type="hidden" name="id" value="<?= $masuk['id'] ?>">
                <div class="form-group">
                    <label for="nama">Nama Siswa</label>
                    <div class="form-group">
                        <select name="nama" id="nama" class="form-control select2">
                            <option value="">Pilih Siswa</option>
                            <?php foreach ($user as $u) : ?>
                                <?php if ($u['nama'] == $masuk['nama']) : ?>
                                    <option value="<?= $u['nama']; ?>" selected> <?= $u['nama']; ?> </option>
                                <?php else : ?>
                                    <option value="<?= $u['nama']; ?>"> <?= $u['nama']; ?> </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="bulan">Bulan</label>
                    <div class="form-group">
                        <select name="bulan" id="bulan" class="form-control select2">
                            <?php foreach ($bulan as $b) : ?>
                                <?php if ($b == $masuk['bulan']) : ?>
                                    <option value="<?= $b; ?>" selected><?= $b; ?></option>
                                <?php else : ?>
                                    <option value="<?= $b; ?>"><?= $b; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="minggu">Minggu Ke </label>
                    <div class="form-group">
                        <select name="minggu" id="minggu" class="form-control select2">
                            <?php foreach ($minggu as $m) : ?>
                                <?php if ($m == $masuk['minggu']) : ?>
                                    <option value="<?= $m; ?>" selected><?= $m; ?></option>
                                <?php else : ?>
                                    <option value="<?= $m; ?>"><?= $m; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah (Rp.) <small> jangan gunakan karakter! </small></span></label>
                    <input name="jumlah" id="jumlah" type="text" placeholder="" class="form-control" value="<?= $masuk['jumlah']; ?>">
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