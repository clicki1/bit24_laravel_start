<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/laravel/',
        '/laravel/install/',
        '/laravel/handler/',
        '/laravel/placement/',
        '/laravel/leads/',
        '/laravel/test/',

        '/laravel/phones/',
        '/laravel/phones/store/',
        '/laravel/phones/handler/',
        '/laravel/phonesinstall/',
        '/laravel/phonesupdate/',
    ];
}
