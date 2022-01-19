@extends('template.layout_main')

@section('content')

    <center style="margin: 2em">
        <div style="color: var(--primary); font-size: 2em; font-weight:bold">
            {{ $furniture->name }}
        </div>

        <div style="width: 90%; margin-top: 3em; display:flex; justify-content: space-evenly; align-items: center">
            <img src="{{ asset('storage/image/' . $furniture->image) }}" alt="" width="250px" height="100%">           
            <div style="color: var(--primary); font-size: 20px; font-weight: bold">
                <table>
                    <thead>
                        <th style="width: 10em"></th>
                        <th></th>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                Name :
                            </td>

                            <td style="text-align: right">
                                {{ $furniture->name }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Price :
                            </td>

                            <td style="text-align: right">
                                Rp. {{ number_format($furniture->price, 0, ',', '.') }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Type :
                            </td>

                            <td style="text-align: right">
                                {{ ucwords($furniture->type) }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Color :
                            </td>

                            <td style="text-align: right">
                                {{ ucwords($furniture->color) }}
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>

        <div style="margin-top: 3em; display: flex; justify-content: space-evenly">
            <form action="{{ url()->previous() }}" method="GET">
                <button style="border:none; background-color: var(--primary); color: white; border-radius: 10px; 
                padding: 1em 3em 1em 3em; cursor: pointer; font-size:16px">Previous</button>
            </form>

            @if (Auth::user())
                @if (Auth::user()->role == 0)
                    <form method="POST" action="/member/addToCart">

                        @csrf
                        <input type="hidden" name="furniture_id" value="{{ $furniture->id }}">
                        <button style="border:none; background-color: var(--primary); color: white; border-radius: 10px; 
                        padding: 1em 3em 1em 3em; cursor: pointer; font-size:16px">Add to Cart</button>
                    </form>

                @else
                    <form action="/admin/update/{{ $furniture->id }}" method="GET">
                        <button style="border:none; background-color: #5fe422; color: white; border-radius: 10px; 
                        padding: 1em 3em 1em 3em; cursor: pointer; font-size:16px">Update</button>
                    </form>

                    <form action="/admin/delete" method="POST">
                        @csrf
                        <input type="hidden" name="furniture_id" value="{{ $furniture->id }}">
                        <input type="hidden" name="from_detail" value="{{ 1 }}">
                        <button style="border:none; background-color: red; color: white; border-radius: 10px; 
                        padding: 1em 3em 1em 3em; cursor: pointer; font-size:16px">Delete</button>
                    </form>             
                @endif

            @else
                <form method="GET" action="/login" style="display: flex; justify-content: space-around; margin-top: 1em">
                    <button style="border:none; background-color: var(--primary); color: white; border-radius: 10px; 
                    padding: 1em 3em 1em 3em; cursor: pointer; font-size:16px">Add to Cart</button>
                </form>
            @endif

        </div>
        
    </center>


@endsection
