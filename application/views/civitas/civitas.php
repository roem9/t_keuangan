<div class="modal fade" id="modalCivitas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title nama-title" id="exampleModalScrollableTitle"></h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url()?>civitas/edit_civitas" method="POST" enctype="multipart/form-data" class="mb-3">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control form-control-md form-1" name="status" id="status" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nip">NIK</label>
                        <input type="text" name="nip" id="nip" class="form-control form-control-md form-1" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama KPQ</label>
                        <input type="text" class="form-control form-control-md form-1" name="nama" id="nama" disabled>
                    </div>
                    <div class="form-group">
                        <label for="golongan">Golongan <span class="text-danger">*</span></label>
                        <select name="golongan" id="golongan" class="form-control form-control-md">
                            <option value="A">Golongan A</option>
                            <option value="B">Golongan B</option>
                            <option value="C">Golongan C</option>
                            <option value="D">Golongan D</option>
                            <option value="E">Golongan E</option>
                            <option value="F">Golongan F</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_masuk">Tgl Bergabung</label>
                        <input type="date" class="form-control form-control-md form-1" name="tgl_masuk" id="tgl_masuk" disabled>
                    </div>
                    <div class="form-group">
                        <label for="tgl_kelas">Tgl Kelas Pertama</label>
                        <input type="date" class="form-control form-control-md form-1" name="tgl_kelas" id="tgl_kelas" disabled>
                    </div>
                    <div class="form-group">
                        <label for="tgl_keluar">Tgl Keluar</label>
                        <input type="date" class="form-control form-control-md form-1" name="tgl_keluar" id="tgl_keluar" disabled>
                    </div>
                    <div class="form-group">
                        <label for="lama_bergabung">Lama Memiliki Kelas</label>
                        <input type="text" class="form-control form-control-md form-1" id="lama_bergabung" disabled>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="submit" value="Update Data Civitas" class="btn btn-sm btn-success" id="btn-submit-1">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </form>
</div>

<div class="card shadow mb-4 overflow-auto">
    <div class="card-header pb-0 d-flex justify-content-between">
        <div class="d-lg-flex">
            <div>
            <h5 class="mb-0"><?= $title ?></h5>
            <p class="text-sm mb-0">
                <?= $deskripsi?>
            </p>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="tableData" class="table table-hover align-items-center mb-0 text-dark">
            <thead>
                <tr>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1 desktop">Status</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1 all">NIK</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama KPQ</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1 desktop">Tgl Kelas</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Golongan</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
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
        ajax: { url: `<?= base_url()?>civitas/getListCivitas/<?= $kode?>`, type: "POST" },
        columns: [
            { data: "status", orderable: true, searchable: true, className: "text-sm w-1 text-center" },
            { data: "nip", orderable: true, searchable: true, className: "text-sm w-1" },
            { data: "nama_kpq", orderable: true, searchable: true, className: "text-sm" },
            { data: "tgl_kelas", orderable: true, searchable: true, className: "text-sm w-1" },
            { data: "golongan", orderable: true, searchable: true, className: "text-sm w-1 text-center" },
            { data: "action", orderable: true, searchable: true, className: "text-sm w-1 text-center" },
        ],
        order: [[2, "asc"]],
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

    $(document).on("click", ".modalCivitas", function(){
        const id = $(this).data('id');
        $.ajax({
            url : "<?=base_url()?>civitas/get_civitas_by_nip",
            method : "POST",
            data : {id : id},
            async : true,
            dataType : 'json',
            success : function(data){
                // console.log(data)
                $(".nama-title").html(data.nama_kpq);
                $("#status").val(data.status);
                $("#golongan").val(data.golongan);
                $("#nip").val(data.nip);
                $("#nama").val(data.nama_kpq);
                $("#tgl_masuk").val(data.tgl_masuk);
                $("#tgl_kelas").val(data.tgl_kelas);
                $("#tgl_keluar").val(data.tgl_keluar);
                
                if (data.tgl_kelas == "0000-00-00"){
                    let gabung = "Belum menginputkan tanggal kelas pertama";
                    $("#lama_bergabung").val(gabung)
                } else if (data.tgl_kelas != "0000-00-00"){
                    let oneDay = 24*60*60*1000;
                    let tgl_kelas = new Date(data.tgl_kelas);
                    let tgl_now = new Date();
                    let gabung = Math.round(Math.round((tgl_now.getTime() - tgl_kelas.getTime()) / (oneDay)));
                    let tahun = Math.floor(gabung/365);
                    let sisa = gabung % 365;
                    let bulan = Math.floor(sisa / 30);
                    sisa = sisa % 30;
                    let hari = sisa;
                    $("#lama_bergabung").val(tahun + ' Tahun ' + bulan + ' Bulan ' + hari + ' Hari')
                }
            }
        })
    })

    $("#btn-submit-1").click(function(){
        var c = confirm("Yakin akan mengubah data civitas?");
        return c;
    })
</script>

