<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\Authadmin;

if (isset($_GET['id'])) {
    $idUsre = $_GET['id'];
    $updatUser = new Authadmin();
    $row = $updatUser->update($idUsre);
}

if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['userRole']) || empty($_POST['username'])) {
        $error = ' error ';
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $role = $_POST['userRole'];

        $updat = new Authadmin();
        $updat->updateUser($username, $email, $role, $idUsre);
    }
}

?>



<?php include_once __DIR__ . '../../heder_footer/header.php'; ?>
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Modify User Data</h2>
        <form  action="" method="post"  id="modifyForm" class="space-y-4">
            <!-- User Role Dropdown -->
            <div>
                <label for="userRole" class="block text-sm font-medium text-gray-700">User Role:</label>
                <select id="userRole"  name="userRole" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm">
                    <option  value="Administrateur" <?php echo ($row->getRole() == 'Administrateur') ? 'selected' : ''; ?>>Administrateur</option>
                    <option  value="Etudiant" <?php echo ($row->getRole() == 'Etudiant') ? 'selected' : ''; ?>>Etudiant</option>
                    <option  value="Enseignant" <?php echo ($row->getRole() == 'Enseignant') ? 'selected' : ''; ?>>Enseignant</option>
                </select>
            </div>

            <!-- Username Input -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username:</label>
                <input type="text" id="username" value="<? echo $row->getUsername() ?>" name="username" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm">
            </div>

            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" id="email"   value="<? echo $row->getEmail() ?>" name="email" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" name="submit" class="w-full bg-green-500 text-white p-2 rounded-md hover:bg-green-600">Modify Data</button>
            </div>
        </form>
    </div>
    <?php include_once __DIR__ . '../../heder_footer/footer.php' ?>
