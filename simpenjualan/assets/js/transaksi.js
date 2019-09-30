function plgn(){
	plh=$("#plg").val();
	if(plh=="Pelanggan"){
		$("#id_plg").show();
		$("#nama_plg").show();
		$("#id_pelanggan").show();
		$("#nama").show();
	}else{
		$("#id_plg").hide();
		$("#nama_plg").hide();
		$("#id_pelanggan").hide();
		$("#nama").hide();
	}
}
function idp(){
	$.ajax({
		url:"content/cari_plg.php",
		type:"POST",
		dataType:"json",
		data:{
			id_pelanggan:$("#id_pelanggan").val()
		},
		success:function(hasil){
			$("#nama").val(hasil.nama);
		}
	});
}
function idb(){
	$.ajax({
		url:"content/cari_brg.php",
		type:"POST",
		dataType:"json",
		data:{
			id_brg:$("#id_brg").val()
		},
		success:function(hasil){
			$("#nama_brg").val(hasil.nama_brg);
			$("#harga").val(hasil.harga);
		}
	});
}
function simpan_detail(){
	$.ajax({
		url:"crud/simpan_transaksi.php",
		type:"POST",
		data:{
			id_trans:$("#id_trans").val(),
			id_brg:$("#id_brg").val(),
			jumlah_beli:$("#jumlah_beli").val(),
			sub_total:$("#sub_total").val()
		},
		success:function(hasil){
			alert(hasil);
			buka_tab();
		}
	});
}
function tot(){
	hrg=$("#harga").val();
	jml=$("#jumlah_beli").val();
	$("#sub_total").val(hrg*jml);
}
function buka_tab(){
	id3333=document.getElementById('id_trans').value;
	$("#kotak-detail").load("content/detail_trans.php?idt="+id3333);
}
function kembalian(){
	var totbayar=document.getElementById('total_bayar').value;
	var byr=document.getElementById('bayar').value;
	var bali=byr-totbayar;
	document.getElementById('kembali').value=bali;
}
$(document).ready(function(){
	$("#lpr1").hide();
	$("#lpr2").hide();
	$("#lpr3").hide();
	$("#lpr").click(function(){
		$("#lpr1").slideToggle("slow");
		$("#lpr2").slideToggle("slow");
		$("#lpr3").slideToggle("slow");
	});
});