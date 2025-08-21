<?php
session_start();
function h($s)
{
    return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8');
}

$errors = [];
$data = ["first_name" => "", "last_name" => "", "email" => "", "invoice" => "", "payfor" => [], "info" => ""];
$file = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data["first_name"] = trim($_POST["first_name"] ?? "");
    $data["last_name"]  = trim($_POST["last_name"] ?? "");
    $data["email"]      = trim($_POST["email"] ?? "");
    $data["invoice"]    = trim($_POST["invoice"] ?? "");
    $data["payfor"]     = $_POST["payfor"] ?? [];
    $data["info"]       = trim($_POST["info"] ?? "");

    if ($data["first_name"] === "") $errors["first_name"] = "Required";
    if ($data["last_name"] === "")  $errors["last_name"] = "Required";
    if ($data["email"] === "" || !filter_var($data["email"], FILTER_VALIDATE_EMAIL)) $errors["email"] = "Invalid email";
    if ($data["invoice"] === "") $errors["invoice"] = "Required";

    if (isset($_FILES["receipt"]) && $_FILES["receipt"]["error"] == UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES["receipt"]["name"], PATHINFO_EXTENSION);
        if (!is_dir("uploads")) mkdir("uploads");
        $newName = "receipt_" . time() . "." . $ext;
        move_uploaded_file($_FILES["receipt"]["tmp_name"], "uploads/$newName");
        $file = "uploads/$newName";
    }

    if (empty($errors)) {
        $_SESSION["form_data"] = $data;
        $_SESSION["receipt"]   = $file;

        // Cookie lưu 1 ngày
        setcookie("fullname", $data["first_name"] . " " . $data["last_name"], time() + 86400, "/");
        setcookie("email", $data["email"], time() + 86400, "/");
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payment Receipt Upload Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff;
            display: flex;
            justify-content: center;
        }

        .container {
            width: 700px;
            border: 1px solid #ddd;
            padding: 25px;
            margin-top: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #666;
        }

        .row {
            display: flex;
            gap: 15px;
        }

        .field {
            flex: 1;
            margin-bottom: 15px;
        }

        .fielddown {
            flex: 1;
            margin-bottom: 15px;
            margin-top: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        small.hint {
            display: block;
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }

        input[type=text],
        input[type=email],
        textarea {
            width: 80%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea::placeholder {
            color: #888;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .checkbox-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
            margin-bottom: 15px;
        }

        .checkbox-grid label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: normal;
        }

        .error {
            color: red;
            font-size: 12px;
        }

        /* File upload box */
        .upload-box {
            border: 2px dashed #ccc;
            padding: 30px;
            text-align: center;
            border-radius: 6px;
            margin-bottom: 5px;
            color: #666;
        }

        .upload-box input[type=file] {
            display: none;
        }

        .upload-box span {
            display: block;
            margin-top: 5px;
            font-size: 13px;
            color: #888;
        }

        .infotext {
            width: 98%;
            height: 100px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        /* Button */
        button {
            padding: 10px 20px;
            background: linear-gradient(#555, #000);
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }

        .textupload {
            font-size: 13px;
            color: #888;
            text-align: left;
            margin-top: 1px;
            margin-bottom: 50px;
        }

        .show-session-link {
            text-align: center;
            margin-top: 20px;
        }

        .show-session-link a {
            display: inline-block;
            padding: 10px 18px;
            font-weight: bold;
            border: none;
            border-radius: 999px;
            cursor: pointer;
            color: #fff;
            background: #6b21a8;
            text-decoration: none;
            transition: 0.25s;
        }

        .show-session-link a:hover {
            background: #9333ea;
        }
        
    </style>
</head>

<body>
    <div class="container">
        <h2>Payment Receipt Upload Form</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="field">
                    <label>Name</label>
                    <input type="text" name="first_name" value="<?= h($data['first_name']) ?>">
                    <div class="error"><?= $errors["first_name"] ?? "" ?></div>
                    <small class="hint">First Name</small>
                </div>
                <div class="fielddown">
                    <label></label>
                    <input type="text" name="last_name" value="<?= h($data['last_name']) ?>">
                    <div class="error"><?= $errors["last_name"] ?? "" ?></div>
                    <small class="hint">Last Name</small>
                </div>
            </div>
            <div class="row">
                <div class="field">
                    <label>Email</label>
                    <input type="email" name="email" value="<?= h($data['email']) ?>">
                    <div class="error"><?= $errors["email"] ?? "" ?></div>
                </div>
                <div class="field">
                    <label>Invoice ID</label>
                    <input type="text" name="invoice" value="<?= h($data['invoice']) ?>">
                    <div class="error"><?= $errors["invoice"] ?? "" ?></div>
                </div>
            </div>

            <label>Pay For</label>
            <div class="checkbox-grid">
                <?php
                $options = [
                    "15K Category",
                    "35K Category",
                    "55K Category",
                    "75K Category",
                    "116K Category",
                    "Shuttle One Way",
                    "Shuttle Two Ways",
                    "Training Cap Merchandise",
                    "Compressport T-Shirt Merchandise",
                    "Buf Merchandise",
                    "Other"
                ];
                foreach ($options as $opt): ?>
                    <label><input type="checkbox" name="payfor[]" value="<?= $opt ?>"
                            <?= in_array($opt, $data["payfor"]) ? "checked" : "" ?>> <?= $opt ?></label>
                <?php endforeach; ?>
            </div>

            <label>Please upload your payment receipt.</label>
            <div class="upload-box">
                <input type="file" id="receipt" name="receipt" accept="image/*">
                <label for="receipt" style="cursor:pointer;">
                    <div><img src="cloud-computing.png" alt="upload icon"></div>
                    <strong>Browse Files</strong><br>Drag and drop files here
                </label>
            </div>
            <div class="textupload">jpg, jpeg, png, gif (1mb max.)</div>

            <label>Additional Information</label>
            <textarea class="infotext" name="info" placeholder="Type here..."><?= h($data['info']) ?></textarea>

            <button type="submit">Submit</button>
        </form>
        <?php
        // Nút quay lại trang tuần tương ứng
        echo '<p><a href="week2.php" style="
            display:inline-block;
            padding:8px 12px;
            background:#6a5acd;
            color:white;
            text-decoration:none;
            border-radius:6px;
            font-family:Arial, sans-serif;
            ">⬅ Quay về Tuần 2</a></p>';
        ?>
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)): ?>
            <h3>Submitted Data:</h3>
            <p>Name: <?= h($data["first_name"] . " " . $data["last_name"]) ?></p>
            <p>Email: <?= h($data["email"]) ?></p>
            <p>Invoice ID: <?= h($data["invoice"]) ?></p>
            <p>Pay For: <?= implode(", ", $data["payfor"]) ?></p>
            <p>Additional Info: <?= nl2br(h($data["info"])) ?></p>
            <p>File:</p>
            <?php if ($file): ?><p><img src="<?= $file ?>" width="200"></p><?php endif; ?>
            <div class="show-session-link">
                <p><a href="show_session.php">Xem dữ liệu Session/Cookie</a></p>
            </div>
        <?php endif; ?>
    </div>
    
</body>

</html>