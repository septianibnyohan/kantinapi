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
                    <li class="breadcrumb-item active">Pertanyaan Bantuan</li>
                </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div style="padding: 10px" class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <input style="font-weight: bold;font-size: 24px;background-color:#8699ad;color: #fff;padding: 4px;" type="text" value="PERTANYAAN BANTUAN" readonly/>  
                            </div>
                            <div class="col-md-2">
                                <button onclick="addData()" style="margin-left:20px; " class="btn btn-success">Add Pertanyaan</button>
                            </div>
                        </div>
                        <div style="margin-bottom: 30px"></div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tipe Transaksi:</label>
                                            <select class="form-control warna" id="tipe_transaksi" name="tipe_transaksi" maxlength="50" autofocus required>
                                              <option value=""> - Semua Tipe Transaksi - </option>
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
                                    <div class="col-md-8">
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
                                    <th width="3%"  style="text-align: center;" >ID</th>
                                    <th width="15%" style="text-align: center;" >Tanggal</th>
                                    <th width="10%" style="text-align: center;" >Tipe Transaksi</th>
                                    <th width="*" style="text-align: center;" >Pertanyaan</th>
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
                                      <div class="form-group">
                                          <label>Tipe Transaksi:</label>
                                          <select class="form-control warna" id="tipe_transaksi_input" name="tipe_transaksi_input" maxlength="50" autofocus required>
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
                                          <span class="help-block with-errors"></span>
                                      </div>
                                      
                                      <div class="form-group">
                                          <label>Pertanyaan :</label>
                                          <input type="text" class="form-control warna" id="pertanyaan" name="pertanyaan" maxlength="100" required />
                                          <span class="help-block with-errors"></span>
                                      </div>
                                      <div class="form-group">
                                          <label>Detail:</label>
                                          <textarea style="height: 90px;" class="form-control warna" id="detail" name="detail" maxlength="200" autofocus required></textarea>
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
        var tipe_transaksi = $("#tipe_transaksi").val();
        var table = $('#content_table').DataTable({
            processing:true,
            serverSide:true,
            ajax: {
                url : "{{ route('api.pertanyaan') }}",
                data : {tipe_transaksi:tipe_transaksi}
            },
            columns: [
                {data:'id', name: 'id'},
                {data:'upd_dtm', name: 'upd_dtm'},
                {data:'txn_type', name: 'txn_type'},
                {data:'question', name: 'question'},
                {data:'action', name: 'action', orderable:false, searchable:false}
            ]
        });
        
    }


    function addData() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal_add form')[0].reset();
        $("#modal_add").modal("show");
        $('.modal-title').text("Add Pertanyaan");
    }

    
    function editForm(id) {
        
        $('#modal_add form')[0].reset();
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('.modal-title').text("Edit Pertanyaan");
        $("#loadingProgress").show();
        
        $.ajax({
            url : "{{ url('pertanyaan') }}"+"/"+id+"/edit",
            type : "GET",
            dataType : "JSON",
            success : function(data) {
                $("#loadingProgress").hide();

                $("#id").val(data.id);
                $("#tipe_transaksi_input").val(data.txn_type);
                $("#pertanyaan").val(data.question);
                $("#detail").val(data.detail);
              
                $("#modal_add").modal("show");
            },
            error : function() {
                alert("ERROR");
            }
        });
    }


    function deleteForm(id){
        Swal.fire({title:"",text:"Apakah Anda Yakin Ingin Menghapus Pertanyaan ID: "+id+"?",type:"warning",
            showCancelButton:!0,
            confirmButtonColor:"#34c38f",
            cancelButtonColor:"#f46a6a",confirmButtonText:"Ya, Hapus Data!",cancelButtonText:"Batal!"}).then(function(t){t.value&&deleteConfirm(id)
        });
        
    }


    function deleteConfirm(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $("#loadingProgress").show();
        $.ajax({
            url  : "{{ url('pertanyaan') }}" + '/'+id,
            type : "POST",
            data : {'_method':'DELETE', '_token':csrf_token},
            success : function(data){
                $("#loadingProgress").hide();
                reloadTable();
                Swal.fire("Dihapus!","Data Anda Berhasil Dihapus.","success");
            },
            error: function(){
                alert('Opps! Something error !');
            }
        }); 
    }


    
    
    $(function()  {
        $('#modal_add form').validator().on('submit', function(e){
            if(!e.isDefaultPrevented()){
                $("#loadingProgress").show();
                var id = $('#id').val();
                if(save_method =='add') {
                   url = "{{ url('pertanyaan') }}";
                   text_note = "Berhasil Ditambahkan";  
                }else{
                   url = "{{ url('pertanyaan') .'/'}}"+ id;
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
                        $('#modal_add').modal('hide');
                        reloadTable();
                        Swal.fire({title:"Pertanyaan",text:text_note,type:"success",showCancelButton:0,confirmButtonColor:"#3eb7ba",cancelButtonColor:"#f46a6a"});
                    },
                    error: function(){
                        alert('Opps! Something error !');
                    }
                });
                return false;
            }
        });

    });
   


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

          