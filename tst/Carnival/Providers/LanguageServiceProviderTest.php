<?php

namespace Tests\Carnival\Providers;

use Carnival\Language\LanguageManager;
use Carnival\Providers\LanguageServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Mockery;
use Tests\Carnival\CarnivalTestCase;

class LanguageServiceProviderTest extends CarnivalTestCase {
    public function testHookServiceProviderCanRegisterHookLibraryFacade() {
        $application = Mockery::mock(Application::class);
        $hookServiceProvider = new LanguageServiceProvider($application);
        $application->shouldReceive('bind')->with(
            'languages', 
            Mockery::on(fn ($argument) => is_callable($argument) && $argument() instanceof LanguageManager)
        )->once();
        $hookServiceProvider->register();
    }
}
