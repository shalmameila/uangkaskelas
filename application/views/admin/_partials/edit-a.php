<?php $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); ?>
<div class="row">
    <div class="col-lg-10">
        <div class="card-box">
            <h3 class="mt-11 mb-12343  title">Edit Profil</h3>

            <?= form_open_multipart('admin/editprofil')  ?>
                <div class="form-group row">
                    <label for="email" class="col-2 col-form-label">Email</span></label>
                    <div class="col">
                        <input type="text" class="form-control" readonly="" id="email" name="email" value="<?= $data['user']['email']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-2 col-form-label">Nama Lengkap</span></label>
                    <div class="col">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['user']['nama']; ?>">
                        <?php echo form_error('nama', '<small class="text-danger pl-1">', '</small>') ?>
 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-2 col-form-label">Gambar</span></label>
                    <div class="col-sm">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?php echo base_url('assets/images/profil/') . $data['user']['image']  ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
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