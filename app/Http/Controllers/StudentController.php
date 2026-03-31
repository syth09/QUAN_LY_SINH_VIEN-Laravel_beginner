<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        // Tìm kiếm theo tên
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sắp xếp theo tên (mặc định tăng dần)
        $sort = $request->get('sort', 'asc');
        $query->orderBy('name', $sort);

        // Phân trang (10 sinh viên/trang)
        $students = $query->paginate(10);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
        ], [
            'email.unique' => 'Email này đã tồn tại trong hệ thống!',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Thêm sinh viên thành công!');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
        ], [
            'email.unique' => 'Email này đã tồn tại!',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Cập nhật sinh viên thành công!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Xóa sinh viên thành công!');
    }
}
