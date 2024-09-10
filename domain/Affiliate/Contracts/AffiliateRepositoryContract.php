<?php

namespace Domain\Affiliate\Contracts;

use Illuminate\Support\Collection;

interface AffiliateRepositoryContract
{
    public function getAffiliatesFromFile(string $filename): string;
}
