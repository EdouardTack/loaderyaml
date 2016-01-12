<?php
namespace LoaderYaml\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Symfony\Component\Yaml\Yaml;
use Cake\Filesystem\File;
use Exception;

/**
 * LoaderYaml component
 *
 * @author Edouard Tack <edouard@tackacoder.fr>
 * @version 1.0
 */
class LoaderComponent extends Component {

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * Loaded files configuration
     *
     * @var array
     */
    protected static $_loadedConfig = [];

    /**
     * Load a YAML configuration file
     * located in ROOT/config/yaml/FILENAME
     *
     * We can use it like this:
     *      LoaderComponent::load('FILENAME.yml')
     *
     * @uses Cake\Filesystem\File
     * @param string The file name, extend with .yml
     * @param string The callback filename, if the first name parameter file doesn't exist, looking for the callback file
     * @throws \Exception
     * @return array The yaml data in array format
     */
    public static function load($file, $callback = null) {
        $path = ROOT . DS . 'config' . DS . 'yaml' . DS . $file;
        $oFile = new File($path);
        if (!$oFile->exists()) {
            if (is_null($callback)) {
                throw new Exception($path . " doesn't exists!!");
            }
            else {
                return static::load($callback);
            }
        }

        if (in_array($file, array_keys(static::$_loadedConfig))) {
            $config = static::$_loadedConfig[$file];
        }
        else {
            $config = Yaml::parse($oFile->read());
            static::$_loadedConfig[$file] = $config;
        }

        return $config;
    }

    /**
     * Load a YAML configuration file
     * Non-static method
     *
     * We can use it like this:
     *      $this->loadComponent('LoaderYaml.Loader', ['file' => 'FILENAME.yml'])
     *      $this->Loader->get()
     *
     * Or like this:
     *      $this->loadComponent('LoaderYaml.Loader')
     *      $this->Loader->get('FILENAME.yml')
     *
     * @see LoaderComponent\load()
     * @throws \Exception
     */
    public function get($file = null, $callback = null) {
        if (!isset($this->_config['file']) && is_null($file))
            throw new Exception("We miss a file ?");

        if (isset($this->_config['file']) && is_null($file))
            $file = $this->_config['file'];

        return static::load($file, $callback);
    }

 }
