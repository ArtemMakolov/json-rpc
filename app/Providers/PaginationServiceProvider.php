<?php

namespace App\Providers;

use App\Components\OffsetPaginator;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\ServiceProvider;

class PaginationServiceProvider extends ServiceProvider
{
    private $maxTotal = 30;
    private $defaultLimit = 15;
    private $limitParam = 'limit';
    private $offsetParam = 'offset';

    public function boot()
    {
        $this->registerMacro();
    }

    /**
     * Create Macros for the Builders.
     */
    public function registerMacro()
    {
        $maxTotal = $this->maxTotal;
        $defaultLimit = $this->defaultLimit;
        $limit = $this->limitParam;
        $offset = $this->offsetParam;
        $macro = function ($perPage = null, $columns = ['*'], array $options = [])
        use ($maxTotal, $defaultLimit, $limit, $offset) {
            if (!$perPage) {
                $perPage = (int)(request($limit) ?? $defaultLimit);
            }
            $perPage = $perPage > $maxTotal ? $maxTotal : $perPage;
            // Limit results

            $this->skip((int)request($offset) ?? 0)->limit($perPage);
            $total = $this->toBase()->getCountForPagination();
            return new OffsetPaginator($this->get($columns), $perPage, $total, $options);
        };
        // Register macros
        QueryBuilder::macro('offsetPaginate', $macro);
        EloquentBuilder::macro('offsetPaginate', $macro);
    }

}
