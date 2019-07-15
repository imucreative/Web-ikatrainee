$(document).ready(function(){
	var user	= $("#username");
	var pass	= $("#password");

	user.focus();
	$('#tombolLogin').click(function(){
		if (user.val() == ""){
			//Untuk Notif keren glitter
			$.gritter.add({
				title: 'Attention',
				text: '* Please Input Username',
				sticky: false,
				time: '',
				class_name: 'gritter-error'
			});
			user.focus();
			return false;
		}else if (pass.val() == ""){
			$.gritter.add({
				title: 'Attention',
				text: '* Please Input Password',
				sticky: false,
				time: '',
				class_name: 'gritter-error'
			});
			pass.focus();
			return false;
		}else if(user.val() != '' && pass.val() != ''){
			var UrlToPass = 'username='+user.val()+'&password='+pass.val();
			$.ajax({
				type	: 'POST',
				data	: UrlToPass,
				url		: 'assets/config/cekLogin.php',
				success	: function(response){
					if(response == 2){
						$.gritter.add({
							title: 'Attention',
							text: '* Username and Password Fail',
							sticky: false,
							time: '',
							class_name: 'gritter-error'
						});
						user.focus();
						return false;
					}else if(response == 1){
						window.location = 'index.php';
					}else{
						alert("Problem with sql query");
					}
				}
			});
		}
		return false;
	});
});