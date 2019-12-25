@extends('admin.layouts.app')
@section('content')
    <div class="view-edit-category">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('post-sua-danh-muc',$category->id)}}" method="post"  enctype="multipart/form-data">
            <table class="table  table-bordered">
                <tr>
                    <th>Category name</th>
                    <td><input type="text" class="form-control" value="{{$category->category_name}}" name="category_name"></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input type="text" class="form-control" value="{{$category->description}}" name="description"></td>
                </tr>
                <tr>
                    <th>Ordering</th>
                    <td><input type="text" class="form-control" value="{{$category->ordering}}" name="ordering"></td>
                </tr>
            </table>
            {{csrf_field()}}
        </form>
    </div>
@endsection
