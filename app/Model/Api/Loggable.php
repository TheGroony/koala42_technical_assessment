<?php

namespace App\Model\Api;

use Tracy\ILogger;

trait Loggable
{
	public ?ILogger $logger = null;

	public function setLogger(ILogger $logger): self
	{
		$this->logger = $logger;
		return $this;
	}

	public function getLogger(): ILogger|null
	{
		return $this->logger;
	}

	protected function log(string $message, string $level): bool
	{
		if ($this->logger === null) return false;

		$this->logger->log($message, $level);
		return true;
	}

}
