@extends('template.layout_main')

@section('content')

    <center>
        <div style="color: var(--primary); font-size:2em; font-weight:bold; margin-top: 1.5em; margin-bottom: 0.5em">Login</div>

        <form action="login" method="POST">

            @csrf
            <table>
                <thead>
                    <th style="width: 10em"></th>
                    <th></th>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="email" name="email" id="" placeholder="Enter your email" size="40"><br>
                        </td>
                    </tr>
                    
                    @error('email')
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
                            <label>Password</label>
                        </td>
                        <td>
                            <input type="password" name="pw" id="" placeholder="Enter your password" size="40"><br>
                        </td>
                    </tr>

                    @error('pw')
                        <tr>
                            <td colspan="2" style="font-weight:bold; color:red">
                                <center>
                                    {{ $message }}
                                </center>
                            </td>
                        </tr>
                    @enderror

                    <tr>
                        <td colspan="2">
                            <center style="margin-top: 1em">
                                <input type="checkbox" name="remember" id="" style="margin-right: 0.5em">Remember Me <br>
                            </center>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <center style="margin-top: 2em">
                                <button style="background-color: var(--primary); color:white; width: 12em; height:2em; border-radius:25px; border:none">Login</button>
                            </center>
                        </td>
                    </tr>
                    
                </tbody>


            </table>
        </form>

    </center>
    
@endsection
