@extends('layouts.master')
@section('title', 'Trang chủ')
@section('content')
    <main>
        <div class="content">
            <h1 class="title">Customer Infomation List</h1>
            <div class="button-action">
                <a href="/add" class="link-action">Add New</a>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif
            <div class="table-data">
                <table>
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customerList as $key => $customer)
                            <tr>
                                <td>{{ $customer->CCode }}</td>
                                <td>{{ $customer->CName }}</td>
                                <td>{{ $customer->CPhone }}</td>
                                <td>{{ $customer->CEmail }}</td>
                                <td class="action">
                                    <a href="{{ route('edit', ['CCode' => $customer->CCode]) }}">Modify</a> |
                                    <a onclick="return confirm('Are you sure you want to delete?')"
                                        href="{{ route('delete', ['CCode' => $customer->CCode]) }}">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center">
                                    No data
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
