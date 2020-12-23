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
                    <li class="breadcrumb-item active">Kupon</li>
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
                                <input style="font-weight: bold;font-size: 24px;background-color:#8699ad;color: #fff;padding: 4px;" type="text" value="KUPON" readonly/>
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
                                            <label>Tipe Kupon:</label>
                                            <select class="form-control" id="status_verifikasi">
                                                <option value=""> - Semua Tipe - </option>
                                                <option value="TOPUPVA">TOPUPVA</option>
                                                <option value="TOPUPBT">TOPUPBT</option>
                                                <option value="DATA">DATA</option>
                                                <option value="PULSA">PULSA</option>
                                                <option value="PLNPREPAIDB">PLNPREPAIDB</option>
                                                <option value="BPJSKES">BPJSKES</option>
                                                <option value="MULTIFIN">MULTIFIN</option>
                                                <option value="CELL">CELL</option>
                                                <option value="PDAM">PDAM</option>
                                                <option value="PGN">PGN</option>
                                                <option value="PLN">PLN</option>
                                                <option value="TELKOM">TELKOM</option>
                                                <option value="TVSUB">TVSUB</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button onclick="cari()" style="margin-top: 26px;" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>  
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button onclick="addData()" style="margin-top: 26px;" class="btn pull-right btn-success"><i class="fa fa-plus"></i> Add Kupon</button>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                       
        
                        
                        <table id="content_table" class="table table-striped table-hover table-bordered " style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size: 10px;">
                            <thead>
                                <tr>
                                    <th width="3%"  style="text-align: center;" >ID</th>
                                    <th width="10%" style="text-align: center;" >Tanggal</th>
                                    <th width="10%" style="text-align: center;" >Kode Kupon</th>
                                    <th width="*" style="text-align: center;" >Kategori</th>
                                    <th width="10%" style="text-align: center;" >Tipe</th>
                                    <th width="10%" style="text-align: center;" >Produk</th>
                                    <th width="10%" style="text-align: center;" >Tanggal Mulai</th>
                                    <th width="15%" style="text-align: center;" >Tanggal Akhir</th>
                                    <th width="15%" style="text-align: center;" >Quantity</th>
                                    <th width="15%" style="text-align: center;" >Status</th>
                                    <th width="15%" style="text-align: center;" >Is Active</th> 
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
            <div class="modal-dialog modal-lg">
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
                            <div class="col-md-6">
                              <div class="card card">
                                  <div class="card-body">
                                      <input type="hidden" id="id" name="id">
                                      <div class="form-group">
                                          <label>Kode Kupon:</label>
                                          <input type="text" class="form-control warna" id="kode_kupon" name="kode_kupon" maxlength="16" autofocus required>
                                          <span class="help-block with-errors"></span>
                                      </div>
                                      <div class="form-group">
                                          <label>Kategori:</label>
                                          <select class="form-control warna" id="kategori" name="kategori" maxlength="10" autofocus required>
                                                <option value=""> - Pilih Kategori - </option>
                                                <option value="DEPOSIT">DEPOSIT</option>
                                                <option value="PREPAID">PREPAID</option>
                                                <option value="POSTPAID">POSTPAID</option>
                                          </select>
                                          <span class="help-block with-errors"></span>
                                      </div>

                                      <div class="form-group">
                                          <label>Tipe:</label>
                                          <select class="form-control warna" id="tipe" name="tipe" maxlength="10" >
                                                <option value=""> - Pilih Tipe - </option>
                                                <option value="TOPUPVA">TOPUPVA</option>
                                                <option value="TOPUPBT">TOPUPBT</option>
                                                <option value="DATA">DATA</option>
                                                <option value="PULSA">PULSA</option>
                                                <option value="PLNPREPAIDB">PLNPREPAIDB</option>
                                                <option value="BPJSKES">BPJSKES</option>
                                                <option value="MULTIFIN">MULTIFIN</option>
                                                <option value="CELL">CELL</option>
                                                <option value="PDAM">PDAM</option>
                                                <option value="PGN">PGN</option>
                                                <option value="PLN">PLN</option>
                                                <option value="TELKOM">TELKOM</option>
                                                <option value="TVSUB">TVSUB</option>
                                          </select>
                                          <span class="help-block with-errors"></span>
                                      </div>

                                      <div class="form-group">
                                          <label>Pilih Produk:</label>
                                          <select class="form-control warna" id="pilih_produk" name="pilih_produk" maxlength="10" >  
                                          </select>
                                          <span class="help-block with-errors"></span>
                                      </div>

                                      <div class="form-group">
                                          <label>Gambar:</label>
                                          <input type="file" class="form-control warna" id="gambar" name="gambar" maxlength="100"/>
                                          <span class="help-block with-errors"></span>
                                      </div>

                                      <div class="form-group">
                                          <label>Deskripsi:</label>
                                          <textarea class="form-control warna" id="deskripsi" name="deskripsi" maxlength="200"></textarea>
                                          <span class="help-block with-errors"></span>
                                      </div>

                                      <div class="form-group">
                                          <label>Is Active:</label><br>
                                          <input style="width: 300px" type="checkbox" id="switch3" name="is_active" switch="bool" class="form-control" />
                                          <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                                      </div>

                                      <div class="form-group">
                                          <label>Status:</label><br>
                                          <input style="width: 300px" type="checkbox" id="switch4" name="status" switch="bool" class="form-control" />
                                          <label for="switch4" data-on-label="Yes" data-off-label="No"></label>
                                      </div>
                                  </div>
                              </div> 
                            </div>
                             <div class="col-md-6">
                              <div class="card card">
                                  <div class="card-body">
                                      <div class="form-group">
                                          <label>Tanggal Mulai:</label>
                                          <input type="date" class="form-control warna" id="tanggal_mulai" name="tanggal_mulai" autofocus required>
                                          <span class="help-block with-errors"></span>
                                      </div>
                                      <div class="form-group">
                                          <label>Tanggal Akhir:</label>
                                          <input type="date" class="form-control warna" id="tanggal_akhir" name="tanggal_akhir" autofocus required>
                                          <span class="help-block with-errors"></span>
                                      </div>
                                       <div class="form-group">
                                          <label>Indikator Jumlah:</label>
                                          <select class="form-control warna" id="indikator_jumlah" name="indikator_jumlah" autofocus required>
                                              <option value="FX">Fixed</option>
                                              <option value="PC">Percentage</option>
                                          </select>
                                          <span class="help-block with-errors"></span>
                                      </div>
                                       <div class="form-group">
                                          <label>Jumlah:</label>
                                          <input type="text" pattern="\d*" class="form-control warna" id="jumlah" name="jumlah" autofocus maxlength="9" required>
                                          <span class="help-block with-errors"></span>
                                      </div>
                                      <div class="form-group">
                                          <label>Quantity:</label>
                                          <input type="text"  pattern="\d*" class="form-control warna" id="quantity" name="quantity" autofocus maxlength="10" required>
                                          <span class="help-block with-errors"></span>
                                      </div>
                                      <div class="form-group">
                                          <label>Terms:</label>
                                          <textarea class="form-control warna" id="terms" name="terms" maxlength="200"></textarea>
                                          <span class="help-block with-errors"></span>
                                      </div>
                                      <div class="form-group">
                                          <label>Min Transaksi:</label>
                                          <input type="text" pattern="\d*" class="form-control warna" id="min_transaksi" name="min_transaksi" maxlength="9">
                                          <span class="help-block with-errors"></span>
                                      </div>
                                      <div class="form-group">
                                          <label>Max Potongan:</label>
                                          <input type="text" pattern="\d*" class="form-control warna" id="max_potongan" name="max_potongan" maxlength="9">
                                          <span class="help-block with-errors"></span>
                                      </div>

                                  </div>
                              </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><h4>Detail Product</h4></div>
                            <hr />
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Available:</label>
                                    <div id="select_multiple"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Selected:</label>
                                    <div id="selection_multiple"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div id="isi_seleksi"></div>
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
<script src="{{ asset('') }}assets/multiselect/js/jquery.multi-select.js"></script>



<script type="text/javascript">

    load_table();
   

    function setlist() {
         $("#select_multiple").html('<select style="width: 100%;font-size: 12px;" multiple="multiple" id="my-select" name="[]"></select>');
         $("#selection_multiple").html('<select style="width: 100%;font-size: 12px;" multiple="multiple" id="my-selection" name="[]"></select>');
    }


    $('#my-select').multiSelect();


    function cari() {
        $("#content_table").DataTable().destroy();
        load_table();
    }


    $("#tipe").change(function(){
        var tipe = $(this).val();
        load_pilih_produk(tipe);
    });


    $("#pilih_produk").change(function(){
        var produk = $(this).val();
        var kategori = $("#kategori").val();
        load_detail_produk(produk, kategori);
    });

   

    function load_detail_produk(produk, kategori){
      
        $("#loadingProgress").show();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url : "{{ url('detail_produk') }}",
            type : "POST",
            dataType : "JSON",
            data : {'produk':produk, 'kategori':kategori, '_token':csrf_token},
            success : function(data){
                $("#loadingProgress").hide();
                $("#select_multiple").html(data.data);
                $("#selection_multiple").html(data.select);
                // $(".ms-selection .ms-list").html(data.select);               
            }
        });
    }

    function select(id) {
        $("#option_available"+id).hide();
        $("#option_selection"+id).show();

        $("#isi_seleksi").append('<input type="hidden" value="'+id+'" name="selection_content[]" id="selection_content'+id+'" />')
    }

    function unselect(id) {
        $("#option_selection"+id).hide();
        $("#option_available"+id).show();
        $("#selection_content"+id).remove();

    }


    function load_pilih_produk(tipe){
        var kategori = $("#kategori").val();
        $("#loadingProgress").show();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url : "{{ url('pilih_produk') }}",
            type : "POST",
            dataType : "JSON",
            data : {'tipe':tipe, '_token':csrf_token},
            success : function(data){
                $("#loadingProgress").hide();
                $("#pilih_produk").html(data.data);
                load_detail_produk(data.id_product, kategori);
            }, error:function(){
                $("#loadingProgress").hide();
            }
        });
    }


    function load_table() {
        var dari = $("#dari").val();
        var sampai = $("#sampai").val();
        var tipe_kupon = $("#tipe_kupon").val();
        
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
                    url : "{{ route('api.kupon') }}",
                    data : {dari:dari, sampai:sampai, tipe_kupon:tipe_kupon}
                },
                columns: [
                    {data:'id', name: 'id'},
                    {data:'upd_dtm', name: 'upd_dtm'},
                    {data:'coupon_code', name: 'coupon_code'},
                    {data:'coupon_category', name: 'coupon_category'},
                    {data:'coupon_type', name: 'coupon_type'},
                    {data:'product_name', name: 'product_name'},
                    {data:'start_date', name: 'start_date'},
                    {data:'expired_date', name: 'expired_date'},
                    {data:'qty', name: 'qty'},
                    {data:'status', name: 'status'},
                    {data:'is_active', name: 'is_active'},
                    {data:'action', name: 'action', orderable:false, searchable:false}
                ]
            });
        }
    }


    function addData() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal_add form')[0].reset();
        $("#modal_add").modal("show");
         setlist();
        $("#isi_seleksi").html("");
        $("#pilih_produk").html('<option value="'+null+'"> - Semua Produk - </option>');
        $('.modal-title').text("Add Kupon");
    }

    
    function editData(id) {
        
        $('#modal_add form')[0].reset();
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('.modal-title').text("Edit Kupon");
        $("#loadingProgress").show();
        
        $.ajax({
            url : "{{ url('kupon') }}"+"/"+id+"/edit",
            type : "GET",
            dataType : "JSON",
            success : function(data) {
                $("#loadingProgress").hide();

                $("#id").val(data.kupon.id);
                $("#kode_kupon").val(data.kupon.coupon_code);
                $("#kategori").val(data.kupon.coupon_category);
                $("#tipe").val(data.kupon.coupon_type);
                $("#pilih_produk").html(data.pilih_produk);
                $("#deskripsi").val(data.kupon.desc);
                $("#tanggal_mulai").val(data.kupon.start_date);
                $("#tanggal_akhir").val(data.kupon.expired_date);
                $("#indikator_jumlah").val(data.kupon.amount_ind);
                $("#jumlah").val(parseInt(data.kupon.amount));
                $("#quantity").val(data.kupon.qty);
                $("#terms").val(data.kupon.terms);
                $("#min_transaksi").val(parseInt(data.kupon.min_txn));
                $("#max_potongan").val(parseInt(data.kupon.max_amount));
                
                
                var is_active = data.kupon.is_active;
                if(is_active == 1){
                    $("#switch3").attr("checked", true);
                }else{
                    $("#switch3").removeAttr("checked");
                }

                var status = data.kupon.status;
                if(status == 'X'){
                    $("#switch4").attr("checked", true);
                }else{
                    $("#switch4").removeAttr("checked");
                }


                $("#select_multiple").html(data.available);
                $("#selection_multiple").html(data.selection);
                
                $("#isi_seleksi").html('');
                var baris = data.row;
                
                for(var i=0; i< baris.length; i++){
                    select(baris[i]);
                }

                $("#modal_add").modal("show");
            }
        });
    }


    function deleteData(id){
        Swal.fire({title:"",text:"Apakah Anda Yakin Ingin Menghapus Kupon ID: "+id+"?",type:"warning",
            showCancelButton:!0,
            confirmButtonColor:"#34c38f",
            cancelButtonColor:"#f46a6a",confirmButtonText:"Ya, Hapus Data!",cancelButtonText:"Batal!"}).then(function(t){t.value&&deleteConfirm(id)
        });
        
    }


    function deleteConfirm(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $("#loadingProgress").show();
        $.ajax({
            url  : "{{ url('kupon') }}" + '/'+id,
            type : "POST",
            data : {'_method':'DELETE', '_token':csrf_token},
            success : function(data){
                $("#loadingProgress").hide();
                reloadTable();
                Swal.fire("Dihapus!","Data Anda Berhasil Dihapus.","success");
            }
        }); 
    }


    
    
    $(function()  {
        $('#modal_add form').validator().on('submit', function(e){
            if(!e.isDefaultPrevented()){
                $("#loadingProgress").show();
                var id = $('#id').val();
                if(save_method =='add') {
                   url = "{{ url('kupon') }}";
                   text_note = "Berhasil Ditambahkan";  
                }else{
                   url = "{{ url('kupon') .'/'}}"+ id;
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
                        Swal.fire({title:"Kupon",text:text_note,type:"success",showCancelButton:0,confirmButtonColor:"#3eb7ba",cancelButtonColor:"#f46a6a"});
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

          