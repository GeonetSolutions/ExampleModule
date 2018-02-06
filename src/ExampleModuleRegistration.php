<?php
namespace GeonetSolutions\ExampleModule;

use GeonetSolutions\ExampleModule\ExampleModuleServiceProvider;

class ExampleModuleRegistration
{
    private $provider;

    public function __construct()
    {
        $this->proivider = new ExampleModuleServiceProvider();
    }

    public static function register()
    {
        return $this->provider->registerModule();
    }
}
