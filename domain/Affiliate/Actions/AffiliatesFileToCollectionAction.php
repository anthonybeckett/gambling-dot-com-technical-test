<?php

namespace Domain\Affiliate\Actions;

use Domain\Affiliate\Data\AffiliateValueData;
use Illuminate\Support\Collection;
use Lorisleiva\Actions\Action;

class AffiliatesFileToCollectionAction extends Action
{
    public function handle(string $fileData): Collection
    {
        $lines = explode("\n", trim($fileData));

        $affiliateCollection = new Collection();

        foreach ($lines as $line) {
            if (strlen($line) === 0) {
                continue;
            }

            $data = json_decode($line);

            $affiliateCollection->push(new AffiliateValueData(
                $data->latitude,
                $data->affiliate_id,
                $data->name,
                $data->longitude,
            ));
        }

        return $affiliateCollection;
    }
}
