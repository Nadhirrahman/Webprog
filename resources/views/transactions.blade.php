@extends('template.layout_main')

@section('content')

    <center style="margin: 2em">
        <div style="color: var(--primary); font-size: 2em; font-weight:bold">
            Transaction History
        </div>

        <div style="width: 80%; margin: 2em 0em 5em 0em;">

            @foreach ($transactions as $t)
                <div style="padding: 1em 2em 1em 2em; border: 1px solid var(--primary); margin: 2em 0em 2em 0em; text-align: left">
                    <div style="font-size: 20px;font-weight:bold">
                        Transaction Id : {{ $t->id }}
                    </div>

                    <table>
                        <thead>
                            <th style="width: 12em"></th>
                            <th></th>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    Transaction Date :
                                </td>

                                <td>
                                    {{ date_format($t->created_at,"Y-m-d"); }}
                                </td>
                             
                            </tr>

                            <tr>
                                <td>
                                    Method :
                                </td>

                                <td>
                                    {{ ucfirst($t->method) }}
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    Card Number :
                                </td>

                                <td>
                                    xxx-xxxx-xxxx-{{ substr($t->card_number, 12) }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    User's Name :
                                </td>

                                <td>
                                    {{ $t->user->name }}
                                </td>
                            </tr>

                        </tbody>

                    </table>

                    <table style="border: 1px solid var(--primary); width: 100%; text-align: center">
                        <thead style="font-weight: bold;">
                            <th style="width: 12em;border: 1px solid var(--primary)">Furniture's Name</th>
                            <th style="width: 12em;border: 1px solid var(--primary)">Furniture's Price</th>
                            <th style="width: 12em;border: 1px solid var(--primary)">Quantity</th>
                            <th style="width: 16em;border: 1px solid var(--primary)">Total Price For Each Furniture</th>
                        </thead>

                        <tbody>

                            @foreach ($t->detail as $d)
                                <tr>
                                    <td style="border: 1px solid var(--primary)">
                                        {{ $d->furniture->name }}</td>
                                    <td style="border: 1px solid var(--primary)">Rp. {{ number_format($d->furniture->price, 0, ',', '.') }}</td>
                                    <td style="border: 1px solid var(--primary)">{{ $d->quantity }}</td>
                                    <td style="border: 1px solid var(--primary)">Rp. {{ number_format($d->subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach

                            <tr>
                                <td style="border: 1px solid var(--primary)" colspan="3">Total Price</td>
                                <td style="border: 1px solid var(--primary)">Rp. {{ number_format($t->total_payment, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>

                    </table>

                </div>


            @endforeach
        </div>

    </center>
    
@endsection
