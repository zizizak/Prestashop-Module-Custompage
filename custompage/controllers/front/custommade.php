<?php



class custompageCustommadeModuleFrontController extends ModuleFrontController

{



  private $arFiles;
  private $error;

  public function init(){

	$this->display_column_left = false;

	$this->display_column_right = false;

	parent::init();

  }

 

  /**

  * @see FrontController::initContent()

  */

  public function initContent()

  {

    parent::initContent();

	if(isset($_POST['submitMain'])) {



		



		//var_dump($_POST);

		//$this->_postProcess();

		$this->uploadImage1();

		//var_dump($this->arFiles);
		$this->_postProcess();

		//die;

	}



    $this->setTemplate('custom-made.tpl');

  }

  

  

  private function _postProcess()

	{

		$this->_errors = array();

		if (Tools::isSubmit('submitMain'))

		{
		
			

			//Submit form -> send email 

			//var_dump($_POST);

			$name = $_POST['name'];

			$email = $_POST['email'];

			$phone = $_POST['phone'];

			$Design_Brief = $_POST['Design_Brief'];

			if($name == "" || $email == "" || $phone == "" || $Design_Brief == "") {

				$this->_errors = "Please provide all require fields";

			}

			else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

 			  $this->_errors = "Invalid email format"; 

			}else if(!empty($this->error)) {
			  $this->_errors = $this->error; 					
			}else if(empty($this->arFiles)) {
			  $this->_errors = "Please upload less one image"; 					
			}else {

				//Send mail here

				$sendTo = Configuration::get('PS_SHOP_EMAIL'); 
				$sendTo = "alper.hasim@gmail.com"; 

				$subject = "Custom made design";


				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// More headers
				$headers .= 'From: <BedworksShop>' . "\r\n";


				$filelist = "";

				//var_dump($this->arFiles);

				foreach ($this->arFiles as $key => $value) {

					$img_link = Tools::getHttpHost(true).__PS_BASE_URI__.$value;	

					$img_link = str_replace("https", 'http', $img_link);

					$filelist .= sprintf("<br/><a href='%s'><img style='max-width:200px;' src='%s' /> </a>",$img_link,$img_link);

				}



				$body = sprintf("

					From : %s <br/>

					Email : %s <br/>

					Phone : %s <br/>

					Design Brief : %s <br/>

					Image Design <br/>

					---------------------------------------------

					%s

				",$name,$email,$phone,$Design_Brief,$filelist);

				mail($sendTo,$subject,$body,$headers);
				mail('quocvinhdo@gmail.com',$subject,$body,$headers);

			}

		}

		

		if (count($this->_errors))

		{

			 $this->context->smarty->assign(array(

				'error' => $this->_errors,

			));

			 $this->context->smarty->assign(array(

			'form_data' => $_POST,

			));

			 

		}else {



			$this->context->smarty->assign(array(

				'success' => "Thank you your design has been sent.",

			));

			

		}



	}

	

	

	
	
	
	public function uploadImage1(){
		$error = array();
		$arFilesTmp = array();
		$flag_has_upload_file = false;
		$flag_error_upload_file = false;
		$flag_file_type_not_support = false;
		$flag_cant_move_file = false;
		$flag_file_large = false;
		$maxsize    = 2097152;
		
		//var_dump($_FILES['upload']);
		if(isset($_FILES['upload'])  && count($_FILES['upload']['tmp_name']) > 0  ) {
			$flag_error_upload_file = true;
			$flag_has_upload_file	= true;
			for($i=0; $i< count($_FILES['upload']['tmp_name']); $i++ ) {
		
		    if($_FILES['upload']['error'][$i] == 0) {
			
			$flag_error_upload_file = false;

			$allowedExts = array("gif", "jpeg", "jpg", "png");

			$temp = explode(".", $_FILES["upload"]["name"][$i]);

			//var_dump($temp);

			$extension = end($temp);


		    if ($_FILES["upload"]["size"][$i] >  $maxsize)  {
		    	$flag_file_large = true;
			}
			

			if ((($_FILES["upload"]["type"][$i] == "image/gif")

			|| ($_FILES["upload"]["type"][$i] == "image/jpeg")

			|| ($_FILES["upload"]["type"][$i] == "image/jpg")

			|| ($_FILES["upload"]["type"][$i] == "image/pjpeg")

			|| ($_FILES["upload"]["type"][$i] == "image/x-png")

			|| ($_FILES["upload"]["type"][$i] == "image/png"))

			&& in_array($extension, $allowedExts)) {


				  	$temp_name = rand(0,200000);

				  	$temp_name_move = sprintf('%s-%s',$temp_name,$_FILES["upload"]["name"][$i]);

		

				    if(!move_uploaded_file($_FILES["upload"]["tmp_name"][$i],"upload/".$temp_name_move)) 

				    {

				    	$this->error[] = "Cant move file";

				    }else {

				    	$arFilesTmp[] = "upload/".$temp_name_move;

				    }

				  

			} else {

			  $flag_file_type_not_support = true;

			}

			}

			}




		}else {
			$flag_has_upload_file = false; // No have file upload
		}
		
		$this->arFiles = $arFilesTmp;
		
		if(!$flag_has_upload_file) {
			$this->error = "Please select less one image";
		}else {
			if($flag_error_upload_file) {
				$this->error = "Upload file fail.Please select other image";
			}else if($flag_file_large) {
				$this->error = "File too large. File must be less than 2 megabytes.";
			}else if($flag_file_type_not_support) {
				$this->error = "File type not support.Please upload your image.";
			}if($flag_cant_move_file) {
				$this->error = "File can't move.";
			}
		}
		
		
		
	}

	


}