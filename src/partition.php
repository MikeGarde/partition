<?php namespace partition;

use Functional as f;
use partition\support\entry;
use partition\support\result;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;


class partition
{
	/** @var array */
	private $data;

	/** @var int */
	private $size;

	/** @var result */
	private $result;

	/**
	 * partition constructor.
	 *
	 * @param      $data
	 * @param int  $size
	 * @param bool $run  This is reserved for potential future alternative algorithms
	 *
	 * @throws partitionException
	 */
	public function __construct($data = null, $size = 2, $run = true)
	{
		$unsorted = [];

		try
		{
			if (is_array($data))
			{
				if (current($data) instanceof entry)
				{
					v::arrayVal()->each(v::instance('entry'))->assert($data);

					$unsorted = &$data;
				}
				else
				{
					v::arrayVal()->each(
						v::keySet(
							v::key('id', v::alnum()),
							v::key('value', v::numeric()->positive()))
					)->assert($data);

					foreach ($data as $item)
					{
						$unsorted[] = new entry($item['id'], $item['value']);
					}
				}
			}
		}
		catch (NestedValidationException $e)
		{
			throw new partitionException('provided data array requires both "id" and "value" keys with "value" being a positive integer');
		}

		$this->data = $this->sortData($unsorted);

		$this->setSize($size);

		try
		{
			v::boolType()->assert($run);

			if ($run)
			{
				$this->greedy();
			}
		}
		catch (NestedValidationException $e)
		{
			throw new partitionException('automatic run feature needs to be a boolean');
		}
	}

	private function sortData($data)
	{
		$sorted = f\sort($data, function ($part1, $part2) {
			if ($part1->value === $part2->value)
			{
				return 0;
			}

			if ($part1->value < $part2->value)
			{
				return 1;
			}

			return -1;
		});

		return $sorted;
	}

	/**
	 * @param $size
	 *
	 * @throws partitionException
	 */
	public function setSize($size)
	{
		try
		{
			v::numeric()->positive()->assert($size);
		}
		catch (NestedValidationException $e)
		{
			throw new partitionException('setSize must be a positive number');
		}

		$this->size   = (int) $size;
		$this->result = new result($size);
	}

	public function getSortedData()
	{
		return $this->data;
	}

	/**
	 * @return result
	 */
	public function getResults()
	{
		return $this->result;
	}

	/**
	 * @param int $key
	 *
	 * @return entry[]
	 * @throws partitionException
	 */
	public function getPartition(int $key)
	{
		if ($key > $this->size || $key < 0)
		{
			throw new partitionException('key does not exist');
		}

		return $this->result->partitions[$key];
	}

	/**
	 * The default algorithm for processing
	 */
	public function greedy()
	{
		foreach ($this->data as $entry)
		{
			$target = $this->result->getLowestPartition();

			$this->result->add($target, $entry);
		}
	}
}