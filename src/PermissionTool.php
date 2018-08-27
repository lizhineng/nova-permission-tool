<?php

namespace Lizhineng\PermissionTool;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class PermissionTool extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::resources([
            Role::class,
            Permission::class,
        ]);

        Nova::script('permission-tool', __DIR__.'/../dist/js/tool.js');
        Nova::style('permission-tool', __DIR__.'/../dist/css/tool.css');
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('permission-tool::navigation');
    }
}
