<!-- CONTENT -->
<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $title_content ?></h1>
           </div>
                <!-- /.col-lg-12 -->
            </div>			
			<div class="row">
          <div class="col-lg-12">
            	<div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <?php echo $this->session->flashdata('admin-pesan'); ?>
                    <p>Usernama anda : <?php echo $user ?></p>
                    <p>Password anda : 
                    <?php 
                      $l=strlen($pass); 
                      for ($i=0; $i < $l ; $i++) { 
                        echo "*";
                      }
                      ?></p>
                      <button class="btn btn-primary" data-toggle="modal" data-target="#modal-username">ganti username</button>
                      <button class="btn btn-primary" data-toggle="modal" data-target="#modal-password">ganti password</button>
                </div> 
              </div>
          </div>
          <!-- /.col-lg-12 -->
      </div>
      <!-- Modal -->
      <div class="modal fade" id="modal-username" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Ganti username</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" role="form" id="form-tambah-sdm">
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="update-settingusername">Username baru</label>
                        <div class="col-sm-8">
                          <input type="text" id="update-settingusername" class="form-control" />  
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="update-settingusername">Masukkan Password</label>
                        <div class="col-sm-8">
                          <input type="password" id="cek-settingpassword" class="form-control" />  
                        </div>            
                  </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" onclick="update_username()" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="modal-password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Ganti Password</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" role="form" id="form-tambah-sdm">
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="pass_baru">Password baru</label>
                        <div class="col-sm-8">
                          <input type="password" id="pass_baru" class="form-control" />  
                        </div>            
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label" for="pass_lama">Masukkan Password lama</label>
                        <div class="col-sm-8">
                          <input type="password" id="pass_lama" class="form-control" />  
                        </div>            
                  </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" onclick="update_password()" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <script type="text/javascript">
    function update_username () {
      var new_user = $("#update-settingusername").val();
      var pass = $("#cek-settingpassword").val();
      $.ajax({
        type:"POST",
        url:'<?php echo base_url(); ?>admin/update/username',
        data:{'par_newuser':new_user,'par_pass':pass},
        success:function(rs) {
          window.location.replace("<?php echo base_url(); ?>admin/setting/");
        },
        error:function(rs) {
          //$('#box-admin').html(rs)
        }
      });
    }

    function update_password () {
      var new_pass = $("#pass_baru").val();
      var old_pass = $("#pass_lama").val();
      $.ajax({
        type:"POST",
        url:'<?php echo base_url(); ?>admin/update/password',
        data:{'par_newpass':new_pass,'par_pass':old_pass},
        success:function(rs) {
          //alert(rs);
          window.location.replace("<?php echo base_url(); ?>admin/setting/");
        },
        error:function(rs) {
          window.location.replace("<?php echo base_url(); ?>admin/setting/");
          //$('#box-admin').html(rs)
        }
      });
    }
    </script>
   <!-- /CONTENT -->