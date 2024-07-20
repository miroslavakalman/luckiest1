<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Mood;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view-mood', function ($user, $mood) {
            return $user->id === $mood->user_id;
        });

        Gate::define('update-mood', function ($user, $mood) {
            return $user->id === $mood->user_id;
        });

        Gate::define('delete-mood', function ($user, $mood) {
            return $user->id === $mood->user_id;
        });
    }
}
