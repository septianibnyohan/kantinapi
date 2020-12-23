@extends('sidemenu')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                    <li class="breadcrumb-item active">Transaksi</li>
                </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div style="padding: 10px" class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input style="font-weight: bold;font-size: 24px;background-color:#8699ad;color: #fff;padding: 4px;" type="text" value="TRANSAKSI" readonly/>
                            </div>
                        </div>
                        <div style="margin-bottom: 30px"></div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tanggal Order Dari :</label>
                                            <input type="date" name="dari" id="dari" class="form-control" value="{{ date('Y-m-d') }}">  
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tanggal Order Sampai :</label>
                                            <input type="date" name="sampai" id="sampai" class="form-control" value="{{ date('Y-m-d', strtotime('+7 days', strtotime(date('Y-m-d')))) }}">  
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Status:</label>
                                            <select class="form-control" id="status_transaksi">
                                                <option value=""> - Semua Status - </option>
                                                <option value="W">Waiting/Menunggu</option>
                                                <option value="S">Success</option>
                                                <option value="C">Cancel/Batal</option>
                                                <option value="F">Gagal</option>
                                                <option value="E">Expired</option>
                                                <option value="R">Refund</option>
                                                <option value="P">Diproses Operator</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <button onclick="cari()" style="margin-top: 26px;" class="btn btn-info"><i class="fa fa-search"></i> Cari</button><a class="xls" href="{{ url('export_excel') }}"><button style="margin-top: 26px;margin-left:20px;" class="btn btn-success"><i class="fa fa-file-excel"></i> Export</button></a>  
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                       
                       
        
                       
                        <table id="content_table" class="table table-striped table-hover table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 10px;">
                            <thead>
                                <tr>
                                    <th width="3%"  style="text-align: center;" >Order ID</th>
                                    <th width="10%" style="text-align: center;" >Tanggal Order</th>
                                    <th width="10%" style="text-align: center;" >Tanggal Pembayaran</th>
                                    <th width="*" style="text-align: center;" >Nama Transaksi</th>
                                    <th width="7%" style="text-align: center;" >Tipe Transaksi</th>
                                    <th width="4%" style="text-align: center;" >User ID</th>
                                    <th width="8%" style="text-align: center;" >No Pelanggan</th>
                                    <th width="8%" style="text-align: center;" >Harga Transaksi</th>
                                    <th width="8%" style="text-align: center;" >Harga Dasar</th>
                                    <th width="5%" style="text-align: center;" >Kupon</th>
                                    <th width="8%" style="text-align: center;" >Profit</th>
                                    <th width="8%" style="text-align: center;" >Status</th>
                                    <th width="15%" style="text-align: center;" >Action</th>  
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    
                    </div>
                </div>
            </div>
        </div>


        <div class="modal" id="modal_add" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
              <div class="modal-content">
                  <form id="form-add" method="post" data-toggle="validator">
                      {{ csrf_field() }} {{ method_field('POST') }}
                      <div class="modal-header">
                          <h3 class="modal-title"></h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true"> &times; </span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                              <div class="card card">
                                  <div class="card-body">
                                      <input type="hidden" id="id" name="id">
                                      <input type="hidden" id="user_id" name="user_id">
                                      <input type="hidden" id="harga_transaksi" name="harga_transaksi">  
                                      <div id="modal_detail_transaksi"></div>
                                      
                                      <div class="form-group">
                                          <label>Status:</label>
                                          <select class="form-control warna" id="status_trans" name="status_trans" required>   
                                                <option value="W">Waiting/Menunggu</option>
                                                <option value="S">Success</option>
                                                <option value="C">Cancel/Batal</option>
                                                <option value="F">Gagal</option>
                                                <option value="E">Expired</option>
                                                <option value="R">Refund</option>
                                                <option value="P">Diproses Operator</option>
                                          </select>
                                          <span class="help-block with-errors"></span>
                                      </div>

                                      <div class="form-group">
                                          <label>Alasan Refund:</label>
                                          <textarea class="form-control warna" id="alasan_refund" name="alasan_refund" maxlength="100" autofocus required></textarea>
                                          <span class="help-block with-errors"></span>
                                      </div>
                                    
                        
                                  </div>
                              </div> 
                            </div>
                        </div> 
                          
                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-primary btn-save">Submit</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      </div>
                  </form>
              </div>
            </div>
        </div> <!--end modal-->

    </div>
</div>


<div class="rightbar-overlay"></div> 

<!-- JAVASCRIPT -->
<script src="{{ asset('') }}assets/libs/jquery/jquery.min.js"></script>
<script src="{{ asset('') }}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('') }}assets/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ asset('') }}assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('') }}assets/libs/node-waves/waves.min.js"></script>
<script src="{{ asset('') }}assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>


 <!-- Required datatable js -->
<script src="{{ asset('') }}assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script>
<!-- Buttons examples -->
<script src="{{ asset('') }}assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('') }}assets/libs/jszip/jszip.min.js"></script>
<script src="{{ asset('') }}assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('') }}assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="{{ asset('') }}assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('') }}assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="{{ asset('') }}assets/js/pages/datatables.init.js"></script>
<script src="{{ asset('') }}js/validator/validator.min.js"></script>
<script src="{{ asset('') }}assets/libs/sweetalert2/sweetalert2.min.js"></script>
<!-- App js -->
<script src="{{ asset('') }}assets/js/app.js"></script>



<script type="text/javascript">

    load_table();
    set_url_excel();

    function set_url_excel(){
        var dari = $("#dari").val();
        var sampai = $("#sampai").val();
        var status = $("#status_transaksi").val();
        $("a.xls").prop("href", "{{ url('export_excel') }}"+"/"+dari+"/"+sampai+"/"+status);
    }

    $("#dari").change(function(){
        var dari = $(this).val();
        var sampai = $("#sampai").val();
        var status = $("#status_transaksi").val();
        $("a.xls").prop("href", "{{ url('export_excel') }}"+"/"+dari+"/"+sampai+"/"+status);
    });

    $("#sampai").change(function(){
        var dari = $("#dari").val();
        var sampai = $(this).val();
        var status = $("#status_transaksi").val();

        $("a.xls").prop("href", "{{ url('export_excel') }}"+"/"+dari+"/"+sampai+"/"+status);
    });

    $("#status_transaksi").change(function(){
        var dari = $("#dari").val();
        var sampai = $("#sampai").val();
        var status = $(this).val();

        $("a.xls").prop("href", "{{ url('export_excel') }}"+"/"+dari+"/"+sampai+"/"+status);
    });


    $("#status_trans").change(function(){
        var status = $(this).val();
        if(status=='R') {
            $("#alasan_refund").removeAttr('readonly');
            $("#alasan_refund").attr('required', true);
        }
        else {
             $("#alasan_refund").attr('readonly', true);
             $("#alasan_refund").removeAttr('required');
             $("#alasan_refund").val("");
        }

    });

    function load_table() {
        var dari = $("#dari").val();
        var sampai = $("#sampai").val();
        var status = $("#status_transaksi").val();

        if(dari > sampai)
        {
           alert('Tanggal Awal Tidak Boleh Lebih Besar Daripada Tanggal Akhir');
        }
        else
        {
            var table = $('#content_table').DataTable({
                processing:true,
                serverSide:true,
                order : [[ 1, "desc" ]],
                ajax: {
                    url : "{{ route('api.transaksi') }}",
                    data : {dari:dari, sampai:sampai, status:status}
                },
                columns: [
                    {data:'order_id', name: 'order_id'},
                    {data:'order_dtm', name: 'order_dtm'},
                    {data:'payment_dtm', name: 'payment_dtm'},
                    {data:'txn_name', name: 'txt_name'},
                    {data:'txn_type', name: 'txn_type'},
                    {data:'user_id', name: 'user_id'},
                    {data:'cust_no', name: 'cust_no'},
                    {data:'tot_bill_amount', name: 'tot_bill_amount'},
                    {data:'vendor_amount', name: 'vendor_amount'},
                    {data:'coupon_amount', name: 'coupon_amount'},
                    {data:'profit', name: 'profit'},
                    {data:'status', name: 'status'},    
                    {data:'action', name: 'action', orderable:false, searchable:false}
                ],
                scrollX:        true,
                scrollCollapse: true,
                fixedColumns: {
                    leftColumns:0,
                    rightColumns : 1
                }
            });
        }
    }


    $("#content_table").on("click","#btn_edit", function() {
        $(".modal-title").text("Detail Transaksi");
        $('#modal_add form')[0].reset();
        save_method = 'edit';
        var id = $(this).attr("data-id");
        $('input[name=_method]').val('PATCH');
        $("#loadingProgress").show();
        $.ajax({
            url : "{{ url('transaksi') }}"+"/"+id+"/edit",
            type : "GET",
            dataType : "JSON",
            success : function(data) {
                $("#loadingProgress").hide();
                $("#id").val(data.trans[0].order_id);
                $("#user_id").val(data.trans[0].user_id);
                $("#harga_transaksi").val(data.trans[0].tot_bill_amount);
                $("#modal_detail_transaksi").html(data.html);
                $("#status_trans").val(data.trans[0].status);
                $("#alasan_refund").val(data.trans[0].refund_reas);
                var st = data.trans[0].status;
                if(st=='R'){
                    $("#alasan_refund").removeAttr("readonly")
                    $("#alasan_refund").attr("required", true);
                }else{
                    $("#alasan_refund").attr("readonly", true);
                    $("#alasan_refund").removeAttr("required");
                }
                $("#modal_add").modal("show");
            },
            error : function() {
                alert("ERROR");
            }

        });
    });


    $(function()  {
        $('#modal_add #form-add').validator().on('submit', function(e){
            if(!e.isDefaultPrevented()){
                $("#loadingProgress").show();
                var id = $('#id').val();
                if(save_method =='add') {
                   url = "{{ url('transaksi') }}";
                   text_note = "Berhasil Ditambahkan";  
                }else{
                   url = "{{ url('transaksi') .'/'}}"+ id;
                   text_note = "Berhasil Diupdate";  
                } 
                $.ajax({
                    url : url,
                    type : "POST",
                    data : new FormData($('#modal_add form')[0]),
                    contentType:false,
                    processData:false,
                    success : function(data){
                        $("#loadingProgress").hide();
                        if(data=='terkunci') {
                            alert('Saldo Deposit Terlock');    
                        }
                        else if(data=='false') {
                            alert('Transaksi Gagal');    
                        }
                        else {
                            $('#modal_add').modal('hide');
                            reloadTable();
                            Swal.fire({title:"Data Transaksi",text:text_note,type:"success",showCancelButton:0,confirmButtonColor:"#3eb7ba",cancelButtonColor:"#f46a6a"});
                        }
                    },
                    error: function(){
                        alert('Opps! Something error !');
                    }
                });
                return false;
            }
        });
    });




    function detailAction(id) {
       $("#loadingProgress").show();
       $.ajax({
            url : "{{ url('tiket') }}"+"/"+id,
            type : "GET",
            dataType : "JSON",
            success : function(data) {
                $("#loadingProgress").hide();
                $("#detail_ticket").html(data.data);
                $("#modal_detail").modal('show');       
            },
            error:function() {
              alert("ERR");
            }
       });
       
    }

    function approveAction(id) {
        Swal.fire({title:"",text:"Anda Akan Approve Data Ini..?",type:"warning",
            showCancelButton:!0,
            confirmButtonColor:"#34c38f",
            cancelButtonColor:"#f46a6a",confirmButtonText:"Ya, Approve Data!",cancelButtonText:"Batal!"}).then(function(t){t.value&&approveConfirm(id)
        });
    }

    function approveConfirm(id) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $("#loadingProgress").show();
        $.ajax({
            url : "{{ url('verifikasi_approve') }}",
            type : "POST",
            dataType : "JSON",
            data: {id:id, _token:csrf_token},
            success : function(data) {
                $("#loadingProgress").hide();
                Swal.fire({title:"Approve",text:"Approve Sukses",type:"success",showCancelButton:0,confirmButtonColor:"#3eb7ba",cancelButtonColor:"#f46a6a"});
                reloadTable();
            },
            error: function() {
                alert("ERR");
            }
        })
    }
    


    function rejectAction(id) {
        Swal.fire({title:"",text:"Anda Akan Reject Data Ini..?",type:"warning",
            showCancelButton:!0,
            confirmButtonColor:"#34c38f",
            cancelButtonColor:"#f46a6a",confirmButtonText:"Ya, Reject Data!",cancelButtonText:"Batal!"}).then(function(t){t.value&&rejectConfirm(id)
        });
    }

    function rejectConfirm(id) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $("#loadingProgress").show();
        $.ajax({
            url : "{{ url('verifikasi_reject') }}",
            type : "POST",
            dataType : "JSON",
            data: {id:id, _token:csrf_token},
            success : function(data) {
                $("#loadingProgress").hide();
                Swal.fire({title:"Reject",text:"Reject Sukses",type:"success",showCancelButton:0,confirmButtonColor:"#3eb7ba",cancelButtonColor:"#f46a6a"});
                reloadTable();
            },
            error: function() {
                alert("ERR");
            }
        })
    }


    


    function cari() {
        $("#content_table").DataTable().destroy();
        load_table();
    }

    
    function format_angka(angka){
       if(angka==null || angka == 0){
          return 0;
       }else{
           var reverse = angka.toString().split('').reverse().join(''),
           ribuan = reverse.match(/\d{1,3}/g);
           ribuan = ribuan.join('.').split('').reverse().join('');
           return ribuan;
       }
       
    }

    function reloadTable() {
        $("#content_table").DataTable().ajax.reload(null,false);    
    } 

  

</script>

@endsection

          