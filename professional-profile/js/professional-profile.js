$("#loginForm").submit(function(){
    
    
    var getLoginAPI = API_LOCATION+'professional/login.php';

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
                     var type = data['type'];
                     //alert(user);
                     //return false;
                     $.post(
                                "session.php", 
                                {"user": user , "fullname":fullname, "id":id, "type":type},
                                function(result){
                                    window.location.replace('../professional-profile/index.php');
                                }
                            );
                            

                    //window.location.replace('../professional-profile/index.php');
                }
                else {
                    alert(data['message']);
                    location.reload();
                }
            }
        });
    return false;
});

$("#forgetForm").submit(function(){   
    
    var getLoginAPI = API_LOCATION+'professional/forget_password.php';

    $.ajax({
            type: "POST",
            url: getLoginAPI,
            data: {
                email: $("#email").val()
            },
            dataType: "json",
            success: function(data)
            {
                var result = data['ResultCode'];
                //alert(data[0]);
                //alert (result);
                if (result == '1') {
                     // Send Ajax request to backend.php, with src set as "img" in the POST data
                    alert(data['message']);
                    window.location.replace('../professional-profile/login.html');
                    //location.reload();
                            

                    //window.location.replace('../professional-profile/index.php');
                }
                else {
                    alert(data['message']);
                    location.reload();
                }
            }
        });
    return false;
});

$("#resetForm").submit(function(){   
    
    var getLoginAPI = API_LOCATION+'professional/reset_password.php';

    var pass = $("#password").val();
    var cpass = $("#cpassword").val();
    var resetkey = $("#resetkey").val();

    if(pass == ""){
        alert('Please enter password');
        return false;
    }

    if(cpass == ""){
        alert('Please enter confirm password');
        return false;
    }

    if(cpass != pass){
        alert('Password and confirm password should be same.');
        return false;
    }

    if(resetkey == ""){
        alert('Invalid key!');
        return false;
    }

    $.ajax({
            type: "POST",
            url: getLoginAPI,
            data: {
                password: pass,
                resetkey: resetkey
            },
            dataType: "json",
            success: function(data)
            {
                var result = data['ResultCode'];
                //alert(data[0]);
                //alert (result);
                if (result == '1') {
                     // Send Ajax request to backend.php, with src set as "img" in the POST data
                    alert(data['message']);
                    //location.reload();
                            

                    window.location.replace('../professional-profile/login.html');
                }
                else {
                    alert(data['message']);
                    window.location.replace('../professional-profile/login.html');
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


$(document).ready(function(){

    $('select#category').on('change', function() {
        var cat_id = this.value;
        var name = $('select#category option:selected').attr('data-name');
        var prof_id = $('select#category option:selected').attr('data-prof');
        //alert(name);
        $(".profScores").empty();

        var getScoreAPI = API_LOCATION+'professional/getScore.php?cat_id='+cat_id;
        //alert(getScoreAPI);
        $.ajax({
                type: "POST",
                url: getScoreAPI,
                dataType: "json",
                success: function(data)
                {
                    //alert(data.length);
                     var htmlStr = '';
                     //htmlStr += '<option value="" disabled selected>Select your option</option>';
                    var i = 0;
                    $.each(data, function(k, v){
                        //htmlStr += v.id + ' ' + v.name + '<br />';
                        
                        if (v.professional_id!=undefined){
                            i += 1;
                            if (prof_id==v.professional_id){
                                htmlStr += "<tr class='mypossition'>";
                            }
                            else {
                                htmlStr += "<tr>";
                            }
                            htmlStr += "<td>"+i+"</td>";
                            htmlStr += "<td>"+v.firstname+" "+v.lastname+"</td>";
                            htmlStr += "<td><span class='badge badge-success'>"+name+"</td>";
                            htmlStr += "<td><div class='progress progress-sm progress-half-rounded m-0 mt-1 light'><div class='progress-bar progress-bar-primary' role='progressbar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100' style='width: "+v.score+"%;'>"+v.score+"</div></div></td>";
                            htmlStr += "</tr>";
                        }
                        else{

                        }
                   });
                   $(".profScores").append(htmlStr);
                   
                }
            });

    });
});