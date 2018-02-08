<?php 
/**
 * @package PremiumMediaScript
 * @author KBRmedia (http://gempixel.com)
 * @copyright 2018 KBRmedia
 * @license http://gempixel.com/license
 * @link http://gempixel.com  
 * @since 1.0
 */
namespace kbrmedia;

class Media{
	/**
	 * API Key
	 * @var null
	 */
	protected $key = NULL;
	/**
	 * API URL
	 * @var null
	 */
	protected $url 		= NULL;
	/**
	 * Results limit
	 * @var integer
	 */
	protected $limit 	= 5;
	/**
	 * Order 
	 * @var string
	 */
	protected	$order 	= "date";
	/**
	 * Current page
	 * @var integer
	 */
	protected $page 	= 1;
	/**
	 * Request Reponse 
	 * @var null
	 */
	protected $Response = NULL;

	/**
	 * [__construct description]
	 * @author KBRmedia <http://gempixel.com>
	 * @version 1.0
	 */
	public function __construct(){}

	/**
	 * Set API URL
	 * @author KBRmedia <http://gempixel.com>
	 * @version 1.0
	 * @param   string $url The URL to the API
	 * @example http://mysite.com/api The URL to the API without trailing slash
	 */
	public function setURL(string $url){
		$this->url = rtrim($url, "/");		
	}

	/**
	 * Set API key
	 * @author KBRmedia <http://gempixel.com>
	 * @version 1.0
	 * @param   string $key Your API key
	 */
	public function setKey(string $key){
		$this->key = trim($key);	
	}
	
	/**
	 * Set Limit
	 * @author KBRmedia <http://gempixel.com>
	 * @version 1.0
	 * @param   string $limit [description]
	 */
	public function setLimit(string $limit){
		$this->limit = trim($limit);	
		return $this;
	}

	/**
	 * Set Order
	 * @author KBRmedia <http://gempixel.com>
	 * @version 1.0
	 * @param   string $order [description]
	 */
	public function setOrder(string $order){
		// Check
		if(in_array($order, ["views","date","votes"])) {
			$this->order = trim($order);	
		}
	
		return $this;
	}

	/**
	 * Set Current Page
	 * @author KBRmedia <http://gempixel.com>
	 * @version 1.0
	 * @param   string $page [description]
	 */
	public function setPage(string $page){
		// Check
		if($page > 1){
			$this->page = trim($page);	
		}
		return $this;
	}

	/**
	 * Response as Array
	 * @author KBRmedia <http://gempixel.com>
	 * @version 1.0
	 * @return  [type]       [description]
	 */
	public function asArray(){
		return json_decode($this->Response, TRUE);
	}

	/**
	 * Response as Object
	 * @author KBRmedia <http://gempixel.com>
	 * @version 1.0
	 * @return  [type]       [description]
	 */
	public function asObject(){
		return json_decode($this->Response);
	}	
	/**
	 * Get Single Media
	 * @author KBRmedia <http://gempixel.com>
	 * @version 1.0
	 * @param   string $id unique ID
	 */
	public function media(string $id){
		// URL Endpoint
		$endpoint = $this->url."/view/$id?key={$this->key}";

		$this->Response = $this->http($endpoint);
		return $this;
	}	

	/**
	 * Search media
	 * @author KBRmedia <http://gempixel.com>
	 * @version 1.0
	 * @param   string $keyword [description]
	 * @return  [type]          [description]
	 */
	public function search(string $keyword){

		$keyword = urlencode($keyword);
		// URL Endpoint
		$endpoint = $this->url."/search/$keyword?key={$this->key}&limit={$this->limit}&order={$this->order}&page={$this->page}";

		$this->Response = $this->http($endpoint);
		return $this;
	}	
	/**
	 * User search
	 * @author KBRmedia <http://gempixel.com>
	 * @version 1.0
	 * @param   string $username user's username
	 * @return  [type]           [description]
	 */
	public function user(string $username){

		$username = trim($username);
		// URL Endpoint
		$endpoint = $this->url."/user/$username?key={$this->key}&limit={$this->limit}&order={$this->order}&page={$this->page}";
		
		$this->Response = $this->http($endpoint);
		return $this;
	}	
	/**
	 * Make a request Call
	 * @author KBRmedia <http://gempixel.com>
	 * @version 1.0
	 * @param   string $url
	 * @return  string 
	 */
  private function http(string $url){
    $curl = curl_init();    
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $resp = curl_exec($curl);
    curl_close($curl);
    return $resp;
  }
}
