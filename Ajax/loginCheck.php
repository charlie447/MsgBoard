<?php
    header("Access-Control-Allow-Origin: *");
    include_once("../model/conn.php");
    if ($_POST['username']) {
        // if the signin form have submited
        $user = $_POST['username'];
        $pwd = $_POST['password'];

        if ($user == "" || $pwd =="") {
            # if missing value
            echo "Error: no valuable input.";
        }else {
            #
            // query user from db
            $sql = "SELECT * FROM T_USER_LOGIN WHERE username='$user' AND password='$pwd' limit 1";
            $result = $conn->query($sql);
            if ($result->num_rows>0) {
                while($row = $result->fetch_assoc()) {
                    $data = array(
                        'uuid' => $row["uuid"],
                        'username' => $row["username"],
                        'password' => $row["password"],
                        'ip_reg' => $row["ip_reg"],
                        'time_reg' => $row["time_reg"],
                        'permission' => $row["permission"],
                        'ok' => 1
                    );
                    //  当验证通过后，启动 Session
                    session_start();
                    $_SESSION["user"] = $data;
                    echo json_encode($data);
                }
            }else {
                $data = array(
                    'ok' => 0
                );
                echo json_encode($data);
            }


        }
    }else {
        echo "error: no data from form";
    }
?>
