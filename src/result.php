<?php namespace partition\support;

use Functional as f;

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
	 * @param int $size
	 */
	public function __construct(int $size)
	{
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
	public function add(int $part, entry $entry)
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
		return f\minimum($this->summary);
	}

	/**
	 * @return int
	 */
	public function getGreatestValue()
	{
		return f\maximum($this->summary);
	}

	/**
	 * @return int
	 */
	public function getTotalValue()
	{
		return f\sum($this->summary);
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