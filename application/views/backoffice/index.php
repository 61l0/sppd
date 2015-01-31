<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin SPPD Pemkab Malang</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>assets/css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo base_url(); ?>assets/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>assets/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-table.min.css" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
    
    <link href="<?php echo base_url();?>assets/css/pnotify.custom.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/selectize.css" />
    
    <script src="<?php echo base_url();?>assets/jqueryui/external/jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/metisMenu.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-table.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-table-export.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-table-id-ID.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/pnotify.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/selectize.min.js"></script>
    <!-- Morris Charts JavaScript 
    
    
    <script src="<?php echo base_url(); ?>assets/js/morris-data.js"></script>-->

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/morris.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.js"></script>
    <style type="text/css">
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
    </style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><i class="fa fa-slack fa-lg"></i> SPPD & Surat Tugas Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li><a href="<?php echo base_url(); ?>admin/setting/"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>admin/logout/"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

       


       <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>admin/surat/sppd"><i class="fa fa-file fa-fw"></i> Surat</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-database fa-fw"></i> Master<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/user">User</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/skpd">SKPD</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/sdm">Pegawai</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-area-chart fa-fw"></i> Transaksi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/surat/transaksi">Surat</a>
                                </li>                                
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <div id="page-wrapper">
        <!-- content -->
            <?php echo $content ?>
            <!-- content -->
        </div>
    <!-- /#wrapper -->

    <!-- jQuery -->


</body>

</html>
