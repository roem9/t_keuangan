<!-- modal  -->
<div class="modal fade" id="modalTransaksi" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title nama-title" id="exampleModalScrollableTitle"><?= $nama?></h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <!-- <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs sticky-top">
                            <li class="nav-item">
                                <a href="#" class='nav-link' id="btn-form-1" data-id="">Transaksi Langsung</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class='nav-link' id="btn-form-2" data-id="">Piutang</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class='nav-link' id="btn-form-3" data-id="">Pembayaran</a>
                            </li>
                        </ul>
                    </div> -->
                    <div class="card-body">
                        <span class="badge bg-gradient-secondary btn-navigation-3" data-menu="menu-transaksi-langsung">
                            Transaksi Langsung
                        </span>
                        <span class="badge bg-gradient-secondary btn-navigation-3" data-menu="menu-transaksi-piutang">
                            Piutang
                        </span>
                        <span class="badge bg-gradient-secondary btn-navigation-3" data-menu="menu-pembayaran">
                            Pembayaran
                        </span>
                        
                        <div class="mt-3"></div>
                        <form action="<?= base_url()?>kartupiutang/add_transaksi_langsung" method="POST" enctype="multipart/form-data" class="menu-navigation-3" id="menu-transaksi-langsung">
                            <div class="alert alert-info" style="background-image: none"><i class="fa fa-info-circle text-info mr-1"></i>menu ini untuk menginputkan transaksi langsung</div>
                            <input type="hidden" name="tipe" value="<?= $tipe?>">
                            <input type="hidden" name="id" value="<?= $id?>">
                            <input type="hidden" name="pengajar" value="<?= $kpq?>">
                            <div class="form-group">
                                <label for="nama_kwitansi">Nama</label>
                                <input type="text" name="nama" class="form-control form-control-sm" value="<?= $nama?>">
                            </div>
                            <div class="form-group">
                                <label for="">Pembayaran Untuk?</label>
                                <select name="keterangan" id="" class="form-control form-control-sm" required>
                                    <option value="">Pilih Pembayaran Untuk</option>
                                    <option value="Buku">Buku</option>
                                    <option value="Pendaftaran Reguler">Pendaftaran Reguler</option>
                                    <option value="Pendaftaran PK">Pendaftran PV Khusus</option>
                                    <option value="Pendaftaran PL">Pendaftaran PV Luar</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl">Tgl Pembayaran</label>
                                <input type="date" name="tgl" id="tgl" class="form-control form-control-sm" required>
                            </div>
                            <div class="form-group">
                                <label for="metode">Metode Pembayaran</label>
                                <select name="metode" id="metode" class="form-control form-control-sm" required>
                                    <option value="">Pilih Tipe</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Transfer">Transfer</option>
                                    <option value="Deposit">Deposit</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="uraian">Keterangan</label>
                                <textarea name="uraian" id="uraian" class="form-control form-control-sm" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nominal_pembayaran">Nominal</label>
                                <input type="text" name="nominal" id="nominal_pembayaran" class="form-control form-control-sm rupiah" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <input type="submit" value="Tambah Pembayaran" class="btn btn-sm btn-success" id="btn-submit-1">
                            </div>
                        </form>

                        <form action="<?= base_url()?>kartupiutang/add_piutang" method="POST" enctype="multipart/form-data" class="menu-navigation-3" id="menu-transaksi-piutang">
                            <div class="alert alert-info" style="background-image: none"><i class="fa fa-info-circle text-info mr-1"></i>menu ini untuk menginputkan piutang</div>
                            <input type="hidden" name="tipe" value="<?= $tipe?>">
                            <input type="hidden" name="id" value="<?= $id?>">
                            <div class="form-group">
                                <label for="nama_tagihan">Nama</label>
                                <input type="text" name="nama" class="form-control form-control-sm" value="<?= $nama?>">
                            </div>
                            <div class="form-group">
                                <label for="piutang">Jenis Piutang</label>
                                <select name="ket" id="ket" class="form-control form-control-sm" required>
                                    <option value="">Pilih Jenis Piutang</option>
                                    <option value="Buku">Piutang Buku</option>
                                    <option value="Bulanan">Piutang Bulanan</option>
                                    <option value="Lainnya">Piutang Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl">Tgl Piutang</label>
                                <input type="date" name="tgl" id="tgl" class="form-control form-control-sm" required>
                            </div>
                            <div class="form-group">
                                <label for="uraian">Keterangan</label>
                                <textarea name="uraian" id="uraian" class="form-control form-control-sm" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nominal_piutang">Nominal</label>
                                <input type="text" name="nominal" id="nominal_piutang" class="form-control form-control-sm rupiah" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <input type="submit" value="Tambah Piutang" class="btn btn-sm btn-success" id="btn-submit-2">
                            </div>
                        </form>

                        <form action="<?=base_url()?>kartupiutang/add_pembayaran" method="post" enctype="multipart/form-data" class="menu-navigation-3" id="menu-pembayaran">
                            <div class="alert alert-info" style="background-image: none"><i class="fa fa-info-circle text-info mr-1"></i>menu ini untuk menginputkan pembayaran piutang, pembayaran tagihan, dan menginputkan deposit</div>
                            <input type="hidden" name="tipe" value="<?= $tipe?>">
                            <input type="hidden" name="id" value="<?= $id?>">
                            <input type="hidden" name="pengajar" value="<?= $kpq?>">
                            <div class="form-group">
                                <label for="nama_deposit">Nama</label>
                                <input type="text" name="nama" class="form-control form-control-sm" value="<?= $nama?>">
                            </div>
                            <div class="form-group">
                                <label for="">Pembayaran Untuk?</label>
                                <select name="keterangan" id="" class="form-control form-control-sm" required>
                                    <option value="">Pilih Pembayaran Untuk</option>
                                    <option value="Bulanan PK">Bulanan PV Khusus</option>
                                    <option value="Bulanan PL">Bulanan PV Luar</option>
                                    <option value="Deposit">Deposit</option>
                                    <option value="MMQ 1 PT3">MMQ 1 Pra Tahsin 3</option>
                                    <option value="MMQ 1 T1">MMQ 1 Tahsin 1</option>
                                    <option value="MMQ 1 T2">MMQ 1 Tahsin 2</option>
                                    <option value="MMQ 1 T3">MMQ 1 Tahsin 3 </option>
                                    <option value="MMQ 1 T4">MMQ 1 Tahsin 4</option>
                                    <option value="MMQ 1 TL">MMQ 1 Tahsin Lanjutan</option>
                                    <option value="MMQ 2 TA">MMQ 2 Tahfidz Anak</option>
                                    <option value="MMQ 2 TD">MMQ 2 Tahfidz Dewasa</option>
                                    <option value="MMQ 2 TK">MMQ 2 Takhosus</option>
                                    <option value="MMQ 3">MMQ 3 Bahasa Arab</option>
                                    <option value="Piutang">Piutang</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl">Tgl</label>
                                <input type="date" name="tgl" id="tgl" class="form-control form-control-sm" required>
                            </div>
                            <div class="form-group">
                                <label for="metode">Metode Pembayaran</label>
                                <select name="metode" id="metode" class="form-control form-control-sm" required>
                                    <option value="">Pilih Tipe</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Transfer">Transfer</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="uraian">Keterangan</label>
                                <textarea name="uraian" id="uraian" class="form-control form-control-sm" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nominal_deposit">Nominal</label>
                                <input type="text" name="nominal" class="form-control form-control-sm rupiah" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <input type="submit" value="Tambah Pembayaran" class="btn btn-sm btn-success" id="btn-submit-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
    </form>
</div>

<div class="modal fade" id="modal_edit" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-edit"></h5>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body cus-font">
            <form action="" method="POST" id="form-edit">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control form-control-sm">
            </div>
            <div class="form-group">
                <label for="tgl_transaksi">Tanggal</label>
                <input type="date" name="tgl" id="tgl_transaksi" class="form-control form-control-sm" readonly>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="uraian" id="keterangan" rows="2" class="form-control form-control-sm"></textarea>
            </div>
            <div class="form-group">
                <label for="nominal_uang">Nominal</label>
                <input type="text" name="nominal" id="nominal_uang" class="form-control form-control-sm rupiah">
            </div>
            </div>
            <div class="modal-footer">
            <input type="submit" class="btn btn-success btn-sm" value="Edit" id="edit_transaksi">
            </div>
        </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_tambah_invoice" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-invoice">Tambah Invoice</h5>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body cus-font">
            <form action="<?=base_url()?>kartupiutang/tambah_invoice" method="POST">
                <input type="hidden" name="id" id="id_invoice">
                <input type="hidden" name="tipe" id="tipe_invoice">
                <div class="form-group">
                    <label for="nama_invoice">Nama Invoice</label>
                    <input type="text" name="nama" id="nama_invoice" class="form-control form-control-md" required>
                </div>
                <div class="form-group">
                    <label for="tgl_invoice">Tgl Invoice</label>
                    <input type="date" name="tgl" id="tgl_invoice" class="form-control form-control-md" required>
                </div>
                <div id="uraianInvoice">
                    <div class="form-group">
                        <label for="uraian_invoice[0]">Uraian 1</label>
                        <textarea name="uraian[]" id="uraian_invoice[0]" rows="2" class="form-control form-control-md"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="satuan_invoice[0]">Satuan 1</label>
                        <input type="text" name="satuan[]" id="satuan_invoice[0]" class="form-control form-control-md">
                    </div>
                    <div class="form-group">
                        <label for="nominal_invoice[0]">Nominal 1</label>
                        <input type="text" name="nominal[]" id="nominal_invoice[0]" class="form-control form-control-md">
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                <a href="javascript:void(0)" class="btn btn-sm btn-danger me-3" id="hapus_uraian">hapus</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-success" id="tambah_uraian">tambah</a>
                </div>
            </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-info btn-sm" value="Tambah Invoice" id="btn-submit-4">
                </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_edit_invoice"  data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Invoice</h5>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
            <div class="modal-body cus-font">
                <div class="card">
                    <!-- <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" id="btn-invoice-1"><i class="fa fa-file"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="btn-invoice-2"><i class="fa fa-pen"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="btn-invoice-3"><i class="fa fa-plus"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="btn-invoice-4"><i class="fa fa-trash"></i></a>
                            </li>
                        </ul>
                    </div> -->
                    <div class="card-body">
                        <span class="badge bg-gradient-secondary btn-navigation-4" data-menu="data-invoice-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark" viewBox="0 0 16 16">
                                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
                            </svg>
                        </span>
                        <span class="badge bg-gradient-secondary btn-navigation-4" data-menu="data-invoice-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                            </svg>
                        </span>
                        <span class="badge bg-gradient-secondary btn-navigation-4" data-menu="data-invoice-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                            </svg>
                        </span>
                        <span class="badge bg-gradient-secondary btn-navigation-4" data-menu="data-invoice-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                            </svg>
                        </span>
                        
                        <div class="mb-3"></div>

                        <form action="<?=base_url()?>kartupiutang/edit_invoice" method="POST" class="menu-navigation-4" id="data-invoice-1">
                            <input type="hidden" name="aksi" id="aksi-1">
                            <input type="hidden" name="id" id="id-1">
                            <div class="form-group">
                                <label for="nama_invoice_edit">Nama</label>
                                <input type="text" name="nama" id="nama_invoice_edit" class="form-control form-control-md">
                            </div>
                            <div class="form-group">
                                <label for="tgl_invoice_edit">Tanggal</label>
                                <input type="date" name="tgl" id="tgl_invoice_edit" class="form-control form-control-md">
                            </div>
                            <div class="d-flex justify-content-end">
                                <input type="submit" class="btn btn-success btn-sm" value="Edit" id="btn-submit-invoice-1">
                            </div>
                        </form>
                        <form action="<?= base_url()?>kartupiutang/edit_invoice" method="POST" class="menu-navigation-4" id="data-invoice-2">
                            <input type="hidden" name="aksi" id="aksi-2">
                            <input type="hidden" name="id" id="id-2">
                            <div id="data-uraian-edit"></div>
                            <div class="d-flex justify-content-end mt-1">
                                <input type="submit" value="Edit Data" class="btn btn-sm btn-success" id="btn-submit-invoice-2">
                            </div>
                        </form>
                        <form action="<?= base_url()?>kartupiutang/edit_invoice" method="post"  class="menu-navigation-4" id="data-invoice-3">
                            <input type="hidden" name="aksi" id="aksi-3">
                            <input type="hidden" name="id" id="id-3">
                            <div class="form-group">
                                <label for="uraian">Uraian</label>
                                <input type="text" name="uraian" id="uraian" class="form-control form-control-md">
                            </div>
                            <div class="form-group">
                                <label for="satuan_invoice">Satuan</label>
                                <input type="text" name="satuan" id="satuan_invoice" class="form-control form-control-md">
                            </div>
                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <input type="text" name="nominal" id="nominal" class="form-control form-control-md">
                            </div>
                            <div class="d-flex justify-content-end mt-">
                                <input type="submit" value="Tambah Data" class="btn btn-sm btn-info" id="btn-submit-invoice-3">
                            </div>
                        </form>
                        <form action="<?= base_url()?>kartupiutang/edit_invoice" method="post" class="menu-navigation-4" id="data-invoice-4">
                            <input type="hidden" name="aksi" id="aksi-4">
                            <input type="hidden" name="id" id="id-4">
                            <div id="data-uraian-hapus"></div>
                            <div class="d-flex justify-content-end mt-1">
                                <input type="submit" value="Hapus Data" class="btn btn-sm btn-danger" id="btn-submit-invoice-4">
                            </div>
                        </form>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>

    <a href="javascript:void(0)" class="btn btn-info btn-sm btn-navigation" data-menu="menu-piutang">Kartu Piutang</a>
    <a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-navigation" data-menu="menu-invoice">Invoice</a>
    <a href="javascript:void(0)" class="btn btn-success btn-sm modalTransaksi" data-bs-toggle="modal" data-bs-target="#modalTransaksi" data-id="<?= $id?>">
        <span class="d-block d-sm-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
        </span>
        <span class="d-none d-sm-block">
            Tambah Transaksi
        </span>
    </a>
    <a href="javascript:void(0)" class="btn btn-warning btn-sm modalTambahInvoice" data-bs-toggle="modal" data-bs-target="#modal_tambah_invoice" data-id="<?= $id?>">
        <span class="d-block d-sm-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
        </span>
        <span class="d-none d-sm-block">
            Tambah Invoice
        </span>
    </a>

<div class="content">
    <div class="card overflow-auto menu-navigation" id="menu-piutang">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <?php if($total >= 0):?>
                        <span class="d-none d-sm-block">
                            <h5 class="text-success">Saldo : <?= rupiah($total)?></h5>
                        </span>
                        <span class="d-block d-sm-none">
                            <p class="text-success text-sm">Saldo : <br><?= rupiah($total)?></p>
                        </span>
                    <?php else:?>
                        <span class="d-none d-sm-block">
                            <h5 class="text-danger">Piutang : <?= rupiah($total)?></h5>
                        </span>
                        <span class="d-block d-sm-none">
                            <p class="text-danger text-sm">Piutang : <br><?= rupiah($total)?></p>
                        </span>
                    <?php endif;?>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end">
                        <a href="javascript:void(0)" class="btn btn-success btn-sm modalTransaksi" data-bs-toggle="modal" data-bs-target="#modalTransaksi" data-id="<?= $id?>">
                            <span class="d-block d-sm-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                </svg>
                            </span>
                            <span class="d-none d-sm-block">
                                Tambah Transaksi
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-hover align-items-center mb-0 text-dark text-sm">
                <thead>
                    <th><center>No</center></th>
                    <th>Tgl</th>
                    <th>Keterangan</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <!-- <th>Edit</th> -->
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php 
                        $no = 0;
                        foreach ($detail as $detail) :?>
                        <tr>
                            <td><?= ++$no?></td>
                            <td><?= date("d-M-Y", strtotime($detail['tgl']))?></td>
                            <?php if($detail['status'] == 'tagihan'):?>
                                <td><?= $detail['uraian']?></td>
                                <td><?= rupiah($detail['nominal'])?></td>
                                <td>-</td>
                                <td>-</td>
                                <?php if($detail['ket'] == "piutang"):?>
                                    <td><center><a onclick="return confirm('Yakin akan mengubah staus piutang menjadi lunas?')" href="<?= base_url()?>kartupiutang/edit_status_piutang/<?= md5($detail['id_tagihan'])?>/lunas"><i class="fa fa-times-circle text-danger"></i></a></center></td>
                                <?php elseif($detail['ket'] == "lunas"):?>
                                    <td><center><a onclick="return confirm('Yakin akan mengubah staus piutang menjadi piutang?')" href="<?= base_url()?>kartupiutang/edit_status_piutang/<?= md5($detail['id_tagihan'])?>/piutang"><i class="fa fa-check-circle text-success"></i></a></center></td>
                                <?php endif;?>
                                <!-- <td><a href="#" class="badge badge-success modalEditTagihan" data-toggle="modal" data-target="#modal_edit" data-id="<?= $detail['id_tagihan']?>">edit</a></td>
                                <td>-</td> -->
                                <td>
                                    <a href="javascript:void(0)" class="modalEditTagihan" data-bs-toggle="modal" data-bs-target="#modal_edit" data-id="<?= $detail['id_tagihan']?>">
                                        <span class="badge bg-gradient-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                            </svg>
                                        </span>
                                    </a>
                                </td>
                            <?php elseif($detail['status'] == 'deposit') : ?>
                                <td><?= $detail['uraian']?></td>
                                <td><?= rupiah($detail['nominal'])?></td>
                                <td>-</td>
                                <td><center><?=$detail['metode']?></center></td>
                                <td>-</td>
                                <!-- <td><a href="#" class="badge badge-success modalEditDeposit" data-toggle="modal" data-target="#modal_edit" data-id="<?= $detail['id_deposit']?>">edit</a></td>
                                <td>-</td> -->
                                <td>
                                    <a href="javascript:void(0)" class="modalEditDeposit" data-bs-toggle="modal" data-bs-target="#modal_edit" data-id="<?= $detail['id_deposit']?>">
                                        <span class="badge bg-gradient-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                            </svg>
                                        </span>
                                    </a>
                                </td>
                            <?php elseif($detail['status'] == 'cash') :?>
                                <td><?= $detail['uraian']?></td>
                                <td>-</td>
                                <td><?= rupiah($detail['nominal'])?></td>
                                <td><center><?=$detail['metode']?></center></td>
                                <td>-</td>
                                <td>
                                    <a href="javascript:void(0)" class="modalEditCash me-1" data-bs-toggle="modal" data-bs-target="#modal_edit" data-id="<?= $detail['id_pembayaran']?>">
                                        <span class="badge bg-gradient-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                            </svg>
                                        </span>
                                    </a>
                                    <!-- <a href="<?=base_url()?>transaksi/kuitansi/<?= MD5($detail['id_pembayaran'])?>" target="_blank">
                                        <span class="badge bg-gradient-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>
                                            </svg>
                                        </span>
                                    </a> -->
                                </td>
                                <!-- <td><a href="#" class="badge badge-success modalEditCash" data-toggle="modal" data-target="#modal_edit" data-id="<?= $detail['id_pembayaran']?>">edit</a></td>
                                <td><a href="<?=base_url()?>transaksi/kuitansi/<?= MD5($detail['id_pembayaran'])?>" target=_blank><center><i class="fa fa-print"></i></center></a></td> -->
                            <?php elseif($detail['status'] == 'transfer') :?>
                                <td><?= $detail['uraian']?></td>
                                <td>-</td>
                                <td><?= rupiah($detail['nominal'])?></td>
                                <td><center><?=$detail['metode']?></center></td>
                                <td>-</td>
                                <td>
                                    <a href="javascript:void(0)" class="modalEditTransfer" data-bs-toggle="modal" data-bs-target="#modal_edit" data-id="<?= $detail['id_transfer']?>">
                                        <span class="badge bg-gradient-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                            </svg>
                                        </span>
                                    </a>
                                    <a href="<?=base_url()?>kartupiutang/kwitansi_transfer/<?= $detail['id_transfer']?>" target="_blank">
                                        <span class="badge bg-gradient-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>
                                            </svg>
                                        </span>
                                    </a>
                                </td>
                                <!-- <td><a href="#" class="badge badge-success modalEditTransfer" data-toggle="modal" data-target="#modal_edit" data-id="<?= $detail['id_transfer']?>">edit</a></td>
                                <td><center>-</center></td> -->
                            <?php endif;?>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card overflow-auto menu-navigation" id="menu-invoice">
        <div class="card-body">
            <table class="table table-hover align-items-center mb-0 text-dark text-xs">
                <!-- <thead> -->
                    <th class="w-1"><center>No</center></th>
                    <th class="w-1">Tgl Tagihan</th>
                    <th >No Tagihan</th>
                    <th class="w-1">Action</th>
                <!-- </thead>
                <tbody> -->
                    <?php 
                        $no = 0;
                        foreach ($invoice as $invoice) :?>
                        <tr>
                            <td><?= ++$no?></td>
                            <td><?= date("d-m-Y", strtotime($invoice['tgl_invoice']))?></td>
                            <td><?= substr($invoice['id_invoice'],0, 3)?>/Tag-Im/<?= date('n', strtotime($invoice['tgl_invoice']))?>/<?= date('Y', strtotime($invoice['tgl_invoice']))?></a></td>
                            <td>
                                <a href="javascript:void(0)" class="modalEditInvoice me-1" data-bs-toggle="modal" data-bs-target="#modal_edit_invoice" data-id="<?=$invoice['id_invoice']?>">
                                    <span class="badge bg-gradient-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                        </svg>
                                    </span>
                                </a>
                                <a href="<?= base_url()?>kartupiutang/invoice/<?=$invoice['id_invoice']?>" target="_blank">
                                    <span class="badge bg-gradient-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                                            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>
                                        </svg>
                                    </span>
                                </a>
                                <!-- <a href="<?=base_url()?>transaksi/kuitansi/<?= MD5($detail['id_pembayaran'])?>" target=_blank><center><i class="fa fa-print"></i></center></a> -->
                            </td>
                            <!-- <td><a href="<?=base_url()?>transaksi/kuitansi/<?= MD5($detail['id_pembayaran'])?>" target=_blank><center><i class="fa fa-print"></i></center></a></td> -->
                        </tr>
                    <?php endforeach;?>
                <!-- </tbody> -->
            </table>
        </div>
    </div>
</div>

<?= footer()?>

<script>
    $("#piutang").addClass("active")
    $("#dataTable").DataTable({
        paging: false,
        searching: false
    })

    let data = 'menu-piutang';
    // Remove and add classes to navigation buttons
    $(".btn-navigation").removeClass("bg-gradient-info").addClass("bg-gradient-secondary");
    $(`[data-menu='${data}']`).removeClass("bg-gradient-secondary").addClass("bg-gradient-info");

    // Hide all menu-navigation-3 elements and show the one with the specified data-menu
    $(".menu-navigation").hide();
    $("#" + data).show();

    <?php if( $this->session->flashdata('pesan') ) : ?>
        Toast.fire({
            icon: "info",
            title: "<?= $this->session->flashdata('pesan')?>"
        });
    <?php endif; ?>

    $(".modalTransaksi").on("click", function(){
        let data = 'menu-transaksi-langsung';
        // Remove and add classes to navigation buttons
        $(".btn-navigation-3").removeClass("bg-gradient-info").addClass("bg-gradient-secondary");
        $(`[data-menu='${data}']`).removeClass("bg-gradient-secondary").addClass("bg-gradient-info");

        // Hide all menu-navigation-3 elements and show the one with the specified data-menu
        $(".menu-navigation-3").hide();
        $("#" + data).show();

        $(".content").hide();
    })

    // modal edit tagihan
        $(".modalEditTagihan").click(function(){
            $("#modal-edit").html("Edit Tagihan");
            let id = $(this).data("id");
            $("#form-edit").attr("action", "<?= base_url()?>kartupiutang/edit_tagihan")
            $("#edit_alamat").attr("readonly", "readonly");
            $("#edit_alamat").val("");

            $.ajax ({
                url : "<?=base_url()?>kartupiutang/get_data_tagihan",
                method : "POST",
                data : {id: id},
                async : true,
                dataType : 'json',
                success : function(data){
                    $("#id").val(data.id_tagihan);
                    $("#nama").val(data.nama_tagihan);
                    $("#tgl_transaksi").val(data.tgl_tagihan);
                    $("#keterangan").val(data.uraian);
                    $("#nominal_uang").val(data.nominal);
                }
            })

            $(".content").hide();
        })
    // modal edit tagihan

    // modal edit pembayaran cash
        $(".modalEditCash").click(function(){
            $("#modal-edit").html("Edit Pembayaran");
            let id = $(this).data("id");
            $("#form-edit").attr("action", "<?=base_url()?>kartupiutang/edit_pembayaran_cash")
            $("#edit_alamat").attr("readonly", "readonly");
            $("#edit_alamat").val("");

            $.ajax ({
                url : "<?=base_url()?>kartupiutang/get_data_pembayaran",
                method : "POST",
                data : {id: id},
                async : true,
                dataType : 'json',
                success : function(data){
                    $("#id").val(data.id_pembayaran);
                    $("#nama").val(data.nama_pembayaran);
                    $("#tgl_transaksi").val(data.tgl_pembayaran);
                    $("#keterangan").val(data.uraian);
                    $("#nominal_uang").val(data.nominal);
                }
            })

            $(".content").hide();
        })
    // modal edit pembayaran cash
    
    // modal edit transfer
        $(".modalEditTransfer").click(function(){
            $("#modal-edit").html("Edit Pembayaran");
            let id = $(this).data("id");
            $("#form-edit").attr("action", "<?=base_url()?>kartupiutang/edit_pembayaran_transfer")
            $("#edit_alamat").removeAttr("readonly");

            $.ajax ({
                url : "<?=base_url()?>kartupiutang/get_data_pembayaran_transfer",
                method : "POST",
                data : {id: id},
                async : true,
                dataType : 'json',
                success : function(data){
                    $("#edit_alamat").val(data.alamat);
                    $("#id").val(data.id_transfer);
                    $("#nama").val(data.nama_transfer);
                    $("#tgl_transaksi").val(data.tgl_transfer);
                    $("#keterangan").val(data.uraian);
                    $("#nominal_uang").val(data.nominal);
                }
            })

            $(".content").hide();
        })
    // modal edit transfer

    // modal edit deposit
        $(".modalEditDeposit").click(function(){
            $("#modal-edit").html("Edit Pembayaran");
            let id = $(this).data("id");
            $("#form-edit").attr("action", "<?=base_url()?>kartupiutang/edit_deposit")
            $("#edit_alamat").attr("readonly", "readonly");
            $("#edit_alamat").val("");

            $.ajax ({
                url : "<?=base_url()?>kartupiutang/get_data_deposit",
                method : "POST",
                data : {id: id},
                async : true,
                dataType : 'json',
                success : function(data){
                    $("#id").val(data.id_deposit);
                    $("#nama").val(data.nama_deposit);
                    $("#tgl_transaksi").val(data.tgl_deposit);
                    $("#keterangan").val(data.uraian);
                    $("#nominal_uang").val(data.nominal);
                }
            })

            $(".content").hide();
        })
    // modal edit deposit

    var modalTransaksi = document.getElementById('modalTransaksi')
    modalTransaksi.addEventListener('hidden.bs.modal', function (event) {
        $(".content").show();
    })

    var modal_edit = document.getElementById('modal_edit')
    modal_edit.addEventListener('hidden.bs.modal', function (event) {
        $(".content").show();
    })

    var modalTambahInvoice = document.getElementById('modal_tambah_invoice')
    modalTambahInvoice.addEventListener('hidden.bs.modal', function (event) {
        $(".content").show();
    })

    $(".modalTambahInvoice").click(function(){
        $("#modal-invoice").html("Tambah Invoice");
        $("#id_invoice").val($(this).data("id"));
        $("#tipe_invoice").val("peserta");

        $(".content").hide();
    })

    // tambah invoice
    $(".modalTambahInvoice").click(function(){
            $("#modal-invoice").html("Tambah Invoice");
            $("#id_invoice").val($(this).data("id"));
            $("#tipe_invoice").val("kpq");
        })
        
        var x = 0;
        var urut = 1;
        $("#tambah_uraian").click(function(e){
            e.preventDefault();
            x++;
            urut++;
            $("#uraianInvoice").append(
                '<div class="form-group" id="u'+x+'">'+
                    '<label for="uraian_invoice['+x+']">Uraian '+ urut +'</label>'+
                    '<textarea name="uraian['+x+']" id="uraian_invoice['+x+']" rows="2" class="form-control form-control-md"></textarea>'+
                '</div>'+
                '<div class="form-group" id="o'+x+'">'+
                    '<label for="satuan_invoice['+x+']">Satuan '+ urut +'</label>'+
                    '<input type="text" name="satuan[]" id="satuan_invoice['+x+']" class="form-control form-control-md">'+
                '</div>'+
                '<div class="form-group" id="n'+x+'">'+
                    '<label for="nominal_invoice['+x+']">Nominal '+ urut +'</label>'+
                    '<input type="text" name="nominal['+x+']" id="nominal_invoice['+x+']" class="form-control form-control-md">'+
                '</div>'
                );
        })

        $("#hapus_uraian").click(function(e){
            e.preventDefault();
            $("#u"+x).remove();
            $("#n"+x).remove();
            $("#o"+x).remove();
            x--;
            urut--;
        })
    // tambah invoice

    // modal edit invoice
        $(".modalEditInvoice").click(function(){
            let data = 'data-invoice-1';
            // Remove and add classes to navigation buttons
            $(".btn-navigation-4").removeClass("bg-gradient-info").addClass("bg-gradient-secondary");
            $(`[data-menu='${data}']`).removeClass("bg-gradient-secondary").addClass("bg-gradient-info");

            // Hide all menu-navigation-3 elements and show the one with the specified data-menu
            $(".menu-navigation-4").hide();
            $("#" + data).show();

            let id = $(this).data("id");
            $("#id-1").val(id);
            $("#id-2").val(id);
            $("#id-3").val(id);
            $("#id-4").val(id);

            $.ajax({
                url : "<?= base_url()?>kartupiutang/get_data_invoice",
                method : "POST",
                data : {id : id},
                async: true,
                dataType : "json",
                success : function(data){
                    $("#nama_invoice_edit").val(data.nama_invoice);
                    $("#tgl_invoice_edit").val(data.tgl_invoice);
                }
            })
            
            $.ajax({
                url : "<?= base_url()?>kartupiutang/get_data_uraian_invoice",
                method : "POST",
                data : {id : id},
                async: true,
                dataType : "json",
                success : function(data){
                    let html = "";
                    let html2 = "<table class='table'>";
                    let urut = 1;
                    for (let i = 0; i < data.length; i++) {
                        html += 
                        '<input type="hidden" name="id_uraian['+i+']" value="'+data[i].id_uraian+'">'+
                        '<div class="form-group">'+
                            '<label for="uraian">Uraian '+ urut +'</label>'+
                            '<input type="text" name="uraian['+i+']" id="uraian" class="form-control form-control-md" value="'+data[i].uraian+'">'+
                        '</div>'+
                        '<div class="form-group" id="o'+x+'">'+
                            '<label for="satuan_invoice['+x+']">Satuan '+ urut +'</label>'+
                            '<input type="text" name="satuan['+i+']" id="satuan_invoice['+x+']" class="form-control form-control-md" value="'+data[i].satuan+'">'+
                        '</div>'+
                        '<div class="form-group">'+
                            '<label for="nominal">Nominal '+ urut +'</label>'+
                            '<input type="text" name="nominal['+i+']" id="nominal" class="form-control form-control-md" value="'+data[i].nominal+'">'+
                        '</div>';

                        html2 +=
                                '<tr>'+
                                    '<td><input type="checkbox" name="uraian['+i+']" value="'+data[i].id_uraian+'" class="me-3">'+data[i].uraian+'</td>'+
                                    '<td>'+data[i].nominal+'</td>'+
                                '</tr>';

                        urut++;
                    }

                    $("#data-uraian-edit").html(html);
                    $("#data-uraian-hapus").html(html2);
                }
            })
        })

        $("#aksi-1").val("doc");
        $("#aksi-2").val("edit");
        $("#aksi-3").val("tambah");
        $("#aksi-4").val("hapus");
    // modal eit invoice
    // validasi
        $("input[name='nominal']").keyup(function(){
            $(this).val(formFormatRupiah(this.value, 'Rp. '))
        })
    // validasi

    // submit
        $("#btn-submit-1, #btn-submit-2, #btn-submit-3").click(function(){
            var c = confirm("Yakin akan menambahkan data?");
            return c;
        })

        $("#edit_transaksi").click(function(){
            var c = confirm("Yakin akan merubah data transaksi?");
            return c;
        })
    // submit

    $(".btn-navigation").on("click", function(){
        $(".alert-error").hide();

        let data = $(this).data("menu");

        $(".btn-navigation").removeClass("bg-gradient-info");
        $(".btn-navigation").removeClass("bg-gradient-secondary");
        $(".btn-navigation").addClass("bg-gradient-secondary");

        $(`[data-menu='${data}']`).removeClass("bg-gradient-secondary");
        $(`[data-menu='${data}']`).addClass("bg-gradient-info");

        $(".menu-navigation").hide();
        $("#" + data).show();
    })

    $(".btn-navigation-3").on("click", function(){
        $(".alert-error").hide();

        let data = $(this).data("menu");

        // console.log(data)

        $(".btn-navigation-3").removeClass("bg-gradient-info");
        $(".btn-navigation-3").removeClass("bg-gradient-secondary");
        $(".btn-navigation-3").addClass("bg-gradient-secondary");

        $(`[data-menu='${data}']`).removeClass("bg-gradient-secondary");
        $(`[data-menu='${data}']`).addClass("bg-gradient-info");

        $(".menu-navigation-3").hide();
        $("#" + data).show();
    })

    $(".btn-navigation-2").on("click", function(){
        $(".alert-error").hide();

        let data = $(this).data("menu");

        // console.log(data)

        $(".btn-navigation-2").removeClass("bg-gradient-info");
        $(".btn-navigation-2").removeClass("bg-gradient-secondary");
        $(".btn-navigation-2").addClass("bg-gradient-secondary");

        $(`[data-menu='${data}']`).removeClass("bg-gradient-secondary");
        $(`[data-menu='${data}']`).addClass("bg-gradient-info");

        $(".menu-navigation-2").hide();
        $("#" + data).show();
    })

    $(".btn-navigation-4").on("click", function(){
        $(".alert-error").hide();

        let data = $(this).data("menu");

        // console.log(data)

        $(".btn-navigation-4").removeClass("bg-gradient-info");
        $(".btn-navigation-4").removeClass("bg-gradient-secondary");
        $(".btn-navigation-4").addClass("bg-gradient-secondary");

        $(`[data-menu='${data}']`).removeClass("bg-gradient-secondary");
        $(`[data-menu='${data}']`).addClass("bg-gradient-info");

        $(".menu-navigation-4").hide();
        $("#" + data).show();
    })
</script>