<?php

namespace LRC\Rem;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;

/**
 * REM Server.
 */
class RemServer extends \LRC\Common\BaseService implements ConfigureInterface
{
    use ConfigureTrait;


    /**
     * @var string $key to use when storing in session.
     */
    const KEY = 'remserver';


    /**
     * Fill the session with default data that are read from files.
     *
     * @return self
     */
    public function init()
    {
        $files = $this->config['dataset'];
        $dataset = [];
        foreach ($files as $file) {
            $key = pathinfo($file, PATHINFO_FILENAME);
            $dataset[$key] = json_decode(file_get_contents($file), true);
        }

        $this->di->session->set(self::KEY, $dataset);
        return $this;
    }


    /**
     * Check if there is a dataset stored.
     *
     * @return boolean true if dataset exists in session, else false
     */
    public function hasDataset()
    {
        return $this->di->session->has(self::KEY);
    }


    /**
     * Get a subset of data.
     *
     * @param string $key for data subset.
     *
     * @return array with the dataset
     */
    public function getDataset($key)
    {
        $data = $this->di->session->get(self::KEY);
        return (isset($data[$key]) ? $data[$key] : []);
    }


    /**
     * Save dataset.
     *
     * @param string $key     for data subset.
     * @param string $dataset the data to save.
     *
     * @return self
     */
    public function saveDataset($key, $dataset)
    {
        $data = $this->di->session->get(self::KEY);
        $data[$key] = $dataset;
        $this->di->session->set(self::KEY, $data);
        return $this;
    }


    /**
     * Get an item from a dataset.
     *
     * @param string $key    for the dataset
     * @param string $itemId for the item to get
     *
     * @return array|null array with item if found, else null
     */
    public function getItem($key, $itemId)
    {
        $dataset = $this->getDataset($key);
        foreach ($dataset as $item) {
            if ($item['id'] === $itemId) {
                return $item;
            }
        }
        return null;
    }


    /**
     * Add an item to a dataset.
     *
     * @param string $key  for the dataset
     * @param array  $item to add
     *
     * @return array as new item inserted
     */
    public function addItem($key, $item)
    {
        $dataset = $this->getDataset($key);

        // Get next available value for the id
        $ids = array_column($dataset, 'id');
        $item['id'] = (empty($ids) ? 1 : max($ids) + 1);
        
        $dataset[] = $item;
        $this->saveDataset($key, $dataset);
        return $item;
    }


    /**
     * Upsert/replace an item to a dataset.
     *
     * @param string $key    for the dataset
     * @param string $itemId where to store it
     * @param array  $entry  to store
     *
     * @return array as item upserted
     */
    public function upsertItem($key, $itemId, $entry)
    {
        $dataset = $this->getDataset($key);
        $entry['id'] = $itemId;

        // Replace the item if it exists
        $found = false;
        foreach ($dataset as $idx => $val) {
            if ($itemId === $val['id']) {
                $dataset[$idx] = $entry;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $dataset[] = $entry;
        }
        $this->saveDataset($key, $dataset);
        return $entry;
    }


    /**
     * Delete an item from the dataset.
     *
     * @param string $key    for the dataset
     * @param string $itemId to delete
     *
     * @return bool true if item found, false otherwise
     */
    public function deleteItem($key, $itemId)
    {
        $dataset = $this->getDataset($key);

        // Delete the item if it exists
        foreach ($dataset as $idx => $val) {
            if ($itemId === $val['id']) {
                unset($dataset[$idx]);
                $this->saveDataset($key, $dataset);
                return true;
            }
        }
        
        return false;
    }
}
