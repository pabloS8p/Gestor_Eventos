@extends('layouts.app')

@section('title', 'Concerts')

@section('content')


    <h1>Concert List</h1>

    <a href="{{ route('conciertos.create') }}">Create New Concert</a>
    
    <form action="{{ route('conciertos.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search concerts..." value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Ticket Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($concerts as $concert)
            <tr>
                <td>{{ $concert->title }}</td>
                <td>{{ $concert->date }}</td>
                <td>{{ $concert->ticket_price }}</td>
                <td>
                    <a href="{{ route('conciertos.show', $concert->id) }}">View</a>
                    <a href="{{ route('conciertos.edit', $concert->id) }}">Edit</a>
                    <form action="{{ route('conciertos.destroy', $concert->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $concerts->appends(request()->query())->links() }}

@endsection