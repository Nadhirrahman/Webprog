@extends('template.layout_main')

@section('content')

    <center>
        <div style="color: var(--primary); font-size:2em; font-weight:bold; margin-top: 1.5em; margin-bottom: 0.5em">Register</div>

        <form action="register" method="POST">

            @csrf
            <table>
                <thead>
                    <th style="width: 10em"></th>
                    <th></th>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            <label>Full Name</label>
                        </td>
                        <td>
                            <input type="text" name="name" id="" placeholder="Enter your full name" size="40"><br>
                        </td>
                    </tr>

                    @error('name')
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
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" name="email" id="" placeholder="Enter your email" size="40"><br>
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
                        <td>
                            <label>Address</label>
                        </td>
                        <td>
                            <textarea name="address" id="" cols="38" rows="5" placeholder="Enter your address"></textarea>
                        </td>
                    </tr>

                    @error('address')
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
                            <label>Gender</label>
                        </td>
                        <td>
                            <center style="display: flex; justify-content: space-around">
                                <div>
                                    <input type="radio" name="gender" value="male" id="">Male
                                </div>
                                <div>
                                    <input type="radio" name="gender" value="female" id="">Female
                                </div>
                            </center>
                        </td>
                    </tr>

                    @error('gender')
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
                            <center style="margin-top: 2em">
                                <button style="background-color: var(--primary); color:white; width: 12em; height:2em; border-radius:25px; border:none">Register</button>
                            </center>
                        </td>
                    </tr>

                </tbody>
            </table>

        </form>
    </center>

@endsection
