<?php

class Core{
    protected $curCont="defcon";
    protected $curmet="index";
    protected $params = [];

    public function __construct(){

       print_r($this->get_url());
    $url = $this->get_url();
    
    if(file_exists('../app/controllers/'. ucwords($url[0]) .'.php')){
        // echo "how";
        $this->curCont = ucwords($url[0]);
        unset($url[0]);
    }
    require_once "../app/controllers/". $this->curCont .".php";
    $this->curCont = new $this->curCont;

    


}

function get_url(){

    if(isset($_GET["url"])){
        $url = rtrim($_GET["url"],'/') ;
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
    }
} 
}


?>