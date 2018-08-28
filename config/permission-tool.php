<?php

return [

    'models' => [

        /*
         * When viewing the roles or permissions detail page, we need to know which
         * Eloquent model should be used to retrieve your users to show who has the
         * roles or permissions.
         *
         * The model you want to use as a User model must be a Laravel Nova Resource
         * model.
         */

        'user' => App\Nova\User::class,

    ],

];
