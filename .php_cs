<?php

$finder = Symfony\Component\Finder\Finder::create()
    ->files()
    ->in(__DIR__.'/app')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::PSR2_LEVEL)
    ->fixers(array('-psr0'))
    ->finder($finder);
