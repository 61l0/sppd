
<div class="modal fade" id="modal-edit-sdm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Data pegawai</h4>
	      	</div>
      	<div class="modal-body">            
            <form class="form-horizontal" role="form" id="form-edit-sdm">
            	  <input type="text" id="edit-kdsdm" class="form-control hidden"/> 
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="edit-nip">NIP</label>
                        <div class="col-sm-8">
                          <input type="text" id="edit-nip" class="form-control" readonly/>  
                        </div>            
                  </div>
                  <div class="form-group">
                    <label for="edit-nama" class="col-sm-3 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="edit-nama"  readonly>
                    </div>
                  </div>

                  <div class="form-group">
                      <label for="edit-pil-jabatan" class="col-sm-3 control-label">Jabatan</label>
                        <div class="col-sm-3" style="padding-right:0px;margin-right:0px;">                            
                          <input type="text" class="form-control" id="edit-jabatan" readonly>
                        </div>
                        <div class="col-sm-5" style="padding-left:0px;">
                          <input class="form-control" value="<?php echo $this->session->userdata('nama_skpd'); ?>" title="<?php echo $this->session->userdata('nama_skpd'); ?>" style="border-left:none;" readonly/>
                        </div>
                         
                  </div>
                  <div class="form-group">
                    <label for="pilih-edit-pangkat-gol" class="col-sm-3 control-label">Pangkat Golongan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="edit-pangkat" readonly>         
                    </div>
                  </div>      
                  <div class="form-group">
                      <div class="col-sm-3"></div>
                      <div class="col-sm-8"> 
                        <p align="right" style="font-size:11px;color:#444444;"><span style="color:red;">*</span>Kosongkan NIP dan jabatan jika pegawai bukan PNS</p>                           
                      </div>
                  </div>      
            </form>              
        </div>
    </div>
  </div>

</div>
