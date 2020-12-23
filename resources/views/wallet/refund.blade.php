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
                    <li class="breadcrumb-item active">Refund</li>
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
                                <input style="font-weight: bold;font-size: 24px;background-color:#8699ad;color: #fff;padding: 4px;" type="text" value="REFUND" readonly/>
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
                                            <label>Status:</label>
                                            <select class="form-control" id="status_refund">
                                                <option value=""> - Semua Status - </option>
                                                <option value="RQ">REQUEST</option>
                                                <option value="AP">APPROVED</option>
                                                <option value="RJ">REJECTED</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button onclick="cari()" style="margin-top: 26px;" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button onclick="addData()" style="margin-top: 26px;margin-left:70px;" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>  
                                    </div>

                                </div>
                            </div>
                        </div>
                       
                       
        
                        <div class="table-responsive">
                        <table id="content_table" class="table table-striped table-hover table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 10px;">
                            <thead>
                                <tr>
                                    <th width="3%"  style="text-align: center;" >ID</th>
                                    <th width="10%" style="text-align: center;" >Order ID</th>
                                    <th width="10%" style="text-align: center;" >Tanggal</th>
                                    <th width="8%" style="text-align: center;" >User ID</th>
                                    <th width="8%" style="text-align: center;" >No HP</th>
                                    <th width="8%" style="text-align: center;" >Jumlah</th>
                                    <th width="8%" style="text-align: center;" >Pembayaran</th>
                                    <th width="*" style="text-align: center;" >Note</th>
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
                                      <div class="form-group">
                                        <label>Order ID:</label>
                                          <div class="row">
                                              <div class="col-md-10">
                                                    <input type="text" class="form-control warna" id="order_id" name="order_id" maxlength="10" autofocus required/>
                                              </div>
                                              <div class="col-md-2">
                                                  <button onclick="cari_order()" type="button" class="btn btn-info" >Cari</button>
                                              </div>
                                          </div>
                                          
                                          
                                          <span class="help-block with-errors"></span>
                                      </div>
                                      <div class="form-group">
                                          <label>User ID:</label>
                                          <input type="text" class="form-control" id="user_id" name="user_id" maxlength="10" readonly />
                                      </div>
                                      <div class="form-group">
                                          <label>No HP:</label>
                                          <input type="text" class="form-control" id="no_hp" name="no_hp" maxlength="25" readonly />
                                      </div>
                                      <div class="form-group">
                                          <label>Jumlah:</label>
                                          <input type="number" class="form-control" id="jumlah" name="jumlah" maxlength="10" readonly />
                                      </div>  
                                      <div class="form-group">
                                          <label>Pembayaran:</label>
                                          <input type="text" class="form-control" id="pembayaran" name="pembayaran" maxlength="100" readonly />
                                      </div>
                                      <div class="form-group">
                                          <label>Proceed By:</label>
                                          <input type="text" class="form-control" id="proceed_by" name="proceed_by" maxlength="25" readonly />
                                      </div>
                                      <div class="form-group">
                                          <label>Biaya Admin:</label>
                                          <input type="text" pattern="\d*" class="form-control warna" id="biaya_admin" name="biaya_admin" maxlength="7"/>
                                          <span class="help-block with-errors"></span>
                                      </div>
                                       <div class="form-group">
                                          <label>Potong Dari Saldo:</label><br>
                                          <input type="checkbox" id="switch3" name="potong_saldo" switch="bool" checked class="form-control" />
                                          <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                                      </div>
                                      <div class="form-group">
                                          <label>Note:</label>
                                          <textarea class="form-control warna" id="note" name="note" maxlength="200" autofocus required></textarea>
                                          <span class="help-block with-errors"></span>
                                      </div>

                                      <div class="form-group">
                                          <label>Status:</label>
                                          <select class="form-control warna" id="status_transaksi" name="status_transaksi" required>   
                                                <option value=""> - Pilih Status - </option>
                                                <option value="RQ">REQUEST</option>
                                                <option value="AP">APPROVED</option>
                                                <option value="RJ">REJECTED</option>
                                          </select>
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

        <div class="modal" id="modal_detail" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
              <div class="modal-content">
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
                                      <input type="hidden" id="user_id_edit" name="user_id_edit">
                                      <input type="hidden" id="order_id_edit" name="order_id_edit">
                                      <input type="hidden" id="jumlah_edit" name="jumlah_edit">
                                      <div id="isi_modal_detail"></div>

                                      <div class="form-group">
                                          <label>Biaya Admin:</label>
                                          <input type="text" pattern="\d*" class="form-control warna" id="biaya_admin_edit" name="biaya_admin_edit" maxlength="7"/>
                                          <span class="help-block with-errors"></span>
                                      </div>
                                       <div class="form-group">
                                          <label>Potong Dari Saldo:</label><br>
                                          <input type="checkbox" id="switch4" name="potong_saldo_edit" switch="bool" checked class="form-control" />
                                          <label for="switch4" data-on-label="Yes" data-off-label="No"></label>
                                      </div>
                                      <div class="form-group">
                                          <label>Note:</label>
                                          <textarea class="form-control warna" id="note_edit" name="note_edit" maxlength="200" autofocus required></textarea>
                                          <span class="help-block with-errors"></span>
                                      </div>

                                      <div class="form-group">
                                          <label>Status:</label>
                                          <select class="form-control warna" id="status_transaksi_edit" name="status_transaksi_edit" required>   
                                                <option value=""> - Pilih Status - </option>
                                                <option value="RQ">REQUEST</option>
                                                <option value="AP">APPROVED</option>
                                                <option value="RJ">REJECTED</option>
                                          </select>
                                          <span class="help-block with-errors"></span>
                                      </div>
                                  </div>
                              </div> 
                            </div>
                        </div> 
                          
                      </div>
                      <div class="modal-footer">
                          <button id="btn_simpan_edit" type="button" class="btn btn-primary btn-save">Simpan</button>
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

     $(document).ready(function(){
           $("#content_table").on("click","#btn_edit", function() {
                  var id = $(this).attr("data-id");
                  $("#loadingProgress").show();
                  
                  $.ajax({
                      url : "{{ url('refund') }}"+"/"+id+"/edit",
                      type : "GET",
                      dataType : "JSON",
                      success : function(data) {
                          $("#loadingProgress").hide();

                          $("#id").val(data.data.id);
                          $("#biaya_admin_edit").val(parseInt(data.data.admin_fee));
                          var c = data.data.is_cut_deposit;                          
                          $("#note_edit").val(data.data.note);
                          $("#status_transaksi_edit").val(data.data.status);
                          $("#user_id_edit").val(data.data.user_id);
                          $("#order_id_edit").val(data.data.order_id);
                          $("#jumlah_edit").val(data.data.amount);
                          $("#isi_modal_detail").html(data.html);

                          $("#modal_detail").modal("show");
                          if(c==1){
                             $("#switch4").attr('checked', true);
                          }
                          else
                          {
                             $("#switch4").removeAttr('checked');
                          }

                          var stat = data.data.status;

                          if(stat != 'RQ') {
                              $("#biaya_admin_edit").attr('readonly', true);
                              $("#note_edit").attr('readonly', true);
                              $("#status_transaksi_edit").attr('disabled', true);
                              $("#switch4").attr('disabled', true);
                              $("#btn_simpan_edit").hide();
                          } else {
                              $("#biaya_admin_edit").removeAttr('readonly');
                              $("#note_edit").removeAttr('readonly');
                              $("#status_transaksi_edit").removeAttr('disabled');
                              $("#switch4").removeAttr('disabled');
                              $("#btn_simpan_edit").show();
                          }
                      }
                  });
          });            
     });
     

    $("#btn_simpan_edit").click(function(){

        $("#loadingProgress").show();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var id = $("#id").val();
        var biaya_admin = $("#biaya_admin_edit").val();
        var note = $("#note_edit").val();
        var status = $("#status_transaksi_edit").val();
        var user_id = $("#user_id_edit").val();
        var order_id = $("#order_id_edit").val();
        var jumlah = $("#jumlah_edit").val();
        var is_cut;
        if($('#switch4').is(":checked")){
            is_cut = 1;
        }
        else {
            is_cut = 0;
        }

        $.ajax({
            url : "{{ url('update_refund') }}",
            type : "POST",
            dataType : "JSON",
            data : {id:id, biaya_admin:biaya_admin, note:note, status: status, is_cut:is_cut, user_id:user_id, order_id:order_id, jumlah: jumlah,  _token:csrf_token },
            success : function(data) {
                $("#loadingProgress").hide();
                if(data=='terkunci') {
                    alert('Saldo Deposit Terlock');    
                }
                else {
                    $('#modal_detail').modal('hide');
                    reloadTable();
                    Swal.fire({title:"Refund",text:"Sukses Update Data",type:"success",showCancelButton:0,confirmButtonColor:"#3eb7ba",cancelButtonColor:"#f46a6a"});
                }
            }
        });

    });


    function cari_order() {
        
        var no_order = $("#order_id").val();
        if(no_order =='') alert('No Order Masih Kosong.....');
        else{
            $("#loadingProgress").show();
            $.ajax({
                url : "{{ url('find_order') }}"+"/"+no_order,
                type : "GET",
                dataType : "JSON",
                success:function(data){
                    $("#loadingProgress").hide();
                    if(data=='no-data') {
                        alert('No Order Tidak Ditemukan...!');
                    }
                    else {

                        $("#user_id").val(data[0].user_id);
                        $("#no_hp").val(data[0].no_hp);
                        $("#jumlah").val(data[0].tot_bill_amount);
                        $("#pembayaran").val(data[0].payment);
                        $("#proceed_by").val(data[0].login_id);    
                    }
                }
            });  
        }
    }

    function load_table() {
        var dari = $("#dari").val();
        var sampai = $("#sampai").val();
        var status = $("#status_refund").val();

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
                    url : "{{ route('api.refund') }}",
                    data : {dari:dari, sampai:sampai, status:status}
                },
                columns: [
                    {data:'id', name: 'id'},
                    {data:'order_id', name: 'order_id'},
                    {data:'upd_dtm', name: 'upd_dtm'},
                    {data:'user_id', name: 'user_id'},
                    {data:'no_hp', name: 'no_hp'},
                    {data:'amount', name: 'amount'},
                    {data:'payment', name: 'payment'},
                    {data:'note', name: 'note'},
                    {data:'status', name: 'status'},    
                    {data:'action', name: 'action', orderable:false, searchable:false}
                ]
            });
        }
    }


    function addData() {
        save_method = 'add';
        $("#modal_add").modal("show");
        $('#modal_add form')[0].reset();
        $(".modal-title").text("Add Refund");
    }


    $(function()  {
        $('#modal_add #form-add').validator().on('submit', function(e){
            if(!e.isDefaultPrevented()){
                $("#loadingProgress").show();
                var id = $('#id').val();
                if(save_method =='add') {
                   url = "{{ url('refund') }}";
                   text_note = "Berhasil Ditambahkan";  
                }else{
                   url = "{{ url('refund') .'/'}}"+ id;
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
                        else {
                            $('#modal_add').modal('hide');
                            reloadTable();
                            Swal.fire({title:"Refund",text:text_note,type:"success",showCancelButton:0,confirmButtonColor:"#3eb7ba",cancelButtonColor:"#f46a6a"});
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

          