@extends('template.layout_main')

@section('content')

    <center style="margin: 2em">
        <div style="color: var(--primary); font-size: 2em; font-weight:bold">
            Update Profile
        </div>

        <div style="width: 90%; margin-top: 1em; font-size:18px; ">
            <form action="/profile/update" method="POST">
                @csrf
                <table style="border-collapse: separate; border-spacing: 0 15px">
                    <thead>
                        <th style="width: 12em"></th>
                        <th style="width: 15em"></th>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                Full Name 
                            </td>

                            <td>
                                <input type="text" name="name" id="" size="40" placeholder="Enter your name" value="{{ Auth::user()->name }}">
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
                                Email 
                            </td>

                            <td>
                                <input type="text" name="email" id="" size="40" placeholder="Enter your email" value="{{ Auth::user()->email }}">
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
                                Password 
                            </td>

                            <td>
                                <input type="password" name="pw" id="" size="40" placeholder="Enter your password">
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

                        @if (Auth::user()->role == 0)
                            <tr>
                                <td>
                                    Gender
                                </td>

                                <td>
                                    <center style="display: flex; justify-content: space-around">
                                        <div>
                                            <input type="radio" name="gender" value="male" id="" {{ (Auth::user()->gender == "male") ? 'checked' : '' }}> Male
                                        </div>
                                        <div>
                                            <input type="radio" name="gender" value="female" id="" {{ (Auth::user()->gender == "female") ? 'checked' : '' }}> Female
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
                                <td>
                                    Address
                                </td>

                                <td>
                                    <textarea name="address" id="" cols="30" rows="1" placeholder="Enter your address">{{ Auth::user()->address }}</textarea>
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

                        @endif

                        <tr>
                            <td colspan="2">
                                <center style="margin-top: 2em">
                                    <button style="background-color: var(--primary); color:white; width: 12em; height:2em; border-radius:25px; border:none">Update Profile</button>
                                </center>
                            </td>
                        </tr>

                    </tbody>

                </table>
            </form>
        </div>

    </center>

    
@endsection
