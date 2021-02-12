<?php

namespace App\Providers;
use App\Models\Centro;
use App\Models\Curso;
use App\Policies\CentroPolicy;
use App\Policies\CursoPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Centro::class => CentroPolicy::class,
        Materiamatriculada::class => MateriamatriculadaPolicy::class,
        Curso::class => CursoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
