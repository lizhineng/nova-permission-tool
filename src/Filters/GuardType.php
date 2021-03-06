<?php

namespace Lizhineng\PermissionTool\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class GuardType extends Filter
{
    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where('guard_name', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return collect(config('auth.guards'))
            ->mapWithKeys(function ($value, $key) {
                return [$key => $key];
            });
    }

    /**
     * Get the displayable name of the filter.
     *
     * @return string
     */
    public function name()
    {
        return __('permission-tool::filters.guard_type');
    }
}
