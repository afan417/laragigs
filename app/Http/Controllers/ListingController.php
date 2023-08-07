<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        // Show all
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    public function show(Listing $listing)
    {
        // Show Single
        return view('listings.show', [
            'listing' => $listing,
        ]);
    }

    public function create()
    {
        // Create new listing form
        return view('listings.create');
    }

    public function store(Request $request)
    {
        // Store new listing from form

        // dd($request->file('logo')->store());

        $fields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $fields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($fields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }
}
