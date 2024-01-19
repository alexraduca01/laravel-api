@extends('layouts.app')
@section('content')
    <section class="container text-white">
        <h1 class="text-center pt-3">Technologies List</h1>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="d-flex justify-content-center pt-3">
            <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary">Create new technology</a>
        </div>
        <div class="container pt-5">
            <div class="row justify-content-between">
                <div>
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Created At</th>
                                <th class="text-center">Last Update</th>
                                <th class="text-center">Settings</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($technologies as $item)
                                <tr>
                                    <td class="text-center">#{{ $item->id }}</td>
                                    <td class="text-center"><a class="text-white text-decoration-none " href="{{ route('admin.technologies.show', $item->slug) }}">{{ $item->name }}</a></td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">{{ $item->updated_at }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.technologies.edit', $item->slug) }}" class="btn btn-success"><i class="fa-solid fa-pen"></i></a>
                                        <a href="{{ route('admin.technologies.show', $item->slug) }}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                                        <form action="{{route('admin.technologies.destroy', $item->slug)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button btn btn-danger" data-item-title="{{ $item->title }}"><i class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @include('partials.modal_delete')
@endsection
