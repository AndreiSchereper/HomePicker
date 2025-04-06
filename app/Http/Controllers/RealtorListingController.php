<?php

namespace App\Http\Controllers;
 
use App\Models\Listing;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;


class RealtorListingController extends Controller
{
    use AuthorizesRequests;
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }
    public function index(Request $request) 
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ...$request->only(['by', 'order'])
        ];

        return inertia(
            'Realtor/Index',
            [
                 'filters' => $filters,
                 'listings' => Auth::user()
                     ->listings()
                     ->filter($filters)
                     ->withCount('images')
                     ->withCount('offers')
                     ->paginate(5)
                     ->withQueryString()
             ]
        );
    }

   public function destroy(Listing $listing)
     {
         $listing->deleteOrFail();
 
         return redirect()->back()
             ->with('success', 'Listing was deleted!');
     }

     public function create()
     {
         return inertia('Realtor/Create');
     }
 
     public function store(Request $request)
     {
         $request->user()->listings()->create(
             $request->validate([
                'bedrooms' => ['required', 'integer', 'min:1', 'max:20'],
                'bathrooms' => ['required', 'integer', 'min:1', 'max:20'],
                'area' => ['required', 'integer', 'min:1', 'max:10000'],
                'city' => ['required', 'string', 'max:255'],
                'postal_code' => ['required', 'string', 'max:255'],
                'street' => ['required', 'string', 'max:255'],
                'house_number' => ['required', 'string', 'max:255'],
                'price' => ['required', 'integer', 'min:1', 'max:10000000']
             ])
         );
 
         return redirect()->route('realtor.listing.index')
             ->with('success', 'Listing was created!');
     }
 
     public function edit(Listing $listing)
     {
         return inertia(
             'Realtor/Edit',
             [
                 'listing' => $listing
             ]
         );
     }
 
     public function update(Request $request, Listing $listing)
     {
         $listing->update(
             $request->validate([
                'bedrooms' => ['required', 'integer', 'min:1', 'max:20'],
                'bathrooms' => ['required', 'integer', 'min:1', 'max:20'],
                'area' => ['required', 'integer', 'min:1', 'max:10000'],
                'city' => ['required', 'string', 'max:255'],
                'postal_code' => ['required', 'string', 'max:255'],
                'street' => ['required', 'string', 'max:255'],
                'house_number' => ['required', 'string', 'max:255'],
                'price' => ['required', 'integer', 'min:1', 'max:10000000']
             ])
         );
 
         return redirect()->route('realtor.listing.index')
             ->with('success', 'Listing was changed!');
     }

     public function restore(Listing $listing)
     {
         $listing->restore();
 
         return redirect()->back()->with('success', 'Listing was restored!');
     }

     public function show(Listing $listing)
     {
         return inertia(
             'Realtor/Show',
             ['listing' => $listing->load('offers', 'offers.bidder')]
         );
     }
}
