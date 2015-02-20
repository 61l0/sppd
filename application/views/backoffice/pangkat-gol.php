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
            <table id="table-skpd"></table>
          </div> 
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<script type="text/javascript"> 
$('#table-skpd').bootstrapTable({
                method: 'get',
                url: "<?php echo base_url();?>admin/sdm/get_pangkat/",
                cache: false,
                //height: ,
                striped: true,
                pagination: true,
                pageSize: 20,
                pageList: [10, 25, 50, 100, 200],
                search: true,
                showColumns: true,
                showRefresh: true,
                minimumCountColumns: 2,
                clickToSelect: true,
                showExport: true,
                //cardView: true,
                showToggle:true,
                //sidePagination: 'server',
                
                columns: [{
                    
                    field: 'kd_pg',
                    title: 'kode pangkat gol.',
                    align: 'left',
                    valign: 'top',
                    visible:false,
                    sortable: true,
                },{
                    
                    field: 'nama_pangkat',
                    title: 'Pangkat',
                    align: 'left',
                    valign: 'top',
                    sortable: true,
                   
                },{
                    
                    field: 'golongan',
                    title: 'Golongan',
                    align: 'left',
                    valign: 'top',
                    sortable: true,
                   
                },{
                    
                    field: 'ruang',
                    title: 'Ruang',
                    align: 'left',
                    valign: 'top',
                    sortable: true,
                   
                }]
            }); 
</script>  
<!-- /CONTENT -->