<?php
//set
function set_message($msg)
{
    if(!empty($msg))
    {
        $_SESSION['MESSAGE'] = $msg;
    }
    else
    {
        $msg = "";
    }
}

//display
function display_message()
{
    if(isset($_SESSION['MESSAGE']))
    {
        echo $_SESSION['MESSAGE'];
        unset($_SESSION['MESSAGE']);    
    }
}
//error
function display_error($error)
{
    return '<div class="alert alert-danger">'.$error.'</div>';
}
//success
function display_success($success)
{
    return '<div class="alert alert-success">'.$success.'</div>';
}
//safe val
function safe_value($con,$value)
 {
    return mysqli_real_escape_string($con,$value);     
 }

//login
function login()
{
    if($_SERVER['REQUEST_METHOD'] =='POST' & isset($_POST['btn_login']))
    {
        global $con;
        $username = safe_value($con,$_POST['username']);
        $password = safe_value($con,$_POST['password']);

        $query = "select * from admin where username like '$username' and password like '$password'  or email LIKE '$username' and password LIKE '$password' ";
        $result = mysqli_query($con,$query);

        if(mysqli_fetch_assoc($result))
        {
            $_SESSION['ADMIN'] = $username;
            header("location: ./dashboard.php");
        }else{
            set_message(display_error("Incorrect username or password!"));
        }
    }
}

//cat
function display_cat(){
    global $con;
    $view = "       SELECT *
                    FROM categories
                    GROUP BY cat_name
                    ";
    return mysqli_query($con,$view);

}

//cat
function manage_cat(){
    global $con;
    $view = "select categories.cat_name,categories.brand,categories.id,brand.brand_title FROM categories JOIN  brand on brand.brand_id = categories.brand";
    return mysqli_query($con,$view);

}

//active & deactive cat
function active_status()
{
    global $con;
    if(isset($_GET['opr']) && $_GET['opr'] != "")
    {
        $operation =  safe_value($con,$_GET['opr']);
        $id = safe_value($con,$_GET['id']);

        if($operation == 'active')
        {
            $status = '1';
        }else
        {
            $status = '0';
        }
        $query = "update categories set status = '$status' where id='$id'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("location:categories.php");
        }
    }
}
//add cat
function add_category()
{
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_cat_btn']))
    {
        global $con;
        $category = safe_value($con,$_POST['category']);
        $brand = safe_value($con,$_POST['brand']);
        if(empty($category))
        {
            echo   '<script> alert("Pleas input field!"); </script>';
        }else
        {
           //cat check
           $sql = "select * from categories where cat_name = '$category' && brand = '$brand' ";
           $check = mysqli_query($con,$sql);

           if(mysqli_fetch_assoc($check))
           {
            echo   '<script> alert("Category Already Exist!"); </script>';
            //    set_message(display_error('Category already exist.'));
           }
           else
           {
            $query = "insert into categories (cat_name,brand) values ('$category','$brand')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                echo   '<script>alert("Category Successfully Added!"); location.href="categories.php";</script>';
                // header("location: categories.php");
                // set_message(display_success('Category Successfully Added!'));
                // echo "<a href='categories.php' class='btn btn-success mb-3'> View Category </a>"; 
                
            }
           }
        }
    }
  
}
//edit cat
function  edit_category()
{
    
        $id=$_GET['id'];
        global $con;
        $new_cat = safe_value($con,$_POST['category_up']);
        // $cat_name = safe_value($con,$_POST['cat_name']);
        $cat_id = safe_value($con,$_POST['cat_id']);

        "update categories set cat_name = '$new_cat' where id = '$cat_id'";
        header("location: categories.php");
        

}
//add sub cat
function add_sub()
{
   
    if($_SERVER['REQUEST_METHOD'] == 'POST' & isset($_POST['add_sub_btn']))
    {
        global $con;
        $sub_name = safe_value($con,$_POST['sub_cat']);    
        $parent_name = safe_value($con,$_POST['parent_cat']);
        
        $sql = "select * from sub_cat where sub_cat_title = '$sub_name' and cat_parent = '$parent_name'";
        $res = mysqli_query($con,$sql);

        if(mysqli_fetch_assoc($res)){
            echo '<script>alert("Sub-category already exist!")</script>';
        }else{
            
            $query = "insert into sub_cat (sub_cat_title,cat_parent) values ('$sub_name','$parent_name')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                echo '<script>alert("Sub-category successfully added!"); location.href="sub_cat.php";</script>';

            }
        }

       
    }
}
//display sub
function display_sub(){
    global $con;
    $view = "       SELECT *
                    FROM sub_cat
                    GROUP BY sub_cat_title
                    ";
    return mysqli_query($con,$view);

}
//manage sub cat
function manage_sub()
{
    global $con;
    // $sql = "select sub_cat.sub_cat_id, sub_cat.sub_cat_title,sub_cat.cat_parent, categories.cat_name, categories.id FROM categories JOIN sub_cat ON sub_cat.cat_parent = categories.id";
    $sql = "select sub_cat.sub_cat_id, sub_cat.sub_cat_title,sub_cat.cat_parent, brand.brand_title, brand.brand_id FROM brand JOIN sub_cat ON sub_cat.cat_parent = brand.brand_id;";


    return mysqli_query($con,$sql);
}

// manage brands
function manage_brands()
{
    global $con;
    $sql = "select * from brand order by brand_title asc";
    return mysqli_query($con,$sql);
}

//add brand
function add_brand()
{
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_brand_btn']))
    {
       global $con;
       $brand_name = safe_value($con,$_POST['brand']);
      

       $sql = "select * from brand where brand_title = '$brand_name' ";
       $result = mysqli_query($con, $sql);

       if(mysqli_fetch_assoc($result))
       {
        echo '<script>alert("Brand already exist!")</script>';
       }
       else
       {
           $sql = "insert into brand (brand_title) values ('$brand_name')";
           $result = mysqli_query($con,$sql);

           if($result)
           {
            echo '<script>alert("Brand successfully added!"); location.href="brands.php";</script>';
           }
       }
    }
}


//edit brand
function up_brand()
{
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['up_brand_btn']))
    {
        global $con;

        $brand_up = safe_value($con,$_POST['brand_up']);
        $brand_name = safe_value($con,$_POST['brand_name']);
        $brand_id = safe_value($con,$_POST['brand_id']);
        if($brand_up != $brand_name)
        {
            $query = "update brand set brand_title = '$brand_up' where brand_id = '$brand_id' ";
            $result = mysqli_query($con,$query);

            if($result)
            {
                set_message(display_success('Brand successfully updated'));
                echo "<a href='brands.php'> View Brand </a>"; 
            }
        }else
        {
            set_message(display_error('Brand already exist'));
        }
    }
}
// manage prod tinood
function q_product(){
    global $con;
    // $sql = "select products.p_id,products.product_name,products.description,products.category_name,products.price,products.qty,products.image,categories.cat_name, sub_cat.sub_cat_title, brand.brand_title from brand inner join sub_cat on sub_cat.sub_cat_id = brand.brand_id inner join categories on categories.id = sub_cat.sub_cat_id inner join products on categories.id = products.p_id";
    // $sql = "select products.p_id,products.product_name, products.sub_cat,products.brand ,products.description,products.category_name,products.price,products.qty,products.image,categories.cat_name, sub_cat.sub_cat_title, brand.brand_title from brand inner join sub_cat on sub_cat.sub_cat_id = brand.brand_id inner join categories on categories.id = sub_cat.sub_cat_id inner join products on categories.id = products.category_name";
    $sql = "select 
            products.p_id,products.product_name, products.sub_cat,products.brand ,products.description,products.category_name,products.price,products.qty,products.image,
            categories.cat_name, 
            sub_cat.sub_cat_title, 
            brand.brand_title 
            
            from products 
            left join sub_cat 
            on sub_cat.sub_cat_id = products.sub_cat
            left join categories 
            on categories.id = products.category_name
            LEFT join brand
            on brand.brand_id = products.brand
            GROUP BY products.p_id
         
            ";


    // $sql = "lect * from products";

    return mysqli_query($con,$sql);
}



// manage prod cat,sub,brand
function manage_products()
{
    global $con;
    $sql = "select categories.cat_name, sub_cat.sub_cat_title, brand.brand_title from brand inner join sub_cat on sub_cat.sub_cat_id = brand.brand_id inner join categories on categories.id = sub_cat.sub_cat_id";
    return mysqli_query($con,$sql);
}


// save prod
function save_products(){

    global $con;

    if(isset($_POST['add_prod_btn']))
    {
        $cat_id = safe_value($con,$_POST['cat_id']);
        $prod_name = safe_value($con,$_POST['prod_name']);
        $sub_C = safe_value($con,$_POST['sub_N']);
        $brand = safe_value($con,$_POST['brand_N']);
        $price = safe_value($con,$_POST['prod_price']);
        $qty = safe_value($con,$_POST['prod_qty']);
        $des = safe_value($con,$_POST['prod_des']);
       
        $check = "select * from products where product_name = '$prod_name'";
        $result = mysqli_query($con,$check);
        
        if(mysqli_fetch_assoc($result)>=1)
        {
            set_message(display_error('This product already exist'));
        }else
        {
            $image = $_FILES['prod_image']['name'];
            $tmp_name = $_FILES['prod_image']['tmp_name']; 
          

            $img_ext = explode('.',$image);
            $img_correct_ext = strtolower(end($img_ext));
            $allow = array('jpg','png','jpeg');
            $path = "image/".$image;
            
            if(in_array($img_correct_ext,$allow))
            {
                
                $query = "insert into products (category_name,product_name,sub_cat,brand,price,qty,image,description) values ('$cat_id','$prod_name','$sub_C','$brand','$price','$qty','$image','$des')" ;
                $result = mysqli_query($con,$query);
                
                if($result)
                {
                    move_uploaded_file($tmp_name,$path);
                    echo '<script>alert("Product successfully added!"); location.href="products.php";</script>';
                    
                    
                }else{
                    echo '<script>alert("Somethings wrong! Try again!") </script>';
                    }
                    
                    
                
            }else{
                echo '<script>alert(:You can\'t add this kind of file! Try again!") </script>';
            }
        }
      
    }

}

//add user
function add_user(){
    
    if(isset($_POST['add_user_btn'])){
        global $con;
        $f_name =safe_value($con,$_POST['u_name']);
        $u_name =safe_value($con,$_POST['u_username']);
        $u_mail =safe_value($con,$_POST['u_email']);
        $u_pass =safe_value($con,$_POST['u_password']);

        $sql = "insert into admin (fullname,username,password,email) values ('$f_name','$u_name','$u_pass','$u_mail') ";
        $res = mysqli_query($con,$sql);

        if($res){
            echo '<script>alert("User successfully added!"); location.href="admin_user.php";</script>';
        }else{
            echo '<script>alert("Somethings wrong! Try again!") </script>';
        }
}
}
//costumer login
function u_login()
{
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_Ulogin']))
    {
        // set_message(display_error("ok"));
     
        global $con;
        $user = safe_value($con,$_POST['username']);
        $pass = safe_value($con,$_POST['password']);

        $q = "select * from users where username like '$user' and password like '$pass'  or email LIKE '$user' and password LIKE '$pass' ";
        $res = mysqli_query($con,$q);

        if(mysqli_fetch_assoc($res))
        {
            $_SESSION['USER'] = $user;
            header("location: index.php");
        }else{
            set_message(display_error("Incorrect username or password!"));
        }
    }
}

// reg user
function register()
{
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_register']))
    {
        global $con;
        $fullname = safe_value($con,$_POST['fullname']);
        $username = safe_value($con,$_POST['username']);
        $email = safe_value($con,$_POST['email']);
        $address = safe_value($con,$_POST['address']);
        $number = safe_value($con,$_POST['number']);
        $password_tmp = safe_value($con,$_POST['password_tmp']);
        $password = safe_value($con,$_POST['password']);

        if($password_tmp == $password)
        {
            $sql = "select * from users where fullname = '$fullname' || email = '$email'";
            $res = mysqli_query($con,$sql);

            if(mysqli_fetch_assoc($res))
            {
                set_message(display_error('User already registered!'));
            }
            elseif(strlen((string)$number) != 11 && !is_numeric($number))
            {
                set_message(display_error('Incorrect phone number.'));
            }
            else
            {
                
                $query ="insert into users (fullname,username,email,address,mobile,password) values ('$fullname', '$username', '$email','$address', '$number', '$password')";
                $result = mysqli_query($con,$query);

                if($result)
                {
                    echo '<script>alert("Registered successfully!"); location.href="user_login.php";</script>';
                }else
                {
                    set_message(display_error('mali.'));
                }
            }

        }
        else
        {
            set_message(display_error('Password does not match!'));
            // echo '<script>alert("Password does not match!"); location.href="user_register.php";</script>';
        }
    }
}

// manage customer
function customer()
{
    global $con;
    $sql = "select * from users";
   
    return  mysqli_query($con,$sql);
}


//new query
function admin_prod()
{
    global $con;
    $sql="
 
            select products.p_id,products.product_name, products.sub_cat,products.brand ,products.description,products.category_name,products.price,products.qty,products.image,
            categories.cat_name, 
            sub_cat.sub_cat_title, 
            order_products.product_qty,
            brand.brand_title,
            sum(order_products.product_qty) as sum
            
            from products 
            left join sub_cat 
            on sub_cat.sub_cat_id = products.sub_cat
            left join categories 
            on categories.id = products.category_name
            LEFT join brand
            on brand.brand_id = products.brand
            left join order_products
            on order_products.product_id = products.p_id
        
            GROUP BY product_id
    ";

    return mysqli_query($con,$sql);
}




?>