@extends('layouts.app')

@section('title', 'Create New Concert')

@section('content')

    <h1>Create New Concert</h1>

    <form method="POST" action="{{ route('conciertos.store') }}">
        @csrf

        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required maxlength="255">
            @error('title')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="subtitle">Subtitle:</label>
            <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle') }}" maxlength="255">
            @error('subtitle')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="{{ old('date') }}" required>
            @error('date')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="ticket_price">Ticket Price:</label>
            <input type="number" id="ticket_price" name="ticket_price" value="{{ old('ticket_price') }}" step="0.01" required min="0">
            @error('ticket_price')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="venue">Venue:</label>
            <input type="text" id="venue" name="venue" value="{{ old('venue') }}" required maxlength="255">
            @error('venue')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="venue_address">Venue Address:</label>
            <input type="text" id="venue_address" name="venue_address" value="{{ old('venue_address') }}" required maxlength="255">
            @error('venue_address')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="{{ old('city') }}" required maxlength="255">
            @error('city')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="state">State:</label>
            <input type="text" id="state" name="state" value="{{ old('state') }}" required maxlength="255">
            @error('state')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            {{-- Assuming zip can be any string, adjust maxlength as needed --}}
            {{-- Consider adding pattern attribute for specific zip code formats if needed --}}

            <label for="zip">Zip:</label>
            <input type="text" id="zip" name="zip" required>
        </div>

        <div>
            <label for="additional_information">Additional Information:</label>
            <textarea id="additional_information" name="additional_information"></textarea>
             @error('additional_information')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Create Concert</button>
    </form>

    <a href="{{ route('conciertos.index') }}">Back to Concerts</a>

@endsection