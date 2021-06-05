            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title">Pemasukkan Kas Kelas XI SIJA A</h4>
                        <p class="text-muted font-13 m-b-30">
                            <?= $this->session->flashdata('tambahpemasukkan'); ?>
                            <?= $this->session->flashdata('ubahpemasukkan'); ?>
                            <?= $this->session->flashdata('hapuspemasukkan'); ?>
                        </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="m-b-30">
                                    <a href="<?= base_url('bendahara/tambahpemasukkan') ?>" class="btn btn-custom waves-effect waves-light">Tambah Pemasukkan</a>
                                </div>
                            </div>
                        </div>

                        <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>
                                        <h5>No</h5>
                                    </th>
                                    <th>
                                        <h5>Nama Siswa</h5>
                                    </th>
                                    <th>
                                        <h5>Bulan Tahun, Minggu ke</h5>
                                    </th>
                                    <th>
                                        <h5>Jumlah</h5>
                                    </th>
                                    <th>
                                        <h5>Tindakan</h5>
                                    </th>

                                </tr>
                            </thead>


                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($masuk as $m) : ?>

                                    <tr>
                                        <th scope="row">
                                            <h5><?= $i; ?></h5>
                                        </th>
                                        <td>
                                            <h5><?= $m['nama']; ?></h5>
                                        </td>
                                        <td>
                                            <h5><?= $m['bulan']; ?> <?= date('Y', $m['tahun']) ?>, Minggu ke <?= $m['minggu']; ?></h5>
                                        </td>
                                        <td>
                                            <h5>Rp. <?= $m['jumlah']; ?></h5>
                                        </td>
                                        <td>
                                            <a class="btn btn-success waves-effect waves-light" href="<?= base_url('bendahara/ubahpemasukkan/' . $m['id']) ?>">Ubah</a>
                                            <a onclick="masukdeleteConfirm('<?= base_url('bendahara/hapusmasuk/' . $m['id']) ?>')" href="javascript: void(0); " class="btn btn-danger waves-effect waves-light"> Hapus </a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>

                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div id="deleteModal-masuk" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Hapus Data Pemasukkan</h4>
                        </div>
                        <!-- <form action="// base_url('admin/hapus') " method="POST"> -->
                        <div class="modal-body">
                            <p> Anda yakin ingin menghapusnya? </p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Batal</button>
                            <a id="btn-delete-masuk" class="btn btn-danger waves-effect waves-light" href="#">Hapus</a>
                        </div>
                        </form>
                    </div>
                    </form>
                </div>
            </div><!-- /.modal -->