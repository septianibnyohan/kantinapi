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
                    <li class="breadcrumb-item active">Pembayaran</li>
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
                                <input style="font-weight: bold;font-size: 24px;background-color:#8699ad;color: #fff;padding: 4px;" type="text" value="PEMBAYARAN" readonly/>
                            </div>
                            <div class="col-md-2">
                                <button onclick="addData()" class="btn btn-success form-control"><i class="fa fa-plus"></i> Add</button>
                            </div>
                        </div>
                        <div style="margin-bottom: 20px"></div>
                       
                        <table id="content_table" class="table table-striped table-hover table-bordered table-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 9px;">
                            <thead>
                                <tr>
                                    <th width="2%" style="text-align: center;" >ID</th>
                                    <th width="*" style="text-align: center;" >Kode Bank</th>
                                    <th width="5%" style="text-align: center;" >Kategori</th>
                                    <th width="5%" style="text-align: center;" >Tipe</th>
                                    <th width="8%" style="text-align: center;" >Metode Pembayaran</th>
                                    <th width="10%" style="text-align: center;" >ID Rekening</th>
                                    <th width="10%" style="text-align: center;" >No Rekening</th>
                                    <th width="10%" style="text-align: center;" >Nama Rekening</th>
                                    <th width="8%" style="text-align: center;" >Biaya Admin</th>
                                    <th width="5%" style="text-align: center;" >Is Active</th>  
                                    <th width="5%" style="text-align: center;" >Is Problem</th>
                                    <th width="5%" style="text-align: center;" >Action</th>
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
                                          <label>Kode Bank:</label>
                                          <input type="text" class="form-control warna" id="kode_bank" name="kode_bank" maxlength="30" autofocus required>
                                          <span class="help-block with-errors"></span>
                                      </div>

                                      <div class="form-group">
                                          <label>Kategori:</label>
                                          <select class="form-control warna" id="kategori" name="kategori" maxlength="10" autofocus required >
                                              <option value="DEPOSIT">DEPOSIT</option>
                                          </select>
                                          <span class="help-block with-errors"></span>
                                      </div>
                                      <div class="form-group">
                                          <label>Tipe:</label>
                                          <select class="form-control warna" id="tipe" name="tipe" maxlength="10" autofocus required >
                                              <option value="TOPUPBT">TOPUPBT</option>
                                              <option value="TOPUPVA">(TOPUPVA Tidak Applicable)</option>
                                          </select>
                                          <span class="help-block with-errors"></span>
                                      </div>
                                      <div class="form-group">
                                          <label>ID Rekening:</label>
                                          <input type="text" pattern="\d*" class="form-control warna" id="id_rekening" name="id_rekening" maxlength="10" autofocus required>
                                          <span class="help-block with-errors"></span>
                                      </div>
                                      <div class="form-group">
                                          <label>Nomor Rekening:</label>
                                          <input type="text" class="form-control warna" id="nomor_rekening" name="nomor_rekening" maxlength="25" autofocus required>
                                          <span class="help-block with-errors"></span>
                                      </div>
                                      <div class="form-group">
                                          <label>Nama Rekening:</label>
                                          <input type="text" class="form-control warna" id="nama_rekening" name="nama_rekening" maxlength="50" autofocus required>
                                          <span class="help-block with-errors"></span>
                                      </div>
                                      <div class="form-group">
                                          <label>Biaya Admin:</label>
                                          <input type="text" pattern="\d*" class="form-control warna" id="biaya_admin" name="biaya_admin" maxlength="7" autofocus required>
                                          <span class="help-block with-errors"></span>
                                      </div>
                                      <div class="form-group">
                                          <label>Upload Gambar:</label>
                                          <input type="file" class="form-control warna" id="gambar" name="gambar"/>
                                          <span class="help-block with-errors"></span>
                                      </div>

                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label>Is Active:</label><br>
                                                  <input style="width: 300px" type="checkbox" id="switch3" name="is_active" switch="bool" checked class="form-control" />
                                                  <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                                              </div>
                                          </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Is Problem:</label><br>
                                                <input style="width: 300px" type="checkbox" id="switch4" name="is_problem" switch="bool" class="form-control" />
                                                <label for="switch4" data-on-label="Yes" data-off-label="No"></label>
                                            </div>
                                        </div>
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
    var table = $('#content_table').DataTable({
        processing:true,
        serverSide:true,
        ajax: "{{ route('api.pembayaran') }}",
        columns: [
            {data:'id', name: 'id'},
            {data:'bank_code', name: 'bank_code'},
            {data:'category', name: 'category'},
            {data:'type', name: 'type'},
            {data:'payment_method', name: 'payment_method'},
            {data:'acct_id', name: 'acct_id'},
            {data:'acct_no', name: 'acct_no'},
            {data:'acct_name', name: 'acct_name'},
            {data:'admin_fee', name: 'admin_fee'},
            {data:'is_active', name: 'is_active'},
            {data:'is_problem', name: 'is_problem'},
            {data:'action', name: 'action', orderable:false, searchable:false}
        ]
    });


    function addData() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal_add form')[0].reset();
        $("#modal_add").modal("show");
        $('.modal-title').text("Add Pembayaran");
    }

    
    $(document).ready(function(){
        $("#content_table").on("click","#btn_edit", function() {
              var id = $(this).attr("data-id");
              $('#modal_add form')[0].reset();
              save_method = 'edit';
              $('input[name=_method]').val('PATCH');
              $('.modal-title').text("Edit Pembayaran");
              $("#loadingProgress").show();
              
              $.ajax({
                  url : "{{ url('pembayaran') }}"+"/"+id+"/edit",
                  type : "GET",
                  dataType : "JSON",
                  success : function(data) {
                      $("#loadingProgress").hide();

                      $("#id").val(data.id);
                      $("#kode_bank").val(data.bank_code);
                      $("#kategori").val(data.category);
                      $("#tipe").val(data.type);
                      $("#id_rekening").val(data.acct_id);
                      $("#nomor_rekening").val(data.acct_no);
                      $("#nama_rekening").val(data.acct_name);
                      var biaya_admin = parseInt(data.admin_fee);
                      $("#biaya_admin").val(biaya_admin);

                      
                      var is_active = data.is_active;
                      if(is_active == 1){
                          $("#switch3").attr("checked", true);
                      }else{
                          $("#switch3").removeAttr("checked");
                      }

                      var is_problem = data.is_problem;
                      if(is_problem == 1){
                          $("#switch4").attr("checked", true);
                      }else{
                          $("#switch4").removeAttr("checked");
                      }
                      
                      $("#modal_add").modal("show");
                  }
              });
        });
    });
    
        




    function deleteForm(id){
        Swal.fire({title:"",text:"Apakah Anda Yakin Ingin Menghapus Pembayaran ID: "+id+"?",type:"warning",
            showCancelButton:!0,
            confirmButtonColor:"#34c38f",
            cancelButtonColor:"#f46a6a",confirmButtonText:"Ya, Hapus Data!",cancelButtonText:"Batal!"}).then(function(t){t.value&&deleteConfirm(id)
        });
        
    }


    function deleteConfirm(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $("#loadingProgress").show();
        $.ajax({
            url  : "{{ url('pembayaran') }}" + '/'+id,
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
                   url = "{{ url('pembayaran') }}";
                   text_note = "Berhasil Ditambahkan";  
                }else{
                   url = "{{ url('pembayaran') .'/'}}"+ id;
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
                        Swal.fire({title:"Data Pembayaran",text:text_note,type:"success",showCancelButton:0,confirmButtonColor:"#3eb7ba",cancelButtonColor:"#f46a6a"});
                    },
                    error: function(){
                        alert('Opps! Something error !');
                    }
                });
                return false;
            }
        });

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

          