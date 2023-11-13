<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Document;
use App\Models\User;
use App\Policies\DocumentPolicy;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        Document::class => DocumentPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('read-document', function (User $user, Document $document) {
            Debugbar::debug($document->attributesToArray());
            return $document->access == Document::ACCESS_PUBLIC;
        });


        Gate::define('can-view', function (User $user, Document $document) {

            if( $document->access == Document::ACCESS_PUBLIC)
                return true;

            if($document->getPermissionForUser($user->id) === "read")
                return true;

            return false;

        });


        Gate::after(function ($user, $ability, $result, $arguments) {
            Log::info("User {$user->id} attempted {$ability} with result: {$result}");
        });



        Gate::define('edit-settings', function (User $user) {
            return $user->isAdmin
                ? Response::allow()
                : Response::deny('You must be an administrator.');
//                : Response::denyWithStatus(404);
            //                : Response::denyAsNotFound();
        });

    }
}
