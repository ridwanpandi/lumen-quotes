<?php
namespace App\Repositories;

use App\Quotes;
use App\Repositories\QuoteRepository;

/**
 * Quote Repository
 */
class QuoteEloquent implements QuoteRepository
{

    private $model;

    function __construct(Quotes $model)
    {
        $this->model = $model;
    }

    /**
    * Get all data
    * @return boolean
    */
    public function getAll($page = 10)
    {
        if (!empty($page)) {
            return $this->model->paginate($page);
        }
        return $this->model->all();
    }

    /**
    * Create quote
    * @param Array $attributes
    * @return boolean
    */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

}
