<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Hệ Thống Quản Lý Ngân Hàng Máu</title>
  </head>
  <body>
  <div class="container-fluid">
        <div class="row header">
            <div class="col-md-12">
                <img src="" alt="" class="img-fluid">
            </div>
        </div>
        <!-- Start: Navigation --> 
        <div class="row nav-menu">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Quản trị</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                            <a class="nav-link" href="#">Quản lý tài khoản</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#">Đăng xuất</a>
                            </li>
                            
                        </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End: Navigation --> 
        <!-- Start: Main --> 
        <div class="row">
            
            <div class="col-md-12 ">
                <h1>Hệ thống quản lý ngân hàng máu</h1>
                <div class="button">
                    <button type="submit" style="background-color: green"; >Thêm mới
                        
                    </button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Họ và Tên</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Tuổi</th>
                            <th scope="col">Nhóm máu</th>
                            <th scope="col">Ngày đăng ký hiến máu</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            //Lấy dữ liệu từ CSDL và đổ ra bảng (phần lặp lại)
                            //Bước 1: Kết nối tới CSDL (MySQL)
                            $conn = mysqli_connect('localhost','root','','nhm');
                            if(!$conn){
                                die("Không thể kết nối, kiểm tra lại các tham số kết nối");
                            }
                            //Bước 2: Khai báo câu lệnh thực thi và thực hiện truy vấn
                            $sql = "SELECT bd_name, bd_sex, bd_age, bd_bgroup, bd_reg_date, bd_phno FROM blood_donor";
                            $result = mysqli_query($conn,$sql);
                            //Bước 3: Xử lý kết quả trả về
                            if(mysqli_num_rows($result)>0){
                                $i=1;
                                while($row = mysqli_fetch_assoc($result)){
                            ?>        
                                    <tr>
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td><?php echo $row['bd_name']; ?></td>
                                        <td><?php echo $row['bd_sex']; ?></td>
                                        <td><?php echo $row['bd_age']; ?></td>
                                        <td><?php echo $row['bd_bgroup']; ?></td>
                                        <td><?php echo $row['bd_reg_date']; ?></td>
                                        <td><?php echo $row['bd_phno']; ?></td>
                                        <td><a href="edit.php?bg_id=<?php echo $row['bg_id']; ?>"><i class="fas fa-edit"></i></a></td>
                                        <td><a href="delete.php?bg_id=<?php echo $row['bg_id']; ?>"><i class="fas fa-trash"></i></a></td> 
                                    </tr>
                        <?php
                                $i++;
                                }
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End: Main --> 
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>