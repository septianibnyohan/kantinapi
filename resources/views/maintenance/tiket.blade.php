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
                    <li class="breadcrumb-item active">Tiket</li>
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
                                <input style="font-weight: bold;font-size: 24px;background-color:#8699ad;color: #fff;padding: 4px;" type="text" value="TIKET" readonly/>
                            </div>
                        </div>
                        <div style="margin-bottom: 30px"></div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tanggal Dari :</label>
                                            <input type="date" name="dari" id="dari" class="form-control" value="{{ date('Y-m-d') }}">  
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tanggal Sampai :</label>
                                            <input type="date" name="sampai" id="sampai" class="form-control" value="{{ date('Y-m-d', strtotime('+7 days', strtotime(date('Y-m-d')))) }}">  
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Tipe Transaksi:</label>
                                            <select class="form-control warna" id="tipe_transaksi" name="tipe_transaksi" maxlength="50" autofocus required>
                                              <option value=""> - Pilih Tipe Transaksi - </option>
                                              <option value="TOPUPDEPOSITVA">TOPUPDEPOSITVA</option>
                                              <option value="TOPUPDEPOSITBT">TOPUPDEPOSITBT</option>
                                              <option value="PREPAIDDATA">PREPAIDDATA</option>
                                              <option value="PREPAIDPULSA">PREPAIDPULSA</option>
                                              <option value="PREPAIDPLN">PREPAIDPLN</option>
                                              <option value="POSTPAIDCELL">POSTPAIDCELL</option>
                                              <option value="POSTPAIDPLN">POSTPAIDPLN</option>
                                              <option value="POSTPAIDPGN">POSTPAIDPGN</option>
                                              <option value="POSTPAIDBPJS">POSTPAIDBPJS</option>
                                              <option value="POSTPAIDPDAM">POSTPAIDPDAM</option>
                                              <option value="POSTPAIDTV">POSTPAIDTV</option>
                                              <option value="POSTPAIDTELKOM">POSTPAIDTELKOM</option>
                                              <option value="POSTPAIDMULTIFINANCE">POSTPAIDMULTIFINANCE</option>
                                          </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Status:</label>
                                            <select class="form-control" id="status_verifikasi">
                                                <option value=""> - Semua Status - </option>
                                                <option value="S">Selesai</option>
                                                <option value="C">Menunggu</option>
                                                <option value="W">Sedang Diproses</option>
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
                       
                       
        
                        
                        <table id="content_table" class="table table-striped table-hover table-bordered " style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 10px;">
                            <thead>
                                <tr>
                                    <th width="3%"  style="text-align: center;" >Tiket ID</th>
                                    <th width="10%" style="text-align: center;" >User ID</th>
                                    <th width="10%" style="text-align: center;" >No HP</th>
                                    <th width="*" style="text-align: center;" >Tanggal</th>
                                    <th width="10%" style="text-align: center;" >Tipe Transaksi</th>
                                    <th width="10%" style="text-align: center;" >Judul</th>
                                    <th width="10%" style="text-align: center;" >Status</th>
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


    function reply() {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var isi_chat = $("#txt_chat").val();
        var id = $("#id_tiket").val();
        $("#loadingProgress").show();

        $.ajax({
            url : "{{ url('reply') }}",
            type : "POST",
            dataType : "JSON",
            data : {id:id, content:isi_chat, _token:csrf_token},
            success : function(data) {
                $("#loadingProgress").hide();
                reloadTable();
                $("#modal_balas").modal("hide");
                $("#content").val("");
            }

        });

    }


    function balasAction(id) {

        $(".modal-title").text("Tiket "+id);
        $("#loadingProgress").show();
        $.ajax({
            url : "{{ 'chating' }}"+"/"+id,
            type : "GET",
            dataType : "JSON",
            success : function(data) {
                $("#id_tiket").val(id);
                $("#loadingProgress").hide();
                $("#modal_balas").modal("show");
                $("#isi_chat").html(data.data);
            }
        });   
    }

    

    function detailAction(id) {
       $.ajax({
            url : "{{ url('tiket') }}"+"/"+id,
            type : "GET",
            dataType : "JSON",
            success : function(data) {
                // $("#detail_ticket").html(data);
                $("#modal_detail").modal('show');       
            },
            error:function() {
              alert("ERR");
            }
       });  
    }



    function load_table() {
        var dari = $("#dari").val();
        var sampai = $("#sampai").val();
        var status = $("#status_verifikasi").val();
        var tipe_transaksi = $("#tipe_transaksi").val();

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
                    url : "{{ route('api.tiket') }}",
                    data : {dari:dari, sampai:sampai, tipe_transaksi:tipe_transaksi, status:status}
                },
                columns: [
                    {data:'ticket_id', name: 'ticket_id'},
                    {data:'user_id', name: 'user_id'},
                    {data:'no_hp', name: 'no_hp'},
                    {data:'open_ticket', name: 'open_ticket'},
                    {data:'txn_type', name: 'txn_type'},
                    {data:'subject', name: 'subject'},
                    {data:'status', name: 'status'},
                    {data:'action', name: 'action', orderable:false, searchable:false}
                ]
            });
        }
    }


    $("#content_table").on("click","#btn_edit", function() {
        $('#modal_edit form')[0].reset();
        save_method = 'edit';
        var id = $(this).attr("data-id");
        $('input[name=_method]').val('PATCH');
        $("#loadingProgress").show();
        $.ajax({
            url : "{{ url('verifikasi') }}"+"/"+id+"/edit",
            type : "GET",
            dataType : "JSON",
            success : function(data) {
                $("#loadingProgress").hide();
                $("#id").val(data[0].id);
                $("#tanggal").val(data[0].upd_dtm);
                $("#user_id").val(data[0].user_id);
                $("#no_hp").val(data[0].no_hp);
                $("#no_ktp").val(data[0].nik);
                $("#ubah_status").val(data[0].status);
                $("#foto_ktp").removeAttr('src');
                $("#foto_selfie").removeAttr('src');
                $("#foto_ktp_ttd").removeAttr('src');

                $("#foto_ktp").attr('src', 'http://128.199.96.220/public/storage/images/ticket/'+data[0].ktp_photo);
                $("#foto_selfie").attr('src', 'http://128.199.96.220/public/storage/images/ticket/'+data[0].selfie_photo);
                $("#foto_ktp_ttd").attr('src', 'http://128.199.96.220/public/storage/images/ticket/'+data[0].ktp_sign_photo);

                $("#modal_edit").modal("show");
            },
            error : function() {
                alert("ERROR");
            }

        });
    });


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

          