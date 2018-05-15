'<div class="modal fade test" id="Removal-Modal" role="dialog" displayed="false">
              <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                      <div class="modal-header" style="display:none;">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h3 class="modal-title" style="font-size:20px; text-align:center;">Μετακόμιση σε 4 απλά βήματα!</h3>
                      </div>
                      <div class="modal-body modal-body-mover"><button  style="color:#fff;opacity: 1;" type="button" class="close" data-dismiss="modal">&times;</button>
                          <div class="mover-modal-inner"><h3 class="modal-title-removal">Κλείσε online την μετακόμιση σου!</h3>
                          <a target="_blank" href="https://myconstructor.gr/transport/?name=catalog&surname=popup"><div class="btn-mover-modal">Ας ξεκινήσουμε..</div></a>
                          </div>
                      </div>
                      
                  </div>
              </div>
          </div>
    

<script type="text/javascript">
    $(window).scroll(function(){
         if($(document).scrollTop() > 600 && $("#Removal-Modal").attr("displayed") === "false"){
            $("#Removal-Modal").modal("show");
            $("#Removal-Modal").attr("displayed", "true");
         }
      });
 </script>