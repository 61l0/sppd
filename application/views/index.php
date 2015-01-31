<!DOCTYPE html>
<html>
<head>
	<title>SPPD & Surat Tugas || Pemkab Malang</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	
	<link rel="stylesheet" href="<?php echo base_url();?>assets/jqueryui/jquery-ui.css">
  	<script src="<?php echo base_url();?>assets/jqueryui/external/jquery/jquery.js"></script>
  	<script src="<?php echo base_url();?>assets/jqueryui/jquery-ui.js"></script>
    <script src="<?php echo base_url();?>assets/jqueryui/jquery.ui.datepicker-id.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css">   			
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
    <!--[if lt IE 9]>
      <script src="<?php echo base_url();?>assets/js/html5shiv.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/js/respond.min.js" type="text/javascript"></script>
    <![endif]-->   
    <script src="<?php echo base_url();?>assets/js/bootbox.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/pnotify.custom.min.js"></script>
    <link href="<?php echo base_url();?>assets/css/pnotify.custom.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/selectize.css" />
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/selectize.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/bootstrap-table.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-table.min.css" />
    <script src="<?php echo base_url();?>assets/js/bootstrap-table-export.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-table-id-ID.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrapValidator.min.js"></script>
    

    <style>
		.ui-autocomplete-loading { background: white url('<?php echo base_url(); ?>assets/img/auto-complete.gif') right center no-repeat;}
		.ui-widget { font-family: Trebuchet MS, Tahoma, Verdana, Arial, sans-serif; font-size: 0.9em; }
		.ui-widget-content { border: 1px solid #dddddd; background: #ffffff; color: #333333; }
	</style>
	    

    <style type="text/css">
    	body{
    		background-color: #EEEEEE;
    		padding-top: 70px;
    		color: #4C4C4C;
    	}
    	hr{
    		border-color: #DDDDDD;
    		-webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
          	box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    	}
    	.footer {
		   position:absolute;
		   bottom:0;		   
		   height:60px;   /* tinggi dari footer */
		   background:#CCCCCC;
		}
	    
		.ui-autocomplete.ui-widget{font-size: 12px;}
		
		.navbar{

      background:#285e8e;
      border: none;
    }	
		.navbar-inverse .navbar-nav > li > a,.navbar-inverse .navbar-brand {
		  color: #FFFFFF;
		}
		.navbar-inverse .navbar-nav > li > a:hover{
        background-color: transparent;
        -moz-box-shadow: inset 0px -4px 0px #428bca;
        -webkit-box-shadow: inset 0px -4px 0px #428bca;
        box-shadow: inset 0px -4px 0px #428bca;
        -moz-transition: 0.6s;
        -wor: #DDebkit-transition: 0.6s;
        transition: 0.6s; 

		}		  
	  	.navbar-inverse .navbar-nav .open .dropdown-menu > li > a {
	    	color: #FFFFFF;
	  	}
	  	.navbar-inverse .navbar-nav .open .dropdown-menu{
	    	background-color: #285e8e;
	    	border: none;
	    	border-bottom-right-radius: 5px;
  			border-bottom-left-radius: 5px;
		 	  content: ' ';  			 
	  	}
	  	.navbar-inverse .navbar-nav .open .dropdown-menu > li > a:hover,
	  	.navbar-inverse .navbar-nav .open .dropdown-menu > li > a:focus {
	    	color: #DDDDDD;
        background-color: transparent;
        
	  	}
      .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus {
        color: #DDDDDD;
        background-color: transparent;
        -moz-box-shadow: inset 0px -4px 0px #428bca;
        -webkit-box-shadow: inset 0px -4px 0px #428bca;
        box-shadow: inset 0px -4px 0px #428bca;
        -moz-transition: 0.6s;
        -webkit-transition: 0.6s;
        transition: 0.6s; 
      }

      .navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:hover, .navbar-inverse .navbar-nav>.active>a:focus {
        color: #fff;
        background-color: transparent;
        -moz-box-shadow: inset 0px -4px 0px #428bca;
        -webkit-box-shadow: inset 0px -4px 0px #428bca;
        box-shadow: inset 0px -4px 0px #428bca;
        -moz-transition: 0.6s;
        -webkit-transition: 0.6s;
        transition: 0.6s;  
      }
     
      .dropdown-menu>li.active{
        font-style: oblique;
        background-color: transparent;
        padding-left: 10px;
      }
      .dropdown-menu>li.active>a{
        font-style: oblique;
        background-color: transparent;
       padding-left: 10px;
      }
      .form-control,.btn{
      border-radius: 0px;
      
      }
      .panel{
        border-radius: 0px;
      }
      .modal-content{
        border-radius: 0px; 
      }
      .modal-header{
        border:none;
      }
      .goto-top:hover {
          background-color: #285e8e;
          
      }
      .goto-top {
          cursor: pointer;
          position: fixed;
          bottom: 26px;
          right: 2px;
          width: 48px;
          height: 48px;
          line-height: 48px;
          text-align: center;
          z-index: 1001;
          border-radius: 48px;
          font-size: 20px;
          opacity: 0.8;
          color: #fff;
          background: #428bca;
      }
      a.remove,a.print{
      	font-size: 16px;
      }
    </style>
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top"  role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span class="navbar-brand"><i class="fa fa-file-text-o"></i> SPPD dan Surat Tugas</span>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="<?php echo base_url(); ?>" id="btn-home"><span class="glyphicon glyphicon-home glyphicon-th-large"></span>&nbsp Beranda</a></li>
        <li><a href="<?php echo base_url(); ?>surat/baru" id="btn-menu-surat-baru"><span class="glyphicon glyphicon-edit glyphicon-th-large"></span>&nbsp Surat Baru</a></li>
        
        <li  class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-book glyphicon-th-large"></span>&nbsp Data <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url(); ?>sdm" id="btn-menu-sdm">Pegawai / SDM</a></li>
            <li><a href="#">-</a></li>
          </ul>
        </li>

        <li  class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon glyphicon-list-alt glyphicon-th-large"></span>&nbsp Daftar Surat<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url(); ?>surat/sppd" id="btn-menu3">SPPD</a></li>
            <li><a href="<?php echo base_url(); ?>surat/surat_tugas" id="btn-menu4">Surat Tugas</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">  
        <?php 
           if ($this->session->userdata('isUserLogin')==false){
              echo '<li ><a href="'.base_url().'user/login">&nbsp Login &nbsp<span class="fa fa-user"></span></a></li>';
           }else{
        ?>      
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('nama_skpd'); ?>&nbsp;&nbsp;<span class="fa fa-user"></span><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url(); ?>user/profil/<?php echo $this->session->userdata('kode_skpd'); ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url(); ?>logout"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Logout</a></li>
          </ul>
        </li>
        <?php } ?>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div id="boxxx"></div>

	<div class="container panel panel-default" style="">
        <div class="page-header" style="padding:10px;margin-top:10px;border-bottom:solid 4px #4C4C4C;">
        	<div class="row">
        		<div class="col-sm-2" style="padding-left:40px;"><img src="<?php echo base_url();?>assets/img/Logo-Pemkab-Malang.png" style="width:120px;height:140px;"></div>
            <div  class="col-sm-8">
            	<h1 style="font-weight:bold; margin-top:5px;">PEMERINTAH KABUPATEN MALANG</h1>
	            <h3><?php echo $this->session->userdata('nama_skpd'); ?></h3>
	            <H4>SPPD dan Surat Tugas</H4>	
            </div>
            <div  class="col-sm-2">
              <img src="<?php echo base_url();?>assets/img/logo-right.jpg" style="width:120px;height:140px;">  
            </div>	
        	</div>            
        </div>
        <div id="message-box-public"></div>
        <div class="row" style="margin-top:-5px;">
        <hr/ style="border:4px;">     
            <div class="col-md-12">
            	<div class="panel panel-default">
            		<div class="panel-body"  id="konten">
            			 <?php echo $konten ?>
            		</div>
            	</div>
                
            </div>
        </div>
        
        <div class="form-group">
        	<div class="col-md-6" style="margin-top:-10px;"> 
            <style type="text/css">
            #fb :hover{
              color: blue;
            }
            #yt :hover{
              color: red;
            }
            </style>     		
      			<p style="color:#999999">Visit us &nbsp 
              <a id="fb" href="http://www.facebook.com/Pemkabmalang" style="font-size:20px;color:#999999;"><span class="fa fa-facebook-square"></span></a>
              <a id="yt" href="http://www.youtube.com/user/humaskabmalang" style="font-size:20px;color:#999999;"><span class="fa fa-youtube-square"></span></a>
               || Masuk sebagai <a href="<?php echo base_url() ?>admin">admin</a>
            </p>		
        	</div>
        		<div class="col-md-6" style="margin-top:-10px;">      		
      			 <p style="color:#999999;text-align:right">&copy; Copyright 2014  Pemerintah Kabupaten Malang</a></p>		
      		  </div>	
        </div>
      	<div class="goto-top" title="ke atas">
            <i class="glyphicon glyphicon-plane"></i>
            <img src="">
        </div>
      	
    </div>
<script type="text/javascript">
$(function() {
  $('.nav a[href~="' + location.href + '"]').parents('li').addClass('active');
});
$(function () {
  $('.goto-top').hide();
  $(window).scroll(function () {
  if ($(this).scrollTop() > 100) {
  $('.goto-top').fadeIn();
  } else {
  $('.goto-top').fadeOut();
  }
  });
    
  // scroll halaman ke 0px (ke body) ketika diklik
  $('.goto-top').click(function () {
    $('body,html').animate({
    scrollTop: 0
    }, 800);
    return false;
  });
});
</script>
</body>
</html>