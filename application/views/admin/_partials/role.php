<div class="row">
    <div class="col-lg-7">
        <div class="card-box">
            <h3 class="mt-11 title">Role</h3>
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= $this->session->flashdata('message'); ?>
            <p class="text-muted font-14 mt">
                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#role-modal">Tambah Role Baru</button>
            </p>


            <table class="table table-hover table-colored-bordered table-bordered-custom">
                <thead>
                    <tr>
                        <th class="col-lg-1">#</th>
                        <th class=" col-lg-4">Role</th>
                        <th class="col-lg-6">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($role as $r) : ?>

                        <tr>
                            <th scope=" row"><?= $i; ?></th>
                        <td><?= $r['role']; //$r['nama kolom di db']; 
                            ?></td>
                        <td>
                            <a onclick="roledeleteConfirm('<?= base_url('admin/hapusrole/' . $r['id']) ?>')" href="javascript: void(0); " class="btn btn-danger waves-effect waves-light"> Hapus </a>
                            <a href="<?= base_url('admin/roleakses/') . $r['id']; ?>" type="button" class="btn btn-info waves-effect waves-light">Akses</a>

                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- sample modal content -->

<div id="role-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="role-modal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Tambahkan Role Baru</h4>
            </div>

            <form action="<?= base_url('admin/role'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Nama Role">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Tambahkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- /.modal -->
</div>


<div id="deleteModal-role" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Hapus Menu</h4>
            </div>
            <div class="modal-body">
                <p> Anda yakin ingin menghapusnya? </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Batal</button>
                <a id="btn-delete-role" class="btn btn-danger waves-effect waves-light" href="#">Hapus</a>

            </div>
        </div>
    </div>
</div><!-- /.modal -->