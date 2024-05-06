/// ===================================== ADMIN SECTION===============================================================
$('#admin_add_btn').on('click', function (e) {
	e.preventDefault();

	var username = $('#username').val();
	var password = $('#password').val();
	var confirmPassword = $('#confirmpassword').val();

	if (password !== confirmPassword) {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Passwords do not match!',
		});
		return;
	}

	var data = {
		admin_add: true,
		username: username,
		password: password,
	};

	$.ajax({
		type: 'POST',
		url: 'code.php',
		data: data,
		success: function (response) {
			if (response == 'success') {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Admin Successfully Added',
				});
				$('#adminform_add')[0].reset();
				$('#modal_adminADD').modal('hide');
				$('.admin_table').load(window.location.href + ' .admin_table');
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Failed to add admin',
				});
			}
		},
	});
});

$('#admin_update_btn').on('click', function (e) {
	e.preventDefault();

	var adminID = $('#admin_id').val();
	var username = $('#username').val();
	var password = $('#password').val();

	$.ajax({
		type: 'POST',
		url: 'code.php',
		data: {
			admin_update: true,
			admin_id: adminID,
			username: username,
			password: password,
		},
		success: function (response) {
			if (response == 'success') {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Admin Successfully Updated',
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = 'admin.php';
					}
				});
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Admin update failed',
				});
			}
		},
	});
});

function deleteAdmin(adminID) {
	if (confirm('Are you sure you want to delete this Admin?')) {
		$.ajax({
			url: 'code.php',
			type: 'GET',
			data: { a_idz: adminID },
			success: function (response) {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: response,
					confirmButtonText: 'OK',
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = 'admin.php';
					}
				});
			},
		});
	}
}

/// ===================================== OJT SECTION===============================================================
function deleteOjt(ojt_idx) {
	if (confirm('Are you sure you want to delete this Student?')) {
		$.ajax({
			url: 'code.php',
			type: 'GET',
			data: { ojt_idx: ojt_idx },
			success: function (response) {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: response,
					confirmButtonText: 'OK',
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = 'ojts.php';
					}
				});
			},
		});
	}
}

$('#ojtmed_update_btn').on('click', function (e) {
	e.preventDefault();
	console.log('clicked');

	var ojtID = $('#ojtID').val();
	var urinalysisFile = $('#urinalysis')[0].files[0];
	var xRayFile = $('#x_ray')[0].files[0];
	var pregnancyTestFile = $('#pregnancy_test')[0].files[0];

	// Check if any of the required fields are empty
	if (!ojtID || !urinalysisFile || !xRayFile || !pregnancyTestFile) {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Please fill in all the required fields.',
		});
		return; // Exit function if any required field is empty
	}

	var formData = new FormData();
	formData.append('ojtmed_update', true);
	formData.append('ojtID', ojtID);
	formData.append('urinalysis', urinalysisFile);
	formData.append('x_ray', xRayFile);
	formData.append('pregnancy_test', pregnancyTestFile);

	$.ajax({
		type: 'POST',
		url: 'code.php',
		data: formData,
		contentType: false,
		processData: false,
		success: function (response) {
			if (response == 'success') {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Medical Updated Successfully',
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = 'ojts.php';
					}
				});
				$('#ojtform_edit')[0].reset();
				$('.ojts_table').load(window.location.href + ' .ojts_table');
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Failed to update',
				});
			}
		},
	});
});

$('#ojtmed_add_btn').on('click', function (e) {
	e.preventDefault();
	console.log('clicked');

	var ojtID = $('#ojtID').val();
	var urinalysisFile = $('#urinalysis')[0].files[0];
	var xRayFile = $('#x_ray')[0].files[0];
	var pregnancyTestFile = $('#pregnancy_test')[0].files[0];

	var medicationPresent = $('input[name="medicationPresent"]:checked').val();
	var diagnosis = $('#diagnosis').val();
	var treatment = $('#treatment').val();

	var hyperthension = $('#hyperthension').is(':checked') ? 1 : 0;
	var diabetes = $('#diabetes').is(':checked') ? 1 : 0;
	var cardio = $('#cardio').is(':checked') ? 1 : 0;
	var ptb = $('#ptb').is(':checked') ? 1 : 0;
	var hyperacidity = $('#hyperacidity').is(':checked') ? 1 : 0;
	var allergy = $('#allergy').is(':checked') ? 1 : 0;
	var epilepsy = $('#epilepsy').is(':checked') ? 1 : 0;
	var asthma = $('#asthma').is(':checked') ? 1 : 0;
	var dysmenorrhea = $('#dysmenorrhea').is(':checked') ? 1 : 0;
	var liver = $('#liver').is(':checked') ? 1 : 0;

	//Check if any of the required fields are empty
	if (!ojtID || !urinalysisFile || !xRayFile || !pregnancyTestFile) {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Urinalysis, xRay and pregnancyTest are  required.',
		});
		return;
	}

	var formData = new FormData();
	formData.append('ojtmed_add', true);
	formData.append('ojtID', ojtID);
	formData.append('urinalysis', urinalysisFile);
	formData.append('x_ray', xRayFile);
	formData.append('pregnancy_test', pregnancyTestFile);
	formData.append('medicationPresent', medicationPresent);
	formData.append('diagnosis', diagnosis);
	formData.append('treatment', treatment);
	formData.append('hyperthension', hyperthension);
	formData.append('diabetes', diabetes);
	formData.append('cardio', cardio);
	formData.append('ptb', ptb);
	formData.append('hyperacidity', hyperacidity);
	formData.append('allergy', allergy);
	formData.append('epilepsy', epilepsy);
	formData.append('asthma', asthma);
	formData.append('dysmenorrhea', dysmenorrhea);
	formData.append('liver', liver);

	// console Log each key-value pair in FormData
	// for (let pair of formData.entries()) {
	// 	console.log(pair[0] + ', ' + pair[1]);
	// }

	$.ajax({
		type: 'POST',
		url: 'code.php',
		data: formData,
		contentType: false,
		processData: false,
		success: function (response) {
			if (response == 'success') {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Medical Successfully Created',
				});
				$('#ojtform_add')[0].reset();
				$('#modal_ojtADD').modal('hide');
				$('.ojts_table').load(window.location.href + ' .ojts_table');
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Failed to create',
				});
			}
		},
	});
});

function performSearch(searchTerm) {
	$.ajax({
		url: 'ojt_search.php',
		method: 'GET',
		data: { searchTerm: searchTerm },
		dataType: 'json',
		success: function (res) {
			console.log(res);
			$('#modal_ojtREQ').modal('show');
			var tbody = $('#modal_ojtREQ .ojtsearch_table');
			tbody.empty();
			$.each(res.data, function (index, res) {
				var row = '<tr>' + '<td>' + res.student_no + '</td>' + '<td>' + res.student_name + '</td>' + '<td>' + res.actions + '</td>' + '</tr>';
				tbody.append(row);
			});
		},
		error: function (xhr, status, error) {
			console.log('Error:', error);
		},
	});
}

$('#ojtsearch_input').on('input', function () {
	var searchTerm = $(this).val();
	console.log('Search term:', searchTerm);
	performSearch(searchTerm);
	var input = $('#ojtsearch_input_input').val();
	console.log(input);
});

$(document).on('click', '#search_ojt_btn', function () {
	console.log('clicked');
	var ojt_id = $(this).attr('id');
	console.log(ojt_id);

	$.ajax({
		url: 'fetchojt.php',
		method: 'GET',
		dataType: 'json',
		success: function (res) {
			$('#modal_ojtREQ').modal('show');
			var tbody = $('#modal_ojtREQ .ojtsearch_table');
			tbody.empty();
			$.each(res.data, function (index, res) {
				var row = '<tr>' + '<td>' + res.student_no + '</td>' + '<td>' + res.student_name + '</td>' + '<td>' + res.actions + '</td>' + '</tr>';
				tbody.append(row);
			});
		},
		error: function (xhr, status, error) {
			console.error(xhr.responseText);
		},
	});
});

$(document).on('click', '.select_ojt', function () {
	var ojt_id = $(this).attr('id');
	console.log(ojt_id);

	$.ajax({
		type: 'POST',
		url: 'code.php',
		data: { ojt_id: ojt_id },
		dataType: 'json',
		success: function (res) {
			console.log(res);
			$('#modal_ojtREQ').modal('hide');
			// $('#search_input').val('');
			$('#modal_ojtADD #ojtID').val(res.s_id);
			$('#modal_ojtADD #student_name').val(res.student_name);
		},
	});
});

/// ===================================== STUDENT SECTION===============================================================
$('#student_add_btn').on('click', function (e) {
	e.preventDefault();

	var student_no = $('#student_no').val();
	var course_id = $('#course_id').val();
	var firstname = $('#firstname').val();
	var middlename = $('#middlename').val();
	var lastname = $('#lastname').val();
	var username = $('#username').val();
	var password = $('#password').val();
	var birthdate = $('#birthdate').val();
	var sex = $('#sex').val();
	var contact_no = $('#contact_no').val();

	if (!student_no || !course_id || !firstname || !middlename || !lastname || !username || !password || !birthdate || !sex || !contact_no) {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Please fill in all the required fields.',
		});
		return;
	}

	var data = {
		student_add: true,
		student_no: student_no,
		course_id: course_id,
		firstname: firstname,
		middlename: middlename,
		lastname: lastname,
		username: username,
		password: password,
		birthdate: birthdate,
		sex: sex,
		contact_no: contact_no,
	};

	console.log(data);
	console.log('Clicked');
	$.ajax({
		type: 'POST',
		url: 'code.php',
		data: data,
		success: function (response) {
			if (response == 'success') {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Student Successfully Added',
				});
				$('#studentform_add')[0].reset();
				$('#modal_studentADD').modal('hide');
				$('.students_table').load(window.location.href + ' .students_table');
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Failed to add student',
				});
			}
		},
	});
});

$('#student_update_btn').on('click', function (e) {
	e.preventDefault();

	var s_type = $('#s_type').val();
	var sID = $('#sID').val();
	var student_no = $('#student_no').val();
	var course_id = $('#course_id').val();
	var firstname = $('#firstname').val();
	var middlename = $('#middlename').val();
	var lastname = $('#lastname').val();
	var username = $('#username').val();
	var password = $('#password').val();
	var birthdate = $('#birthdate').val();
	var sex = $('#sex').val();
	var contact_no = $('#contact_no').val();

	if (!student_no || !sID || !course_id || !firstname || !middlename || !lastname || !username || !password || !birthdate || !sex || !contact_no) {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Please fill in all the required fields.',
		});
		return;
	}

	var data = {
		student_update: true,
		s_type: s_type,
		sID: sID,
		student_no: student_no,
		course_id: course_id,
		firstname: firstname,
		middlename: middlename,
		lastname: lastname,
		username: username,
		password: password,
		birthdate: birthdate,
		sex: sex,
		contact_no: contact_no,
	};

	console.log(data);
	$.ajax({
		type: 'POST',
		url: 'code.php',
		data: data,
		success: function (response) {
			if (response == 'success') {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Student Update Successfully',
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = 'students.php';
					}
				});
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Failed to update student',
				});
			}
		},
	});
});

function deleteStudent(stud_idx) {
	if (confirm('Are you sure you want to delete this Student?')) {
		$.ajax({
			url: 'code.php',
			type: 'GET',
			data: { stud_idx: stud_idx },
			success: function (response) {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: response,
					confirmButtonText: 'OK',
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = 'students.php';
					}
				});
			},
		});
	}
}

/// ===================================== RLE SECTION===============================================================
$(document).on('click', '#search_rle_btn', function () {
	console.log('clicked');
	var rle_id = $(this).attr('id');
	console.log(rle_id);

	$.ajax({
		url: 'fetchrle.php',
		method: 'GET',
		dataType: 'json',
		success: function (res) {
			$('#modal_rleREQ').modal('show');
			var tbody = $('#modal_rleREQ .rlesearch_table');
			tbody.empty();
			$.each(res.data, function (index, res) {
				var row = '<tr>' + '<td>' + res.student_no + '</td>' + '<td>' + res.student_name + '</td>' + '<td>' + res.actions + '</td>' + '</tr>';
				tbody.append(row);
			});
		},
		error: function (xhr, status, error) {
			console.error(xhr.responseText);
		},
	});
});

$(document).on('click', '.select_rle', function () {
	var rle_id = $(this).attr('id');
	console.log(rle_id);

	$.ajax({
		type: 'POST',
		url: 'code.php',
		data: { rle_id: rle_id },
		dataType: 'json',
		success: function (res) {
			console.log(res);
			$('#modal_rleREQ').modal('hide');
			// $('#search_input').val('');
			$('#modal_rleADD #sID').val(res.s_id);
			$('#modal_rleADD #student_name').val(res.student_name);
		},
	});
});

$('#rlemed_add_btn').on('click', function (e) {
	e.preventDefault();
	console.log('clicked');

	var sID = $('#sID').val();
	var urinalysisFile = $('#urinalysis')[0].files[0];
	var xRayFile = $('#x_ray')[0].files[0];
	var pregnancyTestFile = $('#pregnancy_test')[0].files[0];
	var screeningFile = $('#screening')[0].files[0];
	var fecalysisFile = $('#fecalysis')[0].files[0];

	// Check if any of the required fields are empty
	if (!sID || !urinalysisFile || !xRayFile || !pregnancyTestFile || !screeningFile || !fecalysisFile) {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Please fill in all the required fields.',
		});
		return;
	}

	var formData = new FormData();
	formData.append('rlemed_add', true);
	formData.append('sID', sID);
	formData.append('urinalysis', urinalysisFile);
	formData.append('x_ray', xRayFile);
	formData.append('pregnancy_test', pregnancyTestFile);
	formData.append('screening', screeningFile);
	formData.append('fecalysis', fecalysisFile);

	$.ajax({
		type: 'POST',
		url: 'code.php',
		data: formData,
		contentType: false,
		processData: false,
		success: function (response) {
			if (response == 'success') {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Medical Successfully Created',
				});
				$('#rleform_add')[0].reset();
				$('#modal_rleADD').modal('hide');
				$('.rle_table').load(window.location.href + ' .rle_table');
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Failed to create',
				});
			}
		},
	});
});

/// ===================================== TEACHING SECTION===============================================================
$(document).on('click', '#search_teach_btn', function () {
	console.log('clicked');
	var teach_id = $(this).attr('id');
	console.log(teach_id);

	$.ajax({
		url: 'fetchteach.php',
		method: 'GET',
		dataType: 'json',
		success: function (res) {
			$('#modal_teachREQ').modal('show');
			var tbody = $('#modal_teachREQ .teachsearch_table');
			tbody.empty();
			$.each(res.data, function (index, res) {
				var row = '<tr>' + '<td>' + res.student_no + '</td>' + '<td>' + res.student_name + '</td>' + '<td>' + res.actions + '</td>' + '</tr>';
				tbody.append(row);
			});
		},
		error: function (xhr, status, error) {
			console.error(xhr.responseText);
		},
	});
});

$(document).on('click', '.select_teach', function () {
	var teach_id = $(this).attr('id');
	console.log(teach_id);

	$.ajax({
		type: 'POST',
		url: 'code.php',
		data: { teach_id: teach_id },
		dataType: 'json',
		success: function (res) {
			console.log(res);
			$('#modal_teachREQ').modal('hide');
			// $('#search_input').val('');
			$('#modal_teachADD #sID').val(res.s_id);
			$('#modal_teachADD #student_name').val(res.student_name);
		},
	});
});

$('#teachmed_add_btn').on('click', function (e) {
	e.preventDefault();
	console.log('clicked');

	var sID = $('#sID').val();
	var cbcFile = $('#cbc')[0].files[0];
	var urinalysisFile = $('#urinalysis')[0].files[0];
	var xRayFile = $('#x_ray')[0].files[0];

	// Check if any of the required fields are empty
	if (!sID || !cbcFile || !urinalysisFile || !xRayFile) {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Please fill in all the required fields.',
		});
		return;
	}

	var formData = new FormData();
	formData.append('teachmed_add', true);
	formData.append('sID', sID);
	formData.append('cbc', cbcFile);
	formData.append('urinalysis', urinalysisFile);
	formData.append('x_ray', xRayFile);

	$.ajax({
		type: 'POST',
		url: 'code.php',
		data: formData,
		contentType: false,
		processData: false,
		success: function (response) {
			if (response == 'success') {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Medical Successfully Created',
				});
				$('#teachform_add')[0].reset();
				$('#modal_teachADD').modal('hide');
				$('.teach_table').load(window.location.href + ' .teach_table');
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Failed to create',
				});
			}
		},
	});
});

/// ===================================== FOOD SECTION===============================================================
$(document).on('click', '#search_food_btn', function () {
	console.log('clicked');
	var food_id = $(this).attr('id');
	console.log(food_id);

	$.ajax({
		url: 'fetchfood.php',
		method: 'GET',
		dataType: 'json',
		success: function (res) {
			console.log(res);
			$('#modal_rleREQ').modal('show');
			var tbody = $('#modal_foodREQ .foodsearch_table');
			tbody.empty();
			$.each(res.data, function (index, res) {
				var row = '<tr>' + '<td>' + res.student_no + '</td>' + '<td>' + res.student_name + '</td>' + '<td>' + res.actions + '</td>' + '</tr>';
				tbody.append(row);
			});
		},
		error: function (xhr, status, error) {
			console.error(xhr.responseText);
		},
	});
});

$(document).on('click', '.select_food', function () {
	var food_id = $(this).attr('id');
	console.log(food_id);

	$.ajax({
		type: 'POST',
		url: 'code.php',
		data: { food_id: food_id },
		dataType: 'json',
		success: function (res) {
			console.log(res);
			$('#modal_foodREQ').modal('hide');
			// $('#search_input').val('');
			$('#modal_foodADD #sID').val(res.s_id);
			$('#modal_foodADD #student_name').val(res.student_name);
		},
	});
});

$('#foodmed_add_btn').on('click', function (e) {
	e.preventDefault();
	console.log('clicked');

	var sID = $('#sID').val();
	var urinalysisFile = $('#urinalysis')[0].files[0];
	var xRayFile = $('#x_ray')[0].files[0];
	var pregnancyTestFile = $('#pregnancy_test')[0].files[0];
	var screeningFile = $('#screening')[0].files[0];
	var fecalysisFile = $('#fecalysis')[0].files[0];

	// Check if any of the required fields are empty
	if (!sID || !urinalysisFile || !xRayFile || !pregnancyTestFile || !screeningFile || !fecalysisFile) {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Please fill in all the required fields.',
		});
		return;
	}

	var formData = new FormData();
	formData.append('rlemed_add', true);
	formData.append('sID', sID);
	formData.append('urinalysis', urinalysisFile);
	formData.append('x_ray', xRayFile);
	formData.append('pregnancy_test', pregnancyTestFile);
	formData.append('screening', screeningFile);
	formData.append('fecalysis', fecalysisFile);

	$.ajax({
		type: 'POST',
		url: 'code.php',
		data: formData,
		contentType: false,
		processData: false,
		success: function (response) {
			if (response == 'success') {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Medical Successfully Created',
				});
				$('#rleform_add')[0].reset();
				$('#modal_rleADD').modal('hide');
				$('.rle_table').load(window.location.href + ' .rle_table');
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Failed to create',
				});
			}
		},
	});
});

/// ===================================== CONSULT SECTION===============================================================
$(document).on('click', '#search_consult_btn', function () {
	console.log('clicked');
	var consult_id = $(this).attr('id');
	console.log(consult_id);

	$.ajax({
		url: 'fetchconsult.php',
		method: 'GET',
		dataType: 'json',
		success: function (res) {
			$('#modal_consultREQ').modal('show');
			var tbody = $('#modal_consultREQ .consultsearch_table');
			tbody.empty();
			$.each(res.data, function (index, res) {
				var row = '<tr>' + '<td>' + res.index + '</td>' + '<td>' + res.client_name + '</td>' + '<td>' + res.actions + '</td>' + '</tr>';
				tbody.append(row);
			});
		},
		error: function (xhr, status, error) {
			console.error(xhr.responseText);
		},
	});
});

$(document).on('click', '.select_consult', function () {
	var consult_id = $(this).attr('id');
	console.log(consult_id);

	$.ajax({
		type: 'POST',
		url: 'code.php',
		data: { consult_id: consult_id },
		dataType: 'json',
		success: function (res) {
			console.log(res);
			$('#modal_consultREQ').modal('hide');
			// $('#search_input').val('');
			$('#modal_consultADD #uID').val(res.u_id);
			$('#modal_consultADD #client_name').val(res.client_name);
		},
	});
});

$('#consult_add_btn').on('click', function (e) {
	e.preventDefault();
	console.log('clicked');

	var uID = $('#uID').val();
	var complaints = $('#complaints').val();
	var recommendation = $('#recommendation').val();
	var med_desc = $('#med_desc').val();

	// Initialize empty arrays to store selected medicines and quantities
	var medicines = [];
	var quantities = [];

	// Loop through each medicine input field
	$('select[name="medicine[]"]').each(function () {
		var medicineName = $(this).find('option:selected').text();
		var medicineId = $(this).val();

		// Find the corresponding quantity input field
		var quantity = $(this).closest('.row').find('input[name="quantity[]"]').val();
		// Add medicine name and quantity to arrays
		medicines.push({ name: medicineName, id: medicineId });
		quantities.push(quantity);
	});

	// Check if any of the required fields are empty
	if (!uID || !complaints || !recommendation) {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Please fill in all the required fields.',
		});
		return;
	}

	// Combine medicines and quantities into an array of objects
	var data = {
		consult_add: true,
		uID: uID,
		complaints: complaints,
		recommendation: recommendation,
		medicines: medicines,
		quantities: quantities,
		med_desc: med_desc,
	};

	console.log(data);

	$.ajax({
		type: 'POST',
		url: 'code.php',
		data: data,
		success: function (response) {
			console.log(response);
			if (response == 'success') {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Consultation Successfully Created',
				});
				$('#consultform_add')[0].reset();
				$('#modal_consultADD').modal('hide');
				$('.consult_table').load(window.location.href + ' .consult_table');
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Failed to create consultation',
				});
			}
		},
	});
});

$(document).on('click', '#consult_update_btn', function (e) {
	e.preventDefault();

	var ctId = $('#ct_id').val();
	var complaints = $('#complaints').val();
	var recommendation = $('#recommendation').val();
	var med_desc = $('#med_desc').val();

	var medicines = [];
	var quantities = [];

	$('select[name="medicine[]"]').each(function () {
		var medicineId = $(this).val();
		var quantity = $(this).closest('.row').find('input[name="quantity[]"]').val();

		medicines.push({ id: medicineId, cm_id: $(this).closest('.row').find('#cmID').val() });
		quantities.push(quantity);
	});

	if (!complaints || !recommendation) {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Please fill in all the required fields.',
		});
		return;
	}

	var data = {
		consult_update: true,
		ct_id: ctId,
		complaints: complaints,
		recommendation: recommendation,
		med_desc: med_desc,
		medicines: medicines,
		quantities: quantities,
	};

	console.log(quantities);

	$.ajax({
		type: 'POST',
		url: 'code.php',
		data: data,
		success: function (response) {
			console.log(response);
			if (response === 'success') {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Consultation Successfully Updated',
				});
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Failed to update consultation',
				});
			}
		},
	});
});

/// ===================================== MEDICINE SECTION===============================================================

$('#medicine_add_btn').on('click', function (e) {
	e.preventDefault();

	var medicine = $('#medicine').val();
	var quantity = $('#quantity').val();

	var data = {
		medicine_add: true,
		medicine: medicine,
		quantity: quantity,
	};

	$.ajax({
		type: 'POST',
		url: 'code.php',
		data: data,
		success: function (response) {
			if (response == 'success') {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Medicine Successfully Added',
				});
				$('#medicineform_add')[0].reset();
				$('#modal_medicineADD').modal('hide');
				$('.medicines_table').load(window.location.href + ' .medicines_table');
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Failed to add medcine',
				});
			}
		},
	});
});

$('#medicine_update_btn').on('click', function (e) {
	e.preventDefault();

	var mdn_id = $('#mdn_id').val();
	var medicine = $('#medicine').val();
	var quantity = $('#quantity').val();

	console.log(medicine);
	console.log(mdn_id);

	var data = {
		medicine_update: true,
		mdn_id: mdn_id,
		medicine: medicine,
		quantity: quantity,
	};

	console.log(data);

	$.ajax({
		type: 'POST',
		url: 'code.php',
		data: data,
		success: function (response) {
			if (response == 'success') {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Medicine Successfully Updated',
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = 'medicines.php';
					}
				});
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Medicine update failed',
				});
			}
		},
	});
});

function deleteMedicine(mdnID) {
	if (confirm('Are you sure you want to delete this Medicine?')) {
		$.ajax({
			url: 'code.php',
			type: 'GET',
			data: { mdn_idz: mdnID },
			success: function (response) {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: response,
					confirmButtonText: 'OK',
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = 'medicines.php';
					}
				});
			},
		});
	}
}
