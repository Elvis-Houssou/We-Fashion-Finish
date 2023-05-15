

@extends('admin.layouts')
@section('content crud')
    <div class="container">

        <div class="row" style="padding-top: 5rem;">
            <div class="col-lg-12 margin-tb text-end">
                <div class="pull-right">
                    <a href="{{ route('createCategory') }}"> <button class="btn btn-success">Create New Category</button></a>
                    {{-- <a class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-white-500 dark:text-gray-400 bg-dark dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150" href=" {{ route('create') }} "> Create New Products</a> --}}
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <br>

        <table class="table table-bordered">
            <tr>
                <th>id</th>
                <th>Nom</th>
                <th></th>
            </tr>
            @foreach ($categories as $category )
            <tr>

                <td> {{$category->id}} </td>
                <td> {{$category->name}}</td>
                <td class="d-flex">
                    <span class="edit">
                        <a href="{{ route('editCategory',$category->id) }}"><button class="btn btn-primary">Edit</button></a>
                    </span>
                    <form action=" {{ route('destroyCategory', $category->id) }} " method="POST">
                        {{-- <a class="btn btn-primary" href="">Edit</a> --}}

                        @csrf
                        @method('DELETE')
                        <span class="del">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Etes-vous sûre ?')">Delete</button>
                        </span>
                    </form>
                </td>

            </tr>
            @endforeach
        </table>

        {{-- <div class="w-25 p-3"> --}}
            {{-- {{ $categories->links() }} --}}
        {{-- </div> --}}
        <div class="d-flex flex-row-reverse">
            {{ $categories->links("pagination::bootstrap-5") }}
        </div>
    </div>
@endsection
