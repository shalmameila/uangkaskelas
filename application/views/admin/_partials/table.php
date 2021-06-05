            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Pengeluaran Uang Kas Kelas XI SIJA A</b></h4>
                        <p class="text-muted font-13 m-b-30">
                            <?= $this->session->flashdata('tambahpengeluaran'); ?>
                            <?= $this->session->flashdata('hapuspengeluaran'); ?>
                            <?= $this->session->flashdata('ubahpengeluaran'); ?>
                        </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="m-b-30">
                                    <a href="<?= base_url('bendahara/tambahpengeluaran') ?>" class="btn btn-custom waves-effect waves-light">Tambah Pengeluaran</a>
                                </div>
                            </div>
                        </div>

                        <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($keluar as $k) : ?>

                                    <tr>
                                        <th scope="row">
                                            <h5><?= $i; ?></h5>
                                        </th>
                                        <td>
                                            <h5><?= $k['tanggal']; ?></h5>
                                        </td>
                                        <td>
                                            <h5><?= $k['keterangan']; ?></h5>
                                        </td>
                                        <td>
                                            <h5>Rp. <?= $k['jumlah']; ?></h5>
                                        </td>
                                        <td>
                                            <a class="btn btn-success waves-effect waves-light" href="<?= base_url('bendahara/ubahpengeluaran/' . $k['id']) ?>">Ubah</a>
                                            <a onclick="datadeleteConfirm('<?= base_url('bendahara/hapuspengeluaran/' . $k['id']) ?>')" href="javascript: void(0); " class="btn btn-danger waves-effect waves-light"> Hapus </a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div id="deleteModal-data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Hapus Data Pengeluaran</h4>
                        </div>
                        <!-- <form action="// base_url('admin/hapus') " method="POST"> -->
                        <div class="modal-body">
                            <p> Anda yakin ingin menghapusnya? </p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Batal</button>
                            <a id="btn-delete-data" class="btn btn-danger waves-effect waves-light" href="#">Hapus</a>
                        </div>
                        </form>
                    </div>
                    </form>
                </div>
            </div><!-- /.modal -->