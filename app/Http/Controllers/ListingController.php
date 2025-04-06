<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    use AuthorizesRequests;
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }
    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom', 'priceTo', 'bedrooms', 'bathrooms', 'areaFrom', 'areaTo'
        ]);
        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => Listing::mostRecent()
                ->filter($filters)
                ->withoutSold()
                ->paginate(10)
                ->withQueryString()
            ]
        );
    }

    public function show(Listing $listing)
    {
        $listing->load(['images']);
        $offer = !Auth::user() ?
             null : $listing->offers()->byMe()->first();
        return inertia(
            'Listing/Show',
            [
                'listing' => $listing,
                'offerMade' => $offer
            ]
        );
    }
}
