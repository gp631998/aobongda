@extends('admin.layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('post-add-category')}}" method="post" enctype="multipart/form-data">
        <table class="table table-bordered">
            <tr>
                <th>Category name</th>
                <th><input type="text" class="form-control" name="category_name"></th>
            </tr>
            <tr>
                <th>Description</th>
                <th>
                    <textarea class="form-control" name="description"></textarea>
                </th>
            </tr>
            <tr>
                <th>Ordering</th>
                <th>
                    <input type="text" name="ordering" class="form-control">
                </th>
            </tr>
            <tr>
                <th>Publish</th>
                <th>
                    <select name="publish">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </th>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="submit" class="btn btn-primary">Cancel</button>
                    </div>
                </td>
            </tr>
        </table>
        {{csrf_field()}}
    </form>
@endsection
