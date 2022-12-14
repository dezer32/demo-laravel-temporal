<?php

declare(strict_types=1);

namespace Dezer32\Temporal\Laravel\Example\Workflows\Greeting;

use Carbon\CarbonInterval;
use Dezer32\Temporal\Laravel\Example\Activities\Greeting\GreetingActivityInterface;
use Generator;
use Temporal\Activity\ActivityOptions;
use Temporal\Workflow;

class GreetingWorkflow implements GreetingWorkflowInterface
{
    private $greetingActivity;

    public function __construct()
    {
        /**
         * Activity stub implements activity interface and proxies calls to it to Temporal activity
         * invocations. Because activities are reentrant, only a single stub can be used for multiple
         * activity invocations.
         */
        $this->greetingActivity = Workflow::newActivityStub(
            GreetingActivityInterface::class,
            ActivityOptions::new()->withStartToCloseTimeout(CarbonInterval::seconds(2))
        );
    }

    public function greet(string $name): Generator
    {
        // This is a blocking call that returns only after the activity has completed.
        return yield $this->greetingActivity->composeGreeting('Hello', $name);
    }
}
