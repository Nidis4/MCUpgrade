$("#loginForm").submit(function(){
    
    
    var getLoginAPI = API_LOCATION+'admin/login.php';

    $.ajax({
            type: "POST",
            url: getLoginAPI,
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
                     var name = data['first_name'];
                     var surname = data['last_name'];
                     var id = data['id'];
                     var fullname = name+" "+surname;
                    $.post("session.php", {"user": user , "fullname":fullname, "id":id});

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

    $(document).ready(function () {
        $('.mobile-menu').click(function(){
            $('#sidebar').toggleClass('hide-menu');
            $('div#content').toggleClass('sidbar-mar-left');
        });
    });
    $(document).ready(function(){
        $('.read-more-btn').click(function(){
            $(this).next('div.read-more-txt').css('display','inline');
            $(this).css('display','none');
        });

        $('.read-less-btn').click(function(){
                $(this).closest('div.read-more-txt').css('display','none');
                $(this).closest('div.read-more-txt').prev().css('display','inline');
         });
    });