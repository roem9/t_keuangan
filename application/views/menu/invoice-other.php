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

<a href="javascript:void(0)" data-bs-toggle="modal" class="btn btn-success btn-sm mb-3 modal_tambah_invoice" data-bs-target="#modal_tambah_invoice">Tambah Invoice</a>
<div class="content">
    <div class="card shadow mb-4 overflow-auto">
        <div class="card-body">
            <table id="dataTable" class="table table-hover align-items-center mb-0 text-dark text-sm">
                <thead>
                    <tr>
                        <!-- <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1 all">No</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Periode</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Rekap Honor</th> -->
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1 all">No</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1 all">Tgl Invoice</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1 all">No. Invoice</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1 all">Total</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 0;
                        foreach ($invoice as $invoice) : ?>
                            <tr>
                                <td><center><?=++$no?></center></td>
                                <td><?= date("Y-m-d", strtotime($invoice['tgl_invoice']))?></td>
                                <td><?= substr($invoice['id_invoice'],0, 3)?>/Tag-Im/<?= date('n', strtotime($invoice['tgl_invoice']))?>/<?= date('Y', strtotime($invoice['tgl_invoice']))?></a></td>
                                <td><?= $invoice['nama_invoice']?></td>
                                <td><?= rupiah($invoice['total'])?></td>
                                <td>
                                    <a href="<?= base_url()?>kartupiutang/invoice/<?=$invoice['id_invoice']?>" target="_blank">
                                        <span class="badge bg-gradient-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1"/>
                                                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                                            </svg>
                                        </span>
                                    </a>
                                    <a href="javascript:void(0)" class="modal_edit_invoice" data-bs-toggle="modal" data-bs-target="#modal_edit_invoice" data-id="<?=$invoice['id_invoice']?>">
                                        <span class="badge bg-gradient-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                            </svg>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?= footer()?>

<script>
    let table = new DataTable('#dataTable');

    <?php if( $this->session->flashdata('pesan') ) : ?>
        Toast.fire({
            icon: "success",
            title: "<?= $this->session->flashdata('pesan')?>"
        });
    <?php endif; ?>

    $("#lain").addClass("active")
    
    // tambah invoice
        $(".modal_tambah_invoice").click(function(){
            $("#modal-invoice").html("Tambah Invoice");
            $("#tipe_invoice").val("other");

            $(".content").hide();

            $("[id^='uxx']").remove();
            $("[id^='nxx']").remove();
            $("[id^='oxx']").remove();
            x = 0
            urut = 1
        })
        
        var x = 0;
        var urut = 1;
        
        $("#tambah_uraian").click(function(e){
            e.preventDefault();
            x++;
            urut++;
            $("#uraianInvoice").append(
                '<div class="form-group" id="uxx'+x+'">'+
                    '<label for="uraian_invoice['+x+']">Uraian '+ urut +'</label>'+
                    '<textarea name="uraian['+x+']" id="uraian_invoice['+x+']" rows="2" class="form-control form-control-sm"></textarea>'+
                '</div>'+
                '<div class="form-group" id="oxx'+x+'">'+
                    '<label for="satuan_invoice['+x+']">Satuan '+ urut +'</label>'+
                    '<input type="text" name="satuan[]" id="satuan_invoice['+x+']" class="form-control form-control-sm">'+
                '</div>'+
                '<div class="form-group" id="nxx'+x+'">'+
                    '<label for="nominal_invoice['+x+']">Nominal '+ urut +'</label>'+
                    '<input type="text" name="nominal['+x+']" id="nominal_invoice['+x+']" class="form-control form-control-sm">'+
                '</div>'
                );
        })

        $("#hapus_uraian").click(function(e){
            e.preventDefault();
            $("#uxx"+x).remove();
            $("#nxx"+x).remove();
            $("#oxx"+x).remove();
            x--;
            urut--;
        })
    // tambah invoice

    // modal edit invoice
        $(".modal_edit_invoice").click(function(){
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

            $(".content").hide();
        })

        var modal_edit_invoice = document.getElementById('modal_edit_invoice')
        modal_edit_invoice.addEventListener('hidden.bs.modal', function (event) {
            $(".content").show();
        })

        var modal_tambah_invoice = document.getElementById('modal_tambah_invoice')
        modal_tambah_invoice.addEventListener('hidden.bs.modal', function (event) {
            $(".content").show();
        })

        $("#aksi-1").val("doc");
        $("#aksi-2").val("edit");
        $("#aksi-3").val("tambah");
        $("#aksi-4").val("hapus");
    // modal eit invoice

    // validasi
        $("input[name='nominal']").keyup(function(){
            $(this).val(formatRupiah(this.value, 'Rp. '))
        })
    // validasi

    // submit
        $("#submitModalAddData").click(function(){
        var c = confirm("Yakin akan menambahkan transaksi?");
        return c;
        })

        $("#submitModalEditData").click(function(){
            var c = confirm("Yakin akan mengubah data transaksi?");
            return c;
        })
    // submit

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