<?php

namespace LRC\Database;

/**
 * Application-wide repository service.
 */
class RepositoryService extends \LRC\Common\BaseService implements \Anax\Common\ConfigureInterface
{
    use \Anax\Common\ConfigureTrait {
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
            $this->add($name, $values['table'], $values['model']);
        }
        return $this;
    }
    
    
    /**
     * Add repository.
     *
     * @param string $name          Repository name to expose as property.
     * @param string $table         Database table name.
     * @param string $modelClass    Model class name.
     */
    public function add($name, $table, $modelClass)
    {
        $this->repositories[$name] = new Repository($this->di->db, $table, $modelClass);
    }
    
    
    /**
     * Accessor method to retrieve repository by name.
     *
     * @param string $name      Repository name.
     *
     * @return Repository|null  The loaded repository matching the name, or null if no match.
     */
    public function __get($name)
    {
        return (isset($this->repositories[$name]) ? $this->repositories[$name] : null);
    }
}