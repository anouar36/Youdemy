<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\AuthEnseignant;

session_start();
$idEtud = $_SESSION['id'];
$resulte = new AuthEnseignant();

$rowsTags = $resulte->getTages();
$rowsCategories = $resulte->getCategories();
// var_dump($rowsCategories);

// exit;
if (isset($_POST['submit'])) {
    $tags = $_POST['tags'];
    if (empty($_POST['title']) || empty($_POST['url']) || empty($_POST['description']) || empty($_POST['tags']) || empty($_POST['category']));

    $title = $_POST['title'];
    $url = $_POST['url'];
    $description = $_POST['description'];
    $idtags = $_POST['tags'];
    $category = $_POST['category'];
}

// if(isset($_POST['submit'])){
// }
?>

<?php include_once __DIR__ . '../../heder_footer/header.php'; ?>
<!-- Main Layout -->
<div class="flex">
    <!-- Sidebar -->
    <aside class="bg-blue-900 shadow-md w-64 min-h-screen p-4">
        <!-- Logo -->
        <a href="/src/views/etudiant/etudiant.php">
            <div class="text-xl font-bold text-yellow-500 mb-8 flex items-center">
                <i class="fas fa-graduation-cap mr-2"></i> <!-- Icon for Logo -->
                SIMPLON
            </div>
        </a>

        <!-- Navigation Links -->
        <nav class="space-y-6">
            <!-- Accueil -->
            <div>
                <h3 class="text-lg font-semibold text-white flex items-center">
                    <i class="fas fa-home mr-2"></i> <!-- Icon for Accueil -->
                    Accueil
                </h3>
            </div>

            <!-- Promotion Section -->
            <div>
                <h3 class="text-lg font-semibold text-white flex items-center">
                    <i class="fas fa-users mr-2"></i> <!-- Icon for Promotion -->
                    Promotion
                </h3>
                <ul class="mt-2 space-y-2 pl-4">
                    <li>
                        <a href="\src\views\enseignant\addCourse.php" class="text-gray-300 hover:text-yellow-500 flex items-center">
                            <i class="fa-sharp fa-solid fa-book"></i> <!-- Icon for Dashboard -->
                            Créer un cours
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-300 hover:text-yellow-500 flex items-center">
                            <i class="fas fa-book-open mr-2"></i> <!-- Icon for Educational Scenarios -->
                            Educational Scenarios
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-300 hover:text-yellow-500 flex items-center">
                            <i class="fas fa-briefcase mr-2"></i> <!-- Icon for Promo Briefs -->
                            Promo Briefs
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-300 hover:text-yellow-500 flex items-center">
                            <i class="fas fa-folder-open mr-2"></i> <!-- Icon for Resources -->
                            Resources
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-300 hover:text-yellow-500 flex items-center">
                            <i class="fas fa-file-upload mr-2"></i> <!-- Icon for Submissions -->
                            Submissions
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Tracking Section -->
            <div>
                <h3 class="text-lg font-semibold text-white flex items-center">
                    <i class="fas fa-chart-line mr-2"></i> <!-- Icon for Tracking -->
                    Tracking
                </h3>
                <ul class="mt-2 space-y-2 pl-4">
                    <li>
                        <a href="#" class="text-gray-300 hover:text-yellow-500 flex items-center">
                            <i class="fas fa-user-cog mr-2"></i> <!-- Icon for Profile Settings -->
                            Profile Settings
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        <!-- Centered Form -->
        <div class="flex justify-center">
            <div class="bg-sky-400 p-8 rounded-lg shadow-lg w-full max-w-2xl">
                <h1 class="text-3xl font-bold text-blue-900 text-center mb-8">Add New Course</h1>
                <form action="" method="POST" class="space-y-6">
                    <!-- Course Title -->
                    <div>
                        <label for="title" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-heading text-blue-900 mr-2"></i>Course Title
                        </label>
                        <input type="text" id="title" name="title" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"
                            placeholder="Enter course title">
                    </div>

                    <!-- Course URL -->
                    <div>
                        <label for="url" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-link text-blue-900 mr-2"></i>Course URL
                        </label>
                        <input type="url" id="url" name="url" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"
                            placeholder="Enter course URL">
                    </div>

                    <!-- Course Description -->
                    <div>
                        <label for="description" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-align-left text-blue-900 mr-2"></i>Course Description
                        </label>
                        <textarea id="description" name="description" rows="4" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"
                            placeholder="Enter course description"></textarea>
                    </div>

                    <!-- Tags (Checkboxes) -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-tags text-blue-900 mr-2"></i>Tags (Select up to 3)
                        </label>
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Tag Options -->
                            <? foreach ($rowsTags as $row) { ?>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="tags[]" value="<? echo $row->getId() ?>" class="form-checkbox h-5 w-5 text-blue-600 transition-all">
                                <span class="text-gray-700"><? echo $row->getNameTage() ?></span>
                            </label>
                            <? } ?>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">You can select up to 3 tags.</p>
                    </div>

                    <!-- Category Selection -->
                    <div>
                        <label for="category" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-folder-open text-blue-900 mr-2"></i>Category
                        </label>
                        <select id="category" name="category" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                            <?
                            foreach ($rowsCategories as $row) {
                                print_r($row);
                                ?>
                            <option value="<? $row->getNameCategorie() ?>" disabled selected><? $row->getNameCategorie() ?></option>
                            <? } ?>
                            
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button name='submit' type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-plus-circle mr-2"></i>Add Course
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
<?php include_once __DIR__ . '../../heder_footer/footer.php'; ?>