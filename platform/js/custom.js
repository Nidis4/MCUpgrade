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
                     var id = data['id'];
                     var fullname = name+" "+surname;
                	 var type = data['type'];
                     // $.post("session.php", {"user": user , "fullname":fullname, "id":id "type":type});

        //             window.location.replace('../platform/index.php');
                    $.post(
                                "session.php", 
                                {"user": user , "fullname":fullname, "id":id, "type":type},
                                function(result){
                                    window.location.replace('../platform/index.php');
                                }
                            );
                }
                else {
                    alert("Έχετε πληκτρολογήσει λάθος στοιχεία. Παρακαλώ προσπαθήστε ξανά!");
                    location.reload();
                }
            }
        });
    return false;
});

$('select#appointmentStatus').on('change', function() {
    var status_id = this.value;
    //alert(status_id);

    $('.status').css("display", "none");
    $('body').removeAttr('id');

    $('.status-'+status_id).css("display", "block");
    $('body').attr('id','status-'+status_id);

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
                 //htmlStr += '<option value="" disabled selected>Select your option</option>';
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

    if(cat_id == "103"){
        $('#deliverydisplay').css('display','block');
    }else{
        $('#deliverydisplay').css('display','none');
    }

    // To get the Questions for the Selected Category
    var getApplicationsQue = API_LOCATION+'application/readByCategoryQue.php?cat_id='+cat_id;
    $.ajax({
            type: "POST",
            url: getApplicationsQue,
            dataType: "html",
            success: function(data)
            {
               $(".application_questions").html(data);
               
            }
        });
});

$('select#applications').on('change', function() {
    var minprice = $('select#applications option:selected').attr('minp');
    var duration = $('select#applications option:selected').attr('dur');
    var id = $(this).val();
    if(id == "69" || id == "70" || id == "71" || id == "72" || id == "196" || id == "198" || id == "216" || id == "218" || id == "219"){
        $('#deliverydisplay').css('display','block');
    }else{
        $('#deliverydisplay').css('display','none');
    }

    $('#budget').val(minprice);
    $('#budget').keyup();
    $('#duration').val(duration);


});

var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

$("input#surname").keyup(function () {
    var searchRequest = null;
    var minlength = 3;
    var that = this,
    value = $(this).val();   

    if (value.length >= minlength ) {

        delay(function(){

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
         
         }, 500 );
        
        } // if length
        else{
            $("#suggestions").empty();
            $("#suggestions").hide();
        }
    });

$("input#budget").keyup(function () {
    var commision = $('select#category option:selected').attr('comm');
    var comm = $("#budget").val()*commision/100;
    comm = Math.round(comm * 100) / 100;
     $("#commision").val(comm);
});


function selectCustomer(id,first_name,last_name,address, mobile, phone,email){
    $("#suggestions").empty();
    $("#suggestions").hide();
    //alert(id);
    $("#surname").val(last_name);
    $("#firstname").val(first_name);
    //alert(address);
    $("#pac-input-address").val(address);
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

// $( ".cancel-row" ).click(function() {
//     var id = $(this).closest('tr').attr('data-item-id');
//     if (confirm('Are you sure you want to cancel this appointment?')) {
//         var getCancelAPI = API_LOCATION+'appointment/cancel.php?id='+id;
//             cancelRequest = $.ajax({
//                 type: "POST",
//                 url: getCancelAPI,
//                 dataType: "json",
//                 success: function(data){
//                     var result = data['ResultCode'];
//                     if (result=='1'){
//                          location.reload();
//                     }
//                 }
//             });
//     } else {
//         // Do nothing!
//     }
    
// }); // Cancel Appointment 

$( ".copy-row" ).click(function() {
    var id = $(this).closest('tr').attr('data-item-id');
    //alert(id);

    var getCloneAPI = API_LOCATION+'appointment/clone.php?app_id='+id;
    
    $.ajax({
        type: "POST",
        url: getCloneAPI,
        dataType: "json",
        success: function(data)
            {
                alert("Cloned Appointment Created");
                window.location.replace('../platform/appointments.php');
            }
        });
    
});

$('#custSearch .form-group input').keypress(function(e){
        if(e.which == 13){//Enter key pressed
            //alert("Clicked");
            $('#searchCustomer').click();//Trigger search button click event
        }
});

$( "#searchCustomer" ).click(function() {
    //alert("Search Customer");
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var mobile = $("#mobile").val();
    var email = $("#email").val();

    var getAvailableAPI = API_LOCATION+'customer/searchList.php?n='+first_name+'&s='+last_name+'&m='+mobile+'&e='+email;
    //alert(getAvailableAPI);

    $.ajax({
        type: "POST",
        url: getAvailableAPI,
        dataType: "json",
        success: function(data)
        {
            htmlStr = "";
            $("#customers-table").empty();
            $.each(data, function(k, v){
                if (v.id!=undefined){
                    htmlStr += '<tr data-item-id="'+v.id+'"><td>'+v.first_name+' '+v.last_name+'</td><td>'+v.mobile+'</td><td>'+v.email+'</td><td>'+v.sex+'</td><td>'+v.landline+'</td><td>'+v.address+'</td><td class="actions"><a href="customer.php?id='+v.id+'" class="on-default edit-row"><i class="fa fa-pencil"></i></a></td></tr>';
                }
            });
            $("#customers-table").append(htmlStr);
            }
        });
});

$('#profSearch .form-group input').keypress(function(e){
        if(e.which == 13){//Enter key pressed
            //alert("Clicked");
            $('#searchProfessional').click();//Trigger search button click event
        }
});

$( "#searchProfessional" ).click(function() {
    //alert("Search professional");
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var mobile = $("#mobile").val();
    var address = $("#address").val();

    var getAvailableAPI = API_LOCATION+'professional/searchList.php?n='+first_name+'&s='+last_name+'&m='+mobile+'&e='+address;
    //alert(getAvailableAPI);

    $.ajax({
        type: "POST",
        url: getAvailableAPI,
        dataType: "json",
        success: function(data)
        {
            htmlStr = "";
            $("#customers-table").empty();
            $.each(data, function(k, v){
                if (v.id!=undefined){
                    htmlStr += '<tr data-item-id="'+v.id+'"><td>'+v.first_name+' '+v.last_name+'</td><td>'+v.mobile+'</td><td>'+v.landline+'</td><td>'+v.address+'</td><td>'+v.admin_comments+'</td><td class="actions"><a href="professional.php?id='+v.id+'" class="on-default edit-row"><i class="fa fa-pencil"></i></a></td></tr>';
                }    
            });
            $("#customers-table").append(htmlStr);

            }
        });

});

$( ".updateTag" ).click(function() {
    var tagId = $(this).attr('id');
    var id = tagId.substring(9);
    
    var text = $('textarea#textarea'+id).val();
    var meta_title = $('#meta_title'+id).val();
    var meta_description = $('#meta_description'+id).val();
    var meta_robots = $('#meta_robots'+id).val();
    var permalink = $('#permalink'+id).val();
    //alert("Should be Implemented:"+id+" "+meta_title);

    var updateTagsAPI = API_LOCATION+'application/updateTags.php';
    //alert(updateTagsAPI);
    $.ajax({
        type: "POST",
        url: updateTagsAPI,
        data: {
            id: id,
            tags: text,
            meta_title: meta_title,
            meta_description: meta_description,
            meta_robots: meta_robots,
            permalink: permalink
        },
        success: function(data)
        {
            alert("Meta Information Saved!");
        }
    });
    
});

$( ".updateCat" ).click(function() {
    var tagId = $(this).attr('id');
    var id = tagId.substring(9);
    
    var meta_title = $('#meta_title'+id).val();
    var meta_description = $('#meta_description'+id).val();
    var meta_robots = $('#meta_robots'+id).val();
    var permalink = $('#permalink'+id).val();
    alert("Should be Implemented:"+id+" "+meta_title);

    var updateCatAPI = API_LOCATION+'category/updateCat.php';
    //alert(updateTagsAPI);
    $.ajax({
        type: "POST",
        url: updateCatAPI,
        data: {
            id: id,
            meta_title: meta_title,
            meta_description: meta_description,
            meta_robots: meta_robots,
            permalink: permalink
        },
        success: function(data)
        {
            alert("Meta Information Saved!");
        }
    });
    
});

$("input#startDate").change(function(){
    //alert("The text has been changed.");
    var date = new Date($("#startDate").val()); 
    var days = 4;
    //alert(date);
    if(!isNaN(date.getTime())){
        date.setDate(date.getDate() + days);
            
        $("#endDate").val(date.toInputFormat());
    } else {
        alert("Invalid Date");  
    }

});

Date.prototype.toInputFormat = function() {
       var yyyy = this.getFullYear().toString();
       var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
       var dd  = this.getDate().toString();
       return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
    };

$(document).on('click','#available .profile',function() {
    $('.profile').removeClass('selectedProf');
    $('.calendar').css('display','none');
    var prof_id = this.id;
    $( "#"+prof_id ).addClass('selectedProf');
    $('.calendar'+prof_id).css('display','block');
});

// $(document).on('click','#available .profile .name span',function() {
//     var prof_id = this.rel;

// });


$( ".createOffer" ).click(function() {
    //alert("Create Offer");
    var agent = $("#agent").attr('agentUser');

    var status = $("#appointmentStatus").val();
    var application = $("#applications").val();
    var category = $("#category").val();
    var county = $("#county").val();
    var budget = $("#budget").val();
    var commision = $("#commision").val();
    var comments = $("#comment123").val();

    var surname = $("#surname").val();
    var firstname = $("#firstname").val();
    var sex = $("#sex").val();
    var address = $("#pac-input-address").val();
    var mobile = $("#mobile").val();
    var phone = $("#phone").val();
    var email = $("#email").val();


    // Check if all fields are correct
    if(mobile==""){
        alert('Please fill in the Mobile');
    }
    else{
        // Find/Insert Customer data
        var findCustomerAPI = API_LOCATION+'customer/search_by_mobile.php?mobile='+mobile;
        $.ajax({
            type: "POST",
            url: findCustomerAPI,
            data: {
                surname: surname,
                firstname: firstname,
                address: address,
                mobile: mobile,
                sex: sex,
                phone: phone,
                email: email
            },
            dataType: "json",
            success: function(data)
            {

                var customer_id = data;
                //alert(customer_id);
                //var date = "2018-05-05";
                //var time ="10:00-12:00";
                

                var createOfferAPI = API_LOCATION+'appointment/createOffer.php';
                //alert(createOfferAPI);
                //create($prod_id, $cust_id, $application_id, $date, $time, $address, $budget, $commision, $agent_id, $comment);
                $.ajax({
                    type: "POST",
                    url: createOfferAPI,
                    data: {
                        cust_id : customer_id,
                        application_id: application,
                        category_id: category,
                        address: address,
                        budget: budget,
                        county_id: county,
                        commision: commision,
                        agent_id: agent,
                        comment: comments,
                        mobile: mobile,
                        phone: phone,
                        surname: surname,
                        firstname: firstname,                        
                        sex: sex,
                        email: email,
                        status: status
                    },
                    //dataType: "json",
                    success: function(data)
                    {
                        //alert(data);

                        alert("Offer Created");
                        window.location.replace('../platform/offers.php');
                    },
                    error: function(data){
                        alert(data);
                    }
                });

            }
        });
        return false;

        


        

    }
});

$( ".createAppointment" ).click(function() {
    //alert("Create");
    var professional = $('.selectedProf').attr('id');
    //alert(professional);

    var agent = $("#agent").attr('agentUser');
    //alert(agent);
    var status = $("#appointmentStatus").val();
    var application = $("#applications").val();
    var category = $("#category").val();
    var county = $("#county").val();
    var budget = $("#budget").val();
    var commision = $("#commision").val();
    var startDate = $("#startDate").val();
    var endDate = $("#endDate").val();
    var comments = $("#comment123").val();

    var surname = $("#surname").val();
    var firstname = $("#firstname").val();
    var sex = $("#sex").val();
    var address = $("#pac-input-address").val();

    if($("#sendinvoice").is(':checked')){
        var sendinvoice = 1;
    }else{
        var sendinvoice = 0;
    }

    if($('#delivery_address').length){
        var delivery_address = $("#delivery_address").val();
    }else{
        var delivery_address = "";
    } 

    var mobile = $("#mobile").val();
    var phone = $("#phone").val();
    var email = $("#email").val();

    var date = $("#appDate").html();
    var time = $("#appTime").html();

    if($("#employersms").is(':checked')){
        var employersms = 1;
    }else{
        var employersms = 0;
    }

    if($("#professionalsms").is(':checked')){
        var professionalsms = 1;
    }else{
        var professionalsms = 0;
    }


    // Check if all fields are correct
    if (surname==""){
        alert('Please fill in the Surname');
    }
    else if(firstname==""){
        alert('Please fill in the Name');
    }
    else if(address==""){
        alert('Please fill in the Address');
    }
    else if(mobile==""){
        alert('Please fill in the Mobile');
    }
    else{
        // Find/Insert Customer data
        var findCustomerAPI = API_LOCATION+'customer/search_by_mobile.php?mobile='+mobile;
        $.ajax({
            type: "POST",
            url: findCustomerAPI,
            data: {
                surname: surname,
                firstname: firstname,
                address: address,
                mobile: mobile,
                sex: sex,
                phone: phone,
                email: email,
                date: date,
                time: time
            },
            dataType: "json",
            success: function(data)
            {
                var customer_id = data;
                //var date = "2018-05-05";
                //var time ="10:00-12:00";
                
                if(sendinvoice == 1){
                    var checkinvoiceAPI = API_LOCATION+'customer/getInvoiceSettings.php?id='+customer_id;
                    $.ajax({
                        type: "POST",
                        url: checkinvoiceAPI,
                        data: "",
                        dataType: "json",
                        success: function(data)
                        {
                            if(data.message != ""){
                                alert("Please update the Customer's Invoice Setting data!");
                                return false;
                            }else{
                                var createAppointAPI = API_LOCATION+'appointment/create.php';
                                //create($prod_id, $cust_id, $application_id, $date, $time, $address, $budget, $commision, $agent_id, $comment);
                                $.ajax({
                                        type: "POST",
                                        url: createAppointAPI,
                                        data: {
                                            status: status,
                                            surname: surname,
                                            firstname: firstname,
                                            address: address,
                                            delivery_address: delivery_address,
                                            mobile: mobile,
                                            sex: sex,
                                            phone: phone,
                                            email: email,
                                            prof_id : professional,
                                            cust_id : customer_id,
                                            application_id: application,
                                            category_id: category,
                                            date: date,
                                            time: time,
                                            address: address,
                                            budget: budget,
                                            commision: commision,
                                            agent_id: agent,
                                            comment: comments,
                                            professionalsms: professionalsms,
                                            employersms: employersms,
                                            county_id: county,
                                            sendinvoice: sendinvoice,
                                            issuetype: data.record.viewtype
                                        },
                                        dataType: "json",
                                        success: function(data)
                                        {
                                            alert("Appointment Booked");
                                            window.location.replace('../platform/appointments.php');
                                        }
                                    });
                            }
                            //alert("Appointment Booked");
                            //window.location.replace('../platform/appointments.php');
                        }
                    });                    

                }else{
                    var createAppointAPI = API_LOCATION+'appointment/create.php';
                    //create($prod_id, $cust_id, $application_id, $date, $time, $address, $budget, $commision, $agent_id, $comment);
                    $.ajax({
                            type: "POST",
                            url: createAppointAPI,
                            data: {
                                status: status,
                                surname: surname,
                                firstname: firstname,
                                address: address,
                                delivery_address: delivery_address,
                                mobile: mobile,
                                sex: sex,
                                phone: phone,
                                email: email,
                                prof_id : professional,
                                cust_id : customer_id,
                                application_id: application,
                                category_id: category,
                                date: date,
                                time: time,
                                address: address,
                                budget: budget,
                                commision: commision,
                                agent_id: agent,
                                comment: comments,
                                professionalsms: professionalsms,
                                employersms: employersms,
                                county_id: county,
                                sendinvoice: sendinvoice
                            },
                            dataType: "json",
                            success: function(data)
                            {
                                //alert(data);

                                alert("Appointment Booked");
                                window.location.replace('../platform/appointments.php');
                            }
                        });    
                }



                

            }
        });
        return false;

        


        

    }
});



$( ".updateAppointment" ).click(function() { 




});



$( ".createCall" ).click(function() {
    var CallId = $("#CallId").val();
    var commentcall = $("#commentcall").val();
    var createCallintAPI = API_LOCATION+'call/create.php';
        $.ajax({
            type: "POST",
            url: createCallintAPI,
            data: {
                CallId: CallId,
                commentcall: commentcall,
                
            },
            dataType: "json",
            success: function(data)
            {
                alert("Call saved");
                window.location.replace('../platform/calls.php');
            }
        });
});
$( ".findProfessionals" ).click(function() {
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
        alert("Please check the following fields: Address, Application, County, Start and End Date");
    }
    else{ 




        //alert("County: "+county);
        //alert("Application: "+application);
        //alert("Start: "+startDate);
        //alert("End: "+endDate);
        //alert("Address: "+address);
        
        var getAvailableAPI = API_LOCATION+'professional/getCalendarForBooking.php?duration='+duration+'&county_id='+county+'&application_id='+application+'&startDate='+startDate+'&endDate='+endDate+'&address='+address;

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
                 var firstProf = "";
                 var secondProf = "";
                 var thirdProf = "";

                 var singleDay = "";
                 singleDay = "<div class='row singleDay calendar'>";

                $.each(data, function(k, v){

                    var profDistance = v.distance;
                    if (profDistance == "Unknown"){
                        profDistance = 100000;
                    }else{
                        profDistance = v.distance;
                    }
                    var profID = v.id;
                    var profName = v.first_name+" "+v.last_name;

                    var dateAvail = startDate;
                    var timeAvail = "06:00";


                    if (v.busy!=undefined){
                        $.each(v.busy, function(z, x){

                            if (x.distance < profDistance){
                                profDistance = x.distance;
                                dateAvail = x.date;
                                timeAvail = x.timeslot;
                            }
                        });
                    } // Busy Slots
                    
                    var calendarCode = "";
                    //alert(v.calendar);
                    if (startDate == endDate) {
                        //alert("Same");
                        if (v.calendar!=undefined){
                            $.each(v.calendar, function(z, x){
                                var currentDate = new Date(x.date+" "+x.timefrom);
                                var today = new Date();
                                var disabled = "disabled";
                                if (currentDate > today){
                                  disabled = "";
                                }
                                if (x.timefrom=="06:00"){
                                    singleDay += "<div class='col-md-2 profile availProf' id='"+profID+"' data-listing-distance='"+profDistance+"'><div class='row calName text-center'><div class='col-md-12'><div class='comp'><span>"+profName+"</span></div><span>"+profDistance+"</span></div></div><ul class='selectable' id='selectable-"+profID+"'>";
                                }                         
                                if (x.address == ""){
                                    singleDay += "<li class='free slot "+disabled+"' timefrom='"+x.timefrom+"' timeto='"+x.timeto+"' data-dateslot='"+x.date+"'>"+x.timefrom+":</li>";
                                }
                                else{
                                    singleDay += "<li class='busy slot "+disabled+"' timefrom='"+x.timefrom+"' timeto='"+x.timeto+"' data-dateslot='"+x.date+"'>"+x.timefrom+": "+x.address+" "+x.distance+"</li>";
                                }
                                if(x.timeto == "22:00"){
                                    singleDay += "</ul></div>";
                                }

                            });
                        }
                    }
                    else {
                        if (v.calendar!=undefined){
                            calendarCode += "<div class='row'>";
                            
                            $.each(v.calendar, function(z, x){
                                var currentDate = new Date(x.date+" "+x.timefrom);
                                var today = new Date();
                                var disabled = "disabled";
                                if (currentDate > today){
                                  disabled = "";
                                }
                                if (x.timefrom=="06:00"){
                                    calendarCode += "<div class='col-md-2'><div class='row calDate text-center'><div class='col-md-12'>"+x.date+"</div></div><ul class='selectable' id='selectable-"+profID+"'>";
                                }                         
                                if (x.address == ""){
                                    calendarCode += "<li class='free slot "+disabled+"' timefrom='"+x.timefrom+"' timeto='"+x.timeto+"' data-dateslot='"+x.date+"'>"+x.timefrom+":</li>";
                                }
                                else{
                                    calendarCode += "<li class='busy slot "+disabled+"' timefrom='"+x.timefrom+"' timeto='"+x.timeto+"' data-dateslot='"+x.date+"'>"+x.timefrom+": "+x.address+" "+x.distance+"</li>";
                                }
                                if(x.timeto == "22:00"){
                                    calendarCode += "</ul></div>";
                                }

                            });
                            calendarCode += "</div>";
                        } // Calendar Slots
                        
                        // address
                        var vaddress = v.address;
                        var vcat = v.truck_cat;
                        var vdimensions = "";
                        if(vcat == 1){
                            var door = "";
                            if(v.truck_dimensions['door'] == "1"){
                                door = "Hydraulic";
                            }
                            vdimensions = "H:"+v.truck_dimensions['height']+" W:"+v.truck_dimensions['width']+" l:"+v.truck_dimensions['length']+" "+door;
                        }
                        
                        htmlStr += "<div class='col-md-12 availProf' data-listing-distance='"+profDistance+"'><div class='row'><div class='col-md-12'><div class='profile' id='"+profID+"'><div class='name'><a href='"+SITE_LOCATION+"platform/professional.php?id="+profID+"' target='blank'>"+profName+"</a><br>"+vaddress+"<br>"+vdimensions+"</div><div class='appointDate'>"+dateAvail+" "+timeAvail+"</div><div class='distance'>"+profDistance+"</div> SELECT</div></div></div><div class='col-md-12 calendar calendar"+profID+"'>"+calendarCode+"</div></div>";
                    }
                  
                });
                
                //$("#available").append(htmlStr);
                //$("#available").append(firstProf);
                //$("#available").append(secondProf);
                //$("#available").append(thirdProf);
                if (startDate == endDate) {
                    singleDay += "</div>";
                    $("#available").append(singleDay);

                    var divList = $(".availProf");
                    divList.sort(function(a, b){
                        return $(a).data("listing-distance")-$(b).data("listing-distance")
                    });
                    $("#available > .row").html(divList);

                }
                else{
                    $("#available").append(htmlStr);

                    var divList = $(".availProf");
                    divList.sort(function(a, b){
                        return $(a).data("listing-distance")-$(b).data("listing-distance")
                    });
                    $("#available").html(divList);
                }

                

                $(".available").show();
                $( ".calendar" ).selectable({
                        filter: ".slot.free",
                      stop: function() {
                        var result = $( "#chosen-slot span" ).empty();
                        var timeFrom = "";
                        var timeTo = "";
                        var dateChoosed ="";
                        var profID = "";
                        $( ".ui-selected", this ).each(function() {
                            //alert(this);
                            if (timeFrom==""){
                                timeFrom = $( this ).attr('timefrom');
                            }
                            timeTo = $( this ).attr('timeto');
                            dateChoosed = $( this ).attr('data-dateslot');
                            profID = $(this).closest('.col-md-2').attr('id');
                          //result.append( " #" + ( index + 1 ) );
                        });
                        //result.append(dateChoosed+": "+timeFrom+"-"+timeTo);
                        if (startDate == endDate){
                            //alert('Do Something: ' +profID);
                            $('.profile').removeClass('selectedProf');
                            $( "#"+profID ).addClass('selectedProf');
                        }
                        $( "#appDate").html(dateChoosed);
                        $( "#appTime").html(timeFrom+"-"+timeTo);
                      }
                    });
                
                //alert("First Choice "+first);
                //alert("Second Choice "+second);
                //alert("third Choice "+third);
            }
        });

    }
});


$( document ).ready(function() {
     var status = $( '.app-status' ).attr('id');
     if (status != undefined ){
        //alert(status);

        if (status == "status-0"){
            //$( "#appointmentDetails section.card" ).addClass('card-collapsed');
            //$( "#appointmentDetails .card-body" ).css('display','none');
            $( "#appointmentDetails select" ).attr('disabled',true);
            $( "#appointmentDetails input" ).attr('disabled',true);
            $( "#appointmentDetails textarea" ).attr('disabled',true);

            //$( "#customerDetails section.card" ).addClass('card-collapsed');
            //$( "#customerDetails .card-body" ).css('display','none');
            $( "#customerDetails select" ).attr('disabled',true);
            $( "#customerDetails input" ).attr('disabled',true);
            $( "#customerDetails textarea" ).attr('disabled',true);

            $( ".updateAppointment" ).css('display', 'none');

        }
        else if (status == "status-8"){
            //$( "#appointmentDetails section.card" ).addClass('card-collapsed');
            //$( "#appointmentDetails .card-body" ).css('display','none');
            $( "#appointmentDetails select" ).attr('disabled',true);
            $( "#appointmentDetails input" ).attr('disabled',true);
            $( "#appointmentDetails textarea" ).attr('disabled',true);

            //$( "#customerDetails section.card" ).addClass('card-collapsed');
            //$( "#customerDetails .card-body" ).css('display','none');
            $( "#customerDetails select" ).attr('disabled',true);
            $( "#customerDetails input" ).attr('disabled',true);
            $( "#customerDetails textarea" ).attr('disabled',true);

            $( ".updateAppointment" ).css('display', 'none');

        }
        else if (status == "status-5"){
            $( "#appointmentDetails section.card" ).addClass('card-collapsed');
            $( "#appointmentDetails .card-body" ).css('display','none');
            $( "#appointmentDetails select" ).attr('disabled',true);
            $( "#appointmentDetails input" ).attr('disabled',true);
            $( "#appointmentDetails textarea" ).attr('disabled',true);

            $( "#customerDetails section.card" ).addClass('card-collapsed');
            $( "#customerDetails .card-body" ).css('display','none');
            $( "#customerDetails select" ).attr('disabled',true);
            $( "#customerDetails input" ).attr('disabled',true);
            $( "#customerDetails textarea" ).attr('disabled',true);
            //$( ".updateAppointment" ).css('display', 'none');
        }
        else if (status == "status-6"){
            $( "#appointmentDetails section.card" ).addClass('card-collapsed');
            $( "#appointmentDetails .card-body" ).css('display','none');
            $( "#appointmentDetails select" ).attr('disabled',true);
            $( "#appointmentDetails input" ).attr('disabled',true);
            $( "#appointmentDetails textarea" ).attr('disabled',true);

            $( "#customerDetails section.card" ).addClass('card-collapsed');
            $( "#customerDetails .card-body" ).css('display','none');
            $( "#customerDetails select" ).attr('disabled',true);
            $( "#customerDetails input" ).attr('disabled',true);
            $( "#customerDetails textarea" ).attr('disabled',true);
            
            //$( ".updateAppointment" ).css('display', 'none');
        }
    }

});