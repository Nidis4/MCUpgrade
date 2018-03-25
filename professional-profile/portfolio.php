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
                                        foreach ($photos['records'] as $value) {
                                ?>
                                            <a href="<?php echo SITE_URL."img/professional-imgs/portfolio/".$value['image_name'];?>" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-3">
                                                <img src="<?php echo SITE_URL."img/professional-imgs/portfolio/".$value['image_name'];?>" class="img-fluid">
                                            </a>   
                                <?php            
                                        }
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
            $(document).ready(function() {
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
                                $('.proffessional-photos-row').append("<a href='"+img_name+"' data-toggle='lightbox' data-gallery='example-gallery' class='col-sm-3'><img src='"+img_name+"' class='img-fluid' /></a>");
                            }
                            alert(data.message);
                            return false;    
                        }
                        
                    }
                });
            }
            </script>
    </body>
</html>
