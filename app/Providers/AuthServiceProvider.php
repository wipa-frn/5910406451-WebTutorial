<?php

namespace App\Providers;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class => 'App\Policies\PostPolicy',
        Comment::class => 'App\Policies\CommentPolicy',

        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('create-post','App\Policies\PostPolicy@create');

        Gate::define('edit-comment','App\Policies\PostPolicy@create');
    }
}
