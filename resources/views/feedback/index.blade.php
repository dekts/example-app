@extends('layouts.app')

@section('title','Feedback List')

@section('after-styles')
    {{-- custom style --}}
@endsection

@section('content')

    <a href="{{ route('feedback.create') }}" class="btn btn-success btn-md float-right mb-2" type="button">Add Feedback</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col">Willing to work</th>
                <th scope="col">Languages</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($feedback->count() > 0)
                @foreach ($feedback as $lookup)
                    <tr>
                        <th scope="row">{{ $lookup->id }}</th>
                        <td>{{ $lookup->name }}</td>
                        <td>{{ $lookup->age }}</td>
                        <td>{{ $lookup->gender }}</td>
                        <td>{{ $lookup->willing_to_work }}</td>
                        <td>{{ $lookup->languages->count() ? $lookup->languages->pluck('language_id')->implode(', ') : null }}</td>
                        <td>
                            <div class="btn-toolbar" role="toolbar">
                                <div class="btn-group mr-2" role="group">
                                    <a href="{{ route('feedback.edit', $lookup) }}" class="btn btn-primary btn-sm" type="button">Edit</a>
                                </div>
                                <div class="btn-group mr-2" role="group">
                                    {{ Form::open(['method' => 'delete', 'route' => ['feedback.destroy', $lookup->id], 'onsubmit' => 'return confirm("are you sure ?")']) }}
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" >No Records Found.</td>
                </tr>
            @endif
        </tbody>
    </table>

@endsection

@section('after-scripts')
    {{-- custom scripts --}}
@endsection
