            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title">Laporan Pemasukkan Kas Kelas XI SIJA A</h4>
                        <p class="text-muted font-13 m-b-30">
                        </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="m-b-30">
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
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>