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
            $model = $model::query();
        }    

        return app(Pipeline::class)
            ->send($model)
            ->through($filters)
            ->thenReturn();
    }
}
