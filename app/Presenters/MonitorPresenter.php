<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Controls\Monitor\MonitorControl;
use App\Controls\Monitor\MonitorControlFactory;
use Nette;
use Nette\DI\Attributes\Inject;


final class MonitorPresenter extends Nette\Application\UI\Presenter
{
	#[Inject]
	public MonitorControlFactory $monitorControlFactory;


	/**
	 * @return MonitorControl
	 */
	public function createComponentMonitor(): MonitorControl
	{
		return $this->monitorControlFactory->create();
	}
}
