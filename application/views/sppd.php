<style type="text/css">
	#table-sppd{
		font-size: 11px;
	}

</style>
<script type="text/javascript">
	
</script>
<?php //include("dateID.php");include("modal-print-sppd.php"); ?>
<div class="col-sm-12" style="border-bottom:1px #EEEEEE solid;">
	<h4>Daftar Surat Perintah Perjalanan Dinas</h4>
</div>
<hr></BR>
<div class="col-sm-12">
	<a href="<?php echo base_url(); ?>surat/baru" class="btn btn-primary" id="btn-tambah-sppd"><i class="fa fa-plus-square-o"></i>&nbsp Tambah Data</a>
</div>
	
    <table id="table-sppd"></table>

	<?php echo $del_confirm_surat.$modal_view_surat; ?>
	<div id="box"></div>
	<script type="text/javascript">
            $("#load-surat").hide();		
		    window.operateEvents = {
		        'click .print': function (e, value, row, index) {
		        	//alert(row.no_surat);
		           	$('#konten-modal').empty();
		            $.ajax({
                        url: "<?php echo base_url(); ?>surat/view/sppd/"+row.no_surat,
                        timeout: 5000,
                        beforeSend: function(){
                            $('#modal_view_surat').modal({
                                backdrop: 'static',
                                keyboard: false
                            });                            
                            $("#loader-surat1").show();
                            //$("#konten-modal").html('Memuat surat...');
                        },
                        success: function(data) {
                            
                            $("#konten-modal").html(data);
                            $("#loader-surat1").hide();
                            //$("#load-surat").empty();
                        },
                        error: function(){
                            $("#konten-modal").html('Gagal memuat surat, cek koneksi ...'); 
                            $("#loader-surat1").hide();                       
                        }
                    });             
		        },
		        'click .edit': function (e, value, row, index) {
		            alert('You click edit icon, row: ' + JSON.stringify(row));
		            console.log(value, row, index);
		        },
		        'click .remove': function (e, value, row, index) {
		            //alert('You click remove icon, row: ' + JSON.stringify(row));
		            //console.log(value, row, index);
		            $('#mod_no_surat').html(row.no_surat);
		            $('#modal_konfirm').data('no_surat', row.no_surat).modal('show');
		        }
		    };


		$(document).ready(function(){
           // var kd_skpd = "";
            $('#table-sppd').bootstrapTable({
                method: 'get',
                url: '<?php echo base_url();?>surat/get_json/sppd/<?php echo $this->session->userdata("kode_skpd"); ?>',
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
                showToggle:true,
                //sidePagination: 'server',
               
                columns: [{
                    field: 'no_surat',
                    title: 'No surat',
                    align: 'left',
                    valign: 'top',
                    sortable: true,
                    class: 'b'
                }, {
                    field: 'pegawai',
                    title: 'Pegawai',
                    width:150,
                    align: 'left',
                    valign: 'top',
                    sortable: true//,
                    //formatter: nameFormatter
                },{ 
                    field: 'pengikut',
                    title: 'Pengikut',
                    width:150,
                    align: 'left',
                    valign: 'top',
                    sortable: true//,
                    //formatter: nameFormatter
                },{
                    field: 'perjalanan',
                    title: 'Perjalanan',
                    align: 'left',
                    valign: 'top',
                    sortable: true,
                    //formatter: priceFormatter,
                    //sorter: priceSorter
                }, {
                    field: 'transportasi',
                    title: 'Transportasi',
                    align: 'left',
                    valign: 'top',
                    sortable: true,
                    //formatter: priceFormatter,
                    //sorter: priceSorter
                },{
                    field: 'waktu_perjalanan',
                    title: 'Waktu Perjalanan',
                    align: 'left',
                    valign: 'top',
                    sortable: true
                },{
                    field: 'maksud_perjalanan',
                    title: 'Maksud Perjalanan',
                    align: 'left',
                    valign: 'top',
                    sortable: true
                },{
                    field: 'atas_beban',
                    title: 'Atas Beban',
                    align: 'left',
                    valign: 'top',
                    sortable: true
                },{
                    field: 'pasal_anggaran',
                    title: 'Pasal Anggaran',
                    align: 'left',
                    valign: 'top',
                    sortable: true
                },{
                    field: 'keterangan',
                    title: 'Keterangan',
                    align: 'left',
                    valign: 'top',
                    sortable: true
                },{
                    field: 'pejabat',
                    title: 'Pejabat',
                    align: 'left',
                    valign: 'top',
                    sortable: true
                },{
                    field: 'operate',
                    title: 'Operasi',
                    align: 'center',
                    valign: 'top',
                    clickToSelect: false,
              	 formatter: operateFormatter,
                    events: operateEvents
                }]
            });
		function operateFormatter(value, row, index) {
        return [
            '<a class="btn btn-primary print" style="width:60px;" href="javascript:void(0)" title="print preview">',
                '<i class="glyphicon glyphicon-print"></i>',
            '&nbsp;</a>',
            '<a class=" btn btn-danger remove" style="width:60px;" href="javascript:void(0)" title="Remove">',
                '<i class="glyphicon glyphicon-trash"></i>',
            '</a>'
        ].join('');
    }
   	$(function () {
        $("#loader-btnsimpansuratbaru").hide();
	    $('#btnDeleteYes').click(function () {	    	
	        var no_surat = $('#modal_konfirm').data('no_surat');
	        //alert("deleteing"+no_surat);
            $.ajax({
            	type:"POST",
            	data:{"par_no_surat":no_surat},
            	url:"<?php echo base_url(); ?>surat/delete",
            	beforeSend:function(){
                    $("#btnDeleteYes").prop("disabled",true); 
                    $("#loader-btnsimpansuratbaru").show();
            	},
            	success:function(rs){
                    $("#btnDeleteYes").prop("disabled",false);
                    $("#loader-btnsimpansuratbaru").hide();
            		$('#modal_konfirm').modal('hide');
            		$('#table-sppd').bootstrapTable('refresh');
            		$('#box').html(rs);
            		
            	},
            	error:function(){
            		//$('#modal_konfirm').modal('hide');
                    $("#btnDeleteYes").prop("disabled",false);
                    $("#loader-btnsimpansuratbaru").hide();
            		new PNotify({
				    title: '',
				    text: '<i class=\"fa fa-frown-o\"></i> Gagal menghapuus surat.',
				    type: 'error',
                    shadow: false,
                    icon: false
					});
            	}
            });

	        
	    });
	});

});
</script>