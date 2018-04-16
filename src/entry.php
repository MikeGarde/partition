<?php namespace partition\support;

use partition\partitionException;

class entry
{
	public $id;
	public $value;

	/**
	 * data constructor.
	 *
	 * @param $id
	 * @param $value
	 *
	 * @throws partitionException
	 */
	public function __construct($id, $value)
	{
		// Validate Data Structure
		if (!$id || !is_numeric($value) || $value < 0)
		{
			throw new partitionException('provided data array requires both "name" and "value" keys with "value" being a positive integer');
		}

		$this->id    = $id;
		$this->value = (int) $value;
	}
}