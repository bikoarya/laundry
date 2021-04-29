// Tambah Outlet
$("#dataOutlet").load(site_url + "Outlet/showData");
$("#simpanOutlet").click(function () {
	$("#formOutlet").validate({
		rules: {
			txtNamaOutlet: {
				required: true
			},
            txtAlamatOutlet: {
                required: true
            },
            txtNoTlp: {
                required: true,
				number: true
            }
		},
		messages: {
			txtNamaOutlet: {
				required: "Masukkan nama outlet."
			},
            txtAlamatOutlet: {
                required: "Masukkan alamat."
            },
            txtNoTlp: {
                required: "Masukkan nomor telepon.",
				number: "Harap masukkan angka."
            }
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		},
		submitHandler: function (form) {
			let nama = $("#txtNamaOutlet").val();
			let alamat = $("#txtAlamatOutlet").val();
			let tlp = $("#txtNoTlp").val();

			$.ajax({
				url: site_url + "Outlet/insert",
				type: "POST",
				data: {
					nama: nama,
                    alamat: alamat,
                    tlp: tlp
				},
				success: function (data) {
					$("#txtNamaOutlet").val("");
					$("#txtAlamatOutlet").val("");
					$("#txtNoTlp").val("");
					$("#dataOutlet").html(data);
					$("#addOutlet").modal("hide");

					Swal.fire(
						'Berhasil!',
						'Data berhasil ditambahkan.',
						'success'
					)
				}
			});
		}
	});
});

// Tambah Paket
$("#dataPaket").load(site_url + "Paket/showData");
$("#simpanPaket").click(function () {
	$("#formPaket").validate({
		rules: {
			txtNamaPaket: {
				required: true
			},
            txtJenisPaket: {
                required: true
            },
            txtHargaPaket: {
                required: true
            },
			txtOutletPaket: {
				required: true
			}
		},
		messages: {
			txtNamaPaket: {
				required: "Masukkan nama paket."
			},
            txtJenisPaket: {
                required: "Masukkan jenis."
            },
            txtHargaPaket: {
                required: "Masukkan harga."
            },
			txtOutletPaket: {
				required: "Masukkan outlet."
			}
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		},
		submitHandler: function (form) {
			let nama = $("#txtNamaPaket").val();
			let jenis = $("#txtJenisPaket").val();
			let harga = $("#txtHargaPaket").val();
			let outlet = $("#txtOutletPaket").val();

			$.ajax({
				url: site_url + "Paket/insert",
				type: "POST",
				data: {
					nama: nama,
                    jenis: jenis,
                    harga: harga,
					outlet: outlet
				},
				success: function (data) {
					$("#txtNamaPaket").val("");
					$('#txtJenisPaket').val("");
					$("#txtHargaPaket").val("");
					$("#txtOutletPaket").val("");
					$("#dataPaket").html(data);
					$("#addPaket").modal("hide");

					Swal.fire(
						'Berhasil!',
						'Data berhasil ditambahkan.',
						'success'
					)
				}
			});
		}
	});
});

// Cari Bulanan
$("#cariBulanan").click(function () {
	$("#formBulanan").validate({
		rules: {
			txtBulan: {
				required: true
			}
		},
		messages: {
			txtBulan: {
				required: "Masukkan nama bulan."
			}
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		},
		submitHandler: function (form) {
			let bulan = $("#txtBulan").val();
			document.location.href = 'Laporan/Bulanan/' + bulan;
		}
	});
});

// Tambah Jenis
$("#simpanJenis").click(function () {
	$("#formJenis").validate({
		rules: {
			jenis: {
				required: true
			}
		},
		messages: {
			jenis: {
				required: "Masukkan nama jenis."
			},
            txtAlamatOutlet: {
                required: "Masukkan alamat."
            }
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		},
		submitHandler: function (form) {
			let jenis = $("#jenis").val();

			$.ajax({
				url: site_url + "Paket/insertJenis",
				type: "POST",
				data: {
					jenis: jenis
				},
				success: function (data) {
					$("#jenis").val("");
					$("#modalPaket").modal("hide");
					$("#addPaket").modal("show");
					$("#txtJenisPaket").val(data).trigger("change");
				}
			});
		}
	});
});

// Tambah User
$("#dataUser").load(site_url + "User/showData");
$("#simpanUser").click(function () {
	$("#formUser").validate({
		rules: {
			txtNamaLengkap: {
				required: true
			},
            txtUsername: {
                required: true
            },
            txtPassword: {
                required: true
            },
			txtOutletUser: {
				required: true
			},
			txtRole: {
				required: true
			}
		},
		messages: {
			txtNamaLengkap: {
				required: "Masukkan nama lengkap."
			},
            txtUsername: {
                required: "Masukkan username."
            },
            txtPassword: {
                required: "Masukkan password."
            },
			txtOutletUser: {
				required: "Masukkan outlet."
			},
			txtRole: {
				required: "Masukkan role."
			}
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		},
		submitHandler: function (form) {
			let namaLengkap = $("#txtNamaLengkap").val();
			let username = $("#txtUsername").val();
			let password = $("#txtPassword").val();
			let outlet = $("#txtOutletUser").val();
			let role = $("#txtRole").val();

			$.ajax({
				url: site_url + "User/insert",
				type: "POST",
				data: {
					namaLengkap: namaLengkap,
                    username: username,
                    password: password,
					outlet: outlet,
					role:role
				},
				success: function (data) {
					$("#txtNamaLengkap").val("");
					$("#txtUsername").val("");
					$("#txtPassword").val("");
					$("#txtOutletUser").val("");
					$("#txtRole").val("");
					$("#dataUser").html(data);
					$("#addUser").modal("hide");

					Swal.fire(
						'Berhasil!',
						'Data berhasil ditambahkan.',
						'success'
					)
				}
			});
		}
	});
});

// Tambah Member
$("#dataMember").load(site_url + "Member/showData");
$("#simpanMember").click(function () {
	$("#formMember").validate({
		rules: {
			txtNamaMember: {
				required: true
			},
            txtAlamatMember: {
                required: true
            },
            gender: {
                required: true
            },
			txtTlp: {
				required: true,
				number: true
			}
		},
		messages: {
			txtNamaMember: {
				required: "Masukkan nama lengkap."
			},
            txtAlamatMember: {
                required: "Masukkan alamat."
            },
            gender: {
                required: "Masukkan jenis kelamin."
            },
			txtTlp: {
				required: "Masukkan nomor telepon.",
				number: "Harap masukkan angka."
			}
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		},
		submitHandler: function (form) {
			let nama = $("#txtNamaMember").val();
			let alamat = $("#txtAlamatMember").val();
			let gender = $('input[name="gender"]:checked').val();
			let tlp = $("#txtTlp").val();

			$.ajax({
				url: site_url + "Member/insert",
				type: "POST",
				data: {
					nama: nama,
                    alamat: alamat,
                    gender: gender,
					tlp: tlp
				},
				success: function (data) {
					$("#txtNamaMember").val("");
					$("#txtAlamatMember").val("");
					$('input[name="gender"]').prop('checked', false).change();
					$("#txtTlp").val("");
					$("#dataMember").html(data);
					$("#addMember").modal("hide");

					Swal.fire(
						'Berhasil!',
						'Data berhasil ditambahkan.',
						'success'
					)
				}
			});
		}
	});
});

$("#grandTotal").load(site_url + "Transaksi/grandTotal");
$("#historyTransaksi").load(site_url + "Data/showData");

// Tambah Transaksi
$("#dataTransaksi").load(site_url + "Transaksi/load");
$("#simpanTransaksi").click(function () {
	$("#formTransaksi").validate({
		rules: {
			tNamaMember: {
				required: true
			},
            tNamaPaket: {
                required: true
            },
            tBerat: {
                required: true,
				minlength: 1
            },
			tQty: {
				required: true,
				minlength: 1
			},
			tglSelesai: {
				required: true
			}
		},
		messages: {
			tNamaMember: {
				required: "Masukkan nama member."
			},
            tNamaPaket: {
                required: "Masukkan nama paket."
            },
            tBerat: {
                required: "Masukkan berat (kg).",
				minlength: "Masukkan minimal 1."
            },
			tQty: {
				required: "Masukkan qty.",
				minlength: "Masukkan minimal 1."
			},
			tglSelesai: {
				required: "Masukkan tanggal."
			}
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		},
		submitHandler: function (form) {
			let invoice = $("#txtKodeInvoice").val();
			let id = $("#cart").val();
			let tgl = $("#tglTerima").val();
			let user = $("#tPetugas").val();
			let outlet = $("#tOutlet").val();
			let member = $("#tNamaMember").val();
			let paket = $("#tNamaPaket").val();
			let berat = $("#tBerat").val();
			let qty = $("#tQty").val();
			let harga = $("#tHarga").val();
			let tglSelesai = $("#tglSelesai").val();

			$.ajax({
				url: site_url + "Transaksi/add/" +uuid.v4(),
				type: "POST",
				data: {
					invoice: invoice,
					id: id,
                    tgl: tgl,
                    user: user,
					outlet: outlet,
					member: member,
					paket: paket,
					berat: berat,
					qty:qty,
					harga: harga,
					tglSelesai: tglSelesai
				},
				success: function (data) {
					$("#grandTotal").load(site_url + "Transaksi/grandTotal");
					$("#tNamaMember").val("");
					$("#tNamaPaket").val("");
					$("#tBerat").val("");
					$("#tQty").val("");
					$("#berat").hide();
					$("#tHarga").val("");
					$("#tglSelesai").val("");
					$("#dataTransaksi").html(data);
					$("#addTransaksi").modal("hide");

					Swal.fire(
						'Berhasil!',
						'Data berhasil ditambahkan.',
						'success'
					)
				}
			});
		}
	});
});

// Kirim value status
$(document).on('click', '.editStatus', function () {
	const id = $(this).data('id_transaksi');
	const paket = $(this).data('paket');
	const berat = $(this).data('berat');
	const harga = $(this).data('harga');
	const status = $(this).data('status');
	const bayar = $(this).data('bayar');
	const total = berat*harga;

	$("#id_transaksi").val(id);
	$("#dNamaPaket").val(paket);
	$("#dBerat").val(berat);
	$("#dStatus").val(status).trigger("change");
	$("#dBayar").val(bayar).trigger("change");
	$("#dHarga").val('Rp. ' + harga);
	$("#dTotal").val('Rp. ' + total);
});

// Kirim Value Edit Outlet
$(document).on('click', '.editOutlet', function () {
	var id = $(this).data('id_outlet');
	var nama = $(this).data('nama');
	var alamat = $(this).data('alamat');
	var tlp = $(this).data('tlp');

	$("#id_outlet").val(id);
	$("#editNamaOutlet").val(nama);
	$("#editAlamatOutlet").val(alamat);
	$("#editNoTlp").val(tlp);
});

// Kirim Value Edit Paket
$(document).on('click', '.editPaket', function () {
	var id = $(this).data('id_paket');
	var nama = $(this).data('nama_paket');
	var jenis = $(this).data('jenis');
	var harga = $(this).data('harga');
	var outlet = $(this).data('outlet');

	$("#id_paket").val(id);
	$("#editNamaPaket").val(nama);
	$("#editJenisPaket").val(jenis).trigger("change");
	$("#editHargaPaket").val(harga);
	$("#editOutletPaket").val(outlet).trigger("change");
});

// Kirim Value Edit User
$(document).on('click', '.editUser', function () {
	var id = $(this).data('id_user');
	var namaLengkap = $(this).data('nama_lengkap');
	var username = $(this).data('username');
	var outlet = $(this).data('outlet');
	var role = $(this).data('role');
	var oldPass = $(this).data('password')

	$("#id_user").val(id);
	$("#editNamaLengkap").val(namaLengkap);
	$("#editUsername").val(username);
	$("#oldPass").val(oldPass);
	$("#editOutletUser").val(outlet).trigger("change");
	$("#editRole").val(role).trigger("change");
});

// Kirim Value Edit Member
$(document).on('click', '.editMember', function () {
	var id = $(this).data('id_member');
	var nama = $(this).data('nama');
	var alamat = $(this).data('alamat');
	var gender = $(this).data('gender');
	var tlp = $(this).data('tlp');

	$("#id_member").val(id);
	$("#txtEditNamaMember").val(nama);
	$("#txtEditAlamatMember").val(alamat);
	$("input[name='editGender'][value=" + gender + "]").prop('checked', true);
	$("#editTlpMember").val(tlp);
});

// Update Outlet
$("#editOutlet").click(function () {
	$("#formEditOutlet").validate({
		rules: {
			editNamaOutlet: {
				required: true
			},
			editAlamatOutlet: {
				required: true
			},
			editNoTlp: {
				required: true,
				number: true
			}
		},
		messages: {
			editNamaOutlet: {
				required: "Masukkan nama outlet."
			},
			editAlamatOutlet: {
				required: "Masukkan alamat."
			},
			editNoTlp: {
				required: "Masukkan nomor telepon.",
				number: "Harap masukkan angka."
			}
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		},
		submitHandler: function (form) {
			let id = $("#id_outlet").val();
			let nama = $("#editNamaOutlet").val();
			let alamat = $("#editAlamatOutlet").val();
			let tlp = $("#editNoTlp").val();

			const swalWithBootstrapButtons = Swal.mixin({
				customClass: {
					confirmButton: 'btn btn-primary',
					cancelButton: 'btn btn-light mr-3'
				},
				buttonsStyling: false
			})

			swalWithBootstrapButtons.fire({
				title: 'Apakah Anda Yakin?',
				text: "Mengubah Data",
				icon: 'question',
				showCancelButton: true,
				confirmButtonText: 'Ya, Ubah',
				cancelButtonText: 'Batal',
				reverseButtons: true
			}).then((result) => {
				if (result.value) {

					$.ajax({
						type: "POST",
						url: site_url + "Outlet/update",
						data: {
							id: id,
							nama: nama,
							alamat: alamat,
							tlp: tlp
						},
						success: function (data) {
							$("#dataOutlet").load(site_url + "Outlet/showData");
							$("#editOutlet").modal("hide");

							Swal.fire(
								'Berhasil!',
								'Data berhasil diubah.',
								'success'
							)
						}
					});
				}
			});
		}
	});
});

$("#logout").click(function () {
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-primary',
			cancelButton: 'btn btn-light mr-3'
		},
		buttonsStyling: false
	})

	swalWithBootstrapButtons.fire({
		title: 'Yakin Ingin Keluar?',
		text: "Keluar Halaman",
		icon: 'question',
		showCancelButton: true,
		confirmButtonText: 'Keluar',
		cancelButtonText: 'Batal',
		reverseButtons: true
	}).then((result) => {
		if (result.value) {
			window.location.href = site_url + "Login/Logout";
		}
	});
})

// Update Paket
$("#editPaket").click(function () {
	$("#formEditPaket").validate({
		rules: {
			editNamaPaket: {
				required: true
			},
			editJenisPaket: {
				required: true
			},
			editHargaPaket: {
				required: true
			},
			editOutletPaket: {
				required: true
			}
		},
		messages: {
			editNamaPaket: {
				required: "Masukkan nama paket."
			},
			editJenisPaket: {
				required: "Masukkan jenis."
			},
			editHargaPaket: {
				required: "Masukkan harga."
			},
			editOutletPaket: {
				required: "Masukkan outlet"
			}
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		},
		submitHandler: function (form) {
			let id = $("#id_paket").val();
			let nama = $("#editNamaPaket").val();
			let jenis = $("#editJenisPaket").val();
			let harga = $("#editHargaPaket").val();
			let outlet = $("#editOutletPaket").val();

			const swalWithBootstrapButtons = Swal.mixin({
				customClass: {
					confirmButton: 'btn btn-primary',
					cancelButton: 'btn btn-light mr-3'
				},
				buttonsStyling: false
			})

			swalWithBootstrapButtons.fire({
				title: 'Apakah Anda Yakin?',
				text: "Mengubah Data",
				icon: 'question',
				showCancelButton: true,
				confirmButtonText: 'Ya, Ubah',
				cancelButtonText: 'Batal',
				reverseButtons: true
			}).then((result) => {
				if (result.value) {

					$.ajax({
						type: "POST",
						url: site_url + "Paket/update",
						data: {
							id: id,
							nama: nama,
							jenis: jenis,
							harga: harga,
							outlet: outlet
						},
						success: function (data) {
							$("#dataPaket").load(site_url + "Paket/showData");
							$("#editPaket").modal("hide");

							Swal.fire(
								'Berhasil!',
								'Data berhasil diubah.',
								'success'
							)
						}
					});
				}
			});
		}
	});
});

// Update User
$("#editUser").click(function () {
	$("#formEditUser").validate({
		rules: {
			editNamaLengkap: {
				required: true
			},
			editUsername: {
				required: true
			},
			editOutletUser: {
				required: true
			},
			editRole: {
				required: true
			}
		},
		messages: {
			editNamaLengkap: {
				required: "Masukkan nama lengkap."
			},
			editUsername: {
				required: "Masukkan username."
			},
			editOutletUser: {
				required: "Pilih outlet."
			},
			editRole: {
				required: "Pilih role"
			}
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		},
		submitHandler: function (form) {
			let id = $("#id_user").val();
			let namaLengkap = $("#editNamaLengkap").val();
			let username = $("#editUsername").val();
			let password = $("#editPassword").val();
			let outlet = $("#editOutletUser").val();
			let role = $("#editRole").val();
			let oldPass = $("#oldPass").val();

			const swalWithBootstrapButtons = Swal.mixin({
				customClass: {
					confirmButton: 'btn btn-primary',
					cancelButton: 'btn btn-light mr-3'
				},
				buttonsStyling: false
			})

			swalWithBootstrapButtons.fire({
				title: 'Apakah Anda Yakin?',
				text: "Mengubah Data",
				icon: 'question',
				showCancelButton: true,
				confirmButtonText: 'Ya, Ubah',
				cancelButtonText: 'Batal',
				reverseButtons: true
			}).then((result) => {
				if (result.value) {

					$.ajax({
						type: "POST",
						url: site_url + "User/update",
						data: {
							id: id,
							namaLengkap: namaLengkap,
							username: username,
							password: password,
							outlet: outlet,
							role: role,
							oldPass: oldPass
						},
						success: function (data) {
							$("#dataUser").load(site_url + "User/showData");
							$("#editUser").modal("hide");

							Swal.fire(
								'Berhasil!',
								'Data berhasil diubah.',
								'success'
							)
						}
					});
				}
			});
		}
	});
});

// Update Member
$("#editMember").click(function () {
	$("#formEditMember").validate({
		rules: {
			txtEditNamaMember: {
				required: true
			},
			txtEditAlamatMember: {
				required: true
			},
			editGender: {
				required: true
			},
			editTlpMember: {
				required: true,
				number: true
			}
		},
		messages: {
			txtEditNamaMember: {
				required: "Masukkan nama lengkap."
			},
			txtEditAlamatMember: {
				required: "Masukkan alamat."
			},
			editGender: {
				required: "Masukkan jenis kelamin."
			},
			editTlpMember: {
				required: "Masukkan nomor telepon.",
				number: "Harap masukkan angka."
			}
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		},
		submitHandler: function (form) {
			let id = $("#id_member").val();
			let nama = $("#txtEditNamaMember").val();
			let alamat = $("#txtEditAlamatMember").val();
			let gender = $('input[name="editGender"]:checked').val();
			let tlp = $("#editTlpMember").val();

			const swalWithBootstrapButtons = Swal.mixin({
				customClass: {
					confirmButton: 'btn btn-primary',
					cancelButton: 'btn btn-light mr-3'
				},
				buttonsStyling: false
			})

			swalWithBootstrapButtons.fire({
				title: 'Apakah Anda Yakin?',
				text: "Mengubah Data",
				icon: 'question',
				showCancelButton: true,
				confirmButtonText: 'Ya, Ubah',
				cancelButtonText: 'Batal',
				reverseButtons: true
			}).then((result) => {
				if (result.value) {

					$.ajax({
						type: "POST",
						url: site_url + "Member/update",
						data: {
							id: id,
							nama: nama,
							alamat: alamat,
							gender: gender,
							tlp: tlp
						},
						success: function (data) {
							$("#dataMember").load(site_url + "Member/showData");
							$("#editMember").modal("hide");

							Swal.fire(
								'Berhasil!',
								'Data berhasil diubah.',
								'success'
							)
						}
					});
				}
			});
		}
	});
});

// Update Status
$("#updateStatus").click(function () {
	$("#formUpdateStatus").validate({
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		},
		submitHandler: function (form) {
			let id = $("#id_transaksi").val();
			let status = $("#dStatus").val();
			let bayar = $("#dBayar").val();

			const swalWithBootstrapButtons = Swal.mixin({
				customClass: {
					confirmButton: 'btn btn-primary',
					cancelButton: 'btn btn-light mr-3'
				},
				buttonsStyling: false
			})

			swalWithBootstrapButtons.fire({
				title: 'Apakah Anda Yakin?',
				text: "Mengubah Data",
				icon: 'question',
				showCancelButton: true,
				confirmButtonText: 'Ya, Ubah',
				cancelButtonText: 'Batal',
				reverseButtons: true
			}).then((result) => {
				if (result.value) {

					$.ajax({
						type: "POST",
						url: site_url + "Data/update",
						data: {
							id: id,
							status: status,
							bayar: bayar
						},
						success: function (data) {
							$("#editTransaksi").modal("hide");
							
							Swal.fire({
								title: 'Berhasil!',
								text: 'Data berhasil diubah.',
								icon: 'success'
							}).then((result) => {
								location.reload();
							})
						}
					});
				}
			});
		}
	});
});

// Hapus Outlet
$("#dataOutlet").on('click', '.hapusOutlet', function () {
	var id = $(this).data("id_outlet");
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-primary',
			cancelButton: 'btn btn-light mr-3'
		},
		buttonsStyling: false
	})

	swalWithBootstrapButtons.fire({
		title: 'Apakah Anda Yakin?',
		text: "Menghapus Data",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Ya, Hapus',
		cancelButtonText: 'Batal',
		reverseButtons: true
	}).then((result) => {
		if (result.value) {

			$.ajax({
				type: "POST",
				url: site_url + "Outlet/delete",
				data: {
					id: id
				},
				success: function (data) {
					$("#dataOutlet").load(site_url + "Outlet/showData");

					Swal.fire(
						'Berhasil!',
						'Data berhasil dihapus.',
						'success'
					)
				}
			});
		}
	});
});

// Hapus Cart
$("#dataTransaksi").on('click', '.deleteCart', function () {
	var id = $(this).data("id_cart");
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-primary',
			cancelButton: 'btn btn-light mr-3'
		},
		buttonsStyling: false
	})

	swalWithBootstrapButtons.fire({
		title: 'Apakah Anda Yakin?',
		text: "Menghapus Data",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Ya, Hapus',
		cancelButtonText: 'Batal',
		reverseButtons: true
	}).then((result) => {
		if (result.value) {

			$.ajax({
				type: "POST",
				url: site_url + "Transaksi/delete",
				data: {
					id: id
				},
				success: function (data) {
					$("#dataTransaksi").load(site_url + "Transaksi/load");
					$("#grandTotal").load(site_url + "Transaksi/grandTotal");

					Swal.fire(
						'Berhasil!',
						'Data berhasil dihapus.',
						'success'
					)
				}
			});
		}
	});
});

// Hapus Paket
$("#dataPaket").on('click', '.hapusPaket', function () {
	var id = $(this).data("id_paket");
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-primary',
			cancelButton: 'btn btn-light mr-3'
		},
		buttonsStyling: false
	})

	swalWithBootstrapButtons.fire({
		title: 'Apakah Anda Yakin?',
		text: "Menghapus Data",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Ya, Hapus',
		cancelButtonText: 'Batal',
		reverseButtons: true
	}).then((result) => {
		if (result.value) {

			$.ajax({
				type: "POST",
				url: site_url + "Paket/delete",
				data: {
					id: id
				},
				success: function (data) {
					$("#dataPaket").load(site_url + "Paket/showData");

					Swal.fire(
						'Berhasil!',
						'Data berhasil dihapus.',
						'success'
					)
				}
			});
		}
	});
});

// Hapus User
$("#dataUser").on('click', '.hapusUser', function () {
	var id = $(this).data("id_user");
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-primary',
			cancelButton: 'btn btn-light mr-3'
		},
		buttonsStyling: false
	})

	swalWithBootstrapButtons.fire({
		title: 'Apakah Anda Yakin?',
		text: "Menghapus Data",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Ya, Hapus',
		cancelButtonText: 'Batal',
		reverseButtons: true
	}).then((result) => {
		if (result.value) {

			$.ajax({
				type: "POST",
				url: site_url + "User/delete",
				data: {
					id: id
				},
				success: function (data) {
					$("#dataUser").load(site_url + "User/showData");

					Swal.fire(
						'Berhasil!',
						'Data berhasil dihapus.',
						'success'
					)
				}
			});
		}
	});
});

// Hapus Member
$("#dataMember").on('click', '.hapusMember', function () {
	var id = $(this).data("id_member");
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-primary',
			cancelButton: 'btn btn-light mr-3'
		},
		buttonsStyling: false
	})

	swalWithBootstrapButtons.fire({
		title: 'Apakah Anda Yakin?',
		text: "Menghapus Data",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Ya, Hapus',
		cancelButtonText: 'Batal',
		reverseButtons: true
	}).then((result) => {
		if (result.value) {

			$.ajax({
				type: "POST",
				url: site_url + "Member/delete",
				data: {
					id: id
				},
				success: function (data) {
					$("#dataMember").load(site_url + "Member/showData");

					Swal.fire(
						'Berhasil!',
						'Data berhasil dihapus.',
						'success'
					)
				}
			});
		}
	});
});