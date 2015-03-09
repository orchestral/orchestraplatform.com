<?php

$finder = Symfony\Component\Finder\Finder::create()
    ->files()
    ->in(__DIR__.'/app')
    ->in(__DIR__.'/resources/config')
    ->in(__DIR__.'/resources/database')
    ->in(__DIR__.'/resources/lang')
    ->exclude(__DIR__.'/resources/database/seeds/posts')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return Symfony\CS\Config\Config::create()
    ->setUsingCache(true)
    ->level(Symfony\CS\FixerInterface::PSR2_LEVEL)
    ->fixers(array('-psr0'))
    ->finder($finder);
