# Quản Lý Sinh Viên - Laravel

## Giới thiệu

Đây là dự án **Quản lý Sinh viên** được xây dựng bằng **Laravel Framework**, thực hiện theo mô hình **MVC** (Model - View - Controller).  
Dự án đáp ứng đầy đủ các yêu cầu của bài tập: thêm, hiển thị, tìm kiếm, sắp xếp, phân trang và quản lý thông tin sinh viên.

## Yêu cầu chức năng

- Thêm sinh viên (Tên, Ngành học, Email)
- Hiển thị danh sách sinh viên
- Tìm kiếm sinh viên theo tên
- Sắp xếp sinh viên theo tên (A → Z và Z → A)
- Phân trang (Pagination)
- Validation dữ liệu (Email không được trùng)
- Xóa sinh viên
- Xem và chỉnh sửa thông tin sinh viên

## Công nghệ sử dụng

- **Laravel** (phiên bản mới nhất)
- **PHP** 8.2+
- **MySQL** (Database)
- **Blade Template Engine**
- **Bootstrap 5** (Giao diện)
- **Eloquent ORM**
- **Laravel Form Request** (Validation tách lớp)

## Cấu trúc dự án (MVC + Tách lớp)

- **Route** → `routes/web.php`
- **Controller** → `app/Http/Controllers/StudentController.php` (Controller mỏng)
- **Model** → `app/Models/Student.php`
- **Validation** → `app/Http/Requests/StoreStudentRequest.php` & `UpdateStudentRequest.php`
- **Views** → `resources/views/students/`
- **Migration** → `database/migrations/..._create_students_table.php`

## Hướng dẫn cài đặt và chạy

### 1. Clone dự án

```bash
git clone <link-repo-cua-ban>
cd quanlysinhvien
```

### 2. Cài đặt dependencies

```bash
composer install
```

### 3. Copy file môi trường

```bash
cp .env.example .env
```

### 4. Cấu hình Database

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student_db
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Tạo Database trên

Tạo database tên student_db trong MySQL.

### 6. Chạy Migration

```bash
php artisan migrate
```

### 7. Chạy dự án

```bash
php artisan serve
```
