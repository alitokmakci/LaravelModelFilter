<?php
/**
 * @author Ali TOKMAKCI <alitokmakci@outlook.com>
 */

namespace ModelFilter;

use Illuminate\Pipeline\Pipeline;

class ModelFilter
{
    public static function filter(string $model, array $filters)
    {
        $query = $model::query();

        return app(Pipeline::class)
            ->send($query)
            ->through($filters)
            ->thenReturn();
    }
}
