<?php
/**
 * @author Ali TOKMAKCI <alitokmakci@outlook.com>
 */

namespace ModelFilter;

use Illuminate\Pipeline\Pipeline;

class ModelFilter
{
    public static function filter(mixed $model, array $filters)
    {
        if (is_string($model)) {
            $query = $model::query();
        }    

        return app(Pipeline::class)
            ->send($query)
            ->through($filters)
            ->thenReturn();
    }
}
