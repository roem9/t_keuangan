    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mt-3"><?= $title?></h1>
          </div>

          
          <?php if( $this->session->flashdata('piutang') ) : ?>
              <div class="row">
                  <div class="col-6">
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          Data Piutang<strong>berhasil</strong> <?= $this->session->flashdata('piutang');?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                  </div>
              </div>
          <?php endif; ?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4" style="max-width: 1000px;">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-sm cus-font" id="dataTable" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="max-width: 20px">No</th>
                      <th>Status</th>
                      <th>Nama Peserta</th>
                      <th>Program</th>
                      <th>Hari</th>
                      <th>Waktu</th>
                      <th>Pengajar</th>
                      <th>Piutang</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 0;
                      foreach ($peserta as $peserta) :?>
                        <tr>
                            <td><center><?= ++$no?></center></td>
                            <td><?= $peserta['status']?></td>
                            <td><?= $peserta['nama_peserta']?></td>
                            <td>
                              <?php 
                                if($peserta['program'] == ''){
                                  echo '<center>-</center>';
                                } else {
                                  echo $peserta['program'];
                                }
                              ?>
                            </td>
                            <td>
                              <?php 
                                if($peserta['hari'] == ''){
                                  echo '<center>-</center>';
                                } else {
                                  echo $peserta['hari'];
                                }
                              ?>
                            </td>
                            <td>
                              <?php 
                                if($peserta['jam'] == ''){
                                  echo '<center>-</center>';
                                } else {
                                  echo $peserta['jam'];
                                }
                              ?>
                            </td>
                            <td>
                              <?php 
                                if($peserta['nama_kpq'] == ''){
                                  echo '<center>-</center>';
                                } else {
                                  echo $peserta['nama_kpq'];
                                }
                              ?>
                            </td>
                            <?php if(($peserta['bayar'] - $peserta['piutang']) == 0):?>
                                <td class="bg-warning text-white"><a class="text-light" href="<?=base_url()?>kartupiutang/peserta/<?=$peserta['id_peserta']?>"><?= rupiah(($peserta['bayar'] - $peserta['piutang']))?></a></td>
                            <?php elseif(($peserta['bayar'] - $peserta['piutang']) < 0):?>
                                <td class="bg-danger text-white"><a class="text-light" href="<?=base_url()?>kartupiutang/peserta/<?=$peserta['id_peserta']?>"><?= rupiah(($peserta['bayar'] - $peserta['piutang']))?></a></td>
                            <?php elseif(($peserta['bayar'] - $peserta['piutang']) > 0):?>
                                <td class="bg-success text-white"><a class="text-light" href="<?=base_url()?>kartupiutang/peserta/<?=$peserta['id_peserta']?>"><?= rupiah(($peserta['bayar'] - $peserta['piutang']))?></a></td>
                            <?php endif;?>
                        </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<script>
  $("#piutang").addClass("active");
</script>