@extends('layouts.app')

@section('title', 'Concert: ' . $concert->title)

@section('content')
    <h1>{{ $concert->title }} Details</h1>

    <div>
        @if ($concert->subtitle)
            <p>{{ $concert->subtitle }}</p>
        @endif
        <p>Date: {{ $concert->date }}</p>
        <p>Ticket Price: ${{ $concert->ticket_price }}</p>

        <h3>Venue Information:</h3>
        <p>Venue: {{ $concert->venue }}</p>
        <p>Address: {{ $concert->venue_address }}</p>
        <p>Location: {{ $concert->city }}, {{ $concert->state }} {{ $concert->zip }}</p>

        @if ($concert->additional_information)
            <h3>Additional Information:</h3>
            <p>{{ $concert->additional_information }}</p>
        @endif

        <a href="{{ route('conciertos.edit', $concert->id) }}">Edit Concert</a>

        <form action="{{ route('conciertos.destroy', $concert->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this concert?');">Delete Concert</button>
        </form>

        <p><a href="{{ route('conciertos.index') }}">Back to Concerts List</a></p>
    </div>
@endsectionbody {
    font-family: sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    width: 80%;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

nav {
    background: #333;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}

nav a {
    color: #fff;
    text-decoration: none;
    margin: 0 15px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

form {
    margin-top: 20px;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="date"],
input[type="number"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
}

button {
    background-color: #5cb85c;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #4cae4c;
}

.alert {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid transparent;
    border-radius: 4px;
}

.alert-success {
    color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;
}

.alert-danger {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
}
