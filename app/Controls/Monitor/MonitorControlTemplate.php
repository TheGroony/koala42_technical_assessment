<?php

declare(strict_types=1);

namespace App\Controls\Monitor;


use App\Model\Api\Data\Measurement;
use Nette\Bridges\ApplicationLatte\Template;

class MonitorControlTemplate extends Template
{
	/**
	 * @var Measurement[]
	 */
	public array $data;

	/**
	 * @var Measurement
	 */
	public Measurement $record;
}
