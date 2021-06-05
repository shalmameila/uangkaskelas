            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Laporan Pengeluaran Uang Kas Kelas XI SIJA A</b></h4>
                        <p class="text-muted font-13 m-b-30">
                        </p>
                        <div class="row">
                            <div class="col-sm-6">
                                
                            </div>
                        </div>

                        <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
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
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end row -->