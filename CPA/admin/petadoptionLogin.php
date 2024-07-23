<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            width: 100%;
            margin-top: 15px;
        }

        .input-group-text {
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <form action="loginfunction.php" method="post">
        <div class="mb-3">
            <label for="adusername" class="form-label">Username</label>
            <input type="text" class="form-control" name="adusername" required>
        </div>
        <div class="mb-3">
            <label for="adPassword" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" name="adPassword" class="form-control" id="passwordInput" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <input type="checkbox" onclick="togglePassword()" class="form-check-input">
                        <span class="ms-1">Show Password</span>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<script>
    function togglePassword() {
        var passwordInput = document.getElementById("passwordInput");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>

</body>
</html>
