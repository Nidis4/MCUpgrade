/* Add here all your JS customizations */
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
                	 var fullname = name+" "+surname;
    				$.post("session.php", {"user": user , "fullname":fullname});

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

$('select#category').on('change', function() {
    var cat_id = this.value;
    //alert( this.value );
    $('select#applications').prop("disabled", false);
    var getApplicationsAPI = API_LOCATION+'application/readByCategory.php?cat_id='+cat_id;
    //alert(getApplicationsAPI);
    $("#applications").empty();
    $.ajax({
            type: "POST",
            url: getApplicationsAPI,
            dataType: "json",
            success: function(data)
            {
                //alert(data.length);
                 var htmlStr = '';
                $.each(data, function(k, v){
                    //htmlStr += v.id + ' ' + v.name + '<br />';
                    //alert(v.id);
                    htmlStr += '<option value="'+v.id+'">'+v.title_greek+'</option>';
               });
               $("#applications").append(htmlStr);
               
            }
        });
});


$("input#surname").keyup(function () {
    var searchRequest = null;
    var minlength = 3;
    var that = this,
    value = $(this).val();   

    if (value.length >= minlength ) {
        if (searchRequest != null) 
            searchRequest.abort();
            var getSearchAPI = API_LOCATION+'customer/search.php?s='+value;
            searchRequest = $.ajax({
                type: "POST",
                url: getSearchAPI,
                dataType: "json",
                success: function(data){
                    //we need to check if the value is the same
                    var htmlStr = '';
                    $("#suggestions").empty();
                    if (value==$(that).val()) {
                        $.each(data, function(k, v){
                            htmlStr += '<div id="'+v.id+'" class="selectCustomer" onclick="selectCustomer('+v.id+',\''+v.first_name+'\',\''+v.last_name+'\',\''+v.address+'\',\''
                            +v.mobile+'\',\''+v.phone+'\',\''+v.email+'\')">'+v.first_name+' '+v.last_name+': '+v.mobile+'</div>';
                       });
                    }
                    $("#suggestions").append(htmlStr);
                    $("#suggestions").show();
                }
            });
        }
        else{
            $("#suggestions").empty();
            $("#suggestions").hide();
        }
    });


function selectCustomer(id,first_name,last_name,address, mobile, phone,email){
    $("#suggestions").empty();
    $("#suggestions").hide();
    //alert(id);
    $("#surname").val(last_name);
    $("#firstname").val(first_name);
    $("#address").val(address);
    $("#mobile").val(mobile);
    $("#phone").val(phone);
    $("#email").val(email);
}


$( document ).ready(function() {
    setNavigation();
});

function setNavigation(){
    var path = window.location.pathname;
    path = path.replace(/\/$/,"");
    path = decodeURIComponent(path);

    $("a.nav-link").each(function () {
        //alert(path);
        var href = '/platform/'+$(this).attr('href');

        if (path.substring(0,href.length) === href){
            $(this).closest('li').addClass('nav-active');
            $(this).closest('.nav-parent').addClass('nav-active nav-expanded');
        }
    })
}

$( ".cancel-row" ).click(function() {
    var id = $(this).closest('tr').attr('data-item-id');
    if (confirm('Are you sure you want to cancel this appointment?')) {
        var getCancelAPI = API_LOCATION+'appointment/cancel.php?id='+id;
            cancelRequest = $.ajax({
                type: "POST",
                url: getCancelAPI,
                dataType: "json",
                success: function(data){
                    var result = data['ResultCode'];
                    if (result=='1'){
                         location.reload();
                    }
                }
            });
    } else {
        // Do nothing!
    }
    
}); // Cancel Appointment 

$( ".copy-row" ).click(function() {
    var id = $(this).closest('tr').attr('data-item-id');
    
    alert("Should be Implemented");
    
});