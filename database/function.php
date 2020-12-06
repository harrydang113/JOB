<script>
          function xn_xoa_congviec(id) {
            var result = confirm("Bạn thật sự muốn xóa mẫu tin này!");
            if (result) {
              window.location.href="delete.php?id="+id;
            }else{
              window.location="index2.php";
              return false;
            }
            
          }
    </script>
    <script>
          function validateForm(id) {
            var result = confirm("Bạn muốn lưu mẫu tin này không!");
            if (result) {
              return true;
            }else{
              return false;
            }
          }
    </script>
   