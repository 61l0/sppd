
<div class="modal fade" id="modal_view_surat" tabindex="-1" role="dialog" aria-labelledby="modal_konfirmLabel" aria-hidden="true">
	    <div class="modal-dialog modal-lg" style="width:80%;">
	        <div class="modal-content">
	          <div class="modal-header" style="border:none;padding:0px;padding-right:10px;padding-top:4px;">
	                 <img id="loader-modal-surat" style="padding-left:10px;" height="19px" src="<?php echo base_url(); ?>assets/img/loader_modal_surat.gif">
	                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="empty();">&times;</button>

	           	<!--      <button id="cetak-surat" class="btn btn-success">Print</button>
	                <button type="button" id="cetak" onclick="javascript:demoFromHTML();" class="btn btn-success">Print PDF</button>
	                 <h3 class="modal-title" id=""></h3>-->
	            </div>
	            <div class="modal-body" id="konten-modal">
	                 
	            </div>
	        </div>
	        <!-- /.modal-content -->
	    </div>
	    <!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->      
<script type="text/javascript">
	$('loader-modal-surat').hide();
</script>
