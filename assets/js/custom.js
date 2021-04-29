$.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  }

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

$('.tMember').select2({
	placeholder: "Pilih Member",
	allowClear: true,
	theme: 'bootstrap4'
});

$('.tPaket').select2({
	placeholder: "Pilih Paket",
	allowClear: true,
	theme: 'bootstrap4'
});

$('.dStatus').select2({
	placeholder: "Pilih Status",
	allowClear: true,
	theme: 'bootstrap4'
});

$('.dBayar').select2({
	placeholder: "Pilih Pembayaran",
	allowClear: true,
	theme: 'bootstrap4'
});

$("#tglSelesai").datepicker({
	dateFormat: "yy-mm-dd",
	autoclose: true
});

$("#berat").hide();
$("#qty").hide();
$("#pajak").hide();
$("#tNamaPaket").change(function () {
	const option = $('option:selected', this).attr('harga');
	const jenis = $('option:selected', this).attr('jenis');
	// Format Rupiah
	// .toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
	if (jenis == 'Kiloan') {
		$("#qty").hide();
		$("#berat").show();
		if (option) {
			const value = option.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
			$(`[name="tiHarga"]`).val(value);
			$("#tHarga").val(value);
		}
	}else {
		$("#berat").hide();
		$("#qty").show();
		if (option) {
			const value = option.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
			$(`[name="tiHarga"]`).val(value);
			$("#tHarga").val(value);
		}
	}
});

const timeWrapper = $('#time');
const tgl = Date.now();

function time() {
  var d = new Date();
  var s = d.getSeconds();
  var m = d.getMinutes();
  var h = d.getHours();
  timeWrapper.text(("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2))
}

setInterval(time, 1000);

$("#txtHargaPaket, #editHargaPaket").inputFilter(function(value) {
    return /^\d*$/.test(value);    // Allow digits only, using a RegExp
  })

// var rupiah = document.getElementById('txtHargaPaket');
// 		rupiah.addEventListener('keyup', function(e){
// 			// tambahkan 'Rp.' pada saat form di ketik
// 			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
// 			rupiah.value = formatRupiah(this.value, 'Rp. ');
// 		});
 
// 		/* Fungsi formatRupiah */
// 		function formatRupiah(angka, prefix){
// 			var number_string = angka.replace(/[^,\d]/g, '').toString(),
// 			split   		= number_string.split(','),
// 			sisa     		= split[0].length % 3,
// 			rupiah     		= split[0].substr(0, sisa),
// 			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
// 			// tambahkan titik jika yang di input sudah menjadi angka ribuan
// 			if(ribuan){
// 				separator = sisa ? '.' : '';
// 				rupiah += separator + ribuan.join('.');
// 			}
 
// 			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
// 			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
// 		}

// 		var rp = document.getElementById('editHargaPaket');
// 		rp.addEventListener('keyup', function(e){
// 			// tambahkan 'Rp.' pada saat form di ketik
// 			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
// 			rp.value = formatRupiah(this.value, 'Rp. ');
// 		});
 
// 		/* Fungsi formatRupiah */
// 		function formatRupiah(angka, prefix){
// 			var number_string = angka.replace(/[^,\d]/g, '').toString(),
// 			split   		= number_string.split(','),
// 			sisa     		= split[0].length % 3,
// 			rp     		= split[0].substr(0, sisa),
// 			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
// 			// tambahkan titik jika yang di input sudah menjadi angka ribuan
// 			if(ribuan){
// 				separator = sisa ? '.' : '';
// 				rp += separator + ribuan.join('.');
// 			}
 
// 			rp = split[1] != undefined ? rp + ',' + split[1] : rp;
// 			return prefix == undefined ? rp : (rp ? 'Rp. ' + rp : '');
// 		}