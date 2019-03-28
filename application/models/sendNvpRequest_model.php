<!-- --------------------------MODEL-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sendNvpRequest_model extends CI_Model {

	public $id;
	public $titulo;

	public function __construct(){
		parent::__construct();
	}

	public function sendNvpRequest(array $requestNvp, $sandbox = false)
	{
	    //Endpoint da API
	    $apiEndpoint  = 'https://api-3t.' . ($sandbox? 'sandbox.': null);
	    $apiEndpoint .= 'paypal.com/nvp';
	  
	    //Executando a operação
	    $curl = curl_init();
	  
	    curl_setopt($curl, CURLOPT_URL, $apiEndpoint);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($curl, CURLOPT_POST, true);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($requestNvp));
	  
	    $response = urldecode(curl_exec($curl));
	  
	    curl_close($curl);
	  
	    //Tratando a resposta
	    $responseNvp = array();
	  
	    if (preg_match_all('/(?<name>[^\=]+)\=(?<value>[^&]+)&?/', $response, $matches)) {
	        foreach ($matches['name'] as $offset => $name) {
	            $responseNvp[$name] = $matches['value'][$offset];
	        }
	    }
	  
	    //Verificando se deu tudo certo e, caso algum erro tenha ocorrido,
	    //gravamos um log para depuração.
	    if (isset($responseNvp['ACK']) && $responseNvp['ACK'] != 'Success') {
	        for ($i = 0; isset($responseNvp['L_ERRORCODE' . $i]); ++$i) {
	            $message = sprintf("PayPal NVP %s[%d]: %s\n",
	                               $responseNvp['L_SEVERITYCODE' . $i],
	                               $responseNvp['L_ERRORCODE' . $i],
	                               $responseNvp['L_LONGMESSAGE' . $i]);
	  
	            error_log($message);
	        }
	    }
	  
	    return $responseNvp;
	}

	


}
