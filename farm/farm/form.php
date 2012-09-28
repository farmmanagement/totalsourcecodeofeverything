<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon" href="assets/ico/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/ico/apple-touch-icon-114x114.png">
  </head>
  <body>	  
	
  <div class="container">
	
  <div class="row">
	
	
  <div class="span8">
	<?php if($_POST) { ?>
	<div class="alert alert-success">
	  Well done! You successfully read this important alert message.
	</div>
	<?php } ?>

	<form class="form-horizontal" id="registerHere" method='post' action='register.php'>
	  <fieldset>
	    <legend>Registration</legend>
	    <div class="control-group">
	      <label class="control-label" for="input01">User Name</label>
	      <div class="controls">
	        <input type="text" class="input-xlarge" id="fname" name="fname" rel="popover" data-content="Enter your name." data-original-title="Full Name">
	        
	      </div>
	</div>
	
	 <div class="control-group">
		<label class="control-label" for="input01">Email</label>
	      <div class="controls">
	        <input type="text" class="input-xlarge" id="mail" name="mail" rel="popover" data-content="What’s your email address?(Not mandatory)" data-original-title="Email">
	       
	      </div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="input01">Password</label>
	      <div class="controls">
	        <input type="password" class="input-xlarge" id="pwd" name="pwd" rel="popover" data-content="6 characters or more." data-original-title="Password" >
	       
	      </div>
	</div>
	<div class="control-group">
		<label class="control-label" for="input01">Confirm Password</label>
	      <div class="controls">
	        <input type="password" class="input-xlarge" id="rpwd" name="rpwd" rel="popover" data-content="Re-enter your password for confirmation." data-original-title="Re-Password" >
	       
	      </div>
	</div>
	<div class="control-group">
		<label class="control-label" for="input01">Date of birth</label>
	      <div class="controls">
	        <input type="date" class="input-xlarge" id="dob" name="dob" rel="popover" data-content="Enter your date of birth" data-original-title="Re-Password" >
	       
	      </div>
	</div>
	
	
	 <div class="control-group">
		<label class="control-label" for="input01">Gender</label>
	      <div class="controls">
	        <input type="radio" id="gender" name="gender" value="Male" > Male </input> 
	         <input type="radio" id="gender" name="gender" value="Female" > Female </input>
	      </div>
	
	</div>
	
	<div class="control-group">
		<label class="control-label" for="input01">Address</label>
	      <div class="controls">
	        <input type="textarea" class="input-xlarge" id="address" name="address" rel="popover" data-content="Enter your residential address" data-original-title="Residential address" >
	       
	      </div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="input01">Education</label>
		<div class="controls">
		
		<select name="edu" id="edu" >
							<option value="0">none</option>
            						<option value="1">1st class</option>
							<option value="2">2nd class</option>
							<option value="3">3rd class</option>
							<option value="4">4th class</option>
							<option value="5">5th class</option>
							<option value="6">6th class</option>
							<option value="7">7th class</option>
							<option value="8">8th class</option>
							<option value="9">9th class</option>
							<option value="10">10th class</option>
			                		<option value="12">inter</option>
			                		<option value="16">graduate</option>
							<option value="18">post graduate</option>
			               
		</select>
		
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="input01">mobile</label>
	      <div class="controls">
	        <input type="text" class="input-xlarge" id="mobile" name="mobile" rel="popover" data-content="enter your mobile number." data-original-title="mobile number" >
	       
	      </div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="input01">phone</label>
	      <div class="controls">
	        <input type="text" class="input-xlarge" id="phone" name="phone" rel="popover" data-content="enter your residential phone number." data-original-title="residential phone number" >
	       
	      </div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="input01">State</label>
	      <div class="controls" id="states">
	        <select name="ustate" id="ustate" onchange="dynamic_SelectState('state2district.php', this.value)" />
			<option value="#">-Select-</option>
			<option value="AP">AP</option>
		</select>
	      </div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="input01">District</label>
	      <div class="controls" id="districts">
	        <select name="udistrict" id="udistrict" onchange="dynamic_SelectDistrict('district2mandal.php', this.value)" />
			<option></option>
		</select>
	      </div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="input01">Mandal</label>
	      <div class="controls" id="mandals">
	        <select name="umandal" id="umandal" onchange="dynamic_SelectMandal('mandal2village.php', this.value)" />
			<option></option>
		</select>
	      </div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="input01">Village</label>
	      <div class="controls" id="villages">
	        <select name="uvillage" id="uvillage" onchange="dynamic_Select('state.php', this.value)" />
			<option></option>
		</select>
	      </div>
	</div>
	
	
	<div class="control-group">
		<label class="control-label" for="input01">Experience</label>
	      <div class="controls">
	        <input type="number" class="input-xlarge" id="exp" name="exp" rel="popover" data-content="how many years have you been farming??" data-original-title="farming experience" >
	       
	      </div>
	</div>
	
	
	<div class="control-group">
		<label class="control-label" for="input01">Total Cultivable Land Owned</label>
	      <div class="controls">
	        <input type="number" class="input-xlarge" id="tlc" name="tlc" rel="popover" data-content="Total area of land being cultivated in ACRES." data-original-title="total land under cultivation" >
	       
	      </div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="input01">Crop Planted</label>
	      <div class="controls">
	        <select name="seed" id="seed" >
            				<option value="#">Select</option>
			                <option value="MAIZE_A">Maize Type A</option>
			                <option value="MAIZE_B">Maize Type B</option>
			                <option value="COTTON">Cotton</option>
			                <option value="SUGARCANE">Sugarcane</option>
			       		<option value="TURMERIC">Turmeric</option>
	       </select>
	       
	      </div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="input01">Seed Sowing date</label>
	      <div class="controls">
	        <input type="date" class="input-xlarge" id="sdate" name="sdate" rel="popover" data-content="Seed Sowing date." data-original-title="Seed Sowing date" >
	       
	      </div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="input01">Survey Number Starting from</label>
	      <div class="controls">
	        <input type="number" class="input-xlarge" id="snums" name="snums" rel="popover" data-content="Survey Number Starting from." data-original-title="Survey Number Starting from" >
	       
	      </div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="input01">Survey Number ending at</label>
	      <div class="controls">
	        <input type="number" class="input-xlarge" id="snume" name="snume" rel="popover" data-content="Survey Number ending at." data-original-title="Survey Number ending at" >
	       
	      </div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="input01">Lat/Long at Centre of Farm</label>
	      <div class="controls">
	        <input type="text" class="input-xlarge" id="clatlong" name="clatlong" rel="popover" data-content="Lat/Long at Centre of Farm." data-original-title="Lat/Long at Centre of Farm" >
	       
	      </div>
	</div>
	
	
	<div class="control-group">
		<label class="control-label" for="input01"></label>
	      <div class="controls">
	       <button type="submit" class="btn btn-success" rel="tooltip" title="first tooltip" >Create My Account</button>
	       
	      </div>
	
	</div>
	
	
	   
	  </fieldset>
	</form>
	</div>
	
		</div>
        
        
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
	 <div class="container">
        <p>&copy; Mission RnD Production</p>
</div>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <script src="assets/js/jquery.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    <script src="assets/js/application.js"></script>
	<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
	  <script type="text/javascript">
	  $(document).ready(function(){
			$('input').hover(function()
		{
			$(this).popover('show')
		}
		);
			$("#registerHere").validate({
				rules:{
					fname:"required",
					mail:{
						required : false, 
						email: true
						},
					pwd:{
						required:true,
						minlength: 6
					},
					rpwd:{
						required:true,
						equalTo: "#pwd"
					},
					gender: "required",
					dob:"required",
					address:"required",
					edu:"required",
					phone:"required",
					
					mobile:"required",
						
					
					ustate:"required",
					udistrict:"required",
					umandal:"required",
					uvillage:"required",
					exp:"required",
					tlc:
					{
						required:true,
						digits: true
					}
					
					
				}, 
				messages:{
					fname:"Enter your name",
					email:"Enter a valid email address",
					pwd:{
						required:"Enter password",
						minlength:"Password must be minimum 6 characters"
					},
					rpwd:{
						required:"Retype password",
						equalTo:"Passwords must match"
					},
					gender:"Select Gender",
					dob:"Enter date of birth (YYYY-MM-DD) Eg: 1992-05-28",
					address:"Type your address",
					edu:"Enter your Education Qualification",
					mobile:"Enter a valid mobile number Eg: 9553778472",
					phone:"Enter Landline number",
					ustate:"Select state",
					udistrict:"Select District",
					umandal:"Select Mandal",
					uvillage:"Select Village",
					exp:"Enter your farming experience in years",
					tlc:
					{
						required: "Enter area of land you cultivate(in Acres). Eg: 2.5",
						digits:"Enter area of land you cultivate(in Acres). Eg: 2.5"
					}
				},
				errorClass: "help-inline",
				errorElement: "span",
				highlight:function(element, errorClass, validClass) {
					$(element).parents('.control-group').addClass('error');
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).parents('.control-group').removeClass('error');
					$(element).parents('.control-group').addClass('success');
				} 
			});
		});
	  </script>
		
	  <script>
		function dynamic_SelectState(ajax_page, state) {
			$.ajax({
				type: "GET",
				url: ajax_page,
				data: "ch=" + state,
				dataType: "html", 
				success: function(html){    
				   $("#districts").html(html);     }
				}); 
		}
		
		function dynamic_SelectDistrict(ajax_page, district) {
			$.ajax({
				type: "GET",
				url: ajax_page,
				data: "ch=" + district,
				dataType: "html", 
				success: function(html){    
				   $("#mandals").html(html);     }
				}); 
		}
		
		function dynamic_SelectMandal(ajax_page, mandal) {
			$.ajax({
				type: "GET",
				url: ajax_page,
				data: "ch=" + mandal,
				dataType: "html", 
				success: function(html){    
				   $("#villages").html(html);     }
				}); 
		}
		
	</script>

  

  </body>
</html>