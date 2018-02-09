<?php
namespace GeonetSolutions\ExampleModule;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Yaml\Yaml;
use GeonetSolutions\PlatformBase\Module;

class ExampleModuleServiceProvider extends ServiceProvider
{

	protected $configuration;

	public function __construct()
	{
		$this->configuration = Yaml::parse( file_get_contents(__DIR__ . '/module.yaml') );
	}

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
		
	}

	public function register()
	{
		if( ! $this->registerCheck() ){
			$this->registerModule();
		}
	}
	
	public function registerCheck()
	{
		$module = Module::where('name', $this->configuration['name'])->count();
		return $module > 0;
	}

	// Register Module Presence with the Base Platform.
    public function registerModule()
    {
		// Define the Object and Save to the DB.
		$registration = Module::create([
			'name' 		=> $this->configuration['name'],
			'version'	=> $this->configuration['version'],
			'provider'  => $this->configuration['provider'],
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
