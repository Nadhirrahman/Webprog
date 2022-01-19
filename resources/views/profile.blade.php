@extends('template.layout_main')

@section('content')

    <center style="margin: 2em">
        <div style="color: var(--primary); font-size: 2em; font-weight:bold">
            {{ Auth::user()->name }}'s Profile
        </div>

        <div style="width: 90%; margin-top: 1em; font-size:18px; ">
            <table style="border-collapse: separate; border-spacing: 0 15px">
                <thead>
                    <th style="width: 12em"></th>
                    <th style="width: 22em"></th>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            Full Name 
                        </td>

                        <td>
                            {{ Auth::user()->name }}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Email 
                        </td>

                        <td>
                            {{ Auth::user()->email }}
                        </td>
                    </tr>

                    @if (Auth::user()->role == 0)
                        <tr>
                            <td>
                                Address 
                            </td>

                            <td>
                                {{ Auth::user()->address }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Gender
                            </td>

                            <td>
                                {{ ucfirst(Auth::user()->gender) }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Role
                            </td>

                            <td>
                                Member
                            </td>
                        </tr>

                    @elseif (Auth::user()->role == 1)
                        <tr>
                            <td>
                                Role
                            </td>

                            <td>
                                Admin
                            </td>
                        </tr>
                    @endif

                    <tr>
                        <td colspan="2">
                            <div style="display: flex; align-items: center; justify-content: space-between">
                                <button style="border:none; background-color: var(--primary); color: white; border-radius: 10px; cursor: pointer; font-size:12px">
                                    <a href="/logout">Logout</a>
                                </button>

                                @if (Auth::user()->role == 0)
                                    <button style="border:none; background-color: var(--primary); color: white; border-radius: 10px; cursor: pointer; font-size:12px">
                                        <a href="/transactions">View Transaction History</a>
                                    </button>
                                @elseif (Auth::user()->role == 1)
                                    <button style="border:none; background-color: var(--primary); color: white; border-radius: 10px; cursor: pointer; font-size:12px">
                                        <a href="/transactions">View All User's Transaction</a>
                                    </button>
                                @endif

                                <button style="border:none; background-color: var(--primary); color: white; border-radius: 10px; cursor: pointer; font-size:12px">
                                    <a href="/profile/update">Update Profile</a>
                                </button>

                            </div>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>

    </center>

    
@endsection

