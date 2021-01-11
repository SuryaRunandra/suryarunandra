<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Data Peraturan Desa</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link href="<?= base_url()?>assets/css/report.css" rel="stylesheet" type="text/css">
		<?php if (is_file(LOKASI_LOGO_DESA . "favicon.ico")): ?>
			<link rel="shortcut icon" href="<?= base_url()?><?= LOKASI_LOGO_DESA?>favicon.ico" />
		<?php else: ?>
			<link rel="shortcut icon" href="<?= base_url()?>favicon.ico" />
		<?php endif; ?>
		<style>
			.textx
			{
				mso-number-format:"\@";
			}
			td, th
			{
				font-size:9pt;
			}
			table#ttd td
			{
				text-align: center;
				white-space: nowrap;
			}
			.underline
			{
				text-decoration: underline;
			}
		</style>
	</head>
	<body>
		<div id="container">
			<div id="body">
				<div class="header" align="center">
					<h3>B.1 BUKU INDUK PENDUDUK DESA <?= strtoupper($desa['nama_desa'])?></h3>
					<h3><?= strtoupper($this->setting->sebutan_kecamatan.' '.$desa['nama_kecamatan'].' '.$this->setting->sebutan_kabupaten.' '.$desa['nama_kabupaten'])?></h3>
					<h3><?= !empty($tahun) ? 'TAHUN '. $tahun : ''?></h3>
					<br>
				</div>
				<table class="border thick">
					<thead>
						<tr class="border thick">
							<th rowspan="2">NOMOR URUT</th>
							<th rowspan="2">NAMA LENGKAP / PANGGILAN</th>
							<th rowspan="2">JENIS KELAMIN</th>
							<th rowspan="2">STATUS PERKAWINAN</th>
							<th colspan="2">TEMPAT & TANGGAL LAHIR</th>
							<th rowspan="2">AGAMA</th>
							<th rowspan="2">PENDIDIKAN TERAKHIR</th>
							<th rowspan="2">PEKERJAAN</th>
							<th rowspan="2">DAPAT MEMBACA HURUF</th>
							<th rowspan="2">KEWARGANEGARAAN</th>
							<th rowspan="2">ALAMAT LENGKAP</th>
							<th rowspan="2">KEDUDUKAN DLM KELUARGA</th>
							<th rowspan="2">NIK</th>
							<th rowspan="2">NOMOR KK</th>
							<th rowspan="2">KET</th>
						</tr>
						<tr class="border thick">
							<th>TEMPAT LAHIR</th>
							<th>TGL</th>
						</tr>
						<tr class="border thick">
							<th>1</th>
							<th>2</th>
							<th>3</th>
							<th>4</th>
							<th>5</th>
							<th>6</th>
							<th>7</th>
							<th>8</th>
							<th>9</th>
							<th>10</th>
							<th>11</th>
							<th>12</th>
							<th>13</th>
							<th>14</th>
							<th>15</th>
							<th>16</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($main as $data): ?>
						<tr>
							<td><?= $data['no']?></td>
							<td><?= strtoupper($data['nama'])?></td>
							<td><?= strtoupper($data['sex']) ?></td>
							<td><?= (strpos($data['kawin'],'KAWIN') !== false) ? $data['kawin'] : (($data['sex'] == 'LAKI-LAKI') ? 'DUDA':'JANDA') ?></td>
							<td><?= $data['tempatlahir']?></td>
							<td><?= strtoupper(tgl_indo($data['tanggallahir']))?></td>
							<td><?= $data['agama']?></td>
							<td><?= $data['pendidikan']?></td>
							<td><?= $data['pekerjaan']?></td>
							<td><?= $data['bahasa']?></td>
							<td><?= $data['warganegara']?></td>
							<td><?= strtoupper($data['alamat'])?></td>
							<td><?= $data['hubungan']?></td>
							<td><?= $privasi_nik ? sensor_nik_kk($data['nik']) : $data['nik']?></td>
							<td><?= $privasi_nik ? sensor_nik_kk($data['no_kk']) : $data['no_kk']?></td>
							<td><?= $data['attr']['keterangan']?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<br><br>
				<table id="ttd">
					<tr><td colspan="10">&nbsp;</td></tr>
					<tr><td colspan="10">&nbsp;</td></tr>
					<tr>
						<!-- Persen untuk tampilan cetak.
								Colspan untuk tampilan unduh.
						-->
						<td colspan="2">&nbsp;</td>
						<td colspan="3">MENGETAHUI</td>
						<td colspan="3"><span><?= strtoupper($this->setting->sebutan_desa)?> <?= strtoupper($desa['nama_desa']) ?>, <?= strtoupper(tgl_indo(date("Y m d"))) ?></span></td>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
						<td colspan="3" align="center"><?= strtoupper($pamong_ketahui['jabatan']) ?> <?= strtoupper($desa['nama_desa']) ?></td>
						<td colspan="3" align="center"><?= strtoupper($pamong_ttd['jabatan']) ?> <?= strtoupper($desa['nama_desa']) ?></td>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr><td colspan="10">&nbsp;</td></tr>
					<tr><td colspan="10">&nbsp;</td></tr>
					<tr><td colspan="10">&nbsp;</td></tr>
					<tr><td colspan="10">&nbsp;</td></tr>
					<tr><td colspan="10">&nbsp;</td></tr>
					<tr><td colspan="10">&nbsp;</td></tr>
					<tr>
						<td colspan="2">&nbsp;</td>
						<td colspan="3">( <?= strtoupper($pamong_ketahui['pamong_nama']) ?> )</td>
						<td colspan="3" align="center"><span>( <?= strtoupper($pamong_ttd['pamong_nama']) ?> )</span></td>
						<td colspan="2">&nbsp;</td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>
