<?php

namespace ModelFilter;


use Closure;
use Illuminate\Support\Str;

/**
 * @author Ali TOKMAKCI <alitokmakci@outlook.com>
 */

abstract class Filter
{
    protected string $queryFilter;
    protected string $column;

    public function __construct()
    {
        $this->queryFilter = $this->setQueryFilter();
        $this->column = $this->setColumn();
    }

    public function handle($request, Closure $next)
    {
        $builder = $next($request);

        if (!request()->has($this->queryFilter)) {
            return $builder;
        }

        return $this->applyFilter($builder);
    }

    protected function setQueryFilter(): string
    {
        return Str::snake(class_basename($this));
    }

    protected function setColumn(): string
    {
        return Str::snake(class_basename($this));
    }

    protected function applyFilter($builder)
    {
        return $builder->where($this->column, request($this->queryFilter));
    }
}
