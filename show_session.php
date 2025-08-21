<?php
session_start();
function h($s)
{
    return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8');
}

$data = $_SESSION["form_data"] ?? null;
$img  = $_SESSION["receipt"] ?? "";
$cookie_fullname = $_COOKIE["fullname"] ?? "";
$cookie_email    = $_COOKIE["email"] ?? "";
?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Bài 2 - Xem dữ liệu từ Session & Cookie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            font-weight: bold;
            border: none;
            border-radius: 999px;
            cursor: pointer;
            color: #fff;
            transition: 0.25s;
        }

        .btn.back {
            background: #6b21a8;
        }

        .btn.back:hover {
            background: #9333ea;
        }

        .btn.wipe {
            background: #dc2626;
        }

        .btn.wipe:hover {
            background: #ef4444;
        }

        .container {
            width: 700px;
            margin: 0 auto;
        }

        .card {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
        }

        .actions {
            margin-top: 16px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            border-radius: 10px;
        }

        .header {
            font-size: 20px;
            text-align: center;
            margin-bottom: 20px;
            padding: 5px;
            color: #7c4dff;
        }

        img {
            max-width: 200px;
            border: 1px solid #ccc;
        }

        button {
            padding: 8px 16px;
            margin-right: 10px;
            margin-top: 10px;
            background: #7c4dff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Dữ liệu từ Session & Cookie</h2>
        </div>
        <div class="card">
            <?php if (!$data): ?>
                <p>Chưa có dữ liệu trong session. Hãy quay lại <a href="payment_form.php">payment_form.php</a> nhập trước.</p>
            <?php else: ?>
                <p><strong>Name:</strong> <?= h($data["first_name"] . " " . $data["last_name"]) ?></p>
                <p><strong>Email:</strong> <?= h($data["email"]) ?></p>
                <p><strong>Invoice:</strong> <?= h($data["invoice"]) ?></p>
                <p><strong>Pay For:</strong> <?= implode(", ", $data["payfor"]) ?></p>
                <p><strong>Additional Info:</strong><br><?= nl2br(h($data["info"])) ?></p>
                <?php if ($img): ?><p><img src="<?= $img ?>"></p><?php endif; ?>
            <?php endif; ?>
        </div>

        <div class="card">
            <p><strong>Cookie lưu 1 ngày:</strong></p>
            <p>Fullname: <?= h($cookie_fullname) ?></p>
            <p>Email: <?= h($cookie_email) ?></p>
        </div>

        <div class="actions">
            <form action="form.php" method="post">
                <button type="submit" class="btn back">Quay về trang nhập form</button>
            </form>
            <form action="wipe.php" method="post">
                <button type="submit" class="btn wipe">Xoá Session & Cookie</button>
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
        </div>
    </div>

</body>

</html>