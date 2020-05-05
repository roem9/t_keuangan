<div class="modal fade" id="modalCivitas" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title nama-title" id="exampleModalScrollableTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url()?>civitas/edit_civitas" method="POST" enctype="multipart/form-data" class="mb-3">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control form-control-sm form-1" name="status" id="status" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nip">NIK</label>
                        <input type="text" name="nip" id="nip" class="form-control form-control-sm form-1" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama KPQ</label>
                        <input type="text" class="form-control form-control-sm form-1" name="nama" id="nama" readonly>
                    </div>
                    <div class="form-group">
                        <label for="golongan">Golongan <span class="text-danger">*</span></label>
                        <select name="golongan" id="golongan" class="form-control form-control-sm">
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
                        <input type="date" class="form-control form-control-sm form-1" name="tgl_masuk" id="tgl_masuk" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_kelas">Tgl Kelas Pertama</label>
                        <input type="date" class="form-control form-control-sm form-1" name="tgl_kelas" id="tgl_kelas" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_keluar">Tgl Keluar</label>
                        <input type="date" class="form-control form-control-sm form-1" name="tgl_keluar" id="tgl_keluar" readonly>
                    </div>
                    <div class="form-group">
                        <label for="lama_bergabung">Lama Memiliki Kelas</label>
                        <input type="text" class="form-control form-control-sm form-1" id="lama_bergabung" readonly>
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

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 mt-3"><?= $title?></h1>
            </div>
            <?php if( $this->session->flashdata('pesan') ) : ?>
                <div class="row">
                    <div class="col-6">
                        <?= $this->session->flashdata('pesan');?>
                        </div>
                </div>
            <?php endif; ?>
            <div class="card shadow mb-4" style="max-width: 800px">
                <div class="card-body">
                    <table id="dataTable" class="table table-sm cus-font">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Status</th>
                                <th>NIK</th>
                                <th>Nama KPQ</th>
                                <th>Tgl. Kelas</th>
                                <th>Golongan</th>
                                <th><center>Detail</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 0;
                                foreach ($civitas as $civitas) :?>
                                <tr>
                                    <td><center><?=++$no?></center></td>
                                    <td><?= $civitas['status']?></td>
                                    <td><?= $civitas['nip']?></td>
                                    <td style="width: 30%"><?= $civitas['nama_kpq']?>
                                    <td>
                                        <center>
                                            <?php 
                                                if($civitas['tgl_kelas'] == "0000-00-00"){
                                                    echo "-";
                                                } else {
                                                    echo date("d-M-Y", strtotime($civitas['tgl_kelas']));
                                                };
                                            ?>
                                        </center>
                                    </td>
                                    <td>Gol. <?= $civitas['golongan']?></td>
                                    <td><center><a href="#" class="badge badge-warning modalCivitas" data-toggle="modal" data-target="#modalCivitas" data-id="<?= $civitas['nip']?>">detail</a></center></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#civitas").addClass("active");

    $(".modalCivitas").click(function(){
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

