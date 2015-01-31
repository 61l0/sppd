<!-- CONTENT -->
<style type="text/css">
  .xaxis {
               filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);  /* IE6,IE7 */
           -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)"; /* IE8 */
       -moz-transform: rotate(-90.0deg);  /* FF3.5+ */
        -ms-transform: rotate(-90.0deg);  /* IE9+ */
         -o-transform: rotate(-90.0deg);  /* Opera 10.5 */
    -webkit-transform: rotate(-90.0deg);  /* Safari 3.1+, Chrome */
            transform: rotate(-90.0deg);  /* Standard */
            position:relative;
            float:left;
            top:110px;
  }
  .yaxis {
      position:relative;
      float:left;
      width:100%;
  }
  .mygraph {
      position:relative;
      width:650px;
  }
</style>

  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $title_content ?></h1>
   </div>                <!-- /.col-lg-12 -->
  </div>
  <div class="row">
    <div class="col-lg-12">
        <?php echo $this->session->flashdata('welcome'); ?>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  
  <div class="row">
    <div class="col-lg-12">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $sum_user; ?></div>
                        <div>Data user</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url(); ?>admin/user">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-university fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $sum_skpd; ?></div>
                        <div>Data SKPD</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url(); ?>admin/skpd">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $sum_sdm; ?></div>
                        <div>Data Pegawai</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url(); ?>admin/sdm">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $sum_surat; ?></div>
                        <div>Data Surat</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url(); ?>admin/surat">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    </div>
  </div>


  <div class="row">
    <div class="col-lg-12">
    <div class="col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading">Grafik Transaksi Surat Tahun <?php echo date('Y'); ?></div>
        <div class="panel-body">
          <div id="graph" class="yaxis" ></div>
        </div>
      </div>      
    </div>
    </div>
      
    <!-- /.col-lg-12 -->
  </div>   
   <!-- /CONTENT -->

   <script type="text/javascript">
      $( document ).ready(function() {
        var lineColor = ['#1caf9a','#357ebd'];
        var day_data = [];
        function changeDateFormat(mydate)
        {
          var dateDMY = new Date(mydate);
          var monthNames = [ "Jan", "Feb", "Mar", "Apr", "May", "Jun",
          "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ]; 
          //var date =  dateDMY.getDate();
          var month = monthNames[dateDMY.getMonth()];
          var year = dateDMY.getFullYear();
          var mydate = "";
          var seperator = "-";
          mydate = mydate.concat(month,seperator,year);
          return mydate;
        }
        
        //assets/data/data.json
        $.getJSON('<?php echo base_url(); ?>admin/surat/getcountmonth', function(day_data) {
            
          Morris.Line({
            element: 'graph',
            data: day_data,
            xkey: 'tahun_bulan',
            ykeys: ['jumlah_bulanan'],
            labels: ['bulan'],
            lineColors: lineColor,
            hoverCallback: function(index, options, content) { 
               var displayDate = "<b>"+changeDateFormat(day_data[index]['tahun_bulan'])+"</b><br>";
               var param1 = "<font color='"+lineColor[0]+"'>Transaksi perbulan "+day_data[index]['jumlah_bulanan']+"</font><br>";
               return displayDate+param1;
            },
            xLabelFormat : function (x) {
             return changeDateFormat(x);
            }
          });
        });

      });
   </script>