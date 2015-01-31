<html>
 <head>
  <title>PEMKAB MALANG | Login</title>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/jqueryui/jquery-ui.css">
    <script src="<?php echo base_url();?>assets/jqueryui/external/jquery/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/jqueryui/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css">     
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
    <script src="<?php echo base_url();?>assets/js/pnotify.custom.min.js"></script>
    <link href="<?php echo base_url();?>assets/css/pnotify.custom.min.css" rel="stylesheet" />
    
  <style>
   .input-group-addon{
    background: white;
   } 
   .form-control,.btn,.input-group-addon,.alert{
      border-radius: 0px;  
    }
    .alert{
      padding: 10px;
    }
    .error{
      color: #a94442;
      font-size: 10px;
    }
  </style>
 </head>
 <body  style="background-color:#25272F">
 <div class="container"  style="width:350px;margin-top:100px;">
    <div class="panel panel-default">
    <div class="panel-heading" style="background-color:transparent;">Hi admin ,silahkan login</div>
    <div class="panel-body">
      
      <form class="form-horizontal" action="<?php echo base_url();?>admin/login" method="post" name="login">
          
          <div class="form-group">
            
            <p style="color:red;font-size:12px;" class="col-sm-12"><?php echo $this->session->flashdata('pesan');?></p>
            <div class="col-sm-12" align="right">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input class="form-control" type="text" size="40" name="username" value="<?php echo set_value('username');?>" class="inputan">
              </div>
              <?php echo form_error('username');?>
            </div>
          </div>
          <div class="form-group"align="right">
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input class="form-control" type="password" size="40" name="password" value="<?php echo set_value('password');?>" class="inputan"> 
              </div>
              <?php echo form_error('password');?>
            </div>
          </div>
          <div class="form-group" align="right">
            <div class="col-sm-12">
              <button class="btn btn-primary col-sm-12" type="submit" name="login">Login <i class="fa fa-sign-in"></i></button>  
             
            </div>
          </div>
      </form>     
    </div>      
    </div>  
  </div>

  </body>
</html>