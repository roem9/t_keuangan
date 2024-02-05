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
        <table id="dataTable" class="table table-hover align-items-center mb-0 text-dark text-sm">
            <thead>
                <tr>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1 all">No</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Periode</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Rekap Honor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 0;
                    foreach ($periode as $key => $periode) :?>
                    <?php foreach ($periode['bulan'] as $bulan) :?>
                        <tr>
                            <td><center><?=++$no?></center></td>
                            <td><?=$month[$bulan] . " " . $periode['tahun']?></td>
                            <td><a href="<?=base_url()?>rekap/exporthonor/<?=$bulan?>/<?=$periode['tahun']?>" target="_blank">Rekap Honor <?= $bulan."-".$periode['tahun']?>.xls</a></td>
                        </tr>
                    <?php endforeach;?>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

<?= footer()?>

<script>
    let table = new DataTable('#dataTable');
</script>


