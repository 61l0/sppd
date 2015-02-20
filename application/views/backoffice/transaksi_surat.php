
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
      width:80%;
  }
  .mygraph {
      position:relative;
      width:650px;
  }
</style>
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
            <div id="graph" class="yaxis" ></div>
          </div> 
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>

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