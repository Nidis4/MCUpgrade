<div class="col-call-back">
		<button type="button" class="close-text-call-back-btn" onclick="closetextcallbackbtn();" >×</button>

    <div class="text-call-back" data-toggle="modal" data-target="#callback" >
    	
    	<div class="call-arrow"></div><p>Έχεις ακόμα απορίες;</p><p><b>Ζήτησε μας να σε καλέσουμε!</b></p></div>

    <div  type="button" class="call-btn" data-toggle="modal" data-target="#callback"><img src="<?php echo $api_url;?>img/tel-call-back-2.png"></div>

</div>
<div id="callback" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button  type="button" class="close-modal" data-dismiss="modal">&times;</button></div><div class="modal-body">

		<div class="callback-form">

			<h4 class="modal-title"><span>Είμαστε εδώ για οποιαδήποτε απορία και αν έχεις.</span></h4>

				<p>Στείλε μας ένα αίτοιμα για επικοινωνία!</p>

	            <input class="input-style" placeholder="Όνομα" name="name"  id="name" type="text" required> 

	            <input name="mobile"  id="mobile" placeholder="Τηλ: 691 234 5678" type="number" onkeyup="check();" required ><span id="message"></span>

	            <div class="radio-btns">

	          		<input type="radio" id="call-now" class="radio-time" name="radio-time" value="Τώρα" onclick="checktimecallnow();" checked> <span>Θέλω να με καλέσετε τώρα.</span><br>

						<input type="radio" id="call-not-now" class="radio-time" name="radio-time" value="Άλλη ώρα" onclick="checktime();"> <span>Θέλω να επιλέξω άλλη ώρα.</span><br>

					</div>

	             <input type="text"  id="time" name="usr_time" value='12:00 μμ'>

	            <button class="btn-call-back" onclick="callbackaction();">Επικοινωνήστε μαζί μου</button>

	            <p class="submit-msg"></p>

        </div>

      </div>

    </div>

  </div>

</div>