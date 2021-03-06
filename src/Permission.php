<?php

namespace Lizhineng\PermissionTool;

use Laravel\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\BelongsToMany;

class Permission extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'Spatie\Permission\Models\Permission';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
    ];

    /**
     * Indicates if the resource should be displayed in the sidebar.
     *
     * @var bool
     */
    public static $displayInNavigation = false;

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        $guardOptions = collect(config('auth.guards'))
            ->mapWithKeys(function ($value, $key) {
                return [$key => $key];
            });

        return [
            ID::make()->sortable(),

            Text::make(__('permission-tool::fields.name'), 'name'),

            Select::make(__('permission-tool::fields.guard_name'), 'guard_name')
                ->options($guardOptions),

            DateTime::make(__('permission-tool::fields.created_at'), 'created_at')
                ->onlyOnDetail(),

            DateTime::make(__('permission-tool::fields.updated_at'), 'updated_at')
                ->onlyOnDetail(),

            BelongsToMany::make('Role', 'roles', Role::class),

            MorphToMany::make(
                'User', 'users', config('permission-tool.models.user')
            )->searchable(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new Filters\GuardType,
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

    /**
     * Get the displayble label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('permission-tool::resources.permissions');
    }

    /**
     * Get the displayble singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('permission-tool::resources.permission');
    }
}
