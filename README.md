# The Partition Problem

[![Packagist](https://img.shields.io/packagist/dt/mikegarde/partition.svg)](https://packagist.org/packages/mikegarde/partition)
[![Packagist](https://img.shields.io/packagist/dd/mikegarde/partition.svg)](https://packagist.org/packages/mikegarde/partition)
[![GitHub](https://img.shields.io/github/license/mikegarde/partition.svg)](https://github.com/MikeGarde/partition)
[![PHP from Travis config](https://img.shields.io/travis/php-v/mikegarde/partition.svg)](https://travis-ci.org/MikeGarde/partition)
[![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/mikegarde/partition.svg)](https://github.com/MikeGarde/partition)
[![Travis (.org)](https://img.shields.io/travis/mikegarde/partition.svg)](https://travis-ci.org/MikeGarde/partition)

A PHP function to partition a set of values into equal sets or near equal sets (partitions). 
Read more about the [partition problem on wikipedia](https://en.wikipedia.org/wiki/Partition_problem).

## Installing

Find on [packagist.org](https://packagist.org/packages/mikegarde/partition)

`composer require mikegarde/partition`

## Example

```php
<?php

require 'vendor/autoload.php';

use partition\partition;

$data = [
	[
		'id'    => 'A',
		'value' => 5,
	],
	[
		'id'    => 'B',
		'value' => 5,
	],
	[
		'id'    => 'C',
		'value' => 15,
	],
	[
		'id'    => 'D',
		'value' => 5,
	],
	[
		'id'    => 'E',
		'value' => 9,
	],
	[
		'id'    => 'F',
		'value' => 3,
	],
	[
		'id'    => 'G',
		'value' => 7,
	],
	[
		'id'    => 'H',
		'value' => 12,
	],
];

$partition = new partition($data, 4);

$results = $partition->getResults();
$part    = $partition->getPartition(0);
```

A JSON representation of `$results` and `$part`

```json
{
  "summary": [
    15,
    17,
    14,
    15
  ],
  "partitions": [
    [
      {
        "id": "C",
        "value": 15
      }
    ],
    [
      {
        "id": "H",
        "value": 12
      },
      {
        "id": "D",
        "value": 5
      }
    ],
    [
      {
        "id": "E",
        "value": 9
      },
      {
        "id": "B",
        "value": 5
      }
    ],
    [
      {
        "id": "G",
        "value": 7
      },
      {
        "id": "A",
        "value": 5
      },
      {
        "id": "F",
        "value": 3
      }
    ]
  ]
}
```

```json
[
  {
    "id": "C",
    "value": 15
  }
]
```

## Development Notes

```bash
docker build . -t php:7.4

docker run --rm -it -v $(pwd):/var/www/html php:7.4 composer install
docker run --rm -it -v $(pwd):/var/www/html php:7.4 php ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests
```