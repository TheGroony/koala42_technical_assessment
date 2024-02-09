<?php

declare(strict_types=1);

namespace App\Controls\Monitor;

use App\Model\Api\ApiException;
use App\Model\Api\Measurements;
use GuzzleHttp\Exception\GuzzleException;
use Nette\Application\UI\Control;
use Nette\Utils\JsonException;
use Tracy\ILogger;

/**
 * @property MonitorControlTemplate $template
 */
final class MonitorControl extends Control
{
	/**
	 * @var array $data
	 */
	protected array $data;

	public function __construct(protected Measurements $measurements, public ILogger $logger)
	{
		$this->measurements->setLogger($this->logger);
		$this->data = $this->getData();
	}

	public function renderRecent(): void
	{
		$this->template->setFile(__DIR__ . DIRECTORY_SEPARATOR . "recent.latte");
		$this->template->record = reset($this->data);
		$this->template->render();
	}

	public function renderMeasurements(): void
	{
		$this->template->setFile(__DIR__ . DIRECTORY_SEPARATOR . "measurements.latte");
		$this->template->data = $this->data;
		$this->template->render();
	}

	/**
	 * @throws ApiException|GuzzleException|JsonException
	 */
	private function getData(): array
	{
		return $this->measurements->getData("sort=-date_created&limit=20");
	}
}
