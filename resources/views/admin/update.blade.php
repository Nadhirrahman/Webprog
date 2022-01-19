@extends('template.layout_main')

@section('content')
    <center style="margin: 2em">
        <div style="color: var(--primary); font-size: 2em; font-weight:bold">
            Update Furniture
        </div>

        <form action="/admin/update" method="POST" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="furniture_id" value="{{ $furniture->id }}">
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
                            <input type="text" name="name" id="" placeholder="Enter product name" size="40" value="{{ $furniture->name }}"><br>
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
                            <input type="text" name="price" id="" placeholder="Enter product price" size="40" value="{{ $furniture->price }}"><br>
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
                                <option value="table" {{ $furniture->type == "table" ? 'selected' : '' }}>Table</option>
                                <option value="couch" {{ $furniture->type == "couch" ? 'selected' : '' }}>Couch</option>
                                <option value="bed" {{ $furniture->type == "bed" ? 'selected' : '' }}>Bed</option>
                                <option value="mattress" {{ $furniture->type == "mattress" ? 'selected' : '' }}>Mattress</option>
                                <option value="chair" {{ $furniture->type == "chair" ? 'selected' : '' }}>Chair</option>
                                <option value="bag" {{ $furniture->type == "bag" ? 'selected' : '' }}>Bag</option>
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
                                <option value="black" {{ $furniture->color == "black" ? 'selected' : '' }}>Black</option>
                                <option value="white" {{ $furniture->color == "white" ? 'selected' : '' }}>White</option>
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
                                <button style="background-color: var(--primary); color:white; width: 12em; height:2em; border-radius:25px; border:none">Update Furniture</button>
                            </center>
                        </td>
                    </tr>

                </tbody>
            </table>

        </form>

    </center>


@endsection
