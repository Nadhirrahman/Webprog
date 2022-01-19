@extends('template.layout_main')

@section('content')

    <center style="margin: 2em">
        <div style="color: var(--primary); font-size: 2em; font-weight:bold">
            Add Furniture
        </div>

        <form action="/admin/add" method="POST" enctype="multipart/form-data">

            @csrf
            <table>
                <thead>
                    <th style="width: 10em"></th>
                    <th></th>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="name" id="" placeholder="Enter furniture's name" size="40"><br>
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
                            <label>Price</label>
                        </td>
                        <td>
                            <input type="text" name="price" id="" placeholder="Enter furniture's price" size="40"><br>
                        </td>
                    </tr>

                    @error('price')
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
                            <label>Type</label>
                        </td>
                        <td>
                            <select name="type" id="" style="width: 100%">
                                <option value="" disabled selected>Choose furniture's type</option>
                                <option value="table">Table</option>
                                <option value="couch">Couch</option>
                                <option value="bed">Bed</option>
                                <option value="mattress">Mattress</option>
                                <option value="chair">Chair</option>
                                <option value="bag">Bag</option>
                            </select>
                        </td>
                    </tr>

                    @error('type')
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
                            <label>Color</label>
                        </td>
                        <td>
                            <select name="color" id="" style="width: 100%">
                                <option value="" disabled selected>Choose furniture's color</option>
                                <option value="black">Black</option>
                                <option value="white">White</option>
                            </select>
                        </td>
                    </tr>

                    @error('color')
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
                            <label>Image</label>
                        </td>
                        <td>
                            <input type="file" name="image" id="" size="40" style="width: 100%">
                        </td>
                    </tr>

                    @error('image')
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
                                <button style="background-color: var(--primary); color:white; width: 12em; height:2em; border-radius:25px; border:none">Add Furniture</button>
                            </center>
                        </td>
                    </tr>

                </tbody>

            </table>
        </form>

    </center>


@endsection
