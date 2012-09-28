<?php
    	
	require_once("Rest.inc.php");
	
	class API extends REST {
	
		public $data = "";
		
		const DB_SERVER = "localhost";
		const DB_USER = "technone_farm";
		const DB_PASSWORD = "speed123";
		const DB = "technone_farm";
		
		private $db = NULL;
	
		public function __construct(){
			parent::__construct();				// Init parent contructor
			$this->dbConnect();					// Initiate Database connection
		}
		
		/*
		 *  Database connection 
		*/
		private function dbConnect(){
			$this->db = mysql_connect(self::DB_SERVER,self::DB_USER,self::DB_PASSWORD);
			if($this->db)
				mysql_select_db(self::DB,$this->db);
		}
		
		/*
		 * Public method for access api.
		 * This method dynmically calls the methods based on the query string
		 *
		 */
		public function processApi(){
			$func = strtolower(trim(str_replace("/","",$_REQUEST['rquest'])));
			if((int)method_exists($this,$func) > 0)
				$this->$func();
			else
				$this->response('',404);				// If the method not exist with in this class, response would be "Page not found".
		}
				
		/*
		 *	Encode array into JSON
		*/
		private function json($data){
			if(is_array($data)){
				return json_encode($data);
			}
		}
		
		private function test()
		{
			echo "Working!!";
		}
		
		private function register()
		{
			if($this->get_request_method() != "POST"){
				$this->response('',406);
			}
			
			$user['fname'] = $this->_request['fname'];
			$user['email'] = $this->_request['email'];
			$user['pwd'] = $this->_request['pwd'];
			$user['rpwd'] = $this->_request['rpwd'];
			$user['dob'] = $this->_request['date'];
			$user['gender'] = $this->_request['gender'];
			$user['address'] = $this->_request['address'];
			$user['mobile'] = $this->_request['mobile'];
			$user['phone'] = $this->_request['phone'];
			$user['edu'] = $this->_request['edu'];
			$user['exp'] = $this->_request['exp'];
			$user['tlc'] = $this->_request['tlc'];
			$user['ustate'] = $this->_request['ustate'];
			$user['udistrict'] = $this->_request['udistrict'];
			$user['umandal'] = $this->_request['umandal'];
			$user['uvillage'] = $this->_request['uvillage'];
			$user['seed'] = $this->_request['seed'];
			$user['sdate'] = $this->_request['sdate'];
			$user['snums'] = $this->_request['snums'];
			$user['snume'] = $this->_request['snume'];
			$user['clatlong'] = $this->_request['clatlong'];
			$user['fid'] = $this->uid_generate($user['ustate'],$user['udistrict'],$user['umandal'],$user['uvillage']);
			
			$sql = mysql_query("INSERT INTO `farmers_personal_det`(`fid` ,`fname`, `email`, `pwd`,`rpwd`,`dob` ,`gender` ,`address` ,`mobile` ,`phone` ,`edu` ,`exp` ,`tlc`,`regdate`) VALUES (  '".$user['fid']."',  '".$user['fname']."', '".$user['email']."' , '".$user['pwd']."' , '".$user['rpwd']."' ,  '".$user['dob']."' ,  '".$user['gender']."' ,  '".$user['address']."' ,  '".$user['mobile']."' ,  '".$user['phone']."' ,  '".$user['edu']."' ,  '".$user['exp']."',  '".$user['tlc']."' , CURRENT_TIMESTAMP);",$this->db);

$sql = mysql_query("INSERT INTO `farmer_crop_details` (`farmer_id`,`land_owned`,`seed_id`,`sown_date`,`survey_start`,`survey_end`,`latlong_centre`) VALUES ('".$user['fid']."', '".$user['tlc']."', '".$user['seed']."', '".$user['sdate']."', '".$user['snums']."', '".$user['snume']."', '".$user['clatlong']."');",$this->db);
		
		
			$result = array('status' => "Successfully inserted into DB!!!" , "uid" => $user['fid']);
			$this->response($this->json($result), 200);
			
		}
		
		private function usersearch()
		{
			if($this->get_request_method() != "POST"){
				$this->response('',406);
			}
			
			$uid = "AP";
			
			$udistrict = $this->_request['udistrict'];
			$umandal = $this->_request['umandal'];
			$uvillage = $this->_request['uvillage'];
			
			
			//append district code to uid
			$rows = mysql_query("SELECT DISTINCT dcode FROM locations_list WHERE dname= '".$udistrict."'",$this->db);		
			if(mysql_num_rows($rows)>0)
			$result = mysql_fetch_array($rows,MYSQL_ASSOC);		
			$uid .=  $result['dcode'];
	
			//append mandal code to uid
			$rows = mysql_query("SELECT DISTINCT mcode FROM locations_list WHERE mname= '".$umandal."'",$this->db);	
			if(mysql_num_rows($rows)>0)
				$result = mysql_fetch_array($rows,MYSQL_ASSOC);		
			$uid .= $result['mcode'];
	
			//append village code to uid
			$rows = mysql_query("SELECT vcode FROM locations_list WHERE vname= '".$uvillage."'",$this->db);	
			if(mysql_num_rows($rows)>0)
				$result = mysql_fetch_array($rows,MYSQL_ASSOC);		
			$temp = $this->converttobase36($result['vcode']);	
			$uid .= $temp;
						
			
			$rows = mysql_query("SELECT * FROM farmers_personal_det WHERE fid LIKE '".$uid.__."' ",$this->db);
			
			if(mysql_num_rows($rows) == 0)
			{
				$data = array("status" => "No Users");
				$this->response($this->json($data),200);
			}
			else
			{	
				$i=0;
				while($result = mysql_fetch_array($rows,MYSQL_ASSOC))
				{	
					$data[$i]['fname'] = $result['fname'];
					$data[$i]['tlc'] = $result['tlc'];
					$i++;
				}
					
				$this->response($this->json($data),200);
			}
			
			
													
		}
		
		private function uid_generate($ustate,$udistrict,$umandal,$uvillage)
		{	
			//append state to uid
			$uid = $ustate;
	
			//append district code to uid
			$rows = mysql_query("SELECT DISTINCT dcode FROM locations_list WHERE dname= '".$udistrict."'",$this->db);		
			if(mysql_num_rows($rows)>0)
			$result = mysql_fetch_array($rows,MYSQL_ASSOC);		
			$uid .=  $result['dcode'];
	
			//append mandal code to uid
			$rows = mysql_query("SELECT DISTINCT mcode FROM locations_list WHERE mname= '".$umandal."'",$this->db);	
			if(mysql_num_rows($rows)>0)
				$result = mysql_fetch_array($rows,MYSQL_ASSOC);		
			$uid .= $result['mcode'];
	
			//append village code to uid
			$rows = mysql_query("SELECT vcode FROM locations_list WHERE vname= '".$uvillage."'",$this->db);	
			if(mysql_num_rows($rows)>0)
				$result = mysql_fetch_array($rows,MYSQL_ASSOC);		
			$temp = $this->converttobase36($result['vcode']);	
			$uid .= $temp;
	
			//append serial number to uid	
			$rows = mysql_query("SELECT fid FROM farmers_personal_det WHERE fid LIKE '".$uid.__."' ",$this->db);	
			if($rows != NULL)		
				$sno = (mysql_num_rows($rows)+1);
			else
				$sno = 1;	
			$temp = $this->converttobase36($sno);	
			$uid .= $temp;
	
			return $uid;
		}
		
		private function converttobase36($value)
		{
			$base = 36;
			while($value != 0)
			{
				$rem = ($value % $base);
		
				if($rem > 9)
					$result = chr(55 + $rem);
				else
					$result .= $rem;
			
				$value = (int)($value / $base);
			}
	
			if(strlen($result) == 1)
				$result .= '0';
	
			return strrev($result);
		}
		
		private	function imageupload()
			{
					
					
					
					$fid = $_POST['fid'];
					$imageid=$fid;
								
					$rows = mysql_query("SELECT image_id FROM farmer_images WHERE image_id LIKE '".$imageid.______."' ",$this->db);	
					if($rows != NULL)		
						$sno = (mysql_num_rows($rows)+1);
					else
						$sno = 1;	
				
					$imageid .= $this->converttobase36($sno);
					$imageid .= ".jpg";
					
					// Directory where uploaded images are saved
   					$target_path = "..//images//".$imageid; 

					// If uploading file
					if ($_FILES) 
					{
 						 //print_r($_FILES);
   						 //mkdir ($dirname, 0777, true); 

   						 if(move_uploaded_file($_FILES["imagefile"]["tmp_name"] , $target_path)) 
					  	 {
						  	$sql = mysql_query("INSERT INTO `farmer_images` ( `image_id` ) VALUES ( '".$imageid."' );", $this->db);
						  	$success = array('status' => "Success!!", "msg" => "Successfully uploaded Image File!!");
						 	$success['filename']= $imageid;
						  	$success['fid'] = $fid;
						 	$this->response($this->json($success),200);
					 	 } 
					 	 else
					  	 {
						 	$error = array('status' => "Error!!", "msg" => "Unable to upload file!!");
						 	$this->response($this->json($error),400);
					  	 }  
					}		
			}
	}
	
	// Initiate Library
	
	$api = new API;
	$api->processApi();
	
	/*
	
		private	function imageupload()
			{
					$extension=array("jpg","bmp","png","gif");
					$fid = $_POST['fid'];
					$imageid=$fid;
					//$imageid=substr($_FILES['imagefile']['name'],0,10);
					
					$rows = mysql_query("SELECT image_id FROM farmer_images WHERE image_id LIKE '".$imageid.______."' ",$this->db);	
					if($rows != NULL)		
						$sno = (mysql_num_rows($rows)+1);
					else
						$sno = 1;	
				
					$imageid .= $this->converttobase36($sno);		
					
					$target_path = "..//images//";
					chdir($target_path);
					$uploadName = basename( $_FILES['imagefile']['name']);
					list($usrname,$format)= explode('.',$uploadName);
					if(in_array($format,$extension))
					{	
					  $imageid.=".".$format;
					  $target_path = $target_path . $imageid; 
				
					  if(move_uploaded_file($_FILES['imagefile']['tmp_name'], $target_path)) 
					  {
						  $sql = mysql_query("INSERT INTO `farmer_images` ( `image_id` ) VALUES ( '".$imageid."' );", $this->db);
						  $success = array('status' => "Success!!", "msg" => "Successfully uploaded Image File!!");
						  $success['filename']= $imageid;
						  $success['fid'] = $fid;
						  $this->response($this->json($success),200);
					  } 
					  else
					  {
						 $error = array('status' => "Error!!", "msg" => "Unable to upload file!!");
						 $this->response($this->json($error),400);
					  }  
					}
					else
					{
					  	$error = array('status' => "Error!!", "msg" => "Invalid File Extension!!");
					  	$this->response($this->json($error),400);
					}
			}
	
	*/
?>