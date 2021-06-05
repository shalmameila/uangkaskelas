<div class="row">
    <div class="col-lg">
        <div class="card-box">
            <h3 class="mt-11 title">SubMenu Management</h3>
            <?php if (validation_errors()) : ?>
                <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?php endif; ?>
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= $this->session->flashdata('message'); ?>
            <p class="text-muted font-14 mt">
                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#submenu-modal">Tambah Sub Menu Baru</button>
            </p>


            <table class="table table-hover table-colored-bordered table-bordered-custom">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sub Menu</th>
                        <th>Menu</th>
                        <th>URL</th>
                        <th>Ikon</th>
                        <th>Aktif</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php $i = 1; ?>
                    <?php foreach ($submenu as $sm) : ?>
 
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $sm['title']; ?></td>
                            <td><?= $sm['menu']; ?></td>
                            <td><?= $sm['url']; ?></td>
                            <td><?= $sm['icon']; ?></td>
                            <td><?php if ($sm['is_active'] == 0) {
                                    echo "tidak";
                                } else {
                                    echo "ya";
                                }
                                ?></td>
                            <td>
                                <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#edit-modal">Ubah</button>
                                <a onclick="subdeleteConfirm('<?= base_url('admin/hapussubmenu/' . $sm['id']) ?>')" href="javascript: void(0); " class="btn btn-danger waves-effect waves-light"> Hapus </a>
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

<div id="submenu-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Tambahkan Sub Menu Baru</h4>
            </div>

            <form action="<?= base_url('admin/submenu'); ?>" method="POST">
                <?php validation_errors(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Nama Sub Menu">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Pilih Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"> <?= $m['menu']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="URL Sub Menu">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Ikon Sub Menu">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Aktif
                            </label>
                        </div>
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


<div id="deleteModal-sub" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Hapus Sub Menu</h4>
            </div>
            <!-- <form action="// base_url('admin/hapus') " method="POST"> -->
            <div class="modal-body">
                <p> Anda yakin ingin menghapusnya? </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Batal</button>
                <a id="btn-delete-sub" class="btn btn-danger waves-effect waves-light" href="#">Hapus</a>
            </div>
            </form>
        </div>
        </form>
    </div>
</div><!-- /.modal -->