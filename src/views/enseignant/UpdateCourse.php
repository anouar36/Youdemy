<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\AuthEnseignant;

session_start();
$userid = $_SESSION['id'];

$resulte = new AuthEnseignant();

$rowsTags = $resulte->getTages();
$rowsCategories = $resulte->getCategories();



if(isset($_GET['id'])){
    $ideCours= $_GET['id'];
    $resulte=new AuthEnseignant();
     $rowCours=$resulte->GetCoursFoUpdat($ideCours);
}

if (isset($_POST['submit'])) {
    $tags = $_POST['tags'];
    if (empty($_POST['title']) || empty($_POST['url']) || empty($_POST['description']) || empty($_POST['tags']) || empty($_POST['category'])){
        return false;
    }else{
        $title = $_POST['title'];
        $url = $_POST['url'];
        $description = $_POST['description'];
        $idtags = $_POST['tags'];
        $idcategory = $_POST['category'];
        $resulte->UpdateCours($ideCours,$title, $url, $description, $userid,$idtags,$idcategory);
    }
}


?>

<?php include_once __DIR__ . '../../heder_footer/header.php'; ?>
<!-- Main Layout -->
<div class="flex">
    <!-- Sidebar -->
    <aside class="bg-gradient-to-b from-blue-800 to-blue-900 shadow-lg w-72 min-h-screen p-6 text-white">
        <!-- Logo -->
        <a href="/src/views/etudiant/etudiant.php" class="block mb-10 text-2xl font-bold text-yellow-500">
            <i class="fas fa-graduation-cap mr-3"></i> SIMPLON
        </a>

        <!-- Navigation Links -->
        <nav class="space-y-6">
            <div>
                <h3 class="text-xl font-semibold flex items-center text-gray-900">
                    <i class="fas fa-book-open mr-3"></i> My Course
                </h3>
            </div>

            <div>
                <h3 class="text-xl font-semibold flex items-center">
                    <i class="fa-solid fa-border-all mr-3"></i> Pages
                </h3>
                <ul class="mt-3 space-y-3 pl-6">
                    <li><a href="\src\views\enseignant\enseignant.php" class="hover:text-yellow-400 flex items-center"><i class="fa-solid fa-folder-plus mr-3"></i>My courses</a></li>
                    <li><a href="\src\views\enseignant\addCourse.php" class="hover:text-yellow-400 flex items-center"><i class="fas fa-book-open mr-3"></i> Add courses</a></li>
                    <li><a href="#" class="hover:text-yellow-400 flex items-center"><i class="fas fa-briefcase mr-3"></i>add exercice </a></li>
                    <li><a href="#" class="hover:text-yellow-400 flex items-center"><i class="fas fa-folder-open mr-3"></i>My accente</a></li>
                </ul>
            </div>

            <div>
                <a href="\src\views\auth\login.php">
                    <h3 class="hover:text-yellow-400 text-xl font-semibold flex items-center">
                        <i class="fa-solid fa-person-walking mr-3"></i> Out
                    </h3>
                </a>
                
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
                        <input type="text" id="title" value='<? echo $rowCours->getTitle()?>' name="title" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"
                            placeholder="Enter course title">
                    </div>

                    <!-- Course URL -->
                    <div>
                        <label for="url" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-link text-blue-900 mr-2"></i>Course URL
                        </label>
                        <input type="url" id="url"  value='<? echo $rowCours->getContent()?>' name="url" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"
                            placeholder="Enter course URL">
                    </div>

                    <!-- Course Description -->
                    <div>
                        <label for="description" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-align-left text-blue-900 mr-2"></i>Course Description
                        </label>
                        <textarea id="description" 
                            name="description"  
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"
                            placeholder="Enter course description"><?php echo htmlspecialchars($rowCours->getDescription()); ?></textarea>

                    </div>

                    <!-- Tags (Checkboxes) -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-tags text-blue-900 mr-2"></i>Tags (Select up to 3)
                        </label>
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Tag Options -->
                            <?php if (!empty($rowsTags) && is_array($rowsTags)):
                                $selectedTags= explode(',', $rowCours->getTages());
                                foreach ($rowsTags as $row): 
                                    $isChecked = in_array($row->getId() , $selectedTags) ? 'checked' : ''; 
                                    
                                ?>
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" 
                                            value="<?php echo htmlspecialchars($row->getId(), ENT_QUOTES, 'UTF-8'); ?>" 
                                            name="tags[]" 
                                            class="form-checkbox h-5 w-5 text-blue-600 transition-all"
                                            <?php echo $isChecked; ?>>
                                        <span class="text-gray-700"><?php echo htmlspecialchars($row->getNameTage(), ENT_QUOTES, 'UTF-8'); ?></span>
                                    </label>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-red-500">No tags available to select.</p>
                            <?php endif; ?>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">You can select up to 3 tags.</p>
                    </div>


                    <!-- Category Selection -->
                    <div>
                        <label for="category" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-folder-open text-blue-900 mr-2"></i>Category
                        </label>
                        <select id="category" name="category"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                            <?php foreach ($rowsCategories as $row): ?>
                                <option value="<?php echo $row->getId(); ?>" 
                                    <?php echo ($row->getId() == $rowCours->getCategories()) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($row->getNameCategorie(), ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button name='submit' type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-plus-circle mr-2"></i>Update Course
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
<?php include_once __DIR__ . '../../heder_footer/footer.php'; ?>