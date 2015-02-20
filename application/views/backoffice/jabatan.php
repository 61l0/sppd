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
            <button type="button" data-toggle="modal" data-target="#modal-tambah-jabatan" class="btn btn-primary">Tambah Data</button>
            <table id="table-jabatan"></table>
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
            alert("clc");
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>admin/sdm/get_jabatan/"+row.kd_jabatan,
                dataType:"json",
                success:function(rs){
                    $.each(rs, function(i, row){
                        $("#update-kdjabatan").val(row.kd_jabatan);
                        $("#update-namajabatan").val(row.nama_jabatan);                        
                    });
                }
            });
            
            $('#modal-edit-jabatan').modal({
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
            $('#mod_no_skpd').html(row.kd_jabatan+' ('+row.nama_jabatan+')');
            $('#modal_konfirm_jabatan').data('kd_jabatan', row.kd_jabatan).modal('show');
        }
    };    
$('#table-jabatan').bootstrapTable({
                method: 'get',
                url: "<?php echo base_url();?>admin/sdm/get_jabatan/",
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
                
                columns: [{
                    
                    field: 'kd_jabatan',
                    title: 'kode jabatan',
                    align: 'left',
                    valign: 'top',
                    visible:false,
                    sortable: true,
                },{
                    
                    field: 'nama_jabatan',
                    title: 'Jabatan',
                    align: 'left',
                    valign: 'top',
                    sortable: true,
                   
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
            var kd_jabatan = $('#modal_konfirm_jabatan').data('kd_jabatan');
          // alert("deleteing"+kode_skpd);
            $.ajax({
                type:"POST",
                data:{'par_kdjabatan':kd_jabatan},
                url:"<?php echo base_url(); ?>admin/sdm/del_jabatan/",
                beforeSend:function(){

                },
                success:function(rs){
                    if(rs==1){
                        $('#modal_konfirm_jabatan').modal('hide');
                        new PNotify({
                          title: '',
                          text: 'Berhasil menghapus data jabatan.',
                          type: 'success',
                          shadow: false
                        });
                        $('#table-jabatan').bootstrapTable('refresh');   
                    }
                    //$('#box').html(rs);                 
                },
                error:function(){
                    new PNotify({
                          title: '',
                          text: 'Gagal menghapus data jabatan.',
                          type: 'error',
                          shadow: false
                    });
                }
            });
        });
    });     
</script>  
<!-- /CONTENT -->