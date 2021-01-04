 <?php
namespace PluginInpsyde;
class InpsydeShortCode {
    function init()
    {
          add_action('rest_api_init', array($this,'RestEnd'));
          add_action('rest_api_init', array($this,'RestUserDetail'));
           add_shortcode('rest_view', array($this,'restView'));
          $check_page_exist = get_page_by_title('custom-page', 'OBJECT', 'page');
          if(empty($check_page_exist))
          {
             register_activation_hook(__FILE__, array($this,'add_my_custom_page'));
         
          }
    }
   public function add_my_custom_page() {
        // Create post object
        $my_post = array(
          'post_title'    => wp_strip_all_tags( 'custom-page' ),
          'post_content'  =>"gggg",
          'post_status'   => 'publish',
          'post_author'   => 1,
          'post_type'     => 'page',
          'query_var'=>false
        );
    
        // Insert the post into the database
        
        wp_insert_post( $my_post );
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
  
$result= wp_remote_retrieve_body(wp_remote_get($url));
 
return $result;  

    }

    public function RestDetail($s)
    {
       // Plugin::view("myView");
       //From URL to get webpage contents. 
       
       $result="";
$url = "https://jsonplaceholder.typicode.com/users/".$s['s']; 
$result= wp_remote_retrieve_body(wp_remote_get($url));

return $result;

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