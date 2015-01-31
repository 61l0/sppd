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
            <button onclick="loadskpdjab()" type="button" data-toggle="modal" data-target="#modal-tambah-sdm" class="btn btn-primary">Tambah Data</button>
            <table id="table-sdm"></table>
          </div> 
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<?php echo $del_confirm_user.$tambah_user.$edit_user; ?>


<script type="text/javascript">
     var $select_skpd, select_skpd, xhr;
     $select_skpd = $('#input-skpdsdm').selectize({
          valueField: 'kode_skpd',
          labelField: 'nama_skpd',
          searchField: ['nama_skpd'],
          dataAttr: 'data-data',
      });
      select_skpd  = $select_skpd[0].selectize;

      var $select_skpd_update, select_skpd_update, xhr;
      $select_skpd_update = $('#update-skpduser').selectize({
          valueField: 'kode_skpd',
          labelField: 'nama_kode_skpd',
          searchField: ['nama_skpd','kode_skpd'],
          dataAttr: 'data-data',
      });
      select_skpd_update  = $select_skpd_update[0].selectize;
      
      var $select_edit_jabatan, select_edit_jabatan, xhr1;
      
      $select_edit_jabatan = $('#edit-pil-jabatan').selectize({
          valueField: 'kd_jabatan',
          labelField: 'nama_jabatan',
          searchField: ['nama_jabatan'],
          dataAttr: 'data-data',
      });
      select_edit_jabatan  = $select_edit_jabatan[0].selectize;

      var $select_i_jabatan, select_i_jabatan, xhr2;
      
      $select_i_jabatan = $('#input-pil-jabatan').selectize({
          valueField: 'kd_jabatan',
          labelField: 'nama_jabatan',
          searchField: ['nama_jabatan'],
          dataAttr: 'data-data',
      });
      select_i_jabatan  = $select_i_jabatan[0].selectize;

       function load_skpd () {
            select_skpd.clearOptions();
            select_skpd.load(function(callback) {
                xhr && xhr.abort();
                xhr = $.ajax({
                 url:"<?php echo base_url(); ?>admin/skpd/get_all",
                // url:"localhost/pkl4/jsonjabatan.php",
                  //data:{'par_input':'getJabatan'},
                  //:"POST",
                  dataType:"json",
                  success: function(results) {
                        //alert(results);
                      callback(results);
                      //alert(kode_jabatan);
                      //select_skpd.setValue(kode_jabatan);      
                },
                  error: function(rs) {
                      //alert(rs);
                      callback();
                  }
                });
            });
}
window.operateEvents = {
        'click .edit': function (e, value, row, index) {
          alert(row.kd_sdm);
            var val_skpd;            
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>admin/sdm/get_by_id/"+row.kd_sdm,
                dataType:"json",
                success:function(rs){
                    $.each(rs, function(i, row){                      
                        $("#edit-kdsdm").val(row.kd_sdm);
                        $("#edit-nama").val(row.nama);
                        $("#edit-nip").val(row.nip);
                        $("#pilih-edit-pangkat-gol").val(row.kd_pg);
                        val_kdjabatan = row.kd_jabatan;
                        val_skpd = row.kode_skpd;                        
                        //$("#pilih-edit-pangkat-gol").val(row.kd_jabatan);
                        //edit_select_jabatan.setValue(row.kode_jabatan);
                    });
                }
            });
            
            $('#modal-edit-sdm').modal({
                backdrop: 'static',
                keyboard: false
            });
            //set skpd pil
            select_skpd_update.clearOptions();
            select_skpd_update.load(function(callback) {
                xhr && xhr.abort();
                xhr = $.ajax({
                 url:"<?php echo base_url(); ?>admin/skpd/get_all_sel",
                // url:"localhost/pkl4/jsonjabatan.php",
                  //data:{'par_input':'getJabatan'},
                  //:"POST",
                  dataType:"json",
                  success: function(results) {
                        //alert(results);
                      callback(results);
                      //alert(kode_jabatan);
                      select_skpd_update.setValue(val_skpd);      
                },
                  error: function(rs) {
                      //alert(rs);
                      callback();
                  }
                });
            });

            //set jabatan pil
            select_edit_jabatan.clearOptions();
            select_edit_jabatan.load(function(callback) {
                xhr1 && xhr1.abort();
                xhr = $.ajax({
                 url:"<?php echo base_url(); ?>admin/sdm/get_jabatan",
                // url:"localhost/pkl4/jsonjabatan.php",
                  //data:{'par_input':'getJabatan'},
                  //:"POST",
                  dataType:"json",
                  success: function(results) {
                        //alert(results);
                      callback(results);
                      //alert(kode_jabatan);
                      select_edit_jabatan.setValue(val_kdjabatan);      
                },
                  error: function(rs) {
                      //alert(rs);
                      callback();
                  }
                });
            });
        },
        'click .remove': function (e, value, row, index) {
            $('#mod').html(row.nama);
            $('#modal_konfirm_sdm').data('kd_sdm', row.kd_sdm).modal('show');
        }
    };    
$('#table-sdm').bootstrapTable({
                method: 'get',
                url: "<?php echo base_url();?>admin/sdm/get_sdm/all",
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
                    //alert(row.no_user);
                    //alert('Event: onDblClickRow, data: ' + JSON.stringify(row));
                    window.location("<?php echo base_url(); ?>")
                },
                columns: [{
                    visible:false,
                    field: 'kd_sdm',
                    title: 'Kode Pegawai',
                    align: 'left',
                    valign: 'top',
                    sortable: true,
                    class: 'b'
                }, {
                    field: 'nip',
                    title: 'NIP',
                    align: 'left',
                    valign: 'middle',
                    sortable: true//,
                    //formatter: nameFormatter
                }, {
                    field: 'nama',
                    title: 'Nama',
                    align: 'left',
                    valign: 'top',
                    sortable: true,
                    //formatter: priceFormatter,
                    //sorter: priceSorter
                }, {
                    field: 'nama_jabatan',
                    title: 'Jabatan',
                    align: 'left',
                    valign: 'top',
                    sortable: true,
                    //formatter: priceFormatter,
                    //sorter: priceSorter
                },{
                    field: 'nama_pangkat',
                    title: 'Pangkat',
                    align: 'left',
                    valign: 'top',
                    sortable: true
                },{
                    field: 'golongan',
                    title: 'Golongan',
                    align: 'left',
                    valign: 'top',
                    sortable: true
                },{
                    field: 'ruang',
                    title: 'Ruang',
                    align: 'left',
                    valign: 'top',
                    sortable: true
                },{
                    visible: false,
                    field: 'kode_skpd',
                },{
                    field: 'nama_skpd',
                    title: 'SKPD',
                    align: 'left',
                    valign: 'top',
                    sortable: true
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
    function loadskpdjab(){
          //alert('click');
          select_skpd.clearOptions();
          select_skpd.load(function(callback) {
              xhr && xhr.abort();
              xhr = $.ajax({
               url:"<?php echo base_url(); ?>admin/skpd/get_all_sel",
              // url:"localhost/pkl4/jsonjabatan.php",
                //data:{'par_input':'getJabatan'},
                //:"POST",
                dataType:"json",
                success: function(results) {
                      //alert(results);
                    callback(results);
                    //alert(kode_jabatan);
                    //select_skpd_update.setValue(val_skpd);      
              },
                error: function(rs) {
                    //alert(rs);
                    callback();
                }
              });
          });

          select_i_jabatan.clearOptions();
            select_i_jabatan.load(function(callback) {
                xhr2 && xhr2.abort();
                xhr2 = $.ajax({
                 url:"<?php echo base_url(); ?>admin/sdm/get_jabatan",
                // url:"localhost/pkl4/jsonjabatan.php",
                  //data:{'par_input':'getJabatan'},
                  //:"POST",
                  dataType:"json",
                  success: function(results) {
                        //alert(results);
                      callback(results);
                      //alert(kode_jabatan);
                      //select_edit_jabatan.setValue(val_kdjabatan);      
                },
                  error: function(rs) {
                      //alert(rs);
                      callback();
                  }
                });
            });

    }

    $(function () {
        $('#btnDeleteSDM').click(function () {          
        var kd_sdm = $('#modal_konfirm_sdm').data('kd_sdm');
           //alert("deleteing"+no_user);
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>admin/sdm/delete/"+kd_sdm,
                beforeSend:function(){

                },
                success:function(rs){
                    if(rs==1){
                        $('#modal_konfirm_sdm').modal('hide');
                        new PNotify({
                          title: '',
                          text: 'Berhasil menghapus data pegawai.',
                          type: 'success',
                          shadow: false
                        });
                        $('#table-sdm').bootstrapTable('refresh');   
                    }
                    //$('#box').html(rs);                 
                },
                error:function(){
                    new PNotify({
                          title: '',
                          text: 'Gagal menghapus data pegawai.',
                          type: 'error',
                          shadow: false
                    });
                }
            });
        });
        

    });
</script>  
<!-- /CONTENT -->