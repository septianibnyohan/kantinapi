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
                    <li class="breadcrumb-item active">User List</li>
                </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3><u>User List</u></h3>
                            </div>
                        </div>
                        <div style="margin-bottom: 20px"></div>
                       
                        <table id="content_table" class="table table-striped table-hover table-bordered table-responsive " style="font-size: 12px;">
                            <thead>
                                <tr>
                                    <th width="15%" style="text-align: center;" >Registration Date</th>
                                    <th width="15%" style="text-align: center;" >User ID</th>
                                    <th width="*" style="text-align: center;" >Name</th>
                                    <th width="15%" style="text-align: center;" >Phone Number</th>
                                    <th width="10%" style="text-align: center;" >Status</th>  
                                    <th width="10%" style="text-align: center;" >Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                  
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="modal_edit" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
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
                             
                                      <div class="form-group">
                                          <label>User ID :</label>
                                          <input type="text" class="form-control" id="user_id" name="user_id" readonly>
                                      </div>
                                      
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label>First Name:</label>
                                                  <input maxlength="50" type="text" class="form-control" id="first_name" name="first_name" required>
                                                  <span class="help-block with-errors"></span>
                                              </div>
                                          </div>
                                           <div class="col-md-6">
                                              <div class="form-group">
                                                  <label>Last Name:</label>
                                                  <input maxlength="50" type="text" class="form-control" id="last_name" name="last_name">
                                                  <span class="help-block with-errors"></span>
                                              </div>
                                          </div>
                                          
                                      </div>

                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label>Phone Number:</label>
                                                  <input maxlength="15" type="text" class="form-control" id="phone" name="phone" required>
                                                  <span class="help-block with-errors"></span>
                                              </div>
                                          </div>
                                           <div class="col-md-6">
                                              <div class="form-group">
                                                  <label>Email:</label>
                                                  <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="50" type="email" class="form-control" id="email" name="email" required>
                                                  <span class="help-block with-errors"></span>
                                              </div>
                                          </div>
                                          
                                      </div>

                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label>Balance:</label>
                                                  <input type="number" class="form-control" id="balance" name="balance" required>
                                                  <span class="help-block with-errors"></span>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label>Status :</label>
                                                  <select id="status_aktif" name="status_aktif" class="form-control" required>
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
        ajax: "{{ route('api.userlist') }}",
        columns: [
            {data:'created_at', name: 'created_at'},
            {data:'user_id', name: 'user_id'},
            {data:'first_name', name: 'first_name'},
            {data:'phone', name: 'phone'},
            {data:'status', name: 'status'},
            {data:'action', name: 'action', orderable:false, searchable:false}
        ]
    });



    function editForm(user_id) {

        $('#modal_edit form')[0].reset();
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $("#loadingProgress").show();
        $.ajax({
            url : "{{ url('userlist') }}"+"/"+user_id+"/edit",
            type : "GET",
            dataType : "JSON",
            success : function(data) {
                $("#loadingProgress").hide();
                $(".modal-title").text("Edit User");
                $("#user_id").val(data.user_id);
                $("#first_name").val(data.first_name);
                $("#last_name").val(data.last_name);
                $("#phone").val(data.phone);
                $("#email").val(data.email);
                $("#balance").val(data.emoney);
                $("#status_aktif").val(data.status);
                $("#modal_edit").modal("show");
            },
            error : function() {
                alert("ERROR");
            }

        });
    }
    
    
    $(function()  {
        $('#modal_edit #form-add').validator().on('submit', function(e){
            if(!e.isDefaultPrevented()){
                $("#loadingProgress").show();
                var id = $('#user_id').val();
                if(save_method =='add') {
                   url = "{{ url('userlist') }}";
                   text_note = "Berhasil Ditambahkan";  
                }else{
                   url = "{{ url('userlist') .'/'}}"+ id;
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
                        Swal.fire({title:"Data User",text:text_note,type:"success",showCancelButton:0,confirmButtonColor:"#3eb7ba",cancelButtonColor:"#f46a6a"});
                    }
                });

                return false;
            }
        });
    });


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
            url  : "{{ url('userlist') }}" + '/'+id,
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

          