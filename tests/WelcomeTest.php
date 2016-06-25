<?php

class WelcomeTest extends TestCase
{
    /** @test */
    public function suggest_installation()
    {
        $this->createAdminUser();

        $this->visit('/')
            ->see('composer create-project orchestra/platform website "3.2.*"');
    }
}
