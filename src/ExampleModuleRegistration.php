<?php
namespace GeonetSolutions\ExampleModule;

use GeonetSolutions\ExampleModule\ExampleModuleServiceProvider;

class ExampleModuleRegistration
{
   public static function register()
   {
       return ExampleModuleServiceProvider::registerModule();
   }
}
