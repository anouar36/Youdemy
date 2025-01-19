<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Controllers\AuthEnseignant;

session_start();
$userid = $_SESSION['id'];

$resulte = new AuthEnseignant();

$rowsTags = $resulte->getTages();
$rowsCategories = $resulte->getCategories();


// exit; 
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
       
        $resulte->pushCours($title, $url, $description, $userid, $idtags,$idcategory);

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
                    <i class="fas fa-book-open mr-3"></i> Add Course
                </h3>
            </div>

            <div>
                <h3 class="text-xl font-semibold flex items-center">
                    <i class="fa-solid fa-border-all mr-3"></i> Pages
                </h3>
                <ul class="mt-3 space-y-3 pl-6">
                    <li><a href="\src\views\enseignant\enseignant.php" class="hover:text-yellow-400 flex items-center"><i class="fa-solid fa-folder-plus mr-3"></i>My courses</a></li>
                    <li><a href="#" class="hover:text-yellow-400 flex items-center"><i class="fas fa-book-open mr-3"></i> Add courses</a></li>
                    <li><a href="#" class="hover:text-yellow-400 flex items-center"><i class="fas fa-briefcase mr-3"></i>My exercice </a></li>
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
                <h1 id='pllaseErorr' class="text-3xl font-bold text-blue-900 text-center mb-8">Add New Course</h1>
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
                        <select id="category" name="category" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                            <?
                            foreach ($rowsCategories as $row) {
                                ?>
                            <option value="<? echo $row->getId()?>" ><? echo $row->getNameCategorie() ?></option>
                            <? } ?>
                            
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button id="add" name='submit' type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-plus-circle mr-2"></i>Add Course
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>


<!-- Fixed message container (top-right corner) -->


<script>
    document.getElementById("add").addEventListener("click", messagadd);
    let palceErorr = document.getElementById("pllaseErorr");

    function messagadd() {
        let session = "<?php echo isset($_SESSION['addIssucssf']) && $_SESSION['addIssucssf'] ? 'true' : 'false'; ?>";

        if (session === "true") {
            palceErorr.innerHTML = `
                <div class="animate-slide-in bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-lg shadow-md">
                    Added successfully!
                </div>`;
        } else {
            palceErorr.innerHTML = `
                <div class="animate-slide-in bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-lg shadow-md">
                    Failed to add. Please try again.
                </div>`;
        }

        setTimeout(() => {
            palceErorr.innerHTML = '<?php unset($_SESSION['addIssucssf']); ?>';
        }, 14000);

    }
</script>

<!-- Include footer -->
<?php include_once __DIR__ . '../../heder_footer/footer.php'; ?>