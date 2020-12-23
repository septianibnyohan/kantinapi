@extends('sidemenu')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                     <li class="breadcrumb-item"><a href="#">Member</a></li>
                    <li class="breadcrumb-item active">Stand List</li>
                </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h3><u>Stand List</u></h3>
                            </div>
                            <div class="col-md-6">
                                <button onclick="add_data()" class="btn btn-info float-right"><i class="fa fa-plus"></i> New Stand</button>
                            </div>
                        </div>
                        <div style="margin-bottom: 20px"></div>
                       
                        <table id="content_table" class="table table-striped table-hover table-bordered table-responsive " style="font-size: 12px;">
                            <thead>
                                <tr>
                                    <th width="15%" style="text-align: center;" >Registration Date</th>
                                    <th width="10%" style="text-align: center;" >Stand ID</th>
                                    <th width="*" style="text-align: center;" >Name</th>
                                    <th width="12%" style="text-align: center;" >Phone Number</th>
                                    <th width="10%" style="text-align: center;" >Stand Number</th>
                                    <th width="10%" style="text-align: center;" >Status</th>
                                    <th width="10%" style="text-align: center;" >Tenancy</th>  
                                    <th width="10%" style="text-align: center;" >Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                  
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal_add" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
              <div class="modal-content">
                  <form id="form-add" method="post" data-toggle="validator">
                      {{ csrf_field() }} 
                      <div class="modal-header">
                          <h3 class="modal-title">Add Stand</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true"> &times; </span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Stand Number:</label>
                                    <input type="number" class="form-control" id="stand_number" name="stand_number" required>
                                    <span class="help-block with-errors"></span>

                                </div>
                                <div class="form-group">
                                    <label>Stand Category :</label>
                                    <select class="form-control" id="category" name="category" required>
                                        <option value=""> - Pilih Kategori - </option>
                                        <option value="Food">Food</option>
                                        <option value="Drink">Drink</option>
                                    </select>
                                    <span class="help-block with-errors"></span>
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


         <div class="modal fade" id="modal_edit" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg" >
              <div class="modal-content">
                  <form id="form-edit" method="post" data-toggle="validator">
                      {{ csrf_field() }}  {{ method_field('POST') }}
                      <div class="modal-header">
                          <h3 class="modal-title">Edit Stand</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true"> &times; </span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <input type="hidden" id="stand_active_edit" name="stand_active_edit">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label>Stand ID:</label>
                                                    <input type="number" id="stand_id_edit" name="stand_id_edit" class="form-control" readonly/>
                                                    <span class="help-block with-errors"></span>

                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Stand Number:</label>
                                                    <input type="number" id="stand_number_edit" name="stand_number_edit" class="form-control" required/>
                                                    <span class="help-block with-errors"></span>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" id="name_edit" name="name_edit" class="form-control" readonly>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Phone Number:</label>
                                                    <input type="text" id="phone_number_edit" name="phone_number_edit" class="form-control" required/>
                                                    <span class="help-block with-errors"></span>

                                                </div>
                                            </div>

                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label>Email:</label>
                                                    <input type="text" id="email_edit" name="email_edit" class="form-control" required/>
                                                    <span class="help-block with-errors"></span>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Tenancy : </label>
                                                    <input type="date" class="form-control" id="tenancy_edit" name="tenancy_edit" required>
                                                     <span class="help-block with-errors"></span>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Status Aktif : </label>
                                                    <select id="status_aktif_edit" name="status_aktif_edit" class="form-control" required>
                                                        <option value=""> - Pilih Status - </option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Not Active</option>
                                                    </select>
                                                     <span class="help-block with-errors"></span>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                 <div class="card">
                                    <div class="card-body">
                                        <p>Opening Hours:</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Dari:</label>
                                                <input type="time" class="form-control" id="open_edit" name="open_edit" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Sampai:</label>
                                                <input type="time" class="form-control" id="close_edit" name="close_edit" required>
                                            </div>
                                        </div>
                                        <br>
                                        <table id="table_hours" style="font-size: 10px;" class="table table-bordered table-striped">
                                            
                                        </table>
                                    </div>

                                    <div style="margin-top: -20px;" class="card-body">
                                        <label>Gambar Stand:</label>
                                        <span id="gambar_stand"></span>
                                        <input style="margin-top:10px;" type="file" name="foto_stand">
                                        <hr />
                                        <div style="margin-top: 8px;" class="form-group">
                                            <label>Stand Type :</label>
                                            <select class="form-control" id="stand_type_edit" name="stand_type_edit">
                                                <option value=""> - Pilih Kategori - </option>
                                                <option value="Food">Food</option>
                                                <option value="Drink">Drink</option>
                                            </select>
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
        ajax: "{{ route('api.standlist') }}",
        columns: [
            {data:'created_at', name: 'created_at'},
            {data:'stand_id', name: 'stand_id'},
            {data:'name_profile', name: 'name_profile'},
            {data:'phone', name: 'phone'},
            {data:'number_stan', name: 'number_stan'},
            {data:'status_active', name: 'status_active'},
            {data:'tenant_date', name: 'tenant_date'},

            {data:'action', name: 'action', orderable:false, searchable:false}
        ]
    });


    function add_data() {
        $("#modal_add").modal("show");
    }


    function editForm(id) {
        $('input[name=_method]').val('PATCH');
        $.ajax({
            url : "{{ 'standlist' }}"+"/"+id+"/edit",
            type : "GET",
            dataType : "JSON",
            success : function(data) {
                $("#stand_active_edit").val(data.active.stan_id_active);
                $("#stand_id_edit").val(data.active.stand_id);
                $("#stand_number_edit").val(data.active.number_stan);
                $("#name_edit").val(data.tenant.name_profile);
                $("#phone_number_edit").val(data.tenant.phone);
                $("#email_edit").val(data.tenant.email);
                $("#tenancy_edit").val(data.tenancy);
                $("#status_aktif_edit").val(data.active.status_active);
                $("#open_edit").val(data.hour.open_time);
                $("#close_edit").val(data.hour.close_time);
                $("#stand_type_edit").val(data.active.stan_category);

                var GAMBAR =  '';
                GAMBAR += '<img style="width:200px;" class="img-responsive" src="{{ asset('') }}images/stand/'+data.foto.photo_stand+'">';
                $("#gambar_stand").html(GAMBAR);
                
                var HTML = '';
                HTML += '<tr><th>Day</th><th>From</th><th>To</th></tr>';
                HTML += '<tr><td style="text-align:center;">Senin</td><td style="text-align:center;">'+data.hour.open_time+'</td><td style="text-align:center;">'+data.hour.close_time+'</td></tr>';
                HTML += '<tr><td style="text-align:center;">Selasa</td><td style="text-align:center;">'+data.hour.open_time+'</td><td style="text-align:center;">'+data.hour.close_time+'</td></tr>';
                HTML += '<tr><td style="text-align:center;">Rabu</td><td style="text-align:center;">'+data.hour.open_time+'</td><td style="text-align:center;">'+data.hour.close_time+'</td></tr>';
                HTML += '<tr><td style="text-align:center;">Kamis</td><td style="text-align:center;">'+data.hour.open_time+'</td><td style="text-align:center;">'+data.hour.close_time+'</td></tr>';
                HTML += '<tr><td style="text-align:center;">Jumat</td><td style="text-align:center;">'+data.hour.open_time+'</td><td style="text-align:center;">'+data.hour.close_time+'</td></tr>';
                HTML += '<tr><td style="text-align:center;">Sabtu</td><td style="text-align:center;">'+data.hour.open_time+'</td><td style="text-align:center;">'+data.hour.close_time+'</td></tr>';

                $("#table_hours").html(HTML);
                $('#modal_edit').modal("show");
            }
        });

        
       
    }
    
    
    
    $('#form-add').submit(function(e){


        e.preventDefault();
        $("#loadingProgress").show();
        $.ajax({
            url : "{{ url('standlist') }}",
            type : "POST",
            data : new FormData($('#modal_add form')[0]),
            contentType:false,
            processData:false,
            success : function(data){
                $("#loadingProgress").hide();
                $('#modal_add').modal('hide');
                reloadTable();
                Swal.fire({title:"Data User",text:"Data Berhasil Disimpan..!",type:"success",showCancelButton:0,confirmButtonColor:"#3eb7ba",cancelButtonColor:"#f46a6a"});
            }
        });

        return false;
        
    });


    $("#form-edit").submit(function(e){
        var stand_id_active = $("#stand_active_edit").val();
        e.preventDefault();
        $("#loadingProgress").show();
        $.ajax({
            url : "{{ url('standlist') }}"+"/"+stand_id_active,
            type : "POST",
            data : new FormData($('#modal_edit form')[0]),
            contentType:false,
            processData:false,
            success : function(data) {
                $("#loadingProgress").hide();
                $('#modal_edit').modal('hide');
                reloadTable();
                Swal.fire({title:"Data Stand",text:"Data Berhasil Diupdate..!",type:"success",showCancelButton:0,confirmButtonColor:"#3eb7ba",cancelButtonColor:"#f46a6a"});
            }
        });
    })
   




    function deleteForm(id) {
        Swal.fire({title:"Delete Data",text:"Are You Sure Want to Delete this item...?",type:"warning",
            showCancelButton:!0,
            confirmButtonColor:"#34c38f",
            cancelButtonColor:"#f46a6a",confirmButtonText:"Yes!",cancelButtonText:"Cancel!"}).then(function(t){t.value&&deleteConfirm(id)
        });
    }


    function deleteConfirm(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url  : "{{ url('standlist') }}" + '/'+id,
            type : "POST",
            data : {'_method':'DELETE', '_token':csrf_token},
            success : function($data){
                reloadTable();
                Swal.fire({title:"Delete Data",text:"Data Berhasil Dihapus..!",type:"success",showCancelButton:0,confirmButtonColor:"#3eb7ba",cancelButtonColor:"#f46a6a"});
            }
        });
        
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

          