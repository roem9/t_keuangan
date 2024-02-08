<!-- modal transaksi lain -->
<div class="modal fade" id="modalTransaksi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title nama-title">Transaksi PPU</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?=base_url()?>ppu/add_transaksi" method="post" id="formInput">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control form-control-md" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <select name="jenis" id="jenis" class="form-control form-control-md" required>
                                <option value="">Pilih Jenis</option>
                                <option value="Ambulance">Ambulance</option>
                                <option value="Infaq">Infaq</option>
                                <option value="P2J">P2J</option>
                                <option value="Waqaf Al-Quran">Waqaf Al-Quran</option>
                                <option value="Waqaf Gedung">Waqaf Gedung</option>
                                <option value="Zakat">Zakat</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lainnya">Lainnya</label>
                            <input type="text" name="lainnya" id="lainnya" class="form-control form-control-md" disabled>
                            <small id="" class="form-text text-muted">Form ini wajib diisi jika jenis = Lainnya</small>
                        </div>
                        <div class="form-group">
                            <label for="tgl">Tgl</label>
                            <input type="date" name="tgl" id="tgl" class="form-control form-control-md" value="<?= date('Y-m-d')?>" required>
                        </div>
                        <div class="form-group">
                            <label for="metode">Metode Pembayaran</label>
                            <select name="metode" id="metode" class="form-control form-control-md" required>
                                <option value="">Pilih Tipe</option>
                                <option value="Cash">Cash</option>
                                <option value="Transfer">Transfer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control form-control-md" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control form-control-md"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nominal_deposit">Nominal</label>
                            <input type="text" name="nominal" id="nominal_deposit" class="form-control form-control-md" required>
                        </div>
                        <div class="d-flex justify-content-end mb-3">
                            <input type="submit" value="Tambah Transaksi" class="btn btn-sm btn-success" id="submitModalAddData">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<!-- modal transaksi lain -->

<!-- modal edit transaksi -->
    <div class="modal fade" id="modal_edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-edit"></h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url()?>honor/edit_honor" method="POST" id="form-edit">
                    <input type="hidden" name="id_gol" id="id_gol">
                    <div class="form-group">
                        <label for="gol">Golongan</label>
                        <input type="text" name="gol" id="gol" class="form-control form-control-md" required>
                    </div>
                    <div class="form-group">
                        <label for="tipe_kelas">Tipe Kelas</label>
                        <select name="tipe_kelas" id="tipe_kelas" class="form-control form-control-md" required>
                            <option value="">Pilih tipe_kelas</option>
                            <option value="pv khusus">pv khusus</option>
                            <option value="pv luar">pv luar</option>
                            <option value="pv luar kota">pv luar kota</option>
                            <option value="reguler">reguler</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="honor">Honor</label>
                        <input type="text" name="honor" id="honor" class="form-control form-control-md rupiah" required>
                    </div>
                    <div class="form-group">
                        <label for="ot">Overtime (30)</label>
                        <input type="text" name="ot" id="ot" class="form-control form-control-md rupiah" required>
                    </div>
                    <div class="d-flex justify-content-end mb-3">
                        <input type="submit" class="btn btn-success btn-sm" value="Edit Honor" id="submitModalEditData">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
    </div>
<!-- modal edit transaksi -->

<!-- 
<div class="">
    <a href="javascript:void(0)" data-bs-toggle="modal" class="btn btn-success btn-sm mb-3 modalTransaksi" data-bs-toggle="modal" data-bs-target="#modalTransaksi">Tambah Transaksi</a>
</div> -->

<div class="card shadow mb-4 overflow-auto">
    <div class="card-body">
        <table id="tableData" class="table table-hover align-items-center mb-0 text-dark">
            <thead>
                <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1 desktop">Golongan</th>
                <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Tipe Kelas</th>
                <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Honor</th>
                <th class="text-uppercase text-dark text-xxs font-weight-bolder all">OT (30)</th>
                <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1 all">Action</th>
            </thead>
        </table>
    </div>
</div>

<?= footer()?>

<script>
    <?php if( $this->session->flashdata('pesan') ) : ?>
        Toast.fire({
            icon: "success",
            title: "<?= $this->session->flashdata('pesan')?>"
        });
    <?php endif; ?>
    
    var dataTable = $('#tableData').DataTable({
        initComplete: function () {
            var api = this.api();
            $("#mytable_filter input")
                .off(".DT")
                .on("input.DT", function () {
                    api.search(this.value).draw();
                });
        },
        oLanguage: {
            sProcessing: "loading...",
        },
        language: {
            paginate: {
                first: '<<',
                previous: '<',
                next: '>',
                last: '>>'
            }
        },
        processing: true,
        serverSide: true,
        ajax: { url: `<?= base_url()?>honor/getListHonor`, type: "POST" },
        columns: [
            { data: "gol", orderable: true, searchable: true, className: "text-sm w-1 text-center" },
            { data: "tipe_kelas", orderable: true, searchable: true, className: "text-sm" },
            { 
                data: "honor", 
                orderable: true, 
                searchable: true, 
                className: "text-sm text-center w-1" ,
                render: function(data, type, row){
                    return formatRupiah(row['honor'], 'Rp. ')
                }
            },
            { 
                data: "ot", 
                orderable: true, 
                searchable: true, 
                className: "text-sm text-center w-1" ,
                render: function(data, type, row){
                    return formatRupiah(row['ot'], 'Rp. ')
                }
            },
            { 
                data: null, 
                orderable: false, 
                searchable: false, 
                className: "text-sm w-1 text-center",
                render: function(data, type, row) {
                    return `
                        <a href="javascript:void(0)" class="modalEditHonor" data-bs-toggle="modal" data-bs-target="#modal_edit" data-id="${row['id_gol']}">
                            <span class="badge bg-gradient-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                </svg>
                            </span>
                        </a>
                    `;
                }
            },
        ],
        order: [[0, "asc"]],
        rowReorder: {
            selector: "td:nth-child(0)",
        },
        responsive: true,
        pageLength: 5,
        lengthMenu: [
        [5, 10, 20],
        [5, 10, 20]
        ]
    });

    $(".modalTransaksi").click(function(){
        $('#formInput').trigger("reset");
    })
    
    // modal edit cash
        $(document).on("click", ".modalEditHonor", function(){

            $("#modal-edit").html("Edit Honor");
            let id = $(this).data("id");

            $.ajax ({
                url : "<?=base_url()?>honor/get_honor",
                method : "POST",
                data : {id_gol: id},
                async : true,
                dataType : 'json',
                success : function(data){
                    $("[name = 'id_gol']").val(data.id_gol);
                    $("[name = 'gol']").val(data.gol);
                    $("[name = 'tipe_kelas']").val(data.tipe_kelas);
                    $("[name = 'honor']").val(data.honor);
                    $("[name = 'ot']").val(data.ot);
                }
            })
        })
    // modal edit cash

    // validasi
        // $("input[name='nominal']").keyup(function(){
        //     $(this).val(formFormatRupiah(this.value, 'Rp. '))
        // })
    // validasi

    // submit
        // $("#submitModalAddData").click(function(){
        // var c = confirm("Yakin akan menambahkan transaksi?");
        // return c;
        // })

        $("#submitModalEditData").click(function(){
            var c = confirm("Yakin akan mengubah data honor?");
            return c;
        })
    // submit
</script>