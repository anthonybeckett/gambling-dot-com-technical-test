<?php

namespace Domain\Affiliate\Repositories;

use Domain\Affiliate\Contracts\AffiliateRepositoryContract;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class AffiliateRepository implements AffiliateRepositoryContract
{

    public function getAffiliatesFromFile(string $filename): string
    {
        $file = Storage::disk('data')->get($filename);

        if (!$file) {
            throw new FileNotFoundException();
        }

        return $file;
    }
}
