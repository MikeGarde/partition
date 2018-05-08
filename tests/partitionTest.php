<?php namespace partition;

use PHPUnit\Framework\TestCase;

class partitionTest extends TestCase
{
	public function testDataValidationFail()
	{
		$this->expectException(partitionException::class);

		$data = [
			[
				'id'    => 'valid',
				'value' => 1,
			],
			[
				'id'       => 'invalid',
				'notValue' => 1,
			],
		];

		new partition($data);
	}

	public function testNegativeNum()
	{
		$this->expectException(partitionException::class);

		$data = [
			[
				'id'    => 'valid',
				'value' => 1,
			],
			[
				'id'    => 'invalid',
				'value' => -1,
			],
		];

		new partition($data);
	}

	public function testAllGood()
	{
		$data = [
			[
				'id'    => 'AA',
				'value' => 5,
			],
			[
				'id'    => 'AB',
				'value' => 5,
			],
			[
				'id'    => 'AC',
				'value' => 15,
			],
			[
				'id'    => 'AD',
				'value' => 5,
			],
			[
				'id'    => 'AE',
				'value' => 9,
			],
			[
				'id'    => 'AF',
				'value' => 3,
			],
			[
				'id'    => 'AG',
				'value' => 7,
			],
			[
				'id'    => 'AH',
				'value' => 12,
			],
			[
				'id'    => 'AI',
				'value' => 5,
			],
			[
				'id'    => 'AJ',
				'value' => 207,
			],
			[
				'id'    => 'AK',
				'value' => 64,
			],
			[
				'id'    => 'AL',
				'value' => 4,
			],
			[
				'id'    => 'AM',
				'value' => 77,
			],
			[
				'id'    => 'AN',
				'value' => 3,
			],
			[
				'id'    => 'AO',
				'value' => 3,
			],
			[
				'id'    => 'AP',
				'value' => 3,
			],
			[
				'id'    => 'AQ',
				'value' => 3,
			],
			[
				'id'    => 'AR',
				'value' => 6,
			],
			[
				'id'    => 'AS',
				'value' => 75,
			],
			[
				'id'    => 'AT',
				'value' => 223,
			],
			[
				'id'    => 'AU',
				'value' => 4,
			],
			[
				'id'    => 'AV',
				'value' => 10,
			],
			[
				'id'    => 'AW',
				'value' => 5,
			],
			[
				'id'    => 'AX',
				'value' => 7,
			],
			[
				'id'    => 'AY',
				'value' => 10,
			],
			[
				'id'    => 'AZ',
				'value' => 35,
			],
			[
				'id'    => 'BA',
				'value' => 5,
			],
			[
				'id'    => 'BB',
				'value' => 35,
			],
			[
				'id'    => 'BC',
				'value' => 7,
			],
			[
				'id'    => 'BD',
				'value' => 5,
			],
			[
				'id'    => 'BE',
				'value' => 31,
			],
			[
				'id'    => 'BF',
				'value' => 33,
			],
			[
				'id'    => 'BG',
				'value' => 15,
			],
			[
				'id'    => 'BH',
				'value' => 5,
			],
			[
				'id'    => 'BI',
				'value' => 4,
			],
			[
				'id'    => 'BJ',
				'value' => 36,
			],
			[
				'id'    => 'BK',
				'value' => 10,
			],
			[
				'id'    => 'BL',
				'value' => 3,
			],
			[
				'id'    => 'BM',
				'value' => 3,
			],
			[
				'id'    => 'BN',
				'value' => 5,
			],
			[
				'id'    => 'BO',
				'value' => 3,
			],
			[
				'id'    => 'BP',
				'value' => 115,
			],
			[
				'id'    => 'BQ',
				'value' => 121,
			],
			[
				'id'    => 'BR',
				'value' => 3,
			],
			[
				'id'    => 'BS',
				'value' => 84,
			],
			[
				'id'    => 'BT',
				'value' => 5,
			],
			[
				'id'    => 'BU',
				'value' => 3,
			],
			[
				'id'    => 'BV',
				'value' => 4,
			],
			[
				'id'    => 'BW',
				'value' => 23,
			],
			[
				'id'    => 'BX',
				'value' => 59,
			],
			[
				'id'    => 'BY',
				'value' => 6,
			],
			[
				'id'    => 'BZ',
				'value' => 7,
			],
			[
				'id'    => 'CA',
				'value' => 19,
			],
			[
				'id'    => 'CB',
				'value' => 101,
			],
			[
				'id'    => 'CC',
				'value' => 46,
			],
			[
				'id'    => 'CD',
				'value' => 20,
			],
			[
				'id'    => 'CE',
				'value' => 3,
			],
			[
				'id'    => 'CF',
				'value' => 41,
			],
			[
				'id'    => 'CG',
				'value' => 3,
			],
			[
				'id'    => 'CH',
				'value' => 3,
			],
			[
				'id'    => 'CI',
				'value' => 12,
			],
			[
				'id'    => 'CJ',
				'value' => 5,
			],
			[
				'id'    => 'CK',
				'value' => 5,
			],
			[
				'id'    => 'CL',
				'value' => 3,
			],
			[
				'id'    => 'CM',
				'value' => 85,
			],
			[
				'id'    => 'CN',
				'value' => 3,
			],
			[
				'id'    => 'CO',
				'value' => 3,
			],
			[
				'id'    => 'CP',
				'value' => 21,
			],
			[
				'id'    => 'CQ',
				'value' => 3,
			],
			[
				'id'    => 'CR',
				'value' => 23,
			],
			[
				'id'    => 'CS',
				'value' => 12,
			],
			[
				'id'    => 'CT',
				'value' => 3,
			],
			[
				'id'    => 'CU',
				'value' => 18,
			],
			[
				'id'    => 'CV',
				'value' => 140,
			],
			[
				'id'    => 'CW',
				'value' => 9,
			],
			[
				'id'    => 'CX',
				'value' => 3,
			],
			[
				'id'    => 'CY',
				'value' => 63,
			],
			[
				'id'    => 'CZ',
				'value' => 9,
			],
			[
				'id'    => 'DA',
				'value' => 497,
			],
			[
				'id'    => 'DB',
				'value' => 65,
			],
			[
				'id'    => 'DC',
				'value' => 96,
			],
			[
				'id'    => 'DD',
				'value' => 14,
			],
			[
				'id'    => 'DE',
				'value' => 110,
			],
			[
				'id'    => 'DF',
				'value' => 10,
			],
			[
				'id'    => 'DG',
				'value' => 8,
			],
			[
				'id'    => 'DH',
				'value' => 5,
			],
			[
				'id'    => 'DI',
				'value' => 6,
			],
			[
				'id'    => 'DJ',
				'value' => 3,
			],
			[
				'id'    => 'DK',
				'value' => 3,
			],
			[
				'id'    => 'DL',
				'value' => 3,
			],
			[
				'id'    => 'DM',
				'value' => 5,
			],
		];

		$partition = new partition($data, 3);
		$partition->process();

		$this->assertEquals(972, $partition->getResults()->summary[0]);
		$this->assertEquals(972, $partition->getResults()->summary[1]);
		$this->assertEquals(972, $partition->getResults()->summary[2]);

		$this->assertEquals(29, count($partition->getResults()->partitions[0]));
		$this->assertEquals(31, count($partition->getResults()->partitions[1]));
		$this->assertEquals(31, count($partition->getResults()->partitions[2]));

		$this->assertEquals(29, count($partition->getPartition(0)));
		$this->assertEquals(31, count($partition->getPartition(1)));
		$this->assertEquals(31, count($partition->getPartition(2)));
	}

	public function testNonAutoRun()
	{
		$data = [
			[
				'id'    => 1,
				'value' => 6,
			],
			[
				'id'    => 2,
				'value' => 7,
			],
			[
				'id'    => 3,
				'value' => 19,
			],
			[
				'id'    => 4,
				'value' => 32,
			],
			[
				'id'    => 5,
				'value' => 12,
			],
			[
				'id'    => 6,
				'value' => 20,
			],
			[
				'id'    => 7,
				'value' => 3,
			],
		];

		$partition = new partition($data, 3);

		$this->assertEquals(0, $partition->getResults()->summary[0]);
		$this->assertEquals(0, $partition->getResults()->summary[1]);
		$this->assertEquals(0, $partition->getResults()->summary[2]);

		$this->assertEquals(0, count($partition->getResults()->partitions[0]));
		$this->assertEquals(0, count($partition->getResults()->partitions[1]));
		$this->assertEquals(0, count($partition->getResults()->partitions[2]));

		$partition->process();

		$this->assertEquals(32, $partition->getResults()->summary[0]);
		$this->assertEquals(33, $partition->getResults()->summary[1]);
		$this->assertEquals(34, $partition->getResults()->summary[2]);

		$this->assertEquals(1, count($partition->getResults()->partitions[0]));
		$this->assertEquals(3, count($partition->getResults()->partitions[1]));
		$this->assertEquals(3, count($partition->getResults()->partitions[2]));
	}

	public function testMaxSetSize()
	{
		$data = [
			[
				'id'    => 'AA',
				'value' => 5,
			],
			[
				'id'    => 'AB',
				'value' => 5,
			],
			[
				'id'    => 'AC',
				'value' => 15,
			],
			[
				'id'    => 'AD',
				'value' => 5,
			],
			[
				'id'    => 'AE',
				'value' => 9,
			],
			[
				'id'    => 'AF',
				'value' => 3,
			],
			[
				'id'    => 'AG',
				'value' => 7,
			],
			[
				'id'    => 'AH',
				'value' => 12,
			],
			[
				'id'    => 'AI',
				'value' => 5,
			],
			[
				'id'    => 'AJ',
				'value' => 207,
			],
			[
				'id'    => 'AK',
				'value' => 64,
			],
			[
				'id'    => 'AL',
				'value' => 4,
			],
			[
				'id'    => 'AM',
				'value' => 77,
			],
			[
				'id'    => 'AN',
				'value' => 3,
			],
			[
				'id'    => 'AO',
				'value' => 3,
			],
			[
				'id'    => 'AP',
				'value' => 3,
			],
			[
				'id'    => 'AQ',
				'value' => 3,
			],
			[
				'id'    => 'AR',
				'value' => 6,
			],
			[
				'id'    => 'AS',
				'value' => 75,
			],
			[
				'id'    => 'AT',
				'value' => 223,
			],
			[
				'id'    => 'AU',
				'value' => 4,
			],
			[
				'id'    => 'AV',
				'value' => 10,
			],
			[
				'id'    => 'AW',
				'value' => 5,
			],
			[
				'id'    => 'AX',
				'value' => 7,
			],
			[
				'id'    => 'AY',
				'value' => 10,
			],
			[
				'id'    => 'AZ',
				'value' => 35,
			],
			[
				'id'    => 'BA',
				'value' => 5,
			],
			[
				'id'    => 'BB',
				'value' => 35,
			],
			[
				'id'    => 'BC',
				'value' => 7,
			],
			[
				'id'    => 'BD',
				'value' => 5,
			],
			[
				'id'    => 'BE',
				'value' => 31,
			],
			[
				'id'    => 'BF',
				'value' => 33,
			],
			[
				'id'    => 'BG',
				'value' => 15,
			],
			[
				'id'    => 'BH',
				'value' => 5,
			],
			[
				'id'    => 'BI',
				'value' => 4,
			],
			[
				'id'    => 'BJ',
				'value' => 36,
			],
			[
				'id'    => 'BK',
				'value' => 10,
			],
			[
				'id'    => 'BL',
				'value' => 3,
			],
			[
				'id'    => 'BM',
				'value' => 3,
			],
			[
				'id'    => 'BN',
				'value' => 5,
			],
			[
				'id'    => 'BO',
				'value' => 3,
			],
			[
				'id'    => 'BP',
				'value' => 115,
			],
			[
				'id'    => 'BQ',
				'value' => 121,
			],
			[
				'id'    => 'BR',
				'value' => 3,
			],
			[
				'id'    => 'BS',
				'value' => 84,
			],
			[
				'id'    => 'BT',
				'value' => 5,
			],
			[
				'id'    => 'BU',
				'value' => 3,
			],
			[
				'id'    => 'BV',
				'value' => 4,
			],
			[
				'id'    => 'BW',
				'value' => 23,
			],
			[
				'id'    => 'BX',
				'value' => 59,
			],
			[
				'id'    => 'BY',
				'value' => 6,
			],
			[
				'id'    => 'BZ',
				'value' => 7,
			],
			[
				'id'    => 'CA',
				'value' => 19,
			],
			[
				'id'    => 'CB',
				'value' => 101,
			],
			[
				'id'    => 'CC',
				'value' => 46,
			],
			[
				'id'    => 'CD',
				'value' => 20,
			],
			[
				'id'    => 'CE',
				'value' => 3,
			],
			[
				'id'    => 'CF',
				'value' => 41,
			],
			[
				'id'    => 'CG',
				'value' => 3,
			],
			[
				'id'    => 'CH',
				'value' => 3,
			],
			[
				'id'    => 'CI',
				'value' => 12,
			],
			[
				'id'    => 'CJ',
				'value' => 5,
			],
			[
				'id'    => 'CK',
				'value' => 5,
			],
			[
				'id'    => 'CL',
				'value' => 3,
			],
			[
				'id'    => 'CM',
				'value' => 85,
			],
			[
				'id'    => 'CN',
				'value' => 3,
			],
			[
				'id'    => 'CO',
				'value' => 3,
			],
			[
				'id'    => 'CP',
				'value' => 21,
			],
			[
				'id'    => 'CQ',
				'value' => 3,
			],
			[
				'id'    => 'CR',
				'value' => 23,
			],
			[
				'id'    => 'CS',
				'value' => 12,
			],
			[
				'id'    => 'CT',
				'value' => 3,
			],
			[
				'id'    => 'CU',
				'value' => 18,
			],
			[
				'id'    => 'CV',
				'value' => 140,
			],
			[
				'id'    => 'CW',
				'value' => 9,
			],
			[
				'id'    => 'CX',
				'value' => 3,
			],
			[
				'id'    => 'CY',
				'value' => 63,
			],
			[
				'id'    => 'CZ',
				'value' => 9,
			],
			[
				'id'    => 'DA',
				'value' => 497,
			],
			[
				'id'    => 'DB',
				'value' => 65,
			],
			[
				'id'    => 'DC',
				'value' => 96,
			],
			[
				'id'    => 'DD',
				'value' => 14,
			],
			[
				'id'    => 'DE',
				'value' => 110,
			],
			[
				'id'    => 'DF',
				'value' => 10,
			],
			[
				'id'    => 'DG',
				'value' => 8,
			],
			[
				'id'    => 'DH',
				'value' => 5,
			],
			[
				'id'    => 'DI',
				'value' => 6,
			],
			[
				'id'    => 'DJ',
				'value' => 3,
			],
			[
				'id'    => 'DK',
				'value' => 3,
			],
			[
				'id'    => 'DL',
				'value' => 3,
			],
			[
				'id'    => 'DM',
				'value' => 5,
			],
		];

		$partition = new partition($data);
		$partition->setMaxSetSize(800);
		$partition->process();

		$this->assertEquals(729, $partition->getResults()->summary[0]);
		$this->assertEquals(731, $partition->getResults()->summary[1]);
		$this->assertEquals(728, $partition->getResults()->summary[2]);
		$this->assertEquals(728, $partition->getResults()->summary[3]);

		$this->assertEquals(20, count($partition->getResults()->partitions[0]));
		$this->assertEquals(24, count($partition->getResults()->partitions[1]));
		$this->assertEquals(23, count($partition->getResults()->partitions[2]));
		$this->assertEquals(24, count($partition->getResults()->partitions[3]));

		$this->assertEquals(20, count($partition->getPartition(0)));
		$this->assertEquals(24, count($partition->getPartition(1)));
		$this->assertEquals(23, count($partition->getPartition(2)));
		$this->assertEquals(24, count($partition->getPartition(3)));
	}
}