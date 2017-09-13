<?php

namespace LRC\Rem;

/**
 * A controller for the REM Server.
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class RemController extends \LRC\Common\BaseController
{
    /**
     * Start the session and initiate the REM Server.
     *
     * @return void
     */
    public function prepare()
    {
        if (!$this->di->rem->hasDataset()) {
            $this->di->rem->init();
        }
    }


    /**
     * Init or re-init the REM Server.
     *
     * @return void
     */
    public function init()
    {
        $this->di->rem->init();
        $this->di->response->sendJson(['message' => 'Session initiated with default dataset.']);
        exit;
    }


    /**
     * Destroy the session.
     *
     * @return void
     */
    public function destroy()
    {
        $this->di->session->destroy();
        $this->di->response->sendJson(['message' => 'Session destroyed.']);
        exit;
    }


    /**
     * Get a dataset.
     *
     * @param string $key for the dataset
     *
     * @return void
     */
    public function getDataset($key)
    {
        $dataset = $this->di->rem->getDataset($key);
        $offset = (int)$this->di->request->getGet('offset', 0);
        $limit = $this->di->request->getGet('limit', null);
        $limit = (is_null($limit) || !is_numeric($limit) ? null : (int)$limit);
        $data = array_slice($dataset, $offset, $limit);
        usort($data, function ($item1, $item2) {
            return strnatcmp($item1['id'], $item2['id']);
        });
        $res = [
            'data' => $data,
            'offset' => $offset,
            'limit' => $limit,
            'total' => count($dataset)
        ];
        $this->di->response->sendJson($res);
        exit;
    }


    /**
     * Get one item from the dataset.
     *
     * @param string $key    for the dataset
     * @param string $itemId for the item to get
     *
     * @return void
     */
    public function getItem($key, $itemId)
    {
        $item = $this->di->rem->getItem($key, $itemId);
        if (!$item) {
            $this->di->response->sendJson(['error' => 'Item not found.'], 404);
            exit;
        }

        $this->di->response->sendJson($item);
        exit;
    }


    /**
     * Create a new item by getting the entry from the request body and add
     * to the dataset.
     *
     * @param string $key    for the dataset
     *
     * @return void
     */
    public function createItem($key)
    {
        $item = $this->populateItem();
        if ($item) {
            $item = $this->di->rem->addItem($key, $item);
            $this->di->response->sendJson($item);
        } else {
            $this->di->response->sendJson(['error' => 'Error in JSON data.'], 400);
        }
        exit;
    }


    /**
     * Upsert/replace an item in the dataset (entry is taken from request body).
     *
     * @param string $key    for the dataset
     * @param string $itemId for the item to update (or insert)
     *
     * @return void
     */
    public function updateItem($key, $itemId)
    {
        $item = $this->populateItem();
        if ($item) {
            $item = $this->di->rem->upsertItem($key, $itemId, $item);
            $this->di->response->sendJson($item);
        } else {
            $this->di->response->sendJson(['error' => 'Error in JSON data.'], 400);
        }
        exit;
    }


    /**
     * Delete an item from the dataset.
     *
     * @param string $key    for the dataset
     * @param string $itemId for the item to delete
     *
     * @return void
     */
    public function deleteItem($key, $itemId)
    {
        if ($this->di->rem->deleteItem($key, $itemId)) {
            $this->di->response->sendJson(['message' => 'Item deleted.']);
        } else {
            $this->di->response->sendJson(['error' => 'Item not found.'], 404);
        }
        exit;
    }


    /**
     * Show a message that the route is unsupported, a local 404.
     *
     * @return void
     */
    public function unsupported()
    {
        $this->di->response->sendJson(['error' => 'The API does not support the requested operation.'], 404);
        exit;
    }
    
    
    /**
     * Populate item from request body.
     *
     * @return array
     */
    private function populateItem()
    {
        return json_decode($this->di->request->getBody(), true);
    }
}
