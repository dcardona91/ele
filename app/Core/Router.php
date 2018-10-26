<?php
namespace ThisApp\Core;
#llamar las instancias
use \Illuminate\Http\Request;
use \ThisApp\Aplication\Security\Session;
use \ThisApp\Aplication\System\Config;
use \ThisApp\Aplication\Security\ErrorLog;

class Router extends Request
{	
	
	//para que entre de una al login sin hacer validaciones de sesion se configuro por defecto Login como controlador
	protected $_controller = 'Welcome';
	protected $_method = 'index';

	public function __construct(Request $request)
	{	$url = explode('/', filter_var(trim($request->getPathInfo(),'/'),FILTER_SANITIZE_URL));		
		//$this->_params["queryString"] = $request->all();//Request::createFromGlobals()->request->all();
		if(file_exists('../app/Controllers/'.ucfirst(strtolower($url[0])).'.php'))
		{
			$this->_controller = ucfirst(strtolower($url[0]));
			unset($url[0]);
		}elseif(ucfirst(strtolower($url[0])) != ""){
			ErrorLog::throwNew("pagina no encontrada", debug_backtrace(),'404');
		}

		//require_once '../app/controllers/'.$this->_controller.'.php';
		$theController = "ThisApp\Controllers\\".$this->_controller;		
		if (isset($url[1]) and method_exists($theController, $url[1])) {
			$this->_method = $url[1];	
			unset($url[1]);			
		}


	    //fin validacion de la sesion
		$this->_controller = new $theController($request);

		call_user_func_array([$this->_controller, $this->_method], array("actions" => array_values($url)));
	}
}
