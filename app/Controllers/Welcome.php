<?php
namespace ThisApp\Controllers;

use \ThisApp\Core\View;
use \ThisApp\Aplication\System\Config;
use \ThisApp\Aplication\System\Response;
use \ThisApp\Aplication\Security\Session;
use \ThisApp\Aplication\Security\ErrorLog;
use \ThisApp\Aplication\Security\Hash;
use \ThisApp\Aplication\Security\Token;
use \ThisApp\Models\Example;

class Welcome {

	private $_request,
			$_qs;

	public function __construct($request = null){
		$this->_request =  $request;
		$this->_qs = $request->all();
	}

  public function index($actions = null)
  {
    $oExample = new Example();
    
    $allExamples = $oExample->getAll();

    $data = array(
      "title"=>"Bienvenido a ele",
      "actualPage"=>"welcome",
      "message"=> "This is a message from the controller",
      "examples" => $allExamples
    );

    View::show('welcome',$data);
  }

}
