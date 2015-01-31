<style type="text/css">.ui-autocomplete {z-index:1051;}</style>
<div class="modal fade" id="modal-tambah-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Tambah data SKPD</h4>
	      	</div>
      	<div class="modal-body">            
            <form class="form-horizontal" role="form" id="form-tambah-sdm">
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="input-username">Username</label>
                        <div class="col-sm-8">
                          <input type="text" id="input-username" class="form-control"/>  
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="input-passworduser">Password</label>
                        <div class="col-sm-8">
                          <input type="text" id="input-passworduser" class="form-control"/>  
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="input-skpduser">SKPD</label>
                        <div class="col-sm-8">
                          <select id="input-skpduser" class="form-control">
                            <option value="0">-</option>
                          </select>
                        </div>            
                  </div>
                        
            </form>

             
        </div>
	    <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="btn-simpan-user"><span id="loader-btnsdm"><img width="20px" height="20px" src="img/ajax-loading.gif"/>&nbsp&nbsp&nbsp</span> Save changes</button>
	    </div>
    </div>
  </div>
</div><!-- ENND MODAL -->
<script type="text/javascript">
  $("#loader-btnsdm").hide();
  //$("#loader-btnaddjabatan").hide();


  $("body").on("click","#btn-simpan-user",function(){
  //  alert('click');
          
          var username = $("#input-username").val();
          var password = $("#input-passworduser").val();
          var kode_skpd = $("#input-skpduser").find('option:selected').val();
          //alert(kode_skpd);

          $.ajax({      
            url:"<?php echo base_url(); ?>admin/user/baru",
            type:"POST",//jenis menghandle tipe pegawai kontrak atau pns
            data:{'par_username':username,'par_password':password,'par_kodeskpd':kode_skpd},
            beforeSend: function(rs){
              $("#loader-btnsdm").show();
              $("#btn-simpan-user").addClass("disabled");
            },
            success: function(rs){
              if(rs==1){
                new PNotify({
                  title: '',
                  text: 'Berhasil menyimpan data user baru.',
                  type: 'success'
                });
                $('#table-user').bootstrapTable('refresh');
                $('#form-tambah-sdm').trigger("reset");
                //document.getElementById("form-tambah-sdm").reset();
              }
              $("#loader-btnsdm").hide();
              $("#btn-simpan-user").removeClass("disabled");

              //$('#konten').load('hal-sdm.php');
            },
            error: function(){
              //manggil pnotify aja
              $("#loader-btnsdm").hide();
              $("#btn-simpan-user").removeClass("disabled");
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
