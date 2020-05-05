<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 mt-3"><?= $title?></h1>
            </div>
            <div class="card shadow mb-4" style="max-width: 500px">
                <div class="card-body">
                    <table id="dataTable" class="table table-sm cus-font">
                        <thead>
                            <tr>
                                <th style="width: 10%">No</th>
                                <th style="width: 50%">Periode</th>
                                <th>Rekap Honor</th>
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
        </div>
    </div>
</div>

<script>
    $("#rekap").addClass("active");
</script>


