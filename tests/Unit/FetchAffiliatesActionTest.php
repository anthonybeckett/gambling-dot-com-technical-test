<?php

namespace Tests\Unit;



use Domain\Affiliate\Actions\FetchAffiliatesAction;
use Domain\Affiliate\Data\AffiliateValueData;
use Domain\Shared\Helpers\GreatCircle;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FetchAffiliatesActionTest extends TestCase
{
    public function test_can_fetch_a_collection_of_affiliates_from_text_file(): void
    {
        Storage::fake('data');

        $filename = 'affiliates.txt';
        $fileData = '{"latitude": "52.986375", "affiliate_id": 12, "name": "Yosef Giles", "longitude": "-6.043701"}';

        $expectedData = new AffiliateValueData(
            "52.986375",
            12,
            "Yosef Giles",
            "-6.043701",
            41.11114478732731
        );

        Storage::disk('data')->put($filename, $fileData);

        $collectionData = FetchAffiliatesAction::run();

        $this->assertEquals($expectedData->name, $collectionData->first()->name);
        $this->assertEquals($expectedData->latitude, $collectionData->first()->latitude);
        $this->assertEquals($expectedData->longitude, $collectionData->first()->longitude);
        $this->assertEquals($expectedData->affiliateId, $collectionData->first()->affiliateId);
        $this->assertEquals($expectedData->distance, $collectionData->first()->distance);
    }
}
