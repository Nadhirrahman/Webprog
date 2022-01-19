@extends('template.layout_main')

@section('content')

    <center style="margin: 2em">
        <div style="color: var(--primary); font-size: 2em; font-weight:bold">
            Checkout
        </div>

        <div style="width: 90%; margin-top: 1em; font-weight:bold">
            <table>
                <thead>
                    <th style="width: 10em"></th>
                    <th style="width: 8em"></th>
                    <th style="width: 8em"></th>
                    <th style="width: 8em"></th>
                    <th style="width: 8em"></th>
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
                        </tr>

                    @endforeach
                </tbody>

            </table>
        </div>

        <div style="font-size: 18px">
            Total : Rp. {{ number_format($total_payment, 0, ',', '.') }}
        </div>

        <form action="/member/checkout" method="POST" style="margin: 0em 0em 5em 0em">

            @csrf
            <table style="border-collapse: separate; border-spacing: 0 15px">
                <thead>
                    <th></th>
                    <th></th>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            Payment Method
                        </td>

                        <td>
                            <center style="display: flex; justify-content: space-around">
                                <div>
                                    <input type="radio" name="payment" value="credit" id=""> Credit
                                </div>
                                <div>
                                    <input type="radio" name="payment" value="debit" id=""> Debit
                                </div>
                            </center>
                        </td>
                    </tr>

                    @error('payment')
                        <tr>
                            <td colspan="2" style="font-weight:bold; color:red">
                                <center>
                                    {{ $message }}
                                </center>
                            </td>
                        </tr>
                    @enderror

                    <tr>
                        <td>
                            Card Number
                        </td>

                        <td>
                            <input type="text" name="card_number" id="" size="40" placeholder="Enter your card number">
                        </td>
                    </tr>
                    
                    @error('card_number')
                        <tr>
                            <td colspan="2" style="font-weight:bold; color:red">
                                <center>
                                    {{ $message }}
                                </center>
                            </td>
                        </tr>
                    @enderror

                </tbody>
            </table>

            <button style="background-color: var(--primary); color:white; width: 12em; height:3em; border-radius:25px; border:none; cursor: pointer;margin-top: 1m">
                Checkout
            </button>
        </form>
    </center>
    
@endsection
