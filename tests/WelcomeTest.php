<?php

use App\User;

class WelcomeTest extends TestCase
{
    /** @test */
    public function suggest_installation()
    {
        $this->install();

        $this->visit('/')
            ->see('composer create-project orchestra/platform website "3.2.*"');
    }
}
