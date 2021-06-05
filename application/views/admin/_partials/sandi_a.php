<?php $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); ?>
<div class="row">
    <div class="col-lg-10">
        <div class="card-box">
            <h3 class="mt-11 mb-12343  title">Ubah Kata Sandi</h3>
            <?= $this->session->flashdata('sandi'); ?>
            <form action="<?= base_url('admin/ubahsandi') ?>" method="POST">
                <div class="form-group row">
                    <label for="passwordlama" class="col-2 col-form-label">Kata Sandi Lama</span></label>
                    <div class="col">
                        <input type="password" class="form-control" id="passwordlama" name="passwordlama" value="">
                        <?php echo form_error('passwordlama', '<small class="text-danger pl-1">', '</small>') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="passwordbaru1" class="col-2 col-form-label">Kata Sandi Baru</span></label>
                    <div class="col">
                        <input type="password" class="form-control" id="passwordbaru1" name="passwordbaru1">
                        <?php echo form_error('passwordbaru1', '<small class="text-danger pl-1">', '</small>') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="passwordbaru2" class="col-2 col-form-label">Konfirmasi Kata Sandi</span></label>
                    <div class="col">
                        <input type="password" class="form-control" id="passwordbaru2" name="passwordbaru2">
                        <?php echo form_error('passwordbaru2', '<small class="text-danger pl-1">', '</small>') ?>

                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>