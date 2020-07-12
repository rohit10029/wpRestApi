<?php
namespace Test;
 require dirname(__DIR__).'/vendor/autoload.php';

use PluginInpsyde\InpsydeShortCode;
use PHPUnit\Framework\TestCase;
class PluginTest extends TestCase
{
   
    public function test1()
    {
      // check return type ;
     // $func=$this->getMockBuilder("InpsydeShortCode")->setMethods(['RestPoint'])->getMock();
     $func=New InpsydeShortCode();
      $this->assertIsArray( $func->RestPoint());
    }
    public function test2()
    {
      // check weather key exixt
      $func=New InpsydeShortCode();
     
      foreach($func->RestPoint() as $r)
      {
          $this->assertArrayHasKey('id',json_decode(json_encode($r), true),"id key not exist");
          $this->assertArrayHasKey('name',json_decode(json_encode($r), true),"name key not exist");
          $this->assertArrayHasKey('username',json_decode(json_encode($r), true),"username key not exist");
      }
    }
}