<?php namespace partition\support;

use DusanKasan\Knapsack\Collection;

class result
{
	/** @var array */
	public $summary;

	/** @var array */
	public $partitions;

	/** @var int */
	private $size;

	/**
	 * result constructor.
	 *
	 * @param $size
	 *
	 * @throws \Exception
	 */
	public function __construct($size)
	{
		if (!is_int($size))
		{
			throw new \Exception('size must be an integer');
		}

		for ($i = 0; $i < $size; $i++)
		{
			$this->summary[ $i ]    = 0;
			$this->partitions[ $i ] = [];
		}

		$this->size = $size;
	}

	/**
	 * @param int   $part
	 * @param entry $entry
	 */
	public function add($part, entry $entry)
	{
		$this->partitions[ $part ][] = $entry;
		$this->summary[ $part ]      += $entry->value;
	}

	/**
	 * @return int
	 */
	public function getLowestPartition()
	{
		$target = $this->getLowestValue();

		return $this->returnTarget($target);
	}

	/**
	 * @return int
	 */
	public function getGreatestPartition()
	{
		$target = $this->getLowestValue();

		return $this->returnTarget($target);
	}

	/**
	 * @return int
	 */
	public function getLowestValue()
	{
		return Collection::from($this->summary)->min();
	}

	/**
	 * @return int
	 */
	public function getGreatestValue()
	{
		return Collection::from($this->summary)->max();
	}

	/**
	 * @return int
	 */
	public function getTotalValue()
	{
		return Collection::from($this->summary)->sum();
	}

	/**
	 * @param int $target
	 *
	 * @return int
	 */
	private function returnTarget($target)
	{
		foreach ($this->summary as $key => $value)
		{
			if ($value === $target)
			{
				return $key;
			}
		}
	}
}