<?php>
$username = $_POST['username']
$password = $_POST['password']
$email = $_POST['email']

if (empty($username)) || !empty($password) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "rolive";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_eror()) {
        die('Connect Error('. mysqli_connect_errno().')'). mysqli_connect_eror());
    } else {
        $SELECT = "SELECT email From Register Where email = ? Limit 1";
        $INSERT = "INSERT Into register (username, password, gender) values(?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($SELECT),
        $stmt->bind_param("s", $email)
        $stmt->execute();
        $stmt->bing_resi;y($email);
        $stmt -> store_result();
        $rnum = $stmt->num_rows;

        if ($rnum==0) {
            $stmt = $conn -> prepare($Insert)
            $stmt->bind_param("ssssii",$username, $password, $email);
            if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}

        
        }

    }



} else {
    Echo "All Fields are Required";
    die();
}
?>