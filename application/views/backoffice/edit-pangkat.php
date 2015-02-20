<div class="modal fade" id="modal-edit-pg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Edit data Pangkat & Golongan PNS</h4>
	      	</div>
      	<div class="modal-body">

            <form class="form-horizontal" role="form" id="form-edit-pg">
                  <div class="form-group hidden">
                       
                        <div class="col-sm-8">
                          <update type="text" id="update-kdpg" class="form-control"/>  
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="update-namapg">Pangkat</label>
                        <div class="col-sm-8">
                          <select class="form-control" id="update-namapg">
                            <?php 
                              foreach ($pangkat as $key) {
                                echo '<option value="'.$key['nama_pangkat'].'">'.$key['nama_pangkat'].'</option>';
                              }
                             ?>                            
                          </select>
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="update-golpg">Golongan</label>
                        <div class="col-sm-8">
                          <select class="form-control" id="update-golpg">
                            <?php 
                              foreach ($pangkat as $key) {
                                echo '<option value="'.$key['golongan'].'">'.$key['golongan'].'</option>';
                              }
                             ?>                            
                          </select> 
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="update-alamatskpd">Ruang</label>
                        <div class="col-sm-8">
                          <select class="form-control" id="update-ruangpg">
                            <?php 
                              foreach ($pangkat as $key) {
                                echo '<option value="'.$key['ruang'].'">'.$key['ruang'].'</option>';
                              }
                            ?>                            
                          </select>  
                        </div>            
                  </div>                        
            </form>
                  
        </div>
	    <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="btn-update-pg">Save changes</button>
	    </div>
    </div>
  </div>

</div>
<script type="text/javascript">
  $("#loader-btnupdatesdm").hide();

  
  $("body").on("click","#btn-update-pg",function(){
    //alert('click');
          var kdpg = $("#update-kdpg").val();
          var kode_skpd = $("#update-namapg").val();
          var nama_skpd = $("#update-golpg").val();
          var alamat_skpd = $("#update-alamatskpd").val();
          var telp_skpd = $("#update-telpskpd").val();
          var email_skpd = $("#update-emailskpd").val();
          var website_skpd = $("#update-websiteskpd").val();
          $.ajax({      
            url:"<?php echo base_url(); ?>admin/skpd/update",
            type:"POST",//jenis menghandle tipe pegawai kontrak atau pns
            data:{'par_kdpg':kdpg,'par_namapg':kode_skpd,'par_golpg':nama_skpd,'par_alamatskpd':alamat_skpd,'par_emailskpd':email_skpd,'par_telpskpd':telp_skpd,'par_websiteskpd':website_skpd,},
            beforeSend: function(rs){
              $("#loader-btnsdm").show();
              $("#btn-update-pg").addClass("disabled");
            },
            success: function(rs){
              if(rs==1){
                new PNotify({
                  title: '',
                  text: 'Berhasil merubah data SKPD.',
                  type: 'success'
                });
                $('#table-skpd').bootstrapTable('refresh');
                $('#modal-edit-pg').modal('hide');
                //$('#form-edit-pg').trigger("reset");
                //document.getElementById("form-edit-pg").reset();
              }
              $("#loader-btnsdm").hide();
              $("#btn-update-pg").removeClass("disabled");
              //$('#konten').load('hal-sdm.php');
            },
            error: function(){
              //manggil pnotify aja
              $("#loader-btnsdm").hide();
              $("#btn-update-pg").removeClass("disabled");
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
