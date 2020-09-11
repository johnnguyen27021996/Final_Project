Tải code về:
1. Clone code: "git clone https://github.com/johnnguyen27021996/Final_Project.git"
2. Tải trực tiếp
Cài đặt:
- Win: Cho project vào thư mục của xampp
- Ubuntu chỉ cần tải về
1. Tạo file ".env" từ file ".env.example", sửa kết nối DB đến DB của mình (DB trống)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Database_name
DB_USERNAME=Database_user(mặc định root)
DB_PASSWORD=Database_password(nếu có)
2. Mở terminal và chạy lần lượt các lệnh:
- composer install
- php artisan key:generate
- php artisan migrate --seed
3. Chạy lện "php artisan serve" để mở serve
truy cập vào trang web: localhot:8000
truy cập admin: localhost:8000/admin/home
Tài khoản truy cập admin xem trong DB bảng "users" mật khẩu mặc định "12345678"
