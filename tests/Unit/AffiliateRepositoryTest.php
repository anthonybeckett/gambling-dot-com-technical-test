<?php

namespace Tests\Unit;

use Domain\Affiliate\Repositories\AffiliateRepository;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AffiliateRepositoryTest extends TestCase
{
    public readonly AffiliateRepository $affiliateRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->affiliateRepository = new AffiliateRepository();
    }

    public function test_it_parses_an_existing_file(): void
    {
        Storage::fake('data');
        $filename = 'affiliates.txt';
        $fileData = '
            {"latitude": "52.986375", "affiliate_id": 12, "name": "Yosef Giles", "longitude": "-6.043701"}
            {"latitude": "51.92893", "affiliate_id": 1, "name": "Lance Keith", "longitude": "-10.27699"}
        ';

        Storage::disk('data')->put($filename, $fileData);

        $fileResults = $this->affiliateRepository->getAffiliatesFromFile($filename);

        $this->assertEquals($fileResults, $fileData);
    }

    public function test_it_fails_when_an_incorrect_file_is_passed(): void
    {
        // Assert exception
        // Run method
        $this->expectException(FileNotFoundException::class);

        $fileResults = $this->affiliateRepository->getAffiliatesFromFile('i-dont-exist.txt');
    }
}
