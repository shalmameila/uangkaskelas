<div class="row">
    <div class="col-lg-7">
        <div class="card-box">
            <h3 class="mt-11 title">Menu Management</h3>
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= $this->session->flashdata('message'); ?>
            <p class="text-muted font-14 mt">
                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Tambah Menu Baru</button>
            </p>


            <table class="table table-hover table-colored-bordered table-bordered-custom">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Menu</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>

                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['menu']; ?></td>
                            <td>
                                <a onclick="deleteConfirm('<?= base_url('admin/hapusmenu/'.$m['id']) ?>')" href="javascript: void(0); " class="btn btn-danger waves-effect waves-light" > Hapus </a>
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

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Tambahkan Menu Baru</h4>
            </div>

            <form action="<?= base_url('admin/menu'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama Menu">
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

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
                <a id="btn-delete" class="btn btn-danger waves-effect waves-light" href="#">Hapus</a>

            </div>
        </div>
    </div>
</div><!-- /.modal -->