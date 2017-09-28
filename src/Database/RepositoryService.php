<?php

namespace LRC\Database;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;
use \LRC\Common\BaseService;

/**
 * Application-wide database repository service.
 */
class RepositoryService extends BaseService implements ConfigureInterface
{
    use ConfigureTrait {
        configure as loadConfig;
    }
    
    
    /**
     * @var array   Loaded repositories.
     */
    private $repositories;
    
    
    /**
     * Configure service with config file, loading repositories defined therein.
     *
     * @return self
     */
    public function configure($file)
    {
        $this->loadConfig($file);
        foreach ($this->config['repositories'] as $name => $values) {
            $this->add($name, $values['table'], $values['model'], (isset($values['deleted']) ? $values['deleted'] : 'deleted'));
        }
        return $this;
    }
    
    
    /**
     * Add repository.
     *
     * @param string $name          Repository name to expose as property.
     * @param string $table         Database table name.
     * @param string $modelClass    Model class name.
     * @param string $deleted       Soft deletion attribute.
     */
    public function add($name, $table, $modelClass, $deleted = 'deleted')
    {
        $this->repositories[$name] = new \LRC\Repository\SoftDbRepository($this->di->db, $table, $modelClass, $deleted);
    }
    
    
    /**
     * Accessor method to retrieve repository by name.
     *
     * @param string $name          Repository name.
     *
     * @return DbRepository|null    The loaded repository matching the name, or null if no match.
     */
    public function __get($name)
    {
        return (isset($this->repositories[$name]) ? $this->repositories[$name] : null);
    }
}
