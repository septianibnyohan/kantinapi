<!DOCTYPE html>
<html>
<head>
	<title>Email</title>
</head>
<body>

	<?php
		if($status == 'F')
		{
			$kata = 'Transaksi Anda Dengan Order ID : '.$order_id.' Telah Gagal Diproses.';
			$alasan = '';
		}
		else if($status =='C')
		{
			$kata = 'Transaksi Anda Dengan Order ID : '.$order_id.' Telah Dibatalkan.';
			$alasan = '';
		}

		else if($status =='R')
		{
			$kata = "Pengembalian Uang Sebesar Rp. ".number_format($harga_transaksi,2) .' Ke PayFazz Wallet Anda Sudah Berhasil';
			$alasan = 'Alasan Pengembalian Uang : '.$alasan_refund.'.  Silahkan Melakukan Pengecekan pada PayFazz Wallet Anda. Jika Uang Belum Masuk ke PayFazz Wallet Anda Atau Jumlahnya Tidak Sesuai Silahkan Menghubungi Customer Service Kami.';

		}
		else if($status =='P')
		{
			$kata = 'Transaksi Anda Dengan Order ID : '.$order_id.' Sedang Diproses Oleh Operator.';
			$alasan = '';
		}
		else if($status == 'S'){
			$kata = 'Transaksi Anda Dengan Order ID : '.$order_id.' Telah Berhasil Diproses.';
			$alasan = '';
		}

	
	?>
	<h3>{{ $kata }}</h3>
 	{{ $alasan }}
 	<hr/>
	<p>Jika Anda Membutuhkan Bantuan, Silahkan Menghubungi Customer Service Kami.<br>Terima Kasih Telah Menggunakan <a hreff="http://payfazz.com">PayFazz.com</a>
		<br>Tim PayFazz
	</p>
</body>
</html>