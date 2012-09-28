<!DOCTYPE HTML>
<html>
<head>
	<title>Farm Management</title>
	<link rel="stylesheet" href="jquery.mobile-1.2.0-beta.1.min.css" />
	<script src="jquery-1.8.1.min.js"></script>
	<script src="jquery.mobile-1.2.0-beta.1.min.js"></script>
	<script type="text/javascript" src="cordova-1.7.0.js"></script>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDD353fOPh-KBUQ-2ekPCg75uxXRn0D9Tk&sensor=false"></script>
	<script type="text/javascript" src="json2.js"></script>
	<!--<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="jquery.mobile-1.1.0.min.js"></script>-->
    <script type="text/javascript" src="exercisetracker.js"></script>
    <script type="text/javascript" src="capture.js" ></script>
		<!--<link rel="stylesheet" href="jquery.mobile-1.1.0.min.css" />-->
	
</head>
<body>
<!-- Start of Home page -->
<div data-role="page" id="Register">

	<div data-role="header">
	 
		<h1>Dream Farm</h1>
            <a href="#Register" data-transition="none" data-icon="grid" data-theme="b">Menu</a>
			<a href="#Settings" data-transition="none"  data-icon="gear" data-theme="b">Settings</a>
		<div data-role="navbar">
			<ul>
				<li><a href="#Register" data-transition="none" data-icon="pen">Register</a></li>
				<li><a href="#Image Upload" data-transition="none" data-icon="plus">Image Upload</a></li>
				<li><a href="#Search" data-transition="none" data-icon="search">Search</a></li>
			</ul>
		</div>
	</div>

	<!--<div data-role="content">
		<p>Welcome to the <em>ExerciseTracker</em> app. By clicking <em>Track Workout</em> you can record your workouts using the GPS feature on your phone. Learn how to build this app by reading <em>mobile.tutsplus.com</em>.</p>
	
		<button id="home_network_button" data-icon="check">Internet Access Enabled</button>
		<button id="home_clearstorage_button">Clear local storage</button>
		<button id="home_seedgps_button">Load Seed GPS Data</button>
	</div>-->


</div>
<!-- End of Home page -->

<!-- Start of Trackwork Out page -->
<div data-role="page" id="Image Upload">

	<div data-role="header">
		<h1>Dream Farm</h1>
		<a href="#Register" data-transition="none" data-icon="grid" data-theme="b">Menu</a>
			<a href="#Settings" data-transition="none"  data-icon="gear" data-theme="b">Settings</a>
		<div data-role="navbar">
			<p align="center">Image upload</p>
		</div>
	</div>
	<div data-role="content">
    	<p align="center"> Upload or Take an image </p>
        <p align="center"><button data-inline="true" onclick="uploadSelectedPic()" >Upload  </button></p>
        <br/>
	    <p align="center"><button data-inline="true" onClick="takePicture()"> Camera  </button></p>
         <div style="text-align:center;margin:20px;">
        <img id="camera_image" src="" style="width:auto;height:120px;visibility:hidden;"></img>
    </div>
    </div>
    
	<!--<div data-role="content">	
		<p id="startTracking_status"></p>
			<div data-role="fieldcontain" class="ui-hide-label">
				<label for="track_id">Track ID/Name:</label>
				<input type="text" name="track_id" id="track_id" placeholder="Workout ID/Name"/>
			</div>

		<button data-role="button" id="startTracking_start">Start Tracking</button>
		<button data-role="button" id="startTracking_stop">Stop Tracking</button>  
		
				<p id="startTracking_info"></p> 
		
		
	</div> -->


</div><!-- /page -->

<div data-role="page" id="Settings" >
	<div data-role="header">
    	<h1>Dream Farm</h1>
        <a href="#Register" data-transition="none" data-icon="grid" data-theme="b">Menu</a>
        <a href="#Register" data-transition="none" data-icon="back" data-theme="b">Back</a>
        <div data-role="navbar">
        	<p align="center"> Settings </p>
            </div>
    </div>
    <br/>
    <div data role="content">
    <form>
    	<div >
        <li data-role="fieldcontain">
        <label for="State" class="ui-select">State : </label>
        <select name="State" data-native-menu="false">
        <option>State List</option>
        <option>AP</option>
        <option>UP</option>
        </select>
        </li>
        </div>
        <br/>
        <div allign="center">
        <li data-role="fieldcontain">
        <label for="District" class="ui-select" >District :</label>
        <select name="District" data-native-menu="false">
        <option> District List</option>
        <option> Medak2</option>
        <option> Medak3</option>
        </select>
        </li>
        </div>
        <br/>
        <div allign="center">
        <li data-role="fieldcontain">
        <label for="Mandal" class="ui-select">Mandal</label>
        <select name="Mandal" data-native-menu="false">
        <option>Mandal list</option>
        <option>Mandal1</option>
        <option>Mandal2</option>
        </select>
        </li>
        </div>
        <br/>
        <div allign="center">
        <li data-role="fieldcontain">
        <label for="Village" class="ui-select" >Village :</label>
        <select name="Village" data-native-menu="false">
        <option>Village List</option>
        <option>Village1</option>
        <option>Village2</option>
        </select>
        </div>
        </div>
        <a herf="" data-role="button" data-theme="b"  data-mini="true"> Save </a>
        </form>
        
</div>
            
<!-- Start of the History page -->
<div data-role="page" id="Search">

    <div data-role="header">
        <h1>Dream Farm</h1>
       <a href="#Register" data-transition="none" data-icon="grid" data-theme="b">Menu</a>
			<a href="#Settings" data-transition="none" data-icon="gear" data-theme="b">Settings</a> 
        <div data-role="navbar">
            <ul>
                <li><a href="#Register" data-transition="none" data-icon="new">Register</a></li>
				<li><a href="#Image Upload" data-transition="none" data-icon="plus">Image Upload</a></li>
				<li><a href="#Search" data-transition="none" data-icon="search">Search</a></li>
            </ul>
        </div>
    </div>

    <div data-role="content">
    <li data-role="fieldcontain">
    <label for="searchbyd" class="ui-select">By District </label>
    <input type="search" name="searchbyd"/>
    <label for="searchbym" class="ui-select">By Mandal </label>
    <input type="search" name="searchbym"/>
    <label for="searchbyv" class="ui-select">By Village </label>
    <input type="search" name="searchbyv"/>
    <label for="searchbyn" class="ui-select">By Name </label>
    <input type="search" name="searchbyn"/>
    


</div><!-- /page -->

<!-- Track Info page -->
<div data-role="page" id="track_info">

	<div data-role="header">
		<h1>Viewing Single Workout</h1>
		
		<div data-role="navbar">
			<ul>
				<li><a href="#home" data-transition="none" data-icon="home">Home</a></li>
				<li><a href="#startTracking" data-transition="none" data-icon="plus">Track Workout</a></li>
				<li><a href="#history" data-transition="none" data-icon="star">History</a></li>
			</ul>
		</div>
	</div>

	<div data-role="content">	
		<p id="track_info_info"></p>
		
		<div id="map_canvas" style="position:absolute;bottom:0;left:0;width:100%;height:300px;"></div>
		
	</div>


</div><!-- /page -->


</body>
</html>