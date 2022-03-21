<?php

namespace app;

use alkemann\h2l\exceptions\InvalidUrl;

class ContactManager
{

	private static $data = [
		1 => [
			'firstName' => 'Joe',
			'lastName' => 'Smith',
			'email' => 'joe@example.com'
		],
		2 => [
			'firstName' => 'Ola',
			'lastName' => 'Normann',
			'email' => 'ola@example.com'
		],
	];

	public static function get($id): array|null
	{
		if (!isset(static::$data[$id])) {
			throw new InvalidUrl("Contact $id not found!");
		}
		return static::$data[$id];
	}


	public static function update(int $id, array $update): array
	{
		$data = static::get($id);
		foreach ($update as $key => $value) {
			$data[$key] = $value;
		}
		return $data;
	}

}
