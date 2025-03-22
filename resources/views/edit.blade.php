@extends('layouts.master')
@section('title', 'Cập nhật dữ liệu')
@section('content')
    <main>
        <div class="content">
            <div class="form dfcenter">
                <form action="/update" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="country">Code:</label>
                        <input type="text" name="CCode" id="" placeholder="Enter Code"
                            class="@error('CCode') is-invalid @enderror"
                            value="{{ old('CCode') ?? $detailCustomer->CCode }}" />
                        @error('CCode')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="country">Name:</label>
                        <input type="text" name="CName" id="" placeholder="Enter Name"
                            class="@error('CName') is-invalid @enderror"
                            value="{{ old('CName') ?? $detailCustomer->CName }}" />
                        @error('CName')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="country">Phone:</label>
                        <input type="text" name="CPhone" id="" placeholder="Enter Phone Number"
                            class="@error('CPhone') is-invalid @enderror"
                            value="{{ old('CPhone') ?? $detailCustomer->CPhone }}" />
                        @error('CPhone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="country">Email:</label>
                        <input type="email" name="CEmail" id="" placeholder="Enter Email Address"
                            class="@error('CEmail') is-invalid @enderror"
                            value="{{ old('CEmail') ?? $detailCustomer->CEmail }}" />
                        @error('CEmail')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="country"></label>
                        <button class="btn">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </main>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tìm ô input đầu tiên có class 'is-invalid'
            const firstInvalidInput = document.querySelector('.is-invalid');

            // Nếu tồn tại ô lỗi, focus vào nó
            if (firstInvalidInput) {
                firstInvalidInput.focus();
            }
        });
    </script>
@endsection
