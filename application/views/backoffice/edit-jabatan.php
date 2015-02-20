<div class="modal fade" id="modal-edit-jabatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Edit data Jabatan</h4>
	      	</div>
      	<div class="modal-body">

            <form class="form-horizontal" role="form" id="form-edit-pg">
                  <div class="form-group hidden">
                       
                        <div class="col-sm-8">
                          <input type="text" id="update-kdjabatan" class="form-control"/>  
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="update-namajabatan">Jabatan</label>
                        <div class="col-sm-8">
                          <input type="text" id="update-namajabatan" class="form-control"/>  
                        </div>            
                  </div>
                                          
            </form>
                  
        </div>
	    <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="btn-update-jabatan">Save changes</button>
	    </div>
    </div>
  </div>

</div>
<script type="text/javascript">
  $("#loader-btnupdatesdm").hide();

  
  $("body").on("click","#btn-update-jabatan",function(){
    //alert('click');
          var kdjabatan = $("#update-kdjabatan").val();
          var nama_jabatan = $("#update-namajabatan").val();
          $.ajax({      
            url:"<?php echo base_url(); ?>admin/sdm/update_jabatan",
            type:"POST",//jenis menghandle tipe pegawai kontrak atau pns
            data:{'par_kdjabatan':kdjabatan,'par_namajabatan':nama_jabatan},
            beforeSend: function(rs){
              $("#loader-btnsdm").show();
              $("#btn-update-jabatan").addClass("disabled");
            },
            success: function(rs){
              if(rs==1){
                new PNotify({
                  title: '',
                  text: 'Berhasil merubah data SKPD.',
                  type: 'success'
                });
                $('#table-jabatan').bootstrapTable('refresh');
                $('#modal-edit-jabatan').modal('hide');
                //$('#form-edit-pg').trigger("reset");
                //document.getElementById("form-edit-pg").reset();
              }
              $("#loader-btnsdm").hide();
              $("#btn-update-jabatan").removeClass("disabled");
              //$('#konten').load('hal-sdm.php');
            },
            error: function(){
              //manggil pnotify aja
              $("#loader-btnsdm").hide();
              $("#btn-update-jabatan").removeClass("disabled");
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
