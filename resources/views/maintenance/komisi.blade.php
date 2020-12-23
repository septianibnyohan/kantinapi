@extends('sidemenu')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Maintenance</a></li>
                    <li class="breadcrumb-item active">Komisi</li>
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
                                <input style="font-weight: bold;font-size: 24px;background-color:#8699ad;color: #fff;padding: 4px;" type="text" value="KOMISI" readonly/>
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
                                            <select class="form-control" id="status_verifikasi">
                                                <option value=""> - Semua Status - </option>
                                                <option value="S">Success</option>
                                                <option value="C">Cancelled</option>
                                                <option value="W">Pending</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button onclick="cari()" style="margin-top: 26px;" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                       
        
                        
                        <table id="content_table" class="table table-striped table-hover table-bordered table-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 10px;">
                            <thead>
                                <tr>
                                    <th width="3%"  style="text-align: center;" >ID</th>
                                    <th width="3%"  style="text-align: center;" >Order ID</th>
                                    <th width="15%" style="text-align: center;" >Tanggal Order</th>
                                    <th width="15%" style="text-align: center;" >Tanggal Pembayaran</th>
                                    <th width="10" style="text-align: center;" >Kepala Agen</th>
                                    <th width="10%" style="text-align: center;" >Member</th>
                                    <th width="10%" style="text-align: center;" >Tipe Transaksi</th>
                                    <th width="*" style="text-align: center;" >Nama Komisi</th>
                                    <th width="5%" style="text-align: center;" >Fee</th>
                                    <th width="15%" style="text-align: center;" >Tanggal Cair</th>
                                    <th width="18%" style="text-align: center;" >Status</th>
                                    <th width="15%" style="text-align: center;" >Action</th>  
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                  
                    </div>
                </div>
            </div>
        </div>


        <div class="modal" id="modal_detail" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h3 class="modal-title">Detail Tiket</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"> &times; </span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="detail_ticket"></div>
                        </div>
                    </div>  
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
              </div>
            </div>
        </div> <!--end modal-->



        <div class="modal" id="modal_balas" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
              <div class="modal-content">
                  
                      <div class="modal-header">
                          <h3 class="modal-title">Tiket</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true"> &times; </span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" id="id_tiket">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="isi_chat"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="form-control" id="txt_chat" style="height: 90px;" maxlength="255" required></textarea>
                            </div> 
                      </div>
                      <div class="modal-footer">
                          <button onclick="reply()" type="button" class="btn btn-primary btn-save">Reply</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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



    function load_table() {
        var dari = $("#dari").val();
        var sampai = $("#sampai").val();
        var status = $("#status_verifikasi").val();
       
        if(dari > sampai)
        {
           alert('Tanggal Awal Tidak Boleh Lebih Besar Daripada Tanggal Akhir');
        }
        else
        {
            var table = $('#content_table').DataTable({
                processing:true,
                serverSide:true,
                ajax: {
                    url : "{{ route('api.komisi') }}",
                    data : {dari:dari, sampai:sampai, status:status}
                },
                columns: [
                    {data:'id', name: 'id', visible:false},
                    {data:'order_id', name: 'order_id'},
                    {data:'order_dtm', name: 'order_dtm'},
                    {data:'payment_dtm', name: 'payment_dtm'},
                    {data:'head_user_id', name: 'head_user_id'},
                    {data:'user_id', name: 'user_id'},
                    {data:'txn_type', name: 'txn_type'},
                    {data:'comm_name', name: 'comm_name'},
                    {data:'comm_fee', name: 'comm_fee'},
                    {data:'comm_dtm', name: 'comm_dtm'},
                    {data:'status', name: 'status'},
                    {data:'action', name: 'action', orderable:false, searchable:false}
                ]
            });
        }
    }


   


    $(function()  {
        $('#modal_edit #form-add').validator().on('submit', function(e){
            
            if(!e.isDefaultPrevented()){
                $("#loadingProgress").show();
                var id = $('#id').val();
                if(save_method =='add') {
                   url = "{{ url('verifikasi') }}";
                   text_note = "Berhasil Ditambahkan";  
                }else{
                   url = "{{ url('verifikasi') .'/'}}"+ id;
                   text_note = "Berhasil Diupdate";  
                } 
                $.ajax({
                    url : url,
                    type : "POST",
                    data : new FormData($('#modal_edit form')[0]),
                    contentType:false,
                    processData:false,
                    success : function(data){
                        $("#loadingProgress").hide();
                        $('#modal_edit').modal('hide');
                        reloadTable();
                        Swal.fire({title:"Data Verifikasi",text:text_note,type:"success",showCancelButton:0,confirmButtonColor:"#3eb7ba",cancelButtonColor:"#f46a6a"});
                    },
                    error: function(){
                        alert('Opps! Something error !');
                    }
                });
                return false;
            }
        });
    });

   
    $("#content_table").on("click","#btn_approve", function() {
        var id = $(this).attr("data-id");
        var agen = $(this).attr("data-agen");
        var fee = $(this).attr("data-fee");
        var baru = $(this).attr("data-baru");
        Swal.fire({title:"",text:"Anda Akan Approve Data Ini..?",type:"warning",
            showCancelButton:!0,
            confirmButtonColor:"#34c38f",
            cancelButtonColor:"#f46a6a",confirmButtonText:"Ya, Approve Data!",cancelButtonText:"Batal!"}).then(function(t){t.value&&approveConfirm(id, agen, fee, baru)
        });
    });

    function approveConfirm(id, agen, fee, baru) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $("#loadingProgress").show();
        $.ajax({
            url : "{{ url('approve_komisi') }}",
            type : "POST",
            dataType : "JSON",
            data: {id:id, agen:agen, fee:fee, baru:baru,  _token:csrf_token},
            success : function(data) {
                $("#loadingProgress").hide();
                if(data.response=='terkunci') {
                    alert('Saldo Deposit Terlock');
                }
                else{
                    
                    Swal.fire({title:"Approve",text:"Approve Sukses",type:"success",showCancelButton:0,confirmButtonColor:"#3eb7ba",cancelButtonColor:"#f46a6a"});
                    reloadTable();
                }
                
            },
            error: function() {
                alert("ERR");
            }
        })
    }
    


    $("#content_table").on("click","#btn_reject", function() {
        var id = $(this).attr("data-id");
        var baru = $(this).attr("data-baru");
        Swal.fire({title:"",text:"Anda Akan Reject Data Ini..?",type:"warning",
            showCancelButton:!0,
            confirmButtonColor:"#34c38f",
            cancelButtonColor:"#f46a6a",confirmButtonText:"Ya, Reject Data!",cancelButtonText:"Batal!"}).then(function(t){t.value&&rejectConfirm(id, baru)
        });
    });

    function rejectConfirm(id, baru) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $("#loadingProgress").show();
        $.ajax({
            url : "{{ url('reject_komisi') }}",
            type : "POST",
            dataType : "JSON",
            data: {id:id, baru:baru, _token:csrf_token},
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

          