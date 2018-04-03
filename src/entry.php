<?php namespace partition\support;

use partition\partitionException;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

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
		try
		{
			v::alnum()->assert($id);
			v::numeric()->positive()->assert($value);
		}
		catch (NestedValidationException $e)
		{
			throw new partitionException('provided data array requires both "name" and "value" keys with "value" being a positive integer');
		}

		$this->id    = $id;
		$this->value = (int) $value;
	}
}