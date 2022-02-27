<?php
session_start();
require_once "config/db.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PDO & Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .container {
            max-width: 550px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Data</h1>
        <hr>
        <!-- Edit Data  -->
        <form action="update.php" method="POST" enctype="multipart/form-data">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $stmt = $conn->query("SELECT * FROM users WHERE id = $id");
                $stmt->execute();
                $data = $stmt->fetch();
            }
            ?>
            <div class="mb-3">
                <input type="text" readonly class="form-control" name="id" value="<?= $data['id']; ?>">
                <label for="firstname" class="col-form-label">First Name:</label>
                <input type="text" class="form-control" name="firstname" value="<?= $data['firstname']; ?>" required>
                <input type="hidden" class="form-control" name="img2" value="<?= $data['img']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="col-form-label">Last Name:</label>
                <input type="text" class="form-control" name="lastname" value="<?= $data['lastname']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="position" class="col-form-label">Position:</label>
                <input type="text" class="form-control" name="position" value="<?= $data['position']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="img" class="col-form-label">Image:</label>
                <input type="file" class="form-control" id="imgInput" name="img">
                <img width="100%" src="uploads/<?= $data['img']; ?>" id="previewImg" alt="">
            </div>
            <div class="modal-footer">
                <a href="index.php" class="btn btn-secondary">Go Back</a>
                <button type="submit" name="update" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
            if (file) {
                previewImg.src = URL.createObjectURL(file);
            }
        }
    </script>
</body>

</html>