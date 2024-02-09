<?php

namespace App\Model\Api\Data;

class Measurement
{
	public int $id;
	public ?int $sort;
	public ?string $user_created;
	public string $date_created;
	public ?string $user_updated;
	public ?string $date_updated;
	public ?string $HEX;
	public string $temperature;
	public int $co2;
	public int $c2ho;
	public string $humidity;
	public int $check;
	public ?int $pm10;
	public ?int $pm25;
	public ?int $tvoc;
	public bool $valid;
}
