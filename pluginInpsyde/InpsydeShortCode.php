<?php
namespace PluginInpsyde;
class InpsydeShortCode {
    function __construct()
    {
         add_action('rest_api_init', array($this,'RestEnd'));
         add_action('rest_api_init', array($this,'RestUserDetail'));
         add_shortcode('rest_view', array($this,'restView'));
        
    }
    public function RestEnd()
    {
           register_rest_route('inpsyde/v1','/users/',
           [
               'methods'=>'GET',
               'callback'=>array($this,'RestPoint')
           ]
        );
       
    }
    public function RestUserDetail()
    {
        
        register_rest_route('inpsyde/v1','/users-detail/(?P<s>[0-9]+)',
        [
            'methods'=>'GET',
            'callback'=>array($this,'RestDetail')
        ]
     );
    }
    public function RestPoint()
    {
       // Plugin::view("myView");
       //From URL to get webpage contents. 
       $result="";
$url = "https://jsonplaceholder.typicode.com/users/"; 
  
// Initialize a CURL session. 
$ch = curl_init();  
  
// Return Page contents. 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
//grab URL and pass it to the variable. 
curl_setopt($ch, CURLOPT_URL, $url); 
  
$result = curl_exec($ch); 
curl_close($ch);
 
return json_decode($result);

    }

    public function RestDetail($s)
    {
       // Plugin::view("myView");
       //From URL to get webpage contents. 
       
       $result="";
$url = "https://jsonplaceholder.typicode.com/users/".$s['s']; 
  
// Initialize a CURL session. 
$ch = curl_init();  
  
// Return Page contents. 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
//grab URL and pass it to the variable. 
curl_setopt($ch, CURLOPT_URL, $url); 
  
$result = curl_exec($ch); 
curl_close($ch);
 
return json_decode($result);

    }

    public function restView()
    {
        Plugin::view("myView");

    }
}
class Plugin
{

    public static function view( $name, array $args = array() ) {


        foreach ( $args AS $key => $val ) {
            $$key = $val;
        }


        $file =   'views/'. $name . '.php';

        include( $file );
    }
}
?>