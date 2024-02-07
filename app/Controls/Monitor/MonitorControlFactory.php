<?php

declare(strict_types=1);

namespace App\Controls\Monitor;

interface MonitorControlFactory
{
    public function create(): MonitorControl;
}
