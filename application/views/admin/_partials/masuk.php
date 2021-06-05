<div class="row">
    <div class="col-lg-10">
        <div class="card-box">
            <h3 class="mt-11 mb-12343  title">Tambah Pemasukkan</h3>

            <form action="<?= base_url('bendahara/tambahpemasukkan') ?>" method="POST">
                <div class="form-group">
                    <label for="nama">Nama Siswa</label>
                    <div class="form-group">
                        <select name="nama" id="nama" class="form-control select2">
                            <option value="">Pilih Siswa</option>
                            <?php foreach ($user as $u) : ?>
                                <option value="<?= $u['nama']; ?>"> <?= $u['nama']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="bulan">Bulan</label>
                    <div class="form-group">
                        <select name="bulan" id="bulan" class="form-control select2">
                            <option value="">Pilih Bulan</option>
                            <option value="Januari"> Januari </option>
                            <option value="Februari"> Februari </option>
                            <option value="Maret"> Maret </option>
                            <option value="April"> April </option>
                            <option value="Mei"> Mei </option>
                            <option value="Juni"> Juni </option>
                            <option value="Juli"> Juli </option>
                            <option value="Agustus"> Agustus </option>
                            <option value="September"> September </option>
                            <option value="Oktober"> Oktober </option>
                            <option value="November"> November </option>
                            <option value="Desember"> Desember </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="minggu">Minggu Ke </label>
                    <div class="form-group">
                        <select name="minggu" id="minggu" class="form-control select2">
                            <option value="">Pilih Minggu</option>
                            <option value="1"> 1 </option>
                            <option value="2"> 2 </option>
                            <option value="3"> 3 </option>
                            <option value="4"> 4 </option>
                            <option value="5"> 5 </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="jumlah" >Jumlah (Rp.) <small> jangan gunakan karakter! </small></span></label>
                    <input name="jumlah" id="jumlah" type="text" placeholder="" class="form-control">
                </div>
                <div class="form-group justify-content-end">
                    <div class="col-sm-11">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>