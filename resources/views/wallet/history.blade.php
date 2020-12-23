@extends('sidemenu')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Wallet</a></li>
                    <li class="breadcrumb-item active">Wallet History</li>
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
                                <input style="font-weight: bold;font-size: 24px;background-color:#8699ad;color: #fff;padding: 4px;" type="text" value="WALLET HISTORY" readonly/>
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
                                            <button onclick="cari()" style="margin-top: 26px;" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="xls" href="{{ url('export_excel_history') }}"><button style="margin-top: 26px;margin-left:140px;" class="btn btn-success"><i class="fa fa-file-excel"></i> Export</button></a>  
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                        <table id="content_table" class="table table-striped table-hover table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 10px;">
                            <thead>
                                <tr>
                                    <th width="5%"  style="text-align: center;" >User ID</th>
                                    <th width="20%" style="text-align: center;" >Order ID</th>
                                    <th width="20%" style="text-align: center;" >Tanggal </th>
                                    <th width="*" style="text-align: center;" >Nama Transaksi</th>
                                    <th width="17%" style="text-align: center;" >Total</th>
                                    <th width="15%" style="text-align: center;" >Action</th>  
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                  
                    </div>
                </div>
            </div>
        </div>


        <div class="modal" id="modal_detail" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h3 class="modal-title">Detail Transaksi</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"> &times; </span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="card card">
                              <div class="card-body">  
                                  <div id="modal_detail_wallet"></div>
                              </div>
                          </div> 
                        </div>
                    </div> 
                      
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
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


    function detail(id) {
        $("#loadingProgress").show();
        $.ajax({
             url : "{{ url('history') }}"+"/"+id,
             type : "GET",
             dataType : "JSON",
             success: function(data) {
                 $("#loadingProgress").hide();
                 $("#modal_detail_wallet").html(data.html);
                 $("#modal_detail").modal("show");
             }   
        });
    }


    function set_url_excel(){
        var dari = $("#dari").val();
        var sampai = $("#sampai").val();
        $("a.xls").prop("href", "{{ url('export_excel_history') }}"+"/"+dari+"/"+sampai);
    }

    $("#dari").change(function(){
        var dari = $(this).val();
        var sampai = $("#sampai").val();
        var status = $("#status_transaksi").val();
        $("a.xls").prop("href", "{{ url('export_excel_history') }}"+"/"+dari+"/"+sampai);
    });

    $("#sampai").change(function(){
        var dari = $("#dari").val();
        var sampai = $(this).val();
        var status = $("#status_transaksi").val();

        $("a.xls").prop("href", "{{ url('export_excel_history') }}"+"/"+dari+"/"+sampai);
    });


    function load_table() {
        var dari = $("#dari").val();
        var sampai = $("#sampai").val();

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
                    url : "{{ route('api.history') }}",
                    data : {dari:dari, sampai:sampai}
                },
                columns: [
                    {data:'user_id', name: 'user_id'},
                    {data:'order_id', name: 'order_id'},
                    {data:'date', name: 'date'},
                    {data:'txn_name', name: 'txt_name'},
                    {data:'total', name: 'total'},    
                    {data:'action', name: 'action', orderable:false, searchable:false}
                ]
            });
        }
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

          