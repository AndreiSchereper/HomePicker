<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;

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
                ->paginate(10)
                ->withQueryString()
            ]
        );
    }

    public function create()
    {
        return inertia(
        'Listing/Create'

        );
    }

    public function store(Request $request)
    {
        $request->user()->listings()->create(
            $request->validate(
            [
                'bedrooms' => ['required', 'integer', 'min:1', 'max:20'],
                'bathrooms' => ['required', 'integer', 'min:1', 'max:20'],
                'area' => ['required', 'integer', 'min:1', 'max:10000'],
                'city' => ['required', 'string', 'max:255'],
                'postal_code' => ['required', 'string', 'max:255'],
                'street' => ['required', 'string', 'max:255'],
                'house_number' => ['required', 'string', 'max:255'],
                'price' => ['required', 'integer', 'min:1', 'max:10000000']
            ]));
        
        return redirect()->route('listing.index')
            ->with('success', 'Listing created successfully.');
    }

    public function show(Listing $listing)
    {
        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }

    public function edit(Listing $listing)
    {
        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing
            ]
        );
    }

    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            $request->validate(
            [
                'bedrooms' => ['required', 'integer', 'min:1', 'max:20'],
                'bathrooms' => ['required', 'integer', 'min:1', 'max:20'],
                'area' => ['required', 'integer', 'min:1', 'max:10000'],
                'city' => ['required', 'string', 'max:255'],
                'postal_code' => ['required', 'string', 'max:255'],
                'street' => ['required', 'string', 'max:255'],
                'house_number' => ['required', 'string', 'max:255'],
                'price' => ['required', 'integer', 'min:1', 'max:10000000']
            ]));
        
        return redirect()->route('listing.index')
            ->with('success', 'Listing updated successfully.');
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();
        
        return redirect()->back()
            ->with('success', 'Listing deleted successfully.');
    }
}
