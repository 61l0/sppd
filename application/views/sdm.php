<style type="text/css">
	.table-hover{
		font-size: 12px;
	}
	td{
		width:auto;
	}
	.table {
    /*table-layout:auto;*/
    max-width:100%;
}

</style>
<script type="text/javascript">
    
</script>
<div class="col-sm-12" style="border-bottom:1px #EEEEEE solid;">
	<h4>Daftar SDM atau pegawai <?php echo $this->session->userdata('nama_skpd'); ?></h4>
</div>
<hr></BR>

<table id="table-sdm"></table>
<?php echo $tambah_sdm.$edit_sdm.$del_confirm_sdm; ?>
<script type="text/javascript">    
    window.operateEvents = {
        'click .edit': function (e, value, row, index) {
            var kode_jabatan;
            $.ajax({
                type:"GET",
                url:"<?php echo base_url(); ?>sdm/get_sdm/kd_sdm/"+row.kd_sdm,
                dataType:"json",
                success:function(rs){
                    $.each(rs, function(i, row){
                        $("#edit-kdsdm").val(row.kd_sdm);
                        $("#edit-nip").val(row.nip);
                        $("#edit-nama").val(row.nama);
                        $("#edit-pangkat").val(row.nama_pangkat+" "+row.golongan+" "+row.ruang+" ");
                        $("#edit-jabatan").val(row.nama_jabatan);                        
                    });
                }
            });
            
            $('#modal-edit-sdm').modal({
                backdrop: 'static',
                keyboard: false
            });
        }
    };
	$(document).ready(function(){
            $('#table-sdm').bootstrapTable({
                method: 'get',
                url: "<?php echo base_url();?>sdm/get_sdm/skpd/<?php echo $this->session->userdata('kode_skpd');?>",
                cache: false,
                //height: ,
                striped: true,
                pagination: true,
                pageSize: 10,
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
                onDblClickRow: function (row) {
                    alert(row.kodepegawai);
                    //alert('Event: onDblClickRow, data: ' + JSON.stringify(row));
                    window.location("<?php echo base_url(); ?>")
                },
                columns: [{
                    visible:false,
                    field: 'kd_sdm',
                    title: 'Kode Pegawai',
                    align: 'left',
                    valign: 'top',
                    sortable: true,
                    class: 'b'
                }, {
                    field: 'nip',
                    title: 'NIP',
                    align: 'left',
                    valign: 'middle',
                    sortable: true//,
                    //formatter: nameFormatter
                }, {
                    field: 'nama',
                    title: 'Nama',
                    align: 'left',
                    valign: 'top',
                    sortable: true,
                    //formatter: priceFormatter,
                    //sorter: priceSorter
                }, {
                    field: 'nama_jabatan',
                    title: 'Jabatan',
                    align: 'left',
                    valign: 'top',
                    sortable: true,
                    //formatter: priceFormatter,
                    //sorter: priceSorter
                },{
                    field: 'nama_pangkat',
                    title: 'Pangkat',
                    align: 'left',
                    valign: 'top',
                    sortable: true
                },{
                    field: 'golongan',
                    title: 'Golongan',
                    align: 'left',
                    valign: 'top',
                    sortable: true
                },{
                    field: 'ruang',
                    title: 'Ruang',
                    align: 'left',
                    valign: 'top',
                    sortable: true
                },{
                    field: 'operate',
                    title: 'Item Operate',
                    align: 'center',
                    valign: 'top',
                    clickToSelect: false,
              	 formatter: operateFormatter,
                    events: operateEvents
                }]
            });
		function operateFormatter(value, row, index) {
        return [
            '<a class="btn btn-primary edit" style="font-size:12px;padding-top:3px;padding-bottom:3px;" href="javascript:void(0)" title="Edit">&nbsp;',
                '<i class="fa fa-pencil-square-o"></i>',
            '&nbsp;</a>'
        ].join('');
    }
});
</script>