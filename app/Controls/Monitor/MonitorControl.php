<?php

declare(strict_types=1);

namespace App\Controls\Monitor;

use Nette\Application\UI\Control;

/**
 * @property MonitorControlTemplate $template
 */
final class MonitorControl extends Control
{
	public function __construct()
	{
	}

	public function renderRecent(): void
	{
		$this->template->setFile(__DIR__ . DIRECTORY_SEPARATOR . "recent.latte");
		$this->template->render();
	}

	public function renderMeasurements(): void
	{
		$this->template->setFile(__DIR__ . DIRECTORY_SEPARATOR . "measurements.latte");
		$this->template->render();
	}
}
