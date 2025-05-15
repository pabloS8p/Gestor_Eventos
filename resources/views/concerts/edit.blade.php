@extends('layouts.app')

@section('title', 'Edit Concert: ' . $concert->title)
    <h1>Edit Concert</h1>

    <form action="{{ route('conciertos.update', $concert->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $concert->title }}" required>
        </div>

        <div>
            <label for="subtitle">Subtitle:</label>
            <input type="text" id="subtitle" name="subtitle" value="{{ $concert->subtitle }}" maxlength="255">
        </div>

        <div>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="{{ $concert->date ? \Carbon\Carbon::parse($concert->date)->format('Y-m-d') : '' }}" required>
        </div>

        <div>
            <label for="ticket_price">Ticket Price:</label>
            <input type="number" id="ticket_price" name="ticket_price" value="{{ $concert->ticket_price }}" step="0.01" required>
        </div>

        <div>
            <label for="venue">Venue:</label>
            <input type="text" id="venue" name="venue" value="{{ $concert->venue }}" required maxlength="255">
        </div>

        <div>
            <label for="venue_address">Venue Address:</label>
            <input type="text" id="venue_address" name="venue_address" value="{{ $concert->venue_address }}" required maxlength="255">
        </div>

        <div>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="{{ $concert->city }}" required maxlength="255">
        </div>

        <div>
            <label for="state">State:</label>
            <input type="text" id="state" name="state" value="{{ $concert->state }}" required>
        </div>

        <div>
            <label for="zip">Zip Code:</label>
            <input type="text" id="zip" name="zip" value="{{ $concert->zip }}" required>
        </div>

        <div>
            <label for="additional_information">Additional Information:</label>
            <textarea id="additional_information" name="additional_information">{{ $concert->additional_information }}</textarea>
        </div>

        <button type="submit">Update Concert</button>
    </form>

    <a href="{{ route('conciertos.show', $concert->id) }}">Cancel</a>