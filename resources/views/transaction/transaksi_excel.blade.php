<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
</head>
<body>
    <table id="content_table" class="table table-striped table-hover table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 10px;">
        <thead>
            <tr>
                <th style="text-align: center;" >Order ID</th>
                <th style="text-align: center;" >Tanggal Order</th>
                <th style="text-align: center;" >Tanggal Pembayaran</th>
                <th style="text-align: center;" >Nama Transaksi</th>
                <th style="text-align: center;" >Tipe Transaksi</th>
                <th style="text-align: center;" >User ID</th>
                <th style="text-align: center;" >No Pelanggan</th>
                <th style="text-align: center;" >Harga Transaksi</th>
                <th style="text-align: center;" >Harga Dasar</th>
                <th style="text-align: center;" >Kupon</th>
                <th style="text-align: center;" >Profit</th>
                <th style="text-align: center;" >Status</th>  
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $t)
            <tr>
                <td>{{ $t->order_id }}</td>
                <td>{{ $t->order_dtm }}</td>
                <td>{{ $t->payment_dtm }}</td>
                <td>{{ $t->txn_name }}</td>
                <td>{{ $t->txn_type }}</td>
                <td>{{ $t->user_id }}</td>
                <td>{{ $t->cust_no }}</td>
                <td>{{ $t->vendor_amount }}</td>
                <td>{{ $t->tot_bill_amount }}</td>
                <td>{{ $t->coupon_amount }}</td>
                <td>{{ $t->profit }}</td>
                <td>{{ $t->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>