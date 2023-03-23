<?php

namespace Tests\Carnival\Providers;

use Carnival\Providers\ThemeServiceProvider;
use Carnival\Themes\ThemeManager;
use Illuminate\Contracts\Foundation\Application;
use Mockery;
use Tests\Carnival\CarnivalTestCase;

class ThemeServiceProviderTest extends CarnivalTestCase {
    
    public function testThemeServiceProviderCanRegisterThemeManagerFacade() {
        $application = Mockery::mock(Application::class);
        $themeServiceProvider = new ThemeServiceProvider($application);
        $application->shouldReceive('bind')->with(
            'themes', 
            Mockery::on(fn ($argument) => is_callable($argument) && $argument() instanceof ThemeManager )
        )->once();
        $themeServiceProvider->register();
    }
}