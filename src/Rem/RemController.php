<?php

namespace LRC\Rem;

/**
 * A controller for the REM Server.
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class RemController extends \LRC\App\BaseController
{
    /**
     * Start the session and initiate the REM Server.
     *
     * @return void
     */
    public function prepare()
    {
        if (!$this->app->rem->hasDataset()) {
            $this->app->rem->init();
        }
    }


    /**
     * Init or re-init the REM Server.
     *
     * @return void
     */
    public function init()
    {
        $this->app->rem->init();
        $this->app->response->sendJson(['message' => 'Session initiated with default dataset.']);
        exit;
    }


    /**
     * Destroy the session.
     *
     * @return void
     */
    public function destroy()
    {
        $this->app->session->destroy();
        $this->app->response->sendJson(['message' => 'Session destroyed.']);
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
        $dataset = $this->app->rem->getDataset($key);
        $offset = (int)$this->app->request->getGet('offset', 0);
        $limit = (int)$this->app->request->getGet('limit', 25);
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
        $this->app->response->sendJson($res);
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
        $item = $this->app->rem->getItem($key, $itemId);
        if (!$item) {
            $this->app->response->sendJson(['error' => 'Item not found.'], 404);
            exit;
        }

        $this->app->response->sendJson($item);
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
            $item = $this->app->rem->addItem($key, $item);
            $this->app->response->sendJson($item);
        } else {
            $this->app->response->sendJson(['error' => 'Error in JSON data.'], 400);
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
            $item = $this->app->rem->upsertItem($key, $itemId, $item);
            $this->app->response->sendJson($item);
        } else {
            $this->app->response->sendJson(['error' => 'Error in JSON data.'], 400);
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
        if ($this->app->rem->deleteItem($key, $itemId)) {
            $this->app->response->sendJson(['message' => 'Item deleted.']);
        } else {
            $this->app->response->sendJson(['error' => 'Item not found.'], 404);
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
        $this->app->response->sendJson(['error' => 'The API does not support the requested operation.'], 404);
        exit;
    }
    
    
    /**
     * Populate item from request body.
     *
     * @return array
     */
    private function populateItem()
    {
        return json_decode($this->app->request->getBody(), true);
    }
}
