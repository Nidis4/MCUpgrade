var apiLocation = 'http://upgrade.myconstructor.gr/webservices/api/';
/* Add here all your JS customizations */
$("#loginForm").submit(function(){
    
    apiLocation += 'admin/login.php';
    alert("Submitted "+apiLocation);
    alert($("#username").val());
    alert($("#password").val());
    $.ajax({
            type: "POST",
            url: apiLocation,
            data: {
                username: $("#username").val(),
                password: $("#password").val()
            },
            success: function(data)
            {
            	alert(data);

            	var len = data.length;
            	for (i=0; i < len; i++){
            		post = data[i];
            		alert(post.username)
            	}
                if (data === 'Correct') {
                    //window.location.replace('admin/admin.php');
                }
                else {
                    alert("Klarino");
                }
            }
        });
    return false;
});