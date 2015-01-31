<!-- CONTENT -->
<div class="row">
  <div class="col-lg-12">
      <h1 class="page-header"><?php echo $title_content ?></h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
      	<div class="panel panel-default">
          <div class="panel-heading"></div>
          <div class="panel-body">
            <button type="button" data-toggle="modal" data-target="#modal-tambah-skpd" class="btn btn-primary">Tambah Data</button>
            <table id="table-skpd"></table>
          </div> 
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<?php echo $del_confirm_skpd.$tambah_skpd.$edit_skpd; ?>
<script type="text/javascript">
    window.operateEvents = {
        'click .edit': function (e, value, row, index) {
            //var kode_jabatan;
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>admin/skpd/get_by_kode",
                data:{'par_kodeskpd':row.kode_skpd},
                dataType:"json",
                success:function(rs){
                    $.each(rs, function(i, row){
                        $("#update-kodeskpd").val(row.kode_skpd);
                        $("#update-namaskpd").val(row.nama_skpd);
                        $("#update-alamatskpd").val(row.alamat_skpd);
                        $("#update-telpskpd").val(row.telepon_skpd);
                        $("#update-emailskpd").val(row.email_skpd);
                        $("#update-websiteskpd").val(row.website_skpd);
                        
                        //$("#pilih-edit-pangkat-gol").val(row.kd_jabatan);
                        //edit_select_jabatan.setValue(row.kode_jabatan);
                        
                    });
                }
            });
            
            $('#modal-edit-skpd').modal({
                backdrop: 'static',
                keyboard: false
            });
            
            /*select_jabatan1.clearOptions();
            select_jabatan1.load(function(callback) {
                xhr && xhr.abort();
                xhr = $.ajax({
                 url:"<?php echo base_url(); ?>sdm/get_jabatan",
                // url:"localhost/pkl4/jsonjabatan.php",
                  //data:{'par_input':'getJabatan'},
                  //:"POST",
                  dataType:"json",
                  success: function(results) {
                        //alert(results);
                      callback(results);
                      //alert(kode_jabatan);
                      select_jabatan1.setValue(kode_jabatan);      
                },
                  error: function(rs) {
                      //alert(rs);
                      callback();
                  }
                });
            });*/
        },
        'click .remove': function (e, value, row, index) {
           // alert(''+row.kode_skpd);
            $('#mod_no_skpd').html(row.kode_skpd+' ('+row.nama_skpd+')');
            $('#modal_konfirm_skpd').data('kode_skpd', row.kode_skpd).modal('show');
        }
    };    
$('#table-skpd').bootstrapTable({
                method: 'get',
                url: "<?php echo base_url();?>admin/skpd/get_all/",
                cache: false,
                //height: ,
                striped: true,
                pagination: true,
                pageSize: 20,
                pageList: [10, 25, 50, 100, 200],
                search: true,
                showColumns: true,
                showRefresh: true,
                minimumCountColumns: 2,
                clickToSelect: true,
                showExport: true,
                //cardView: true,
                showToggle:true,
                //sidePagination: 'server',
                onDblClickRow: function (row) {
                   // alert(row.kode_skpd);
                    //alert('Event: onDblClickRow, data: ' + JSON.stringify(row));
                    window.location("<?php echo base_url(); ?>")
                },
                columns: [{
                    
                    field: 'kode_skpd',
                    title: 'Kode SKPD',
                    align: 'left',
                    valign: 'top',
                    sortable: true,
                    class: 'b'
                }, {
                    field: 'nama_skpd',
                    title: 'Nama',
                    align: 'left',
                    valign: 'middle',
                    sortable: true//,
                    //formatter: nameFormatter
                }, {
                    field: 'alamat_skpd',
                    title: 'Alamat',
                    align: 'left',
                    valign: 'top',
                    sortable: true,
                    //formatter: priceFormatter,
                    //sorter: priceSorter
                }, {
                    field: 'telepon_skpd',
                    title: 'No. Telp',
                    align: 'left',
                    valign: 'top',
                    sortable: true,
                    //formatter: priceFormatter,
                    //sorter: priceSorter
                }, {
                    field: 'email_skpd',
                    title: 'Email',
                    align: 'left',
                    valign: 'top',
                    sortable: true,
                    //formatter: priceFormatter,
                    //sorter: priceSorter
                }, {
                    field: 'website_skpd',
                    title: 'Website',
                    align: 'left',
                    valign: 'top',
                    sortable: true,
                    //formatter: priceFormatter,
                    //sorter: priceSorter
                },{
                    field: 'operate',
                    title: 'Item Operate',
                    align: 'center',
                    valign: 'top',
                    clickToSelect: false,
                 formatter: operateFormatter,
                    events: operateEvents
                }]
            }); 
    function operateFormatter(value, row, index) {
        return [
            '<a class="btn btn-primary edit" style="font-size:12px;padding-top:3px;padding-bottom:3px;" href="javascript:void(0)" title="Edit">&nbsp;',
                '<i class="fa fa-pencil-square-o"></i>',
            '&nbsp;</a>',
            '<a class="btn btn-danger remove" style="font-size:12px;padding-top:3px;padding-bottom:3px;" href="javascript:void(0)" title="Remove">',
                '<i class="glyphicon glyphicon-trash"></i>',
            '</a>'
        ].join('');
    }

    //del skpd
    $(function () {
        $('#btnDelete').click(function () {          
        var kode_skpd = $('#modal_konfirm_skpd').data('kode_skpd');
          // alert("deleteing"+kode_skpd);
            $.ajax({
                type:"POST",
                data:{'par_kode_skpd':kode_skpd},
                url:"<?php echo base_url(); ?>admin/skpd/delete/",
                beforeSend:function(){

                },
                success:function(rs){
                    if(rs==1){
                        $('#modal_konfirm_skpd').modal('hide');
                        new PNotify({
                          title: '',
                          text: 'Berhasil menghapus data skpd.',
                          type: 'success',
                          shadow: false
                        });
                        $('#table-skpd').bootstrapTable('refresh');   
                    }
                    //$('#box').html(rs);                 
                },
                error:function(){
                    new PNotify({
                          title: '',
                          text: 'Gagal menghapus data skpd.',
                          type: 'error',
                          shadow: false
                    });
                }
            });
        });
    });     
</script>  
<!-- /CONTENT -->