<?php
include 'admin/db_connect.php';
// var_dump($_SESSION);
$chk = $conn->query("SELECT * FROM cart where user_id = {$_SESSION['login_user_id']} ")->num_rows;
if($chk <= 0){
    echo "<script>alert('Таны сагс хоосон байна, Бараа нэмнэ үү!'); location.replace('./')</script>";
}
?>
  <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-center mb-4 page-title">
                    	<h1 class="text-white">Захиалга баталгаажуулэх</h1>
                        <hr class="divider my-4 bg-dark" />
                    </div>
                    
                </div>
            </div>
        </header>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="" id="checkout-frm">
                    <h4>Хүргэлтийн хаяг баталгаажуулах</h4>
                    <div class="form-group">
                        <label for="" class="control-label">Нэр</label>
                        <input type="text" name="first_name" required="" class="form-control" value="<?php echo $_SESSION['login_first_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Овог</label>
                        <input type="text" name="last_name" required="" class="form-control" value="<?php echo $_SESSION['login_last_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Утас</label>
                        <input type="text" name="mobile" required="" class="form-control" value="<?php echo $_SESSION['login_mobile'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Хаяг</label>
                        <textarea cols="30" rows="3" name="address" required="" class="form-control"><?php echo $_SESSION['login_address'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Email</label>
                        <input type="email" name="email" required="" class="form-control" value="<?php echo $_SESSION['login_email'] ?>">
                    </div>  

                    <div class="text-center">
                        <button class="btn btn-block btn-outline-dark">Захиалах</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){
          $('#checkout-frm').submit(function(e){
            e.preventDefault()
          
            start_load()
            $.ajax({
                url:"admin/ajax.php?action=save_order",
                method:'POST',
                data:$(this).serialize(),
                success:function(resp){
                    if(resp==1){
                        alert_toast("Захиалгыг хүлээн авлаа.")
                        setTimeout(function(){
                            location.replace('index.php?page=home')
                        },1500)
                    }
                }
            })
        })
        })
    </script>