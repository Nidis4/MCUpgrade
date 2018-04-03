<?php 
    include('session.php');
    include('header.php');
    $currentPage = 'portfolio';
    include('menu.php');
?>
<style type="text/css">
    .img-fluid{
        /*width: 218px;
        height: 218px;*/
        margin-bottom: 20px;
    }

    #sortable{
        float: left;
        width: 840px;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    #sortable li {
    margin: 10px 10px 10px 0;
    padding: 1px;
    float: left;
    width: 200px;
    height: 200px;
    /*font-size: 4em;*/
    text-align: center;
}
 #sortable li a{
   cursor: move;
    margin-top: -20px;
    float: left;
}
#sortable li span{
        width: 20px;
        margin-bottom: 0;
        float: none;
        margin-left: 178px;
        cursor: pointer;
    }
</style>
                    <div class="container">
                            <div class="row proffessional-photos-row">
                                <div class="title-app-tabs">
                                    <h3>Portfolio</h3>
                                </div>
                                <?php 
                                    //echo SITE_URL.'webservices/api/professional/getPhotos.php?prof_id='.$_SESSION['id'];
                                    $photos = file_get_contents(SITE_URL.'webservices/api/professional/getPhotos.php?prof_id='.$_SESSION['id']);
                                    $photos = json_decode($photos, true); // decode the JSON into an associative array

                                    if(@$photos['records']){
                                ?>      
                                        <ul id="sortable">
                                <?php        
                                        foreach ($photos['records'] as $value) {
                                ?>
                                            <li class="ui-state-default" rel="<?php echo $value['id']?>"><?php //echo $value['image_name'];?>
                                                <span rel="<?php echo $value['id']?>"><img src="img/close-image.png"></span>
                                                <a href="<?php echo SITE_URL."img/professional-imgs/portfolio/".$value['image_name'];?>" data-toggle="lightbox" data-gallery="example-gallery" class="">
                                                    <img src="<?php echo SITE_URL."img/professional-imgs/portfolio/".$value['image_name'];?>" class="img-fluid">
                                                </a>
                                                
                                            </li>   
                                <?php            
                                        }
                                ?>
                                        </ul>
                                <?php
                                    }
                                    
                                ?>

                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div id="drop-area" class="drag-and-drop-area">
                                        <h3>Upload Photos</h3>
                                        <p>Drag & Drop</p>
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>
        </div>

        <link href="../lightbox/dist/ekko-lightbox.css" rel="stylesheet">
        <script src="../lightbox/dist/ekko-lightbox.js"></script>
        <script src="../js/core.js"></script>
        <script>
              $( function() {
                $( "#sortable" ).sortable({
                    stop: function( event, ui ) {
                        var odr = 1;
                        var id = 0;
                        var photos = {};
                        $( "#sortable li").each(function() {
                            id = $(this).attr('rel');
                            photos[id] = odr;
                            odr++;
                        });

                        var getSaveAPI = API_LOCATION+'professional/orderPhoto.php';
                        var profID = '<?php echo $_SESSION['id'];?>';
                        $.ajax({
                            type: "POST",
                            url: getSaveAPI,
                            dataType: "JSON",
                            data: { photos: photos,prof_id:profID},
                            success: function(data)
                            {
                                //alert(data['message']);
                                //location.reload();
                            }
                        });
                    }
                });
                $( "#sortable" ).disableSelection();
              } );
            $(document).ready(function() {
                $("#sortable li span").on('click', function(){
                    var pid = $(this).attr('rel');
                    var getDeleteAPI = API_LOCATION+'professional/deletePhoto.php';
                    var profID = '<?php echo $_SESSION['id'];?>';

                    if (!confirm('Are you sure want to delete this image?')) {
                        return false;
                    }else{
                        $.ajax({
                            type: "POST",
                            url: getDeleteAPI,
                            dataType: "JSON",
                            data: { id: pid, prof_id:profID},
                            success: function(data)
                            {
                                alert(data['message']);
                                location.reload();
                            }
                        });

                        return false;
                    }                   
                    
                    

                    
                });


                $("#drop-area").on('dragenter', function (e){
                    e.preventDefault();
                    $(this).css('background', '#BBD5B8');
                });

                $("#drop-area").on('dragover', function (e){
                    e.preventDefault();
                });

                $("#drop-area").on('drop', function (e){
                    $(this).css('background', '#D8F9D3');
                    e.preventDefault();
                    var image = e.originalEvent.dataTransfer.files;
                    createFormData(image);
                });
            });

            function createFormData(image) {
                var formImage = new FormData();
                var j = 0;
                formImage.append('prof_id',"<?php echo $_SESSION['id'];?>");
                for(var i=1; i<=image.length;i++){
                    j = i-1;
                    formImage.append('userImage'+j, image[j]);
                }                
                //formImage.append('userImage', image[0]);
                uploadFormData(formImage);
            }

            function uploadFormData(formData) {
                var getPhotosAPI = API_LOCATION+'professional/uploadPhoto.php';
                $.ajax({
                    url: getPhotosAPI,
                    type: "POST",
                    data: formData,
                    contentType:false,
                    cache: false,
                    processData: false,
                    success: function(data){
                        if(data.error){
                            alert(data.message);
                            return false;
                        }else{
                            //$('.proffessional-photos-row').append(data);
                            var imgname = "";
                            for(var i=1; i<=data.images.length;i++){
                                j = i-1;
                                img_name = "<?php echo SITE_URL;?>img/professional-imgs/portfolio/"+data.images[j];
                                $('#sortable').append("<li class='ui-state-default'><a href='"+img_name+"' data-toggle='lightbox' data-gallery='example-gallery' class=''><img src='"+img_name+"' class='img-fluid' /></a></li>");
                            }
                            alert(data.message);
                            location.reload();
                            return false;    
                        }
                        
                    }
                });
            }
            </script>
    </body>
</html>
