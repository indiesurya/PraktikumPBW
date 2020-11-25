
function validasi() {
	if (document.forms["register"]["nama"].value != "") {
		if (document.forms["register"]["nomor"].value != "") {
			if (document.forms["register"]["email"].value != "") {
				if (document.forms["register"]["alamat"].value != "") {
					if (document.forms["register"]["password1"].value != "") {
						if (document.forms["register"]["password2"].value != "") {
							alert("Semua data terisi dengan benar");
	                        document.getElementById("register").submit();
	                        return true;
	                    }	
	                    else {
                        	alert("Konfirmasi Password tidak boleh kosong");
                        return false;
                    	}
                    else {
                        alert("Password tidak boleh kosong");
                        return false;
                    }
                else {
                	alert("Alamat tidak boleh kosong");
                	return false;
                }
            else {
            	alert("Email tidak boleh kosong");
            	return false;
            }
        else {
        	alert("Nomor tidak boleh kosong");
        	return false;
        }
    else {
    	alert("Nama tidak boleh kosong");
    	return false;
    }
}
