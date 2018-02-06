<?php
namespace GeonetSolutions\ExampleModule;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Yaml\Yaml;
use GeonetSolutions\PlatformBase\Module;

class ExampleModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
		// Register Module with the Platform
		// $this->registerModule();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }

	// Register Module Presence with the Base Platform.
    public function registerModule()
    {
		// Load the YAML File
		$moduleConfig = Yaml::parse(file_get_contents('./module.yaml'));

		// Define the Object and Save to the DB.
		$registration = Module::create([
			'name' 		=> $moduleConfig['name'],
			'version'	=> $moduleConfig['version'],
			'provider'  => $moduleConfig['provider'],
			'installed' => false,
		]);
	}
	
	// Install Method
	public function installModule()
	{
		// Run Migrations
		// Publish Configs
		// Seed Data
	}
}
