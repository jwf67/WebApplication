 function login() {
        var currentUser = document.loginform.user.value;
        var currentPassword = document.loginform.password.value;
        var u = "username"; 
        var p = "password";
		var au = "admin";
		var ap = "admin";
		
        if ((currentUser == u) && (currentPassword == p)) {
            return true;
        }
		else if ((currentUser == au) && (currentPassword == ap)){
			window.location="admin.html";
			alert ("Admin Login Successful.")
			return false;
		}
        else {
            alert ("Login was unsuccessful, please check your username and password");
            return false;
        }
  }
