<?php

namespace Domain\Affiliate\Actions;

use Domain\Affiliate\Data\AffiliateValueData;
use Domain\Shared\Helpers\GreatCircle;
use Illuminate\Support\Collection;
use Lorisleiva\Actions\Action;

class AffiliatesFileToCollectionAction extends Action
{
    const GAMBLING_HQ_LATITUDE = 53.3340285;
    const GAMBLING_HQ_LONGITUDE = -6.2535495;

    const FILTER_DISTANCE = 100;

    public function handle(string $fileData): Collection
    {
        $lines = explode("\n", trim($fileData));

        $affiliateCollection = new Collection();

        foreach ($lines as $line) {
            if (strlen($line) === 0) {
                continue;
            }

            $data = json_decode($line);

            $distance = GreatCircle::distance($data->latitude, $data->longitude, self::GAMBLING_HQ_LATITUDE, self::GAMBLING_HQ_LONGITUDE);

            $affiliateCollection->push(new AffiliateValueData(
                $data->latitude,
                $data->affiliate_id,
                $data->name,
                $data->longitude,
                $distance
            ));
        }

        return $affiliateCollection
            ->filter(fn (AffiliateValueData $affiliate) => $affiliate->distance <= self::FILTER_DISTANCE)
            ->sortBy('affiliateId')
            ->values();
    }
}
