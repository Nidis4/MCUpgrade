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
                	 // Send Ajax request to backend.php, with src set as "img" in the POST data
                	 var user = data['username'];
    				$.post("/session.php", {"user": user});

                    window.location.replace('../platform/index.php');
                }
                else {
                    alert("Έχετε πληκτρολογήσει λάθος στοιχεία. Παρακαλώ προσπαθήστε ξανά!");
                    location.reload();
                }
            }
        });
    return false;
});