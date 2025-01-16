<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\Authadmin;

if (isset($_GET['id'])) {
    $idTage = $_GET['id'];
    $updatTag = new Authadmin();
    $row = $updatTag->checkeTges($idTage);
}

if (isset($_POST['submit'])) {
    if (empty($_POST['nameTage'])) {
        $error = ' error ';
    } else {
        $nameTage = $_POST['nameTage'];

        $updat = new Authadmin();
        $updat->updateTag($idTage, $nameTage);
    }
}

?>



<?php include_once __DIR__ . '../../heder_footer/header.php'; ?>
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Modify User Data</h2>
        <form  action="" method="post"  id="modifyForm" class="space-y-4">
            <!-- Username Input -->
            <div>
                <label for="nameTage" class="block text-sm font-medium text-gray-700">name Tag:</label>
                <input type="text" id="nameTage" value="<? echo $row->getNameTage() ?>" name="nameTage" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm">
            </div>

            <div>
                <button type="submit" name="submit" class="w-full bg-green-500 text-white p-2 rounded-md hover:bg-green-600">Modify Data</button>
            </div>
        </form>
    </div>
    <?php include_once __DIR__ . '../../heder_footer/footer.php' ?>
