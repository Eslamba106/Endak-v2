<?php

namespace App\Providers;

use App\Models\Section;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Cache;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        $minutes = 0; // 1 hour
        $sections = Cache::remember('sections', $minutes, function () {
            return Section::all();
        });

        $scopes = [];
        foreach ($sections as $section) {
            $scopes[$section->name] = $section->caption;
            Gate::define($section->name, function ($user) use ($section) {
                return $user->hasPermission($section->name);
            });
        }
    }
}
