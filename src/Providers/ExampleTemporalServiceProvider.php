<?php

declare(strict_types=1);

namespace Dezer32\Temporal\Laravel\Example\Providers;

use Dezer32\Temporal\Laravel\Core\Providers\TemporalServiceProvider;
use Dezer32\Temporal\Laravel\Example\Activities\Greeting\GreetingActivity;
use Dezer32\Temporal\Laravel\Example\Activities\Greeting\GreetingActivityInterface;
use Dezer32\Temporal\Laravel\Example\Workflows\Greeting\GreetingWorkflow;
use Dezer32\Temporal\Laravel\Example\Workflows\Greeting\GreetingWorkflowInterface;

class ExampleTemporalServiceProvider extends TemporalServiceProvider
{
    protected array $activityBindings = [
        GreetingActivityInterface::class => GreetingActivity::class,
    ];
    protected array $workflowBindings = [
        GreetingWorkflowInterface::class => GreetingWorkflow::class,
    ];
}
