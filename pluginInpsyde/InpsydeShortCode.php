<?php
namespace PluginInpsyde;
class InpsydeShortCode {
    function __construct()
    {
        // add_action('rest_api_init',$this->RestEnd())
        $d= plugin::view('myView');
         
    }
    public function RestEnd()
    {
           register_rest_route('inpsyde/v1',users,
           [
               'methods'=>'GET',
               'callback'=>$this->RestPoint()
           ]
        );
    }
    public function RestPoint()
    {
        Plugin::view( 'auto-complete');
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