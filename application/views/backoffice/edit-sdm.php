<div class="modal fade" id="modal-edit-sdm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Edit data user</h4>
          </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form" id="form-edit-sdm">
                  <input type="text" id="edit-kdsdm" class="form-control hidden"/> 
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="edit-nip">NIP</label>
                        <div class="col-sm-8">
                          <input type="text" id="edit-nip" class="form-control"/>  
                        </div>            
                  </div>
                  <div class="form-group">
                    <label for="edit-nama" class="col-sm-3 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="edit-nama" placeholder="Example Name,Gelar">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="update-skpduser" class="col-sm-3 control-label">SKPD</label>
                    <div class="col-sm-8">
                        <select id="update-skpduser"></select>
                    </div>
                  </div>

                  <div class="form-group">
                      <label for="edit-pil-jabatan" class="col-sm-3 control-label">Jabatan</label>
                        <div class="col-sm-7" style="padding-right:0px;margin-right:0px;"> 
                          <select id="edit-pil-jabatan"  placeholder="Pilih jabatan..." style="border-radius:0px;"></select>                           
                        </div>
                        <div class="col-sm-1"><a class="btn btn-default" data-toggle="modal" data-target="#modal-edit-jabatan" id="btn-tambah-jabatan"><span class="glyphicon glyphicon-plus-sign" title="tambah jabatan"></span></a></div>  
                  </div>

                  <div class="form-group">
                    <label for="pilih-edit-pangkat-gol" class="col-sm-3 control-label">Pangkat Golongan</label>
                    <div class="col-sm-8">
                      <select style="cursor: pointer;" class="form-control" id="pilih-edit-pangkat-gol" placeholder="Pilih Pangkat Golongan...">
                        <option value="1">-</option>  
                        <?php 
                          foreach ($pangkat as $key) {
                            echo '<option value="'.$key['kd_pg'].'">'.$key['nama_pangkat'].' ('.$key['golongan'].'/'.$key['ruang'].')</option>';
                          }
                        ?>
                      </select>         
                    </div>
                  </div>      
                  <div class="form-group">
                      <div class="col-sm-3"></div>
                      <div class="col-sm-8"> 
                        <p align="right" style="font-size:11px;color:#444444;"><span style="color:red;">*</span>Kosongkan NIP dan pangkat jika pegawai bukan PNS</p>                           
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

<div class="modal fade" style="z-index:100000;" id="modal-edit-jabatan" name="modal-edit-jabatan" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" id=""><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      <h4 class="modal-title">Tambah data jabatan</h4>
                      </div>
                    <div class="modal-body">
                       <form class="form-horizontal" role="form" id="form-edit-tambah-jabatan">
                        <div class="control-group">
                          <label>Jabatan Baru</label>
                          <input type="text" class="form-control" id="edit-jabatan" />
                        </div> 
                       </form>
                    </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="btn-edit-simpan-jabatan"><span id="loader-btneditaddjabatan"><img width="20px" height="20px" src="<?php echo base_url(); ?>assets/img/ajax-loading.gif"/>&nbsp&nbsp&nbsp</span>Simpan</button>
                  </div>
                </div>
              </div>
            </div>

<script type="text/javascript">
  $('body').on('click','#btn-update-user',function(){
    var u_kd_sdm = $('#edit-kdsdm').val();
    var u_nip = $('#edit-nip').val();
    var u_nama = $('#edit-nama').val();
    var u_skpd = $('#update-skpduser').val();
    var u_jabatan = $('#edit-pil-jabatan').val();
    var u_pangkat = $('#pilih-edit-pangkat-gol').val();

    $.ajax({
      type:"POST",
      url:'<?php echo base_url(); ?>admin/sdm/update/'+u_kd_sdm,
      data: {'par_nip':u_nip,'par_nama':u_nama,'par_skpd':u_skpd,'par_jabatan':u_jabatan,'par_pangkat':u_pangkat},
      success:function(rs) {
        if(rs==1){            
            new PNotify({
              title: '',
              text: 'Berhasil merubah data pegawai.',
              type: 'success',
              shadow: false
            });
          $('#modal-edit-sdm').modal('hide');
          $('#table-sdm').bootstrapTable('refresh');   
        }
      },
      error:function(){
            new PNotify({
                  title: '',
                  text: 'Gagal menghapus data user.',
                  type: 'error',
                  shadow: false
            });
        }
    });    
  });

</script>