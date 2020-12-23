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
                    <li class="breadcrumb-item active">Wallet Data</li>
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
                                <input style="font-weight: bold;font-size: 24px;background-color:#8699ad;color: #fff;padding: 4px;" type="text" value="WALLET DATA" readonly/>
                            </div>
                        </div>
                        <div style="margin-bottom: 20px"></div>
                       
                        <table id="content_table" class="table table-striped table-hover table-bordered table-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 9px;">
                            <thead>
                                <tr>
                                    <th width="2%" style="text-align: center;" >ID</th>
                                    <th width="*" style="text-align: center;" >Tanggal</th>
                                    <th width="10%" style="text-align: center;" >User ID</th>
                                    <th width="10%" style="text-align: center;" >No Handphone</th>
                                    <th width="10%" style="text-align: center;" >Total Saldo</th>
                                    <th width="10%" style="text-align: center;" >Is Locked</th> 
                                    <th width="15%" style="text-align: center;" >Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                  
                    </div>
                </div>
            </div>
        </div>

        

        <div class="modal" id="modal_topup" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
              <div class="modal-content">
                  <form id="form-add" method="post" data-toggle="validator">
                      {{ csrf_field() }} {{ method_field('POST') }}
                      <div class="modal-header">
                          <h3 class="modal-title">Tambah Saldo User</h3>
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
                                      <div id="content_modal_topup"></div>
                                     
                                      <div class="form-group">
                                          <label>Jumlah Saldo :</label>
                                          <input type="text" pattern="\d*" maxlength="9" name="jumlah_saldo" id="jumlah_saldo" required class="form-control warna" placeholder="Masukkan Jumlah Saldo Yang Akan Di Topup">
                                          <span class="help-block with-errors"></span>
                                      </div>
                                      <div class="form-group">
                                          <label>Note :</label>
                                          <textarea style="height: 90px;"  name="note" id="note" maxlength="200" required class="form-control warna"></textarea>
                                          <span class="help-block with-errors"></span>
                                      </div>
                                       <div class="form-group">
                                          <label>Kirim Notif :</label><br>
                                          <input style="width: 300px" type="checkbox" id="switch3" name="kirim_notif" switch="bool" class="form-control" />
                                          <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div> 
                          
                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-primary btn-save">Kirim</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      </div>
                  </form>
              </div>
            </div>
        </div> <!--end modal-->


        <div class="modal" id="modal_edit" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
              <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Detail Wallet Data</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> &times; </span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                          <div class="col-md-12">
                            <div class="card card">
                                <div class="card-body">
                                     <input type="hidden" id="id_deposit" name="id_deposit">
                                     <table id="table_deposit" class="table table-bordered table-striped">
                                        <tr>
                                            <td>ID</td>
                                            <td>:</td>
                                            <td id="id_td"></td>
                                        </tr>
                                        <tr>
                                            <td>User ID</td>
                                            <td>:</td>
                                            <td id="user_id_td"></td>
                                        </tr>
                                        <tr>
                                            <td>No HP</td>
                                            <td>:</td>
                                            <td id="hp_td"></td>
                                        </tr>
                                        <tr>
                                            <td>Saldo Sekarang</td>
                                            <td>:</td>
                                            <td id="saldo_td"></td>
                                        </tr>
                                        <tr>
                                            <td>Is Locked</td>
                                            <td>:</td>
                                            <td><input style="width: 300px" type="checkbox" id="switch4" name="is_locked" switch="bool" class="form-control" />
                                        <label for="switch4" data-on-label="Yes" data-off-label="No"></label></td>
                                        </tr>
                                     </table>
                                </div>
                            </div>
                          </div>
                      </div> 
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="simpan()" class="btn btn-primary btn-save">Simpan</button>
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

    function simpan(){
        $("#loadingProgress").show();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var id = $("#id_deposit").val()
        var is_locked = $('#switch4').is(':checked');
        
        $.ajax({
            url : "{{ url('update_data_wallet') }}",
            type : "POST",
            dataType : "JSON",
            data : {id:id, is_locked:is_locked, _token:csrf_token},
            success : function(data) {
                $("#loadingProgress").hide();
                $('#modal_edit').modal('hide');
                reloadTable();
                Swal.fire({title:"Wallet Data",text:"Update Status ",type:"success",showCancelButton:0,confirmButtonColor:"#3eb7ba",cancelButtonColor:"#f46a6a"});
            } 
        });
    }
    
    function topup(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal_topup form')[0].reset();
        $("#loadingProgress").show();
        $.ajax({
            url : "{{ url('wdata') }}"+"/"+id+"/edit",
            type : "GET",
            dataType : "JSON",
            success: function(data) {
                $("#id").val(data.wallet);
                $("#loadingProgress").hide();
                $("#content_modal_topup").html(data.html);
                $("#modal_topup").modal("show");
            }
        });

    }


    function editData(id) {
        $("#loadingProgress").show();
        $.ajax({
            url : "{{ 'wdata' }}"+"/"+id,
            type : "GET",
            dataType : "JSON",
            success : function(data) {
                $("#loadingProgress").hide();
                $("#id_deposit").val(data[0].id);
                $("#id_td").text(data[0].id);
                $("#user_id_td").text(data[0].user_id);
                $("#hp_td").text(data[0].no_hp);
                $("#saldo_td").text(format_angka(data[0].deposit));
                var is_locked = data[0].is_locked;
                if(is_locked == 1){
                    $("#table_deposit #switch4").attr("checked", true);
                }else{
                    $("#table_deposit #switch4").removeAttr("checked");
                }
                $("#modal_edit").modal("show");      
            }
        })
        
    }


    var table = $('#content_table').DataTable({
        processing:true,
        serverSide:true,
        ajax: "{{ route('api.wdata') }}",
        columns: [
            {data:'id', name: 'id'},
            {data:'upd_dtm', name: 'upd_dtm'},
            {data:'user_id', name: 'user_id'},
            {data:'no_hp', name: 'no_hp'},
            {data:'deposit', name: 'deposit'},
            {data:'is_locked', name: 'is_locked'},
            {data:'action', name: 'action', orderable:false, searchable:false}
        ]
    });


    
    
    
    $('#modal_topup #form-add').validator().on('submit', function(e){
        if(!e.isDefaultPrevented()){
            $("#loadingProgress").show();
            var id = $('#id').val();
            if(save_method =='add') {
               url = "{{ url('wdata') }}";
               text_note = "Berhasil Ditambahkan";  
            }else{
               url = "{{ url('wdata') .'/'}}"+ id;
               text_note = "Berhasil Diupdate";  
            } 
            $.ajax({
                url : url,
                type : "POST",
                data : new FormData($('#modal_topup form')[0]),
                contentType:false,
                processData:false,
                success : function(data){
                    $("#loadingProgress").hide();
                    if(data=='terkunci') {
                        alert('Deposit Sedang Terlock');
                    }
                    else {   
                        $('#modal_topup').modal('hide');
                        reloadTable();
                        Swal.fire({title:"Wallet Data",text:text_note,type:"success",showCancelButton:0,confirmButtonColor:"#3eb7ba",cancelButtonColor:"#f46a6a"});
                    }
                    
                },
                error: function(){
                  $("#loadingProgress").hide();
                    alert('Opps! Something error !');
                }
            });
            return false;
        }
    });
  


    
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

          