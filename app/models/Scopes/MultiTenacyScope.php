<?php

use Illuminate\Database\Eloquent\ScopeInterface;
use Illuminate\Database\Eloquent\Builder;

class MultiTenacyScope implements ScopeInterface
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return void
     */
    public function apply(Builder $builder)
    {
        $builder->whereEntidadeId( Auth::user()->id );
    }

    /**
     * Remove the scope from the given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return void
     */
    public function remove(Builder $builder)
    {
        // $query = $builder->getQuery();

        // foreach ((array) $query->wheres as $key => $where) {
        //     if ($column == 'entidade_id') {
        //         unset($query->wheres[$key]);
        //         $query->wheres = array_values($query->wheres);
        //     }
        // }
    }
}