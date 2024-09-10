<?php

namespace App\Http\Controllers;

use Domain\Affiliate\Actions\FetchAffiliatesAction;
use Inertia\Inertia;
use Inertia\Response;

class AffiliateController extends Controller
{
    public function index(): Response
    {
        $affiliates = FetchAffiliatesAction::run();

        return Inertia::render('Affiliate', [
            'affiliates' => $affiliates
        ]);
    }
}
