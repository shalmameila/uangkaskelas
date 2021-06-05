<div class="row">
    <div class="col-lg-7">
        <div class="card-box">
            <a href="<?= base_url('admin/role'); ?>" class="btn btn-primary mb-3">kembali</a>
            <?= $this->session->flashdata('pesan'); ?>


            <h4>Role : <?= $role['role']; ?></h4>
            <table class="table table-hover table-colored-bordered table-bordered-custom">
                <thead>
                    <tr>
                        <th class="col-lg-1">#</th>
                        <th class=" col-lg-4">Menu</th>
                        <th class="col-lg-6">Akses</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>

                        <tr>
                            <th scope=" row"><?= $i; ?></th>
                            <td><?= $m['menu']; //$r['nama kolom di db']; 
                                ?></td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" name="" id="defaultCheck1" class="form-check-input" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                </div>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>