# Hướng dẫn sử dụng Project trong môi trường local XAMPP

## 1.Cài đặt XAMPP và download Project

### Tải và cài đặt XAMPP theo hướng dẫn trên google.

### Đổi Port

Sau đó sửa port của Apache thành 8888 nhằm tránh trùng port với Skype

Vào tệp bằng cách.

<img src="Images/changePort.png?raw=true" />

Sau đó đổi dòng `Listen 80` thành `Listen 8888` như hình sau.

<img src="Images/changePort1.png?raw=true" />

### Dowload Project

Trong thư mục `xampp\htdocs\`
Mở git bash và chạy lệnh sau

```
git clone https://github.com/l0ngse3/huongdichvu.git
```


## 2.Chạy project như thế nào?

Thông tin về tên database, tên miền được cấu hình trong thư mục 

```
\xampp\htdocs\huongdichvu\config.php
```

<img src="Images/config.png?raw=true" />

### Cấu hình máy chủ ảo

Tên máy chủ ảo phải trùng với tên của `define('PATH','http://huongdichvu.com:8888/');`

Trong XAMPP vào tệp tin sau: `xampp\apache\conf\extra\httpd-vhosts.conf`

Sau đó thêm các dòng sau vào cuối file:

```
<VirtualHost *:8888>
    DocumentRoot "Your link to project"
    ServerName huongdichvu.com
</VirtualHost>
```

Đổi dòng phần `"Your link to project"` thành đường dẫn tới project ví dụ như của mình là `"E:\xampp\htdocs\huongdichvu"`

Lưu lại tệp sau đó khởi động lại XAMPP/Apache và XAMPP/MySQL

### Import database

Truy cập đến trang quản lý [PhpAdmin ](http://localhost:8888/phpmyadmin)

Tạo lại database trong đó với tên giống trong thư mục `\xampp\htdocs\huongdichvu\config.php` như hình dưới đây

<img src="Images/config.png?raw=true" />

Đặt tên giống với giá trị biến `$database` trong hình

<img src="Images/createDB.png?raw=true" />

Tiếp đó vào phần chọn database có tên vừa tạo và Import file `huongdichvu.sql` trong thư mục của project.

Cùng xem [kết quả] (http://huongdichvu.com:8888)
Link project: http://huongdichvu.com:8888