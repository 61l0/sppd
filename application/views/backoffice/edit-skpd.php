<div class="modal fade" id="modal-edit-skpd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Edit data SKPD</h4>
	      	</div>
      	<div class="modal-body">

            <form class="form-horizontal" role="form" id="form-tambah-sdm">
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="input-kodeskpd">Kode SKPD</label>
                        <div class="col-sm-8">
                          <input type="text" id="update-kodeskpd" class="form-control" disabled=""/>  
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="update-namaskpd">Nama SKPD</label>
                        <div class="col-sm-8">
                          <input type="text" id="update-namaskpd" class="form-control"/>  
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="update-alamatskpd">Alamat SKPD</label>
                        <div class="col-sm-8">
                          <input type="text" id="update-alamatskpd" class="form-control"/>  
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="update-telpskpd">No. Telp SKPD</label>
                        <div class="col-sm-8">
                          <input type="text" id="update-telpskpd" class="form-control"/>  
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="update-emailskpd">Email SKPD</label>
                        <div class="col-sm-8">
                          <input type="text" id="update-emailskpd" class="form-control"/>  
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="update-websiteskpd">Website SKPD</label>
                        <div class="col-sm-8">
                          <input type="text" id="update-websiteskpd" class="form-control"/>  
                        </div>            
                  </div>
                        
            </form>
                  
        </div>
	    <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="btn-update-skpd">Save changes</button>
	    </div>
    </div>
  </div>

</div>
<script type="text/javascript">
  $("#loader-btnupdatesdm").hide();

  
  $("body").on("click","#btn-update-skpd",function(){
    //alert('click');
          var kode_skpd = $("#update-kodeskpd").val();
          var nama_skpd = $("#update-namaskpd").val();
          var alamat_skpd = $("#update-alamatskpd").val();
          var telp_skpd = $("#update-telpskpd").val();
          var email_skpd = $("#update-emailskpd").val();
          var website_skpd = $("#update-websiteskpd").val();
          $.ajax({      
            url:"<?php echo base_url(); ?>admin/skpd/update",
            type:"POST",//jenis menghandle tipe pegawai kontrak atau pns
            data:{'par_kodeskpd':kode_skpd,'par_namaskpd':nama_skpd,'par_alamatskpd':alamat_skpd,'par_emailskpd':email_skpd,'par_telpskpd':telp_skpd,'par_websiteskpd':website_skpd,},
            beforeSend: function(rs){
              $("#loader-btnsdm").show();
              $("#btn-update-skpd").addClass("disabled");
            },
            success: function(rs){
              if(rs==1){
                new PNotify({
                  title: '',
                  text: 'Berhasil merubah data SKPD.',
                  type: 'success'
                });
                $('#table-skpd').bootstrapTable('refresh');
                $('#modal-edit-skpd').modal('hide');
                //$('#form-tambah-sdm').trigger("reset");
                //document.getElementById("form-tambah-sdm").reset();
              }
              $("#loader-btnsdm").hide();
              $("#btn-update-skpd").removeClass("disabled");

              //$('#konten').load('hal-sdm.php');
            },
            error: function(){
              //manggil pnotify aja
              $("#loader-btnsdm").hide();
              $("#btn-update-skpd").removeClass("disabled");
              new PNotify({
            title: '',
            text: 'Operasi gagal.',
            type: 'error'
          });
            }
           // $('#konten').load('hal-sdm.php');
          });
      });//
</script>
