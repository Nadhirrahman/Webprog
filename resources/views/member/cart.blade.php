@extends('template.layout_main')

@section('content')

    <center style="margin: 2em">
        <div style="color: var(--primary); font-size: 2em; font-weight:bold">
            Cart
        </div>

        <div style="width: 90%; margin-top: 1em; font-weight:bold">
            <table>
                <thead>
                    <th style="width: 10em"></th>
                    <th style="width: 8em"></th>
                    <th style="width: 8em"></th>
                    <th style="width: 8em"></th>
                    <th style="width: 8em"></th>
                    <th style="width: 5em"></th>
                </thead>

                <tbody>
                    @foreach ($cart as $c)

                        <tr>
                            <td>
                                <a href="/detail/{{ $c['furniture']->id }}" style="height: 10em">
                                    <img src="{{ asset('storage/image/' . $c['furniture']->image) }}" alt="" width="150px" height="100%">
                                </a>
                            </td>

                            <td>
                                {{ $c['furniture']->name }}
                            </td>

                            <td>
                                Rp. {{ number_format($c['furniture']->price, 0, ',', '.') }}
                            </td>

                            <td>
                                {{ $c['qty'] }} item(s)
                            </td>

                            <td>
                                Rp. {{ number_format(($c['furniture']->price * $c['qty']), 0, ',', '.') }}
                            </td>

                            <td>
                                <form style="display: flex" action="/member/cart/change" method="POST">
                                    @csrf
                                    <input type="hidden" name="furniture_id" value="{{ $c['furniture']->id }}">
                                    <button style="background-color: var(--primary); color:white; width: 5em; height:2em; border-radius:15px; border:none;margin: 0em 0.5em 0em 0.5em; cursor: pointer;" name="action" value="-1">-</button>
                                    <button style="background-color: var(--primary); color:white; width: 5em; height:2em; border-radius:15px; border:none;margin: 0em 0.5em 0em 0.5em; cursor: pointer;" name="action" value="1">+</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </tbody>

            </table>
        </div>

        <div style="font-size: 18px">
            Total : Rp. {{ number_format($total_payment, 0, ',', '.') }}
        </div>

        <div style="margin: 2em 0em 5em 0em">
            <button style="background-color: var(--primary); color:white; border-radius:15px; border:none; cursor: pointer;">
                <a href="/member/checkout">Proceed To Checkout</a>
            </button>
        </div>
        
    </center>


@endsection
