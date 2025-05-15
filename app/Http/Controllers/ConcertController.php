<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');

        $concerts = Concert::query();

        if ($search) {
            $concerts->where('title', 'like', '%' . $search . '%')
                     ->orWhere('venue', 'like', '%' . $search . '%')
                     ->orWhere('city', 'like', '%' . $search . '%');
        }

        return view('concerts.index', ['concerts' => $concerts->paginate(10), 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('concerts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'date' => 'required|date',
            'ticket_price' => 'required|numeric|min:0',
            'venue' => 'required|string|max:255',
            'venue_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|string|max:255',
            'additional_information' => 'nullable|string',
        ]);

        Concert::create($request->all());
        return redirect()->route('concerts.index')->with('success', 'Concert created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Concert $concert)
    {
        return view('concerts.show', compact('concert'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Concert $concert)
    {
        return view('concerts.edit', compact('concert'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Concert $concert)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'date' => 'required|date',
            'ticket_price' => 'required|numeric|min:0',
            'venue' => 'required|string|max:255',
            'venue_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|string|max:255',
            'additional_information' => 'nullable|string',
        ]);

        $concert->update($request->all());

        return redirect()->route('concerts.index')->with('success', 'Concert updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Concert $concert)
    {
        $concert->delete();

        return redirect()->route('concerts.index')->with('success', 'Concert deleted successfully.');
    }
}
