$('.jenisPaket').select2({
	placeholder: "Pilih Jenis",
	allowClear: true,
	theme: 'bootstrap4'
});

$('.outletPaket').select2({
	placeholder: "Pilih Outlet",
	allowClear: true,
	theme: 'bootstrap4'
});

$('.editOutletPaket').select2({
	placeholder: "Pilih Outlet",
	allowClear: true,
	theme: 'bootstrap4'
});

$('.editJenisPaket').select2({
	placeholder: "Pilih Jenis",
	allowClear: true,
	theme: 'bootstrap4'
});

$('.outletUser').select2({
	placeholder: "Pilih Outlet",
	allowClear: true,
	theme: 'bootstrap4'
});

$('.role').select2({
	placeholder: "Pilih Role",
	allowClear: true,
	theme: 'bootstrap4'
});

$('.editOutletUser').select2({
	placeholder: "Pilih Outlet",
	allowClear: true,
	theme: 'bootstrap4'
});

$('.editRole').select2({
	placeholder: "Pilih Role",
	allowClear: true,
	theme: 'bootstrap4'
});

$("#txtJenisPaket").change(function () {
	if ($(this).val() == "newPaket") {
		$("#txtJenisPaket").html("");
		$('#addPaket').modal('hide');
		$('#modalPaket').modal('show');
	}
});


var rupiah = document.getElementById('txtHargaPaket');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}

		var rp = document.getElementById('editHargaPaket');
		rp.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rp.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rp     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rp += separator + ribuan.join('.');
			}
 
			rp = split[1] != undefined ? rp + ',' + split[1] : rp;
			return prefix == undefined ? rp : (rp ? 'Rp. ' + rp : '');
		}