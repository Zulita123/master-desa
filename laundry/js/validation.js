function buka_tab(){
	id3333=document.getElementById('nomer_order').value;
	$("#kotak-detail").load("content/detail_order.php");
}
function plgn(){
	plh=$("#status_pelanggan").val();
	if(plh=="Pelanggan"){
		$("#id_plg").show();
		$("#kode_pelanggan").show();
		$("#nama").show();
		$("#nama_pelanggan").show();
	}else{
		$("#id_plg").hide();
		$("#kode_pelanggan").hide();
		$("#nama").hide();
		$("#nama_pelanggan").hide();
	}
}
function idp(){
	$.ajax({
		url:"content/cari_plg.php",
		type:"POST",
		dataType:"json",
		data:{
			kode_pelanggan:$("#kode_pelanggan").val()
		},
		success:function(hasil){
			$("#nama_pelanggan").val(hasil.nama_pelanggan);
		}
	});
}
function idb(){
	$.ajax({
		url:"content/cari_jasa.php",
		type:"POST",
		dataType:"json",
		data:{
			kode_jasa:$("#kode_jasa").val()
		},
		success:function(hasil){
			$("#nama_jasa").val(hasil.nama_jasa);
			$("#harga").val(hasil.harga);
		}
	});
}
function trot(){
	$.ajax({
		url:"content/cari_trans.php",
		type:"POST",
		dataType:"json",
		data:{
			nomer_order:$("#nomer_order").val()
		},
		success:function(hasil){
			$("#nama_pelanggan").val(hasil.nama_pelanggan);
			$("#nama_jasa").val(hasil.nama_jasa);
			$("#harga").val(hasil.harga);
			$("#berat_cucian").val(hasil.berat_cucian);
			$("#total_harga").val(hasil.total_harga);
		}
	});
}
function tot(){
	hrg=$("#harga").val();
	jml=$("#berat_cucian").val();
	$("#total_harga").val(hrg*jml);
	document.getElementById('subtotal').innerHTML="Rp. "+hrg*jml;
}
function kmbl(){
	ttl=$("#total_harga").val();
	byr=$("#bayar").val();
	$("#kembali").val(byr-ttl);
	hsl=byr-ttl;
	document.getElementById('subtotal').innerHTML="Rp. "+hsl;
}