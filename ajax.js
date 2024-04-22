$(document).ready(function () {
	$('#login_btn').click(function () {
		var username = $('#username').val();
		var password = $('#password').val();

		if (!username.trim() || !password.trim()) {
			Swal.fire({
				icon: 'warning',
				title: 'Oops...',
				text: 'All fields are mandatory!',
			});
			return;
		}

		$.ajax({
			url: 'code.php',
			method: 'POST',
			data: {
				login_btn: true,
				username: username,
				password: password,
			},
			success: function (response) {
				if (response.trim() == 'success') {
					Swal.fire({
						icon: 'success',
						title: 'Login Successful!',
						text: 'Login.....',
						showConfirmButton: false,
						timer: 1500,
					}).then(function () {
						window.location.href = 'admin/index.php';
					});
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: response,
					});
				}
			},
		});
	});
});
