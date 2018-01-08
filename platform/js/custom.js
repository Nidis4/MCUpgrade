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
                 htmlStr += '<option value="" disabled selected>Select your option</option>';
                $.each(data, function(k, v){
                    //htmlStr += v.id + ' ' + v.name + '<br />';
                    //alert(v.id);

                    if (v.id!=undefined){
                        htmlStr += '<option value="'+v.id+'" minp="'+v.min_price+'" dur="60">'+v.title_greek+'</option>';
                    }
                    else{

                    }
               });
               $("#applications").append(htmlStr);
               
            }
        });

    // To get the Questions for the Selected Category
    var getApplicationsQue = API_LOCATION+'application/readByCategoryQue.php?cat_id='+cat_id;
    $.ajax({
            type: "POST",
            url: getApplicationsQue,
            dataType: "html",
            success: function(data)
            {
               $(".application_questions").append(data);
               
            }
        });
});

$('select#applications').on('change', function() {
    var minprice = $('select#applications option:selected').attr('minp');
    var duration = $('select#applications option:selected').attr('dur');

    $('#budget').val(minprice);
    $('#duration').val(duration);
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
                            if (v.id!=undefined){
                                htmlStr += '<div id="'+v.id+'" class="selectCustomer" onclick="selectCustomer('+v.id+',\''+v.first_name+'\',\''+v.last_name+'\',\''+v.address+'\',\''
                                +v.mobile+'\',\''+v.phone+'\',\''+v.email+'\')">'+v.first_name+' '+v.last_name+': '+v.mobile+'</div>';
                            }
                            else{
                                htmlStr += 'No such Customer';
                            }
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

$("input#budget").keyup(function () {
    var commision = $('select#category option:selected').attr('comm');
    //alert(commision);

    var comm = $("#budget").val()*commision/100;
     $("#commision").val(comm);
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

$( ".createAppointment" ).click(function() {
    var agent = $("#agent").attr('agentUser');
    var application = $("#applications").val();
    var county = $("#county").val();
    var budget = $("#budget").val();
    var commision = $("#commision").val();
    var startDate = $("#startDate").val();
    var endDate = $("#endDate").val();

    var surname = $("#surname").val();
    var firstname = $("#firstname").val();
    var sex = $("#sex").val();
    var address = $("#pac-input-address").val();
    var mobile = $("#mobile").val();
    var phone = $("#phone").val();
    var email = $("#email").val();
    

    //alert("email "+email);
    if (address=="" || application == null || county == "" || startDate == "" || endDate == ""){
        alert("Empty Address");
    }
    else{ 
        //alert("County: "+county);
        //alert("Application: "+application);
        //alert("Start: "+startDate);
        //alert("End: "+endDate);
        //alert("Address: "+address);
        var getAvailableAPI = API_LOCATION+'professional/available.php?county_id='+county+'&application_id='+application+'&startDate='+startDate+'&endDate='+endDate+'&address='+address;

        $.ajax({
            type: "POST",
            url: getAvailableAPI,
            dataType: "json",
            success: function(data)
            {
                $("#available").empty();
                 var htmlStr = "";
                 var first = 100000;
                 var second= 100000;
                 var third = 100000;
                $.each(data, function(k, v){

                    if (v.distance < third){
                        if (v.distance < second){
                            if (v.distance < first){
                                third = second;
                                second = first;
                                first = v.distance;
                            }
                            else{
                                third = second;
                                second = v.distance;
                            }
                        }
                        else{
                            third = v.distance;
                        }
                    }

                            //alert(v.first_name+" "+v.last_name+": "+v.distance);
                            htmlStr += "<div class='profile' id='"+v.id+"'><div class='name'>"+v.first_name+" "+v.last_name+"</div><div class='distance'>"+v.distance+"</div>";
                             if (v.busy!=undefined){
                                htmlStr += "<div class='busy'>";
                                 $.each(v.busy, function(z, x){
                                    //alert(x.date+" "+x.timeslot);
                                    htmlStr += "<div class='timeslots'>"+x.date+" "+x.timeslot+" στο "+x.address+" - "+x.distance+"</div>";
                                    if (x.distance < third){
                                        if (x.distance < second){
                                            if (x.distance < first){
                                                third = second;
                                                second = first;
                                                first = x.distance;
                                            }
                                            else{
                                                third = second;
                                                second = x.distance;
                                            }
                                        }
                                        else{
                                            third = x.distance;
                                        }
                                    }
                                 });
                                 htmlStr += "</div>";
                             }
                             htmlStr += "</div>";
                       });
                $("#available").append(htmlStr);

                alert("First Choice "+first);
                alert("Second Choice "+second);
                alert("third Choice "+third);
            }
        });

    }
});