function setAuthKey(session){
	var data = { session: session};
    $.ajax({
        type: "POST",
        url: 'tokenEndpoint.php',
        data: data,
        success: function (token) {
            document.getElementById("csrf_token").setAttribute("value", token.CSRF_token);
        },
        error: function(){
            alert('Invalid Token');
        }
    });
}