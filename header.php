<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Posts</a></li>
        </ul>


        <div class="text-end">
        <button type="button" id="login" class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button type="button" id="sign-up" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#registerModal">Sign-up</button>
        </div>

        <form method="get">
     
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: black;">User Login</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="color: black;">
                    <form method = "post">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username"><br><br>
                        <input type="submit" class="register btn btn-primary" id="login" name="login">
</form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                    </div>
                </div>
            </div>

        </form>



            <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: black;">User Register</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="color: black;">
                        <form method="post">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name"><br><br>
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username"><br><br>
                            <label for="email">Email:</label>
                            <input type="text" id="email" name="email"><br><br>
                            <span>Address</span><br>
                            <label for="street">Street: </label>
                            <input type="text" id="street" name="street"><br><br>
                            <label for="barangay">Barangay: </label>
                            <input type="text" id="barangay" name="barangay"><br><br>
                            <label for="city">City: </label>
                            <input type="text" id="city" name="city"><br><br>
                            <input type="submit" class="register btn btn-primary" id="register" name="register">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>

            <?php
                $data = file_get_contents('../data/users.json');
                $id = json_decode($data, true);
                $end = end($id);
            ?>

            <?php
                if(isset($_POST["register"])){
                    $data = file_get_contents('../data/users.json');
                    $id = json_decode($data, true);
                    $end = end($id);
                    $new_Id = (int)$end["id"] + 1;
                    $extra = array(
                        'id' => $new_Id,
                        'name'               =>     $_POST['name'],
                        'username'          =>     $_POST["username"],
                        'email'          =>     $_POST["email"],
                        'address'     =>     array(
                            'street' => $_POST['street'],
                            'barangay' => $_POST['barangay'],
                            'city' => $_POST['city']
                   ));                 
                    $tempArray = json_decode($data);
                    array_push($tempArray, $extra);
                    $jsonData = json_encode($tempArray);
                    
                    file_put_contents('../data/users.json', $jsonData);
                }

                if(isset($_POST["login"])){
                    $data = file_get_contents('../data/users.json');
                    $decode = json_decode($data, true);

                    foreach ($decode as $item) {
                        if ($item->username == $_POST['username']) {
                            echo "<span>success!</span>";
                            print_r($item->id);
                        } else {
                            echo "<span>success!</span>";
                            print_r($item->id);
                        }
                    }
                }
            ?>

  </header>