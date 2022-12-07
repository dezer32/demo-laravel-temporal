<?php

declare(strict_types=1);

namespace Dezer32\Temporal\Laravel\Example\Providers;

use Dezer32\Temporal\Laravel\Example\Console\Commands\GreetingExecuteCommand;
use Illuminate\Support\ServiceProvider;

class ExampleServiceProvider extends ServiceProvider
{
    private array $commands = [
        GreetingExecuteCommand::class,
    ];

    public function register(): void
    {
        $this->app->register(ExampleTemporalServiceProvider::class);

        $this->registerCommands();
        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
    }

    private function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands($this->commands);
        }
    }
}
