<?php namespace partition;

use DusanKasan\Knapsack\Collection;
use partition\support\entry;
use partition\support\result;

class partition
{
	/** @var entry[] */
	private $data;

	/** @var int */
	private $size;

	/** @var result */
	private $result;

	/**
	 * partition constructor.
	 *
	 * @param array $data
	 * @param int  $size
	 *
	 * @throws \Exception
	 * @throws partitionException
	 */
	public function __construct($data, $size = null)
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

		if ($size)
		{
			$this->setSize($size);
		}
	}

	/**
	 * @param $data
	 *
	 * @return array
	 */
	private function sortData($data)
	{
		$sorted = Collection::from($data)->sort(function ($part1, $part2) {
			if ($part1->value === $part2->value)
			{
				return 0;
			}

			if ($part1->value < $part2->value)
			{
				return 1;
			}

			return -1;
		})->toArray();

		return $sorted;
	}

	/**
	 * @param int $size
	 *
	 * @throws \Exception
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


	/**
	 * Set the maximum size of a returned set
	 *
	 * @param $size
	 *
	 * @throws \Exception
	 * @throws partitionException
	 */
	public function setMaxSetSize($size)
	{
		if (!is_int($size) || $size < 1)
		{
			throw new partitionException('setMaxSetSize must be a positive integer');
		}

		$valueSum = 0;

		foreach ($this->data as $item)
		{
			$valueSum += $item->value;
		}

		$numOfSets = (int) ceil($valueSum / $size);

		$this->setSize($numOfSets);
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
	 * Crunch the numbers
	 */
	public function process()
	{
		foreach ($this->data as $entry)
		{
			$target = $this->result->getLowestPartition();

			$this->result->add($target, $entry);
		}
	}
}