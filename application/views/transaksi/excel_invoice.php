<?php
    function rupiah($angka){
            
        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
        return $hasil_rupiah;
    }

    function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
?>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="d-flex justify-content-begin mt-3">
                    <h1 class="h3 mb-0 text-gray-800 mr-3"><?= $title?></h1>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table text-dark" style="font-size: 12px" border=1>
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Lengkap</th>
                            <th>Uraian</th>
                            <th>Nominal</th>
                            <th>Terbilang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($data as $i => $data) :?>
                            <tr>
                                <?php $id = substr($data['id_invoice'], 0, 3) . "/Tag-Im/" . date("m", strtotime($data['tgl_invoice'])) . "/" . date("Y", strtotime($data['tgl_invoice']));?>
                                <td rowspan=<?=count($data['uraian'])?>><?= $id?></td>
                                <td rowspan=<?=count($data['uraian'])?>><?= date("d-m-Y", strtotime($data['tgl_invoice']))?></td>
                                <td rowspan=<?=count($data['uraian'])?>><?= $data['nama_invoice']?></td>
                                <?php
                                    $total = 0;
                                    foreach ($data['uraian'] as $j => $uraian) :
                                    ?>
                                    <?php if ($j == 0)  :?>
                                        <td><?= $uraian['uraian']?></td>
                                        <td><?= rupiah($uraian['nominal'])?></td>
                                        <?php $total += $uraian['nominal']?>
                                        <td><?= ucfirst(terbilang($uraian['nominal']))?> rupiah</td>
                                    <?php else :?>
                                        <tr>
                                            <td><?= $uraian['uraian']?></td>
                                            <?php $total += $uraian['nominal']?>
                                            <td><?= rupiah($uraian['nominal'])?></td>
                                            <td><?= ucfirst(terbilang($uraian['nominal']))?> rupiah</td>
                                        </tr>
                                    <?php endif;?>
                                <?php endforeach;?>
                                <tr style="background-color: yellow">
                                    <td colspan=4><center><b>Total</b></center></td>
                                    <td><b><?= rupiah($total)?></b></td>
                                    <td><?= ucfirst(terbilang($total))?> rupiah</td>
                                </tr>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>