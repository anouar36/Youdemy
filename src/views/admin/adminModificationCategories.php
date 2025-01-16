<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Classes\Categories;
use App\Controllers\Authadmin;

if (isset($_GET['id'])) {
    $idCategoriese = $_GET['id'];
    $updatCategories = new Authadmin();
    $row = $updatCategories->checkeCategories($idCategoriese);
}

if (isset($_POST['submit'])) {
    if (empty($_POST['nameCategoriese'])) {
        $error = ' error ';
    } else {
        $nameCategoriese = $_POST['nameCategoriese'];
        $updat = new Authadmin();
        $updat->updateCategories($idCategoriese, $nameCategoriese);
    }
}
?>
<?php include_once __DIR__ . '../../heder_footer/header.php'; ?>
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Modify User Data</h2>
        <form  action="" method="post"  id="modifyForm" class="space-y-4">
            <!-- Username Input -->
            <div>
                <label for="nameCategoriese" class="block text-sm font-medium text-gray-700">name Categories:</label>
                <input type="text" id="nameCategoriese" value="<? echo $row->getNameCategorie() ?>"name="nameCategoriese" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm">
            </div>

            <div>
                <button type="submit" name="submit" class="w-full bg-green-500 text-white p-2 rounded-md hover:bg-green-600">Modify Data</button>
            </div>
        </form>
    </div>
    <?php include_once __DIR__ . '../../heder_footer/footer.php' ?>
