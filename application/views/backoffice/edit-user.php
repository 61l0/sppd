<div class="modal fade" id="modal-edit-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Edit data user</h4>
	      	</div>
      	<div class="modal-body">
            <input id="update-nouser" type="text" class="hidden" />
            <form class="form-horizontal" role="form" id="form-tambah-sdm">
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="update-username">Username</label>
                        <div class="col-sm-8">
                          <input type="text" id="update-username" class="form-control" disabled=""/>  
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="update-passworduser">Password</label>
                        <div class="col-sm-8">
                          <input type="text" id="update-passworduser" class="form-control"/>  
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="update-skpduserupdate">SKPD</label>
                        <div class="col-sm-8">
                          <select id="update-skpduser" class="form-control">
                            <option>-</option>
                          </select>
                        </div>            
                  </div>
                  
                        
            </form>
                  
        </div>
	    <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="btn-update-user">Save changes</button>
	    </div>
    </div>
  </div>

</div>
<script type="text/javascript">
  $("#loader-btnupdatesdm").hide();

  
  $("body").on("click","#btn-update-user",function(){
         // alert('click');
          var no_user = $("#update-nouser").val();
                      var username = $("#update-username").val();
                      var password = $("#update-passworduser").val();
                      var val_kodeskpd = $("#update-skpduser").find('option:selected').val();
          
          $.ajax({      
            url:"<?php echo base_url(); ?>admin/user/update",
            type:"POST",//jenis menghandle tipe pegawai kontrak atau pns
            data:{'par_nouser':no_user,'par_username':username,'par_password':password,'par_kodeskpd':val_kodeskpd},
            beforeSend: function(rs){
              //$("#loader-btnsdm").show();
              $("#btn-update-user").addClass("disabled");
            },
            success: function(rs){
              if(rs==1){
                new PNotify({
                  title: '',
                  text: 'Berhasil merubah data SKPD.',
                  type: 'success'
                });
                $('#table-user').bootstrapTable('refresh');
                $('#modal-edit-user').modal('hide');
                //$('#form-tambah-sdm').trigger("reset");
                //document.getElementById("form-tambah-sdm").reset();
              }
              $("#loader-btnsdm").hide();
              $("#btn-update-user").removeClass("disabled");

              //$('#konten').load('hal-sdm.php');
            },
            error: function(){
              //manggil pnotify aja
              $("#loader-btnsdm").hide();
              $("#btn-update-user").removeClass("disabled");
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
