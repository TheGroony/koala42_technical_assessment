<?php


namespace App\Model\Api;

interface ApiService
{
	const URL = "https://airmonitor.k42.app";
	const KEY = "37BnlLu_FSDxEscl5oLZ6AAMPl7wjo64";

	/**
	 * @param string $queryParameters
	 * @return array
	 */
	public function getData(string $queryParameters): array;
}
