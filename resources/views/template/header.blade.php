<style>
    li{
        float:left;
    }

    a{
        display: block;
        padding: 1em 3em 1em 3em;
        color: white;
        text-decoration: none;
        font-weight: bold;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
    }
</style>

<div style="background-color: #a748aa; display:flex; align-items:center; justify-content:space-between">
    <img src="{{ asset('storage/image/logo.png') }}" alt="" width="100px" height="100%">

    <ul style="list-style-type: none; margin: 0; padding: 0; color: white;">
        @if (Auth::user())
            @if (Auth::user()->role == 0)
                <li>
                    <a href="/">Home</a>
                </li>

                <li>
                    <a href="/view">View</a>
                </li>

                <li>
                    <a href="/profile">Profile</a>
                </li>

                <li>
                    <a href="/member/cart">Cart</a>
                </li>

            @else
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/view">View</a>
                </li>
                <li>
                    <a href="/profile">Profile</a>
                </li>
                <li>
                    <a href="/admin/add">Add Furniture</a>
                </li>

            @endif

        @else
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="/view">View</a>
            </li>
            <li>
                <a href="/login">Login</a>
            </li>
            <li>
                <a href="/register">Register</a>
            </li>
        @endif

    </ul>

</div>
