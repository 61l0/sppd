<div class="modal fade" id="modal-tambah-sdm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">input data sdm</h4>
          </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form" id="form-input-sdm">
                  <input type="text" id="input-kdsdm" class="form-control hidden"/> 
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="input-nip">NIP</label>
                        <div class="col-sm-8">
                          <input type="text" id="input-nip" class="form-control"/>  
                        </div>            
                  </div>
                  <div class="form-group">
                    <label for="input-nama" class="col-sm-3 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="input-nama" placeholder="Example Name,Gelar">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="input-skpdsdm" class="col-sm-3 control-label">SKPD</label>
                    <div class="col-sm-8">
                        <select placeholder="Pilih skpd..." id="input-skpdsdm"></select>
                    </div>
                  </div>

                  <div class="form-group">
                      <label for="input-pil-jabatan" class="col-sm-3 control-label">Jabatan</label>
                        <div class="col-sm-7" style="padding-right:0px;margin-right:0px;"> 
                          <select id="input-pil-jabatan"  placeholder="Pilih jabatan..." style="border-radius:0px;"></select>                           
                        </div>
                        <div class="col-sm-1"><a class="btn btn-default" data-toggle="modal" data-target="#modal-input-jabatan" id="btn-tambah-jabatan"><span class="glyphicon glyphicon-plus-sign" title="tambah jabatan"></span></a></div>  
                  </div>

                  <div class="form-group">
                    <label for="pilih-input-pangkat-gol" class="col-sm-3 control-label">Pangkat Golongan</label>
                    <div class="col-sm-8">
                      <select style="cursor: pointer;" class="form-control" id="pilih-input-pangkat-gol" placeholder="Pilih Pangkat Golongan...">
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
          <button type="button" class="btn btn-primary" id="btn-simpan-sdm">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" style="z-index:100000;" id="modal-input-jabatan" name="modal-input-jabatan" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" id=""><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      <h4 class="modal-title">Tambah data jabatan</h4>
                      </div>
                    <div class="modal-body">
                       <form class="form-horizontal" role="form" id="form-input-tambah-jabatan">
                        <div class="control-group">
                          <label>Jabatan Baru</label>
                          <input type="text" class="form-control" id="input-jabatan" />
                        </div> 
                       </form>
                    </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="btn-input-simpan-jabatan"><span id="loader-btninputaddjabatan"><img width="20px" height="20px" src="<?php echo base_url(); ?>assets/img/ajax-loading.gif"/>&nbsp&nbsp&nbsp</span>Simpan</button>
                  </div>
                </div>
              </div>
            </div>

<script type="text/javascript">
  $('body').on('click','#btn-simpan-sdm',function(){
    var i_kd_sdm = $('#input-kdsdm').val();
    var i_nip = $('#input-nip').val();
    var i_nama = $('#input-nama').val();
    var i_skpd = $('#input-skpdsdm').val();
    var i_jabatan = $('#input-pil-jabatan').val();
    var i_pangkat = $('#pilih-input-pangkat-gol').val();
    var jenis;
      if (i_nip.trim()=="") {
        jenis = "KON";
        i_pangkat = 1;
      }else{
        jenis = "PNS";
      }

    $.ajax({
      type:"POST",
      url:'<?php echo base_url(); ?>admin/sdm/baru/',
      data: {'par_jenis':jenis,'par_nip':i_nip,'par_nama':i_nama,'par_skpd':i_skpd,'par_jabatan':i_jabatan,'par_pangkat':i_pangkat},
      success:function(rs) {
        if(rs==1){            
            new PNotify({
              title: '',
              text: 'Berhasil menyimpan data pegawai.',
              type: 'success',
              shadow: false
            });
          $('#modal-tambah-sdm').modal('hide');
          $('#table-sdm').bootstrapTable('refresh');   
        }
      },
      error:function(){
            new PNotify({
                  title: '',
                  text: 'Gagal menyimpan data user.',
                  type: 'error',
                  shadow: false
            });
        }
    });    
  });

</script>