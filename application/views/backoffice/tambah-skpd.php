<style type="text/css">.ui-autocomplete {z-index:1051;}</style>
<div class="modal fade" id="modal-tambah-skpd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Tambah data SKPD</h4>
	      	</div>
      	<div class="modal-body">            
            <form class="form-horizontal" role="form" id="form-tambah-sdm">
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="input-kodeskpd">Kode SKPD</label>
                        <div class="col-sm-8">
                          <input type="text" id="input-kodeskpd" class="form-control"/>  
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="input-namaskpd">Nama SKPD</label>
                        <div class="col-sm-8">
                          <input type="text" id="input-namaskpd" class="form-control"/>  
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="input-alamatskpd">Alamat SKPD</label>
                        <div class="col-sm-8">
                          <input type="text" id="input-alamatskpd" class="form-control"/>  
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="input-telpskpd">No. Telp SKPD</label>
                        <div class="col-sm-8">
                          <input type="text" id="input-telpskpd" class="form-control"/>  
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="input-emailskpd">Email SKPD</label>
                        <div class="col-sm-8">
                          <input type="text" id="input-emailskpd" class="form-control"/>  
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="input-websiteskpd">Website SKPD</label>
                        <div class="col-sm-8">
                          <input type="text" id="input-websiteskpd" class="form-control"/>  
                        </div>            
                  </div>
                        
            </form>

             
        </div>
	    <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="btn-simpan-skpd"><span id="loader-btnsdm"><img width="20px" height="20px" src="img/ajax-loading.gif"/>&nbsp&nbsp&nbsp</span> Save changes</button>
	    </div>
    </div>
  </div>
</div><!-- ENND MODAL -->
<script type="text/javascript">
  $("#loader-btnsdm").hide();
  //$("#loader-btnaddjabatan").hide();


  $("body").on("click","#btn-simpan-skpd",function(){
//    alert('click');
          var kode_skpd = $("#input-kodeskpd").val();
          var nama_skpd = $("#input-namaskpd").val();
          var alamat_skpd = $("#input-alamatskpd").val();
          var telp_skpd = $("#input-telpskpd").val();
          var email_skpd = $("#input-emailskpd").val();
          var website_skpd = $("#input-websiteskpd").val();
          $.ajax({      
            url:"<?php echo base_url(); ?>admin/skpd/baru",
            type:"POST",//jenis menghandle tipe pegawai kontrak atau pns
            data:{'par_kodeskpd':kode_skpd,'par_namaskpd':nama_skpd,'par_alamatskpd':alamat_skpd,'par_emailskpd':email_skpd,'par_telpskpd':website_skpd,'par_websiteskpd':kode_skpd,},
            beforeSend: function(rs){
              $("#loader-btnsdm").show();
              $("#btn-simpan-skpd").addClass("disabled");
            },
            success: function(rs){
              if(rs==1){
                new PNotify({
                  title: '',
                  text: 'Berhasil menyimpan data SKPD baru.',
                  type: 'success'
                });
                $('#table-skpd').bootstrapTable('refresh');
                $('#form-tambah-sdm').trigger("reset");
                //document.getElementById("form-tambah-sdm").reset();
              }
              $("#loader-btnsdm").hide();
              $("#btn-simpan-skpd").removeClass("disabled");

              //$('#konten').load('hal-sdm.php');
            },
            error: function(){
              //manggil pnotify aja
              $("#loader-btnsdm").hide();
              $("#btn-simpan-skpd").removeClass("disabled");
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
