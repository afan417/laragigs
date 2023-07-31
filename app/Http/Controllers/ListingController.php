<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Show all
    public function index()
    {
        return view('listings', [
            'listings' => Listing::all(),
        ]);
    }

    // Show Single
    public function show(Listing $listing)
    {
        return view('listing', [
            'listing' => $listing,
        ]);
    }
}
