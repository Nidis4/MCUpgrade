var apiLocation = 'http://upgrade.myconstructor.gr/webservices/api/';
/* Add here all your JS customizations */
$("#loginForm").submit(function(){
    
    apiLocation += 'admin/login.php';

    $.ajax({
            type: "POST",
            url: apiLocation,
            data: {
                username: $("#username").val(),
                password: $("#password").val()
            },
            dataType: "json",
            success: function(data)
            {
            	var result = data['ResultCode'];
            	//alert(data[0]);
            	//alert (result);
                if (result == '1') {
                    window.location.replace('../index.html');
                }
                else {
                    alert("Klarino");
                }
            }
        });
    return false;
});