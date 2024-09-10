<?php

namespace Domain\Affiliate\Data;

use Spatie\LaravelData\Data;

final class AffiliateValueData extends Data
{
    public function __construct(
        public readonly float $latitude,
        public readonly int $affiliateId,
        public readonly string $name,
        public readonly float $longitude,
    )
    {
    }
}
