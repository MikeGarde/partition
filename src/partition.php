<?php namespace partition;

use Functional as f;
use partition\support\entry;
use partition\support\result;

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

		if (is_array($data))
		{
			if (current($data) instanceof entry)
			{
				foreach($data as $item)
				{
					if (!($item instanceof entry))
					{
						throw new partitionException('all data items must be an entry');
					}
				}

				$unsorted = &$data;
			}
			else
			{
				foreach ($data as $item)
				{
					if (!isset($item['id']) || !isset($item['value']))
					{
						throw new partitionException('id and value need to be set');
					}

					$unsorted[] = new entry($item['id'], $item['value']);
				}
			}
		}

		$this->data = $this->sortData($unsorted);

		$this->setSize($size);

		if (is_bool($run) === false)
		{
			throw new partitionException('automatic run feature needs to be a boolean');
		}

		if ($run)
		{
			$this->greedy();
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
	 * @param int $size
	 *
	 * @throws partitionException
	 */
	public function setSize($size)
	{
		if (!is_int($size) || $size < 1)
		{
			throw new partitionException('setSize must be a positive integer');
		}

		$this->size   = $size;
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
	public function getPartition($key)
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