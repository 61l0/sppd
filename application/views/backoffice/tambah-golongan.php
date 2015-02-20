<div class="modal fade" id="modal-tambah-jabatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Tambah data SKPD</h4>
	      	</div>
      	<div class="modal-body">            
            <form class="form-horizontal" role="form" id="form-tambah-jabatan">
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="input-namaskpd">Jabatan</label>
                        <div class="col-sm-8">
                          <input placeholder="Nama Jabatan" type="text" id="input-namajabatan" class="form-control"/>  
                        </div>            
                  </div>
                       
            </form>

             
        </div>
	    <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="btn-simpan-jabatan"><span id="loader-btnsdm"><img width="20px" height="20px" src="img/ajax-loading.gif"/>&nbsp&nbsp&nbsp</span> Save changes</button>
	    </div>
    </div>
  </div>
</div><!-- ENND MODAL -->
<script type="text/javascript">
  $("#loader-btnsdm").hide();
  //$("#loader-btnaddjabatan").hide();


  $("body").on("click","#btn-simpan-jabatan",function(){
          var nama_jabatan = $("#input-namajabatan").val();
          $.ajax({      
            url:"<?php echo base_url(); ?>admin/sdm/insert_jabatan",
            type:"POST",//jenis menghandle tipe pegawai kontrak atau pns
            data:{'par_jabatan':nama_jabatan},
            beforeSend: function(rs){
              $("#loader-btnsdm").show();
              $("#btn-simpan-jabatan").addClass("disabled");
            },
            success: function(rs){
              if(rs==1){
                new PNotify({
                  title: '',
                  text: 'Berhasil menyimpan data SKPD baru.',
                  type: 'success'
                });
                $('#table-jabatan').bootstrapTable('refresh');
                $('#form-tambah-jabatan').trigger("reset");
                $('#modal-tambah-jabatan').modal('hide');
                //document.getElementById("form-tambah-jabatan").reset();
              }
              $("#loader-btnsdm").hide();
              $("#btn-simpan-jabatan").removeClass("disabled");

              //$('#konten').load('hal-sdm.php');
            },
            error: function(){
              //manggil pnotify aja
              $("#loader-btnsdm").hide();
              $("#btn-simpan-jabatan").removeClass("disabled");
              new PNotify({
            title: '',
            text: 'Operasi gagal.',
            type: 'error'
          });
            }
           // $('#konten').load('hal-sdm.php');
          });
      });//end simpan skpd baru      
      
</script>
