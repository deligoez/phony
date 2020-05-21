<?php

use Phonyland\Tests\BaseTest;
use Phonyland\Tests\Locale\Tr\BaseTrTest;

uses(BaseTest::class)->in('Group', 'Phony');
uses(BaseTrTest::class)->in(__DIR__.'/Locale/Tr');
