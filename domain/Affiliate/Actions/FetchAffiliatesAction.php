<?php

namespace Domain\Affiliate\Actions;

use Domain\Affiliate\Contracts\AffiliateRepositoryContract;
use Illuminate\Support\Collection;
use Lorisleiva\Actions\Action;
use Lorisleiva\Actions\Concerns\AsObject;

class FetchAffiliatesAction extends Action
{
    use AsObject;

    public function __construct(private readonly AffiliateRepositoryContract $affiliateRepository)
    {
        //
    }
    public function handle(): Collection
    {
        $file = $this->affiliateRepository->getAffiliatesFromFile('affiliates.txt');

        $affiliates = AffiliatesFileToCollectionAction::run($file);

        return $affiliates;
    }


}
