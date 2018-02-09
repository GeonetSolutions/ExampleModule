<?php
namespace GeonetSolutions\ExampleModule;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Yaml\Yaml;
use GeonetSolutions\PlatformBase\Module;

class ExampleModuleServiceProvider extends ServiceProvider
{
	/**
	 * Module Configuration
	 *
	 * @var Array
	 */
	protected $configuration;

	/**
	 * Constructor
	 */
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
		if( ! $this->registerCheck() ){
			$this->registerModule();
		}
	}
	
	/**
	 * Check if this Module is Already Registered
	 *
	 * @return bool
	 */
	public function registerCheck()
	{
		$module = Module::where('name', $this->configuration['name'])->count();
		return $module > 0;
	}

	/**
	 * Store our Registration in the Database.
	 *
	 * @return void
	 */
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
	
	/**
	 * Installs the Module as Required
	 *
	 * @return void
	 */
	public function installModule()
	{
		// Run Migrations
		// Publish Configs
		// Seed Data
	}

	/**
	 * Uninstalls the Module.
	 *
	 * @return void
	 */
	public function uninstallModule()
	{

	}
}
