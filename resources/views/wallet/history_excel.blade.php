<!DOCTYPE html>
<html>
<head>
    <title>Laporan Wallet History</title>
</head>
<body>
    <table id="content_table" class="table table-striped table-hover table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 10px;">
        <thead>
            <tr>
                <th style="text-align: center;" >User ID</th>
                <th style="text-align: center;" >Order ID</th>
                <th style="text-align: center;" >Tanggal </th>
                <th style="text-align: center;" >Nama Transaksi</th>
                <th style="text-align: center;" >Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wallet as $t)
            <tr>
                <td>{{ $t->user_id }}</td>
                <td>{{ $t->order_id }}</td>
                <td>{{ $t->date }}</td>
                <td>{{ $t->txn_name }}</td>
                <td>{{ $t->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>