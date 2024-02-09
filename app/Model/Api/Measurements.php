<?php

namespace App\Model\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\RequestOptions;
use Nette\Utils\Json;
use Nette\Utils\JsonException;
use Tracy\ILogger;

class Measurements implements ApiService
{
	const COLLECTION = "measurments";
	use Loggable;

	/**
	 * @param string $queryParameters
	 * @return array
	 * @throws ApiException|GuzzleException|JsonException
	 */
	public function getData(string $queryParameters): array
	{
		$client = new Client();
		$url = self::URL . '/items/' . self::COLLECTION . "?" . $queryParameters;
		$this->log("Api Request: " . $url, ILogger::INFO);

		try {
			$response = $client->get($url, [
				RequestOptions::HEADERS => [
					"Authorization" => "Bearer " . self::KEY,
				],
			]);

			if ($response->getStatusCode() !== 200) {
				throw new ApiException("Some error occurred in request");
			}

			$content = $response->getBody()->getContents();

			$this->log("Api Response: " . $content, ILogger::INFO);

			return array_map(function ($item) {
				return $this->objectToObject($item, "App\Model\Api\Data\Measurement");
			}, Json::decode($content)->data);

		} catch (ServerException $e) {
			$this->log("Api Error Occurred: " . $e->getMessage(), ILogger::INFO);
			return [];
		}
	}

	function objectToObject($instance, $className)
	{
		return unserialize(sprintf(
			'O:%d:"%s"%s',
			strlen($className),
			$className,
			strstr(strstr(serialize($instance), '"'), ':')
		));
	}
}
