<?php
namespace App\Repositories;

/**
 * Quote Repository
 * @created by @ridwanpandi
 */
interface QuoteRepository
{
    public function getAll($page);

    public function create(array $attributes);
}
