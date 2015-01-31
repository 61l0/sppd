
	<style type="text/css">
		.popover{
		    max-width:600px;
		        
		}
		label{
			font-weight: normal;
		}
		readonly{
			background-color: red;
		}
		#tbl-sdm tr:hover {
		    cursor: pointer;
		}
		#tbl-sdm tr {
		    -webkit-touch-callout: none;
		    -webkit-user-select: none;
		    -khtml-user-select: none;
		    -moz-user-select: none;
		    -ms-user-select: none;
		    user-select: none;
		    title
		}

	</style>
	<script type="text/javascript">
		var index=1;
		var kondisi="";
       	function loadModal(id){

    		kondisi="";
    		if (id==1) {
    			kondisi="";
    		};    		
    		for(j=1;j<=index;j++){
    			if(j!=id){
    				kondisi=kondisi+$("#input-sel-kd_sdm"+j).val()+"_";
    			}
    		}
    		//alert(kondisi);
        	var id_kd_sdm = "#input-sel-kd_sdm"+id;
        	var data_sdm = "#input"+id;
			 $("#tbl-sdm").bootstrapTable('refresh', {
                    url: '<?php echo base_url() ?>sdm/get_json/'+kondisi
      		});
			$('#modal-sdm').data({'id':id_kd_sdm,'data':data_sdm}).modal('show'); //ini nini	

	}
	//format uang
	function formatCurrency(num) {
		num = num.toString().replace(/\$|\,/g,'');
		if(isNaN(num))
		num = "0";
		sign = (num == (num = Math.abs(num)));
		num = Math.floor(num*100+0.50000000001);
		cents = num%100;
		num = Math.floor(num/100).toString();
		if(cents<10)
		cents = "0" + cents;
		for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
		num = num.substring(0,num.length-(4*i+3))+'.'+
		num.substring(num.length-(4*i+3));
		return (((sign)?'':'-') + 'Rp' + num + ',' + cents);
	}			
</script>
	<form class="form-horizontal" role="form" id="form-surat-baru">
	  	<div class="form-group">
		  	<div class="col-sm-12" style="border-bottom:1px #EEEEEE solid;">
		  		<h4>Surat Baru </h4>
		  	</div>
	  	</div>

	  	<div class="form-group">
		    <label for="inputNoSurat" class="col-sm-3 control-label">No Surat</label>
		    <div class="col-sm-1">
		      	<input align="right" type="text" class="form-control" id="nosurat1" value="094/" placeholder="" style="border-top-right-radius:0px;border-bottom-right-radius:0px;"readonly>
		    </div>
		    <div class="col-sm-1" style="margin-left:-30px;">
		      	<input type="number" min="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" id="nosurat2" name="nosurat2" placeholder="" style="border-top-right-radius:0px;border-bottom-right-radius:0px;border-left:none;border-top-left-radius:0px;border-bottom-left-radius:0px;">
		    </div>
		    <div class="col-sm-2" style="margin-left:-30px;">
		      	<input type="text" class="form-control" id="nosurat3" value=<?php echo "/".$this->session->userdata('kode_skpd')."/".date('Y'); ?> placeholder="" style="border-left:none;border-top-left-radius:0px;border-bottom-left-radius:0px;"readonly>
		    </div>

	  	</div>
<!-- inini -->
		<span id="group">
			<div  class="form-group">
				<div class="col-sm-3 control-label">Pegawai</div>
				<div id="div1" class="col-sm-8">
					<div class="col-sm-11" style="padding-left:0px;adding-right:0px;margin-right:0px;" align="right">
						<input class="form-control hidden input-pegawai" name="nomor[]" autocomplete="off" type="text" id="input-sel-kd_sdm1" readonly/>	
						<input onclick="loadModal(1)" class="form-control input-pegawai" autocomplete="off" type="text" id="input1" readonly="" style="cursor: pointer;padding-right:0px;background-color:transparent;" />	

					</div>
					<div class="col-sm-1">
						<button class="btn btn-primary" id="pilih1" type="button"  onclick="loadModal(1)"><span class="glyphicon glyphicon-list"></span></button>					
					</div>
				</div>
			</div>			
		</span>
		<div class="form-group">
	  		<label  class="col-sm-3 control-label"></label>
		    <div class="col-sm-8" align="right">
				<button class="btn btn-primary btn-sm" type="button" id="tambah"><span class="glyphicon glyphicon-plus"></span> tambah pengikut</button>
				<button class="btn btn-primary btn-sm" type="button" id="hapus" ><span class="glyphicon glyphicon-minus"></span> hapus pengikut</button>
		    </div>
		</div>
	  	<div class="form-group">
	  		<label  class="col-sm-3 control-label">Jenis surat</label>
		    <div class="col-sm-8">
			    <div class="radio">
					<label>
					    <input type="radio" name="optionsRadios" id="optionsRadios1" value="1">
					    Pakai Surat Dasar (Surat berdasarkan surat balasan).
				  	</label>
				</div>
				<div class="radio">
				  	<label>
					    <input type="radio" name="optionsRadios" id="optionsRadios2" value="2">
					    Tidak memakai Surat Dasar (Diisi sebagai pembuka surat).
				  	</label>
				</div>
				
			</div>
		</div>
		<div class="form-group">
		    <label class="col-sm-3 control-label"></label>
		    <div class="col-sm-8">
		    		<textarea class="form-control" id="inputdasar" name="inputdasar" readonly></textarea>	      	
		    </div>
	  	</div>
	  	<div class="form-group">
		    <label  class="col-sm-3 control-label">Pejabat pemberi perintah</label>		    
	    	<div class="col-sm-8">
	    		<input name="inputPejabatPerintah"  type="text" class="form-control" id="inputPejabatPerintah" placeholder="" readonly="" value="<?php
	    			$kode_skpd = $this->session->userdata('kode_skpd');
	    			if ($kode_skpd>='421.010'&&$kode_skpd<='421.060') {
	    				echo 'SEKRETARIS DAERAH';
	    			}else{
	    				echo 'Kepala '.$this->session->userdata('nama_skpd');
	    			}
	    		 ?>">	
	    	</div>
	  	</div>
	  	<div class="form-group">
		    <label  class="col-sm-3 control-label"></label>		    
		  	<div class="col-sm-2">
	    		<p align="right">yg bertanda-tangan</p>	
	    	</div>
	    	<div class="col-sm-6">
	    		<select id="selectPejabatPerintah" name="selectPejabatPerintah" class="form-control"></select>
	    	</div>
	  	</div>

	  	<div class="form-group">
		    <label for="inputMaksud" class="col-sm-3 control-label">Untuk</label>
		    <div class="col-sm-8">
		    	<textarea type="text" class="form-control" id="inputMaksud" name="inputMaksud" placeholder=""></textarea>		      	
		    </div>
	  	</div>

	  	<div class="form-group">
		  	<div class="col-sm-12">
		  		<h5>Keperluan surat perjalanan dinas</h5>
		  	</div>
	  	</div>
	  	
	  	<div class="form-group">
		    <label  class="col-sm-3 control-label" for="inputDariKota">Perjalanan </label>
		    <div class="col-sm-4">
		      	<input type="text" class="form-control" id="inputDariKota" name="inputDariKota" placeholder="Dari kota" value="Malang">
		    </div>		    
		    <div class="col-sm-4">
		      	<input type="text" class="form-control" id="inputKeKota" name="inputKeKota" placeholder="Ke kota">
		    </div>
	  	</div>

	  	<div class="form-group">
		    <label  class="col-sm-3 control-label" for="inputAngkutan">Angkutan Perjalanan </label>
		    <div class="col-sm-8">
		      	<input type="text" class="form-control" name="inputAngkutan" id="inputAngkutan" placeholder="">
		    </div>
	  	</div>

	  	<div class="form-group">
			<label class="col-sm-3 control-label" for="">Tanggal</label> 
			<div class="col-sm-4">
				<input class="form-control" type="text" id="datepickerTglBerangkat" name="datepickerTglBerangkat" placeholder="Berangkat" style="cursor: pointer;background-color:transparent;" readonly="">
			</div>
			<div class="col-sm-4">
				<input class="form-control " type="text" id="datepickerTglKembali" name="datepickerTglKembali" style="cursor: pointer;background-color:transparent;" placeholder="Kembali" readonly="">
			</div>
		</div>	
	  	<div class="form-group">
			<label class="col-sm-3 control-label" for="">Perhitungan biaya perjalanan</label> 
			<p class="col-sm-2" for="">Atas Beban</p> 
			<div class="col-sm-6">
				<input class="form-control" value="-" type="text" id="inputAtasBeban" name="inputAtasBeban" placeholder="Atas beban">
			</div>
		</div>
		<div class="form-group">
			<span class="col-sm-3" for=""></span> 
			<p class="col-sm-2" for="">Pasal Anggaran</p> 
			<div class="col-sm-6">
				<input class="form-control " value="-" type="text" id="inputPasalAnggaran" name="inputPasalAnggaran" placeholder="Pasal anggaran">
			</div>
		</div>
		<div class="form-group">
		    <label  class="col-sm-3 control-label">Keterangan </label>
		    <div class="col-sm-8">
		      	<input type="text" class="form-control" id="inputKet" value="-" placeholder="">
		    </div>
	  	</div>
	  	<div class="form-group">
		    <label  class="col-sm-3 control-label">Uang Saku per Pegawai </label>
		    <div class="col-sm-4">
		      	<input type="number" class="form-control" id="uang-saku" name="uang_saku" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onchange="$('#uang-review').val(formatCurrency($(this).val()));" onkeyup="$('#uang-review').val(formatCurrency($(this).val()));" placeholder="">
		    </div>
		    <div class="col-sm-3" style="margin-left:-30px;">
		    	<input id="uang-review" style="color:green;" class="form-control" value="Rp.0,00" readonly="" />		    	
		    </div>
	  	</div>
	  	<div class="form-group">
		    <label  class="col-sm-3 control-label">PPTK </label>
		    <div class="col-sm-8">
		      	<select id="pptk"></select>
		    </div>
	  	</div>
	    <div class="form-group">
		    <label  class="col-sm-3 control-label">Bendahara Pengeluaran </label>
		    <div class="col-sm-8">
		      	<select id="bendahara_pengeluaran"></select>
		    </div>
	  	</div>		
		<div class="form-group">
			<div class="col-sm-3"></div>
			<div class="col-sm-8" align="right">
				<button type="button" class="btn btn-primary btn-lg" id="btn-simpansuratbaru"><span id="loader-btnsimpansuratbaru"><img width="20px" height="20px" src="<?php echo base_url(); ?>assets/img/ajax-loading.gif"/>&nbsp&nbsp&nbsp</span><span class="fa fa-floppy-o"></span> Simpan</button>			
			</div>
		</div>
	</form>
	<div class="modal fade" id="modal-sdm" tabindex="-1" role="dialog" aria-labelledby="modal_konfirmLabel" aria-hidden="true">
	    <div class="modal-dialog modal-lg">
	        <div class="modal-content" >
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="empty();">&times;</button>
	            </div>
	            <div class="modal-body">
	            		<p>Data pegawai <?php echo $this->session->userdata('nama_skpd'); ?> yang bisa membuat surat SPPD hari ini :</p>
	                	<table data-toggle="table" id="tbl-sdm" data-cache="false" data-height="299">
						    <thead>
						        <tr>
						            <th data-field="kodepegawai" class="hidden">Kode Pegawai</th>
						            <th data-field="nip">NIP</th>
						            <th data-field="nama">Nama</th>
						            <th data-field="jabatan">Jabatan</th>
						            <th data-field="pangkat">Pangkat</th>
						            <th data-field="golongan">Golongan</th>
						            <th data-field="ruang">Ruang</th>
						        </tr>
						    </thead>
						</table>
						<p align="right" style="font-size:11px;color:red;">*pilih pegawai dengan cara double click</p>
						 
	            </div>	        
	        </div>
	    </div>
	</div>
	<?php echo $modal_view_surat; ?>
	<div id="box"></div>
	<script type="text/javascript">
		var maxPengikut = 3;
		var i=2;
		$("#loading").hide();
		$("#loader-btnsimpansuratbaru").hide();
	  	var kode_skpd = "<?php echo $this->session->userdata('kode_skpd'); ?>";
	  	maxPengikut = maxPengikut+1;

	  	var $select_pptk, select_pptk, xhr;
	     $select_pptk = $('#pptk').selectize({
	          valueField: 'kd_sdm',
	          labelField: 'nama_nip',
	          searchField: ['nama_nip'],
	          dataAttr: 'data-data',			
	      });
	      select_pptk  = $select_pptk[0].selectize;


	     var $select_bend_peng, select_bend_peng, xhr1;
	     $select_bend_peng = $('#bendahara_pengeluaran').selectize({
	          valueField: 'kd_sdm',
	          labelField: 'nama_nip',
	          searchField: ['nama_nip'],
	          dataAttr: 'data-data',
	      });
	      select_bend_peng  = $select_bend_peng[0].selectize;
	  	$(document).ready(function() {
	  		/////////////
			select_pptk.clearOptions();
            select_pptk.load(function(callback) {
                xhr && xhr.abort();
                xhr = $.ajax({
                 url:"<?php echo base_url(); ?>sdm/sel_sdm/"+kode_skpd,
                // url:"localhost/pkl4/jsonjabatan.php",
                  //data:{'par_input':'getJabatan'},
                  //:"POST",
                  dataType:"json",
                  success: function(results) {
                        //alert(results);
                      callback(results);
                      //alert(kode_jabatan);
                      //select_skpd.setValue(kode_jabatan);      
                },
                  error: function(rs) {
                      //alert(rs);
                      callback();
                  }
                });
            });

            select_bend_peng.clearOptions();
            select_bend_peng.load(function(callback) {
                xhr1 && xhr1.abort();
                xhr = $.ajax({
                 url:"<?php echo base_url(); ?>sdm/sel_sdm/"+kode_skpd,
                // url:"localhost/pkl4/jsonjabatan.php",
                  //data:{'par_input':'getJabatan'},
                  //:"POST",
                  dataType:"json",
                  success: function(results) {
                        //alert(results);
                      callback(results);
                      //alert(kode_jabatan);
                      //select_skpd.setValue(kode_jabatan);      
                },
                  error: function(rs) {
                      //alert(rs);
                      callback();
                  }
                });
            });


			$.datepicker.setDefaults( $.datepicker.regional[ "id" ] );
			$.datepicker.setDefaults( {dateFormat:"dd MM yy",minDate: 0,dayNamesMin: [ "Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab" ]});
			$( "#datepickerTglKembali").datepicker();
			$( "#datepickerTglBerangkat").datepicker({
				onSelect: function (dateText, inst) {
		            var date = $.datepicker.parseDate($.datepicker._defaults.dateFormat, dateText);
		            $("#datepickerTglKembali").datepicker("option", "minDate", date)
		            // the following is optional
		            //$("#endDate").datepicker("setDate", date);
		        }
			});
			
		    

            //handle auto complete  

			$( "#inputsdm" ).focus(function() {
			  	$( this ).next( "#inputsdm" ).css( "display", "inline" ).fadeOut( 1000 );
			  	var tipe = $("#tipe").find('option:selected').val();
		      	$( "#inputsdm" ).autocomplete({
			      	source: "http://localhost/pkl_ci/sdm/auto_complete/"+kode_skpd+"/"+tipe,
			      	minLength: 2
		      
		      	});
			});			
  		});//END doc ready f

	  	//auto complete
  		$(function() {
  			$('.ui-autocomplete-input').css('font-size', '10px');
		    var angkutan = [
			    "Kereta Api",
			    "Mobil",
			    "Sepeda Motor",
			    "Pesawat",
			    "Kapal",
			    "Bus Umum"		      
		    ];
		    var pejabat =[
		    	"SEKRETARIS DAERAH"
		    ];
		    $( "#inputAngkutan" ).autocomplete({
		      source: angkutan
		    });

		    $( "#inputPejabatPerintah" ).autocomplete({
		      source: pejabat
		    });
		});
		//end auto complete

		//popover + tooltip
		$('#nosurat2').tooltip({'trigger':'focus', 'title': 'No surat berdasarkan buku agenda'});
		$('#inputMaksud').popover({'trigger':'focus','placement':'auto','title':'Contoh penulisan :', 'content': 'Menghadiri Rapat Sosialisasi bagi para Camat di 60 Kecamatan se-Jawa Timur yang diselenggarakan pada hari Rabu, tanggal 18 April 2015 pukul 09.00 WIB - selesai bertempat di Hotel Satelit Surabaya, Jl. Mayjen. Sungkono no. 139, Surabaya.'});
		$('#inputdasar').popover({'trigger':'focus','placement':'auto','title':'Contoh penulisan :', 'content':'Silahkan pilih tipe surat dulu'});
	
		$("input[name='optionsRadios']").on("change", function () {
		    //alert(this.value);
		    $("#inputdasar").attr("readonly", false);
		    var val = this.value;
		    if (val==1) {
		    	$("#inputdasar").attr({
		    		'placeholder': 'Masukkan dasar surat disini:',
		    		'data-original-title':'Contoh penulisan Dasar Surat :',
		    		'data-content': 'Surat Sekretaris Daerah Provinsi Jawa Timur tanggal 10 April 2014 nomor: 079/1229/105/2014 perihal: Sosialisasi Internet (Speedy) Kecamatan se-Jatim, dengan ini:'
		    	});
		    }else if(val==2){
		    	$("#inputdasar").attr({
		    		'placeholder': 'Masukkan pembuka surat disini:',
		    		'data-original-title':'Contoh penulisan Pembuka Surat :',
		    		'data-content':'Kepala Bagian Pengelola Data Elektronik Sekretariat Daerah Kabupaten Malang membaca dan memperhatikan surat Direktur Keamanan Informasi Direktorat Jenderal Aplikasi Informatika Kementerian Komunikasi dan Informatika RI tanggal 2 April 2014 nomor: 192/DJAI.6/KOMINFO/04/2014 Perihal: Undangan Bimbingan Teknis Indeks Keamanan Informasi, dengan ini:'
		    	});
		    }
		    
		});
		//end popover + tooltip
		//pengikut
		$("#tambah").click(function(){
			//alert("click");
			if(i>maxPengikut){
				//$("#tambah").addClass("disabled");
				alert("Batas pengikut maksimal "+(maxPengikut-1)+" orang.");
				return false;
			}
			if(index<maxPengikut){
				//$("#tambah").removeClass("disabled");
				$("#hapus").removeClass("disabled");
				index++;				
			}
			var div = $(document.createElement('div'))
						.attr('id','div'+i);
			div.after()			
			.html('<div  class="form-group">'
				+'<div class="col-sm-3 control-label"></div>'
				+'<div id="div1" class="col-sm-8">'
					+'<div class="col-sm-2 control-label">pengikut '+(i-1)+'</div>'
					+'<div class="col-sm-9" style="padding-left:0px;">'
						+'<input class="form-control hidden input-pegawai" name="nomor[]" type="text" autocomplete="off" id="input-sel-kd_sdm'+i+'" readonly=""/>'
						+'<input class="form-control input-pegawai" type="text"'+i+'" onclick="loadModal('+i+')" autocomplete="off" id="input'+i+'"style="cursor: pointer;background-color:transparent;" readonly/>'	
					+'</div>'
					+'<div class="col-sm-1">'
						+'<button class="btn btn-primary" type="button" id="pilih'+i+'" onclick="loadModal('+i+')">...</button>'					
					+'</div>'
				+'</div>'
			+'</div>');
			div.appendTo("#group");
			i++;	
		});

		$("#hapus").click(function(){
			//alert("click");
			if (i==2) {				
				return false;
			}
			if(index>1){
				index--;
			}
			i--;
			if(i==2){
				$("#hapus").addClass("disabled");
			}
			$("#div"+i).remove();
		});
		//END pengikut

		//SET TABLE
		$("#tbl-sdm").bootstrapTable({
			search: true,
            showColumns: true,
            minimumCountColumns: 2,
			clickToSelect: true
		});

		//DOUBLE KLIK PILIH SDM
		$("#tbl-sdm").bootstrapTable().on('dbl-click-row.bs.table', function (e, row, $element) {
                var id =$("#modal-sdm").data('id');
                var data =$("#modal-sdm").data('data');
                $(id).val(row.kodepegawai);
                $(data).val(row.nama+' | '+row.golongan+' '+row.ruang+' | '+row.jabatan+' <?php echo $this->session->userdata("nama_skpd"); ?>');
                $("#modal-sdm").modal('hide');
                ///////
                if (id=="#input-sel-kd_sdm1") {
				    var jabatan = row.jabatan;
				    	jabatan = jabatan.trim();
				    	
				   	$("#selectPejabatPerintah").empty();
	                
	                	//alert("kepala"+kode_skpd);
	                if(kode_skpd>="421.011" && kode_skpd<="421.042"){//menampilkan semua assiten sekda,karena kalo sdm kepala skpd bagian yg tanda tangan bisa semua asisten 
	                		//alert('iya');
	                		par_jabatan = jabatan.search("Kepala");
	                		if (par_jabatan!=-1) {
		                		$.ajax({
			                			type:"post",
			                			url:"<?php echo base_url(); ?>sdm/get_ttd/asisten",
			                			dataType:"json",
			                			success:function(rs){
			                				//clear combo jabatan + load
			                				//alert(rs);
			                				$('#selectPejabatPerintah').append("<option value='-'>--pilih asisten--</option>");
			                				$.each(rs, function(i, row){
							             		$('#selectPejabatPerintah')
										         .append($("<option></option>")
										         .attr("value",row.kd_sdm)
										         .text(row.nama_jabatan+", "+row.nama)); 
											});	             
							                $("#inputPejabatPerintah").val("SEKRETARIS DAERAH");
			                			}
			                		});
	                		}else{
			            //alert("else");
			            		$("#inputPejabatPerintah").val("<?php echo 'Kepala '.$this->session->userdata('nama_skpd'); ?>");
			                	$.ajax({
		                			type:"post",
		                			url:"<?php echo base_url(); ?>sdm/get_ttd/kepala/"+kode_skpd,
		                			dataType:"json",
		                			success:function(rs){
		                				//clear combo jabatan + load
		                				$.each(rs, function(i, row){
						             		$('#selectPejabatPerintah')
									         .append($("<option></option>")
									         .attr("value",row.kd_sdm)
									         .text(row.nama_jabatan+" "+"<?php echo $this->session->userdata('nama_skpd'); ?>"+", "+row.nama)); 
										});	             
						                
		                			}
		                		});
			        		}
			        }else if (kode_skpd=='421.060') {
			        	//alert('hahaskere');
			        	par_jabatan = jabatan.search("Sekretaris");
			        	if (par_jabatan!=-1) {//jika jabatan sekretaris
			        		$.ajax({
		            			type:"post",
		            			url:"<?php echo base_url(); ?>sdm/get_ttd/bupati/",
		            			dataType:"json",
		            			success:function(rs){
		            				//clear combo jabatan + load
		            				$.each(rs, function(i, row){
					             		$('#selectPejabatPerintah')
								         .append($("<option></option>")
								         .attr("value",row.kd_sdm)
								         .text(row.nama_jabatan+", "+row.nama)); 
									});	             
					                
		            			}
			                });
			        	}else{
			        		alert('hahaskere');
			        		$.ajax({
		            			type:"post",
		            			url:"<?php echo base_url(); ?>sdm/get_ttd/Sekretaris/"+kode_skpd,
		            			dataType:"json",
		            			success:function(rs){
		            				//clear combo jabatan + load
		            				$.each(rs, function(i, row){
					             		$('#selectPejabatPerintah')
								         .append($("<option></option>")
								         .attr("value",row.kd_sdm)
								         .text(row.nama_jabatan+" "+"<?php echo $this->session->userdata('nama_skpd'); ?>"+", "+row.nama)); 
									});	             
					                
		            			}
			                });

			        	}
			        	
			        }else{
			        	par_jabatan = jabatan.search("Kepala");
			        	if (par_jabatan!=-1) {//jika jabatan sekretaris
			        		$.ajax({
		            			type:"post",
		            			url:"<?php echo base_url(); ?>sdm/get_ttd/bupati/",
		            			dataType:"json",
		            			success:function(rs){
		            				//clear combo jabatan + load
		            				$.each(rs, function(i, row){
					             		$('#selectPejabatPerintah')
								         .append($("<option></option>")
								         .attr("value",row.kd_sdm)
								         .text(row.nama_jabatan+", "+row.nama)); 
									});	             
					                
		            			}
			                });
			        	}else{
			        		//alert('aaa');
			        		$.ajax({
		            			type:"post",
		            			url:"<?php echo base_url(); ?>sdm/get_ttd/kepala/"+kode_skpd,
		            			dataType:"json",
		            			success:function(rs){
		            				//clear combo jabatan + load
		            				$.each(rs, function(i, row){
					             		$('#selectPejabatPerintah')
								         .append($("<option></option>")
								         .attr("value",row.kd_sdm)
								         .text(row.nama_jabatan+" "+"<?php echo $this->session->userdata('nama_skpd'); ?>"+", "+row.nama)); 
									});	             
					                
		            			}
			                });

			        	}
			        }
			    
					            
        }


                /*	backupan if (kode_skpd=="421.011"||kode_skpd=="421.012"||kode_skpd=="421.013"||kode_skpd=="421.014") {
		                		//asisten pemerintah
		                		//alert("pemerinta");
		                		$.ajax({
		                			type:"post",
		                			url:"<?php echo base_url(); ?>sdm/get_ttd/asisten pemerintah",
		                			dataType:"json",
		                			success:function(rs){
		                				//clear combo jabatan + load
		                				//alert(rs);
		                				$.each(rs, function(i, row){
						             		$('#selectPejabatPerintah')
									         .append($("<option></option>")
									         .attr("value",row.kd_sdm)
									         .text(row.nama_jabatan+", "+row.nama)); 
										});	             
						                
		                			}
		                		});
		                	}else if (kode_skpd=="421.021"||kode_skpd=="421.022"||kode_skpd=="421.023"||kode_skpd=="421.024") {
		                		//asisten perekonomian
		                		$.ajax({
		                			type:"post",
		                			url:"<?php echo base_url(); ?>sdm/get_ttd/asisten perekonomian",
		                			dataType:"json",
		                			success:function(rs){
		                				//clear combo jabatan + load
		                				$.each(rs, function(i, row){
						             		$('#selectPejabatPerintah')
									         .append($("<option></option>")
									         .attr("value",row.kd_sdm)
									         .text(row.nama_jabatan+", "+row.nama)); 
										});	             
						                
		                			}
		                		});
		                	}else if (kode_skpd=="421.031"||kode_skpd=="421.032"||kode_skpd=="421.034"||kode_skpd=="421.034") {
		                		//asisten administrasi
		                		$.ajax({
		                			type:"post",
		                			url:"<?php echo base_url(); ?>sdm/get_ttd/asisten administrasi",
		                			dataType:"json",
		                			success:function(rs){
		                				//clear combo jabatan + load
		                				$.each(rs, function(i, row){
						             		$('#selectPejabatPerintah')
									         .append($("<option></option>")
									         .attr("value",row.kd_sdm)
									         .text(row.nama_jabatan+", "+row.nama)); 
										});	             
						                
		                			}
		                		});
		                	}else if (kode_skpd=="421.041"||kode_skpd=="421.042") {
		                		//asisten kesejahteraan
		                		$.ajax({
		                			type:"post",
		                			url:"<?php echo base_url(); ?>sdm/get_ttd/asisten kesejahteraan",
		                			dataType:"json",
		                			success:function(rs){
		                				//clear combo jabatan + load
		                				$.each(rs, function(i, row){
						             		$('#selectPejabatPerintah')
									         .append($("<option></option>")
									         .attr("value",row.kd_sdm)
									         .text(row.nama_jabatan+", "+row.nama)); 
										});	             
						                
		                			}
		                		});
		                	}*/
        });

//SIMPAN SURAT BARU
	$("body").on("click","#btn-simpansuratbaru",function(){
			//alert(kondisi);
        	var nosurat = $("#nosurat1").val()+$("#nosurat2").val()+$("#nosurat3").val(); 
        	//alert(nosurat);
        	//COBA Get sdm
        	var pegawai = $("#input-sel-kd_sdm1").val();//kodesdm
        	//var jumPengikut=0;
			var pengikut = $("input[name='nomor\\[\\]']")
	              .map(function(i){
	              	if(i>0){
	              		return $(this).val();		
	              	}
	              }).get();
          	var pengikutLenght=maxPengikut;          	
          	if(pengikutLenght>=0){
          		for (var x = 0; x <pengikutLenght; x++) {
          			if (pengikut[x]===undefined) {
          				pengikut[x]="";	
          			}          			
          		}
          	}

        	//alert("pegawai :"+pegawai+"||pengikut :"+pengikut[0]+pengikut[1]+pengikut[2]+"dd"); 
        	//end get sdm

        	
        		$("#loader-btnsimpansuratbaru").show();       			        

        		
	        	var input = $("#inputsdm").val();
	        	//var nip = document.getElementById('nip').innerHTML;
	        	//var kd_sdm = document.getElementById('kode_sdm').innerHTML;
		        var maksudPerjalanan =$("#inputMaksud").val();

		        var dasarSurat,pembukaSurat;
		        var c = $("input[name='optionsRadios']:checked").val();
		        if (c==1) {
		        	dasarSurat = $("#inputdasar").val();
		        	pembukaSurat = "";
		        }else if (c==2) {
		        	dasarSurat = "";
		        	pembukaSurat = $("#inputdasar").val();
		        }else{
		        	//
		        }
		        //var pejabatPerintah = $("#inputPejabatPerintah").val();
		        try{
		        var bp = $("#bendahara_pengeluaran").find('option:selected').val();	
		        var pptk = $("#pptk").find('option:selected').val();	
		        var pejabatPerintah = $("#selectPejabatPerintah").find('option:selected').val();
		        var dariKota =$("#inputDariKota").val();
		        var keKota =$("#inputKeKota").val();
		        var angkutan =$("#inputAngkutan").val();
		        //untuk keperluan hitung selisih tanggal	
		        var Date1 = $( "#datepickerTglBerangkat" ).datepicker("getDate" );
				var Date2 = $( "#datepickerTglKembali" ).datepicker( "getDate" );
				var selisih = ((Date2-Date1)/(24 * 60 * 60 * 1000))+1;
				//mengembalikan ke format mysql date
				tanggalBerangkat = $.datepicker.formatDate('yy-mm-dd', Date1);
				tanggalKembali = $.datepicker.formatDate('yy-mm-dd', Date2);
				
		        var atasBeban =$("#inputAtasBeban").val();
		        var pasalAnggaran =$("#inputPasalAnggaran").val();
		        var keterangan = $("#inputKet").val();
		        var d = new Date();
				var curr_date = d.getDate();
				var curr_month = d.getMonth();
				var curr_year = d.getFullYear();

				var today = curr_date+""+curr_month+""+curr_year;	
		        var trimNIP = pegawai.split(' ').join('');
		       
		        var status = trimNIP+""+today;
		        var uang_saku = $("#uang-saku").val();
		        
		        if (nosurat!="" && pegawai!="" && pejabatPerintah!="" && dariKota!="" && keKota!="" && angkutan!="" && tanggalBerangkat!="" && tanggalKembali!="" && maksudPerjalanan!=""&&uang_saku!="") {
		        	$.ajax({
		             url:'<?php echo base_url(); ?>surat/insert',
		             type:'POST',
		             data:{'par_nosurat':nosurat,'par_pegawai':pegawai,
		             		'par_pengikut1':pengikut[0],'par_pengikut2':pengikut[1],'par_pengikut3':pengikut[2],
		             		'par_pejabat':pejabatPerintah,
		             		'par_dasarSurat':dasarSurat,'par_pembukaSurat':pembukaSurat,
		             		'par_dariKota':dariKota,'par_keKota':keKota,
		             		'par_angkutan':angkutan,'par_tglBerangkat':tanggalBerangkat,'par_tglKembali':tanggalKembali,'par_lama':selisih,
		             		'par_tujuan':maksudPerjalanan,'par_atasBeban':atasBeban,
		             		'par_pasalAnggaran':pasalAnggaran,'par_keterangan':keterangan,'par_status':status,'par_kode_skpd':'<?php echo $this->session->userdata("kode_skpd");?>',
		             		'par_uang_saku':uang_saku,'par_bp':bp,'par_pptk':pptk		
		             	},
		             beforeSend: function(rs){
		             	$("#loader-btnsimpansuratbaru").show();
		             	$("#btn-simpansuratbaru").prop("disabled",true); 

		             },
		             success:function(rs){
		             	$("#btn-simpansuratbaru").prop("disabled",false); 
		                $('#modal_view_surat').modal({
                                backdrop: 'static',
                                keyboard: false
                            });
		                $("#konten-modal").html(rs);
		                $("#loader-btnsimpansuratbaru").hide();
		                $(".input-pegawai").val("");
		                $("#loader-surat1").hide();
		             },
		             error: function(rs){
		             	//alert("GAGAL");
		             	$("#btn-simpansuratbaru").prop("disabled",false); 
		             	$("#loader-btnsimpansuratbaru").hide();
		             	new PNotify({
						    title: '',
						    text: '<i class=\"fa fa-frown-o\"></i> Gagal membuat surat.',
						    type: 'error',
						    icon: false,
						    shadow: false
						});
						$("#loader-surat1").hide();
		             }
		            
		            });

				}else{
					new PNotify({
		            title: 'Error',
		            text: '<i class=\"fa fa-frown-o\"></i> <strong>MAAF!</strong>&nbsp&nbsp Lengkapi inputan dengan benar.'+err,
		            type: 'error',
		            icon: false,
				    shadow: false
	    			});
				}
		        
	    	}catch(err){
	    		///alert('aa');
	    		$("#loader-btnsimpansuratbaru").hide();
	    		new PNotify({
		            title: 'Error',
		            text: '<i class=\"fa fa-frown-o\"></i> <strong>MAAF!</strong>&nbsp&nbsp Data gagal tersimpan.',
		            type: 'error',
		            icon: false,
				    shadow: false
	    		});
	    	}
	    });
		//END SIMPAN SURAT BARU
		
		$('#form-surat-baru').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        live: 'enabled',
        submitButtons: 'button[id="btn-simpansuratbaru"]',
        
        fields: {
        	optionsRadios: {
                message: 'Silahkan pilih',
                validators: {
                    notEmpty: {
                       
                    },
                   
                    regexp: {
                       // regexp: /^[a-zA]+$/,
                     //   message: 'The username can only consist of alphabetical '
                    }
                    
                }
            },
            inputdasar: {
                
                validators: {
                    notEmpty: {
                       
                    },
                   
                    regexp: {
                       // regexp: /^[a-zA]+$/,
                     //   message: 'The username can only consist of alphabetical '
                    }
                    
                }
            },//pejabat
            inputMaksud: {  
                validators: {
                    notEmpty: {
                       
                    },
                   
                    regexp: {
                       // regexp: /^[a-zA]+$/,
                     //   message: 'The username can only consist of alphabetical '
                    }
                    
                }
            },       	
            inputKeKota: {
                
                validators: {
                    notEmpty: {
                       
                    },
                   
                    regexp: {
                       // regexp: /^[a-zA]+$/,
                     //   message: 'The username can only consist of alphabetical '
                    }
                    
                }
            },
            inputDariKota: {
                
                validators: {
                    notEmpty: {
                       
                    },
                   
                    regexp: {
                       // regexp: /^[a-zA]+$/,
                     //   message: 'The username can only consist of alphabetical '
                    }
                    
                }
            },
            inputAngkutan: {
                
                validators: {
                    notEmpty: {
                       
                    },
                   
                    regexp: {
                       // regexp: /^[a-zA]+$/,
                     //   message: 'The username can only consist of alphabetical '
                    }
                    
                }
            },inputPejabatPerintah: {
                
                validators: {
                    notEmpty: {
                       
                    },
                   
                    regexp: {
                       // regexp: /^[a-zA]+$/,
                     //   message: 'The username can only consist of alphabetical '
                    }
                    
                }
            },nosurat2: {
                
                validators: {
                    notEmpty: {
                       
                    },
                   
                    regexp: {
                       // regexp: /^[a-zA]+$/,
                     //   message: 'The username can only consist of alphabetical '
                    }
                    
                }
            },selectPejabatPerintah: {
                
                validators: {
                    notEmpty: {
                     message: 'The username can only consist of alphabetical'  
                    }
                    
                }
            },uang_saku: {
                
                validators: {
                    notEmpty: {
                     message: 'The username can only consist of alphabetical'  
                    }
                    
                }
            }            
            
        }
        //}
        });

  </script>
