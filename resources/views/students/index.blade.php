@extends('layouts.app')

@section('content')
<div class="header-title mb-4 bg-primary text-white p-4 rounded-3 shadow-sm mb-4">
    <h1 class="mb-0 fs-3 fw-bold">Quản lý Sinh viên</h1>
</div>

<a href="{{ route('students.create') }}" class="btn btn-primary mb-3">+ Thêm sinh viên mới</a>

<!-- Form tìm kiếm và sắp xếp -->
<form method="GET" class="mb-4">
    <div class="row">
        <div class="col-md-6">
            <input type="text" name="search" class="form-control"
                   placeholder="Tìm kiếm theo tên..."
                   value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <select name="sort" class="form-select">
                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Tên A → Z</option>
                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Tên Z → A</option>
            </select>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-success w-36">Filter</button>
        </div>
    </div>
</form>

<table class="table table-bordered table-hover shadow-sm">
    <thead class="table-dark">
        <tr>
            <th class="bg-primary text-white">ID</th>
            <th class="bg-primary text-white">Họ và tên</th>
            <th class="bg-primary text-white">Ngành học</th>
            <th class="bg-primary text-white">Email</th>
            <th class="bg-primary text-white">Ngày tạo</th>
            <th class="bg-primary text-white">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->major }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->created_at->format('d/m/Y H:i') }}</td>
            <td>
                <form action="{{ route('students.destroy', $student) }}" method="POST"
                      onsubmit="return confirm('Bạn có chắc muốn xóa sinh viên này?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Không có sinh viên nào.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $students->appends(request()->query())->links() }}
@endsection
