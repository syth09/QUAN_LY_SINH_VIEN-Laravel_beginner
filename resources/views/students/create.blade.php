@extends('layouts.app')

@section('content')
<div class="header-title mb-4 bg-primary text-white p-4 rounded-3 shadow-sm mb-4">
    <h1 class="mb-0 fs-3 fw-bold">Thêm Sinh viên mới</h1>
</div>

<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Họ và tên</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name') }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Ngành học</label>
        <input type="text" name="major" class="form-control @error('major') is-invalid @enderror"
               value="{{ old('major') }}" required>
        @error('major')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email') }}" required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Lưu sinh viên</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Hủy</a>
</form>
@endsection
