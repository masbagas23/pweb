<?php 

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait MultitenantProject {

    protected static function bootMultitenantProject()
    {
        if (auth()->check()) {
            static::addGlobalScope('created_by_user_id', function (Builder $builder) {
                $builder->where('customer_id', auth()->id());
            });
        }
    }

}