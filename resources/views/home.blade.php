@extends('template.layout_main')

@section('content')

    <center style="margin: 2em">
        <div style="color: var(--primary); font-size: 2em; font-weight:bold">
            @if (Auth::user())
                @if (Auth::user()->role == 0)
                    <div>Welcome, {{ Auth::user()->name }}</div>
                    <div>to JH Furniture</div>
                @else
                    <div>Welcome, Admin</div>
                    <div>to JH Furniture</div>
                @endif

            @else
                <div>Welcome to JH Furniture</div>
            @endif
        </div>

        <div style="width: 90%; margin-top: 2em;">
            <div style="display: flex; justify-content: space-around; color: white;">
                
                @foreach ($furnitures as $f)
                    <div style="border: 1px solid var(--primary); margin: 0em 2em 0em 2em; width: 15em">
                        <a href="/detail/{{ $f->id }}" style="height: 10em">
                            <img src="{{ asset('storage/image/' . $f->image) }}" alt="" width="100%">
                        </a>

                        <div>
                            <center style="background-color: var(--primary); padding: 1em 0em 1em 0em">
                                <div>
                                    <b>
                                        {{ $f->name }}
                                    </b>
                                </div>

                                <div style="margin-top: 0.5em">
                                    Rp. {{ number_format($f->price, 0, ',', '.') }}
                                </div>

                                @if (Auth::user())
                                    @if (Auth::user()->role == 0)
                                        <form method="POST" action="/member/addToCart" style="display: flex; justify-content: space-around; margin-top: 1em">
                                            @csrf
                                            <input type="hidden" name="furniture_id" value="{{ $f->id }}">
                                            <button style="border:none; background-color: white; border-radius: 10px; color: var(--primary); padding: 0.75em 2em 0.75em 2em; cursor: pointer;">Add to Cart</button>
                                        </form>
                                    
                                    @else
                                        <div style="display: flex; justify-content: space-around; margin-top: 1em">
                                            <form action="/admin/update/{{ $f->id }}" method="GET">
                                                <button style="border:none; background-color: #5fe422; border-radius: 10px; color:white; padding: 0.75em; cursor:pointer">Update</button>
                                            </form>
                                            <form action="/admin/delete" method="POST">
                                                @csrf
                                                <input type="hidden" name="furniture_id" value="{{ $f->id }}">
                                                <button style="border:none; background-color: red; border-radius: 10px; color:white; padding: 0.75em; cursor:pointer">Delete</button>
                                            </form>
                                        </div>
                                    @endif

                                @else
                                    <form method="GET" action="/login" style="display: flex; justify-content: space-around; margin-top: 1em">
                                        <button style="border:none; background-color: white; border-radius: 10px; color: var(--primary); padding: 0.75em 2em 0.75em 2em; cursor: pointer;">Add to Cart</button>
                                    </form>
                                @endif

                            </center>
                        </div>
                    </div>

                @endforeach
            </div>

            
        </div>

    </center>


@endsection
