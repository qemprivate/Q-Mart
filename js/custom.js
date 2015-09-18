
<!-- Contact Form -->	

$(document).ready(function() {	
	$(".contactform").validate({
   submitHandler: function(form) {
	   var name = $("input#name").val();
	   var email = $("input#email").val();
	   var url = $("input#url").val();
	   var message = $("textarea#message").val();
	   
	   var dataString = 'name='+ name + '&email=' + email + '&url=' + url+'&message='+message;
      $.ajax({
      type: "POST",
      url: "email.php",
      data: dataString,
      success: function() {
		  $('#contactmsg').remove();
		  $('.contactform').prepend("<div id='contactmsg' class='successmsg'>Form submitted successfully!</div>");
		   $('#contactmsg').delay(1500).fadeOut(500);
		 
		  $('#submit_id').attr('disabled','disabled');
		  
		 }
     });   
   return false;
   
   }	
});
<!-- Form js -->
});