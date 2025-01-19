<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\Controllers\AuthEtudiants;
session_start();
$idUser = $_SESSION['id'];



$resulte = new AuthEtudiants();
$rows = $resulte->showHestorique($idUser);


if(isset($_GET['id'])){
    $idCours = $_GET['id'];
    $deletCours= new  AuthEtudiants();
    $deletCours->deletCourse($idCours);
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
                    <i class="fas fa-home mr-3"></i> My courses
                </h3>
            </div>

            <div>
                <h3 class="text-xl font-semibold flex items-center">
                    <i class="fa-solid fa-border-all mr-2"></i> Pages
                </h3>
                <ul class="mt-3 space-y-3 pl-6">
                    <li><a href="\src\views\etudiant\Dashboard.php" class="hover:text-yellow-400 flex items-center"><i class="fas fa-tachometer-alt mr-3"></i> My Courses</a></li>
                    <li><a href="\src\views\etudiant\etudiant.php" class="hover:text-yellow-400 flex items-center"><i class="fas fa-book-open mr-3"></i> All Courses</a></li>
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
        <!-- Header -->
        <header class="bg-white shadow-md p-6 mb-8 rounded-lg">
            <h1 class="text-2xl font-bold text-gray-800">Professional Course Platform</h1>
        </header>

        <!-- Course Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
         <?php if($rows){
            foreach ($rows as $row): ?>
                <!-- Course Card -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow transform hover:scale-105 transition-transform duration-300 relative group">
                    <!-- Delete Icon (Top-Right Corner) -->
                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <a href="\src\views\etudiant\Dashboard.php?id=<?php echo ($row->getId()); ?>" class="text-red-500 hover:text-red-700 transition-colors duration-300">
                            <i class="fas fa-trash-alt"></i> <!-- Font Awesome delete icon -->
                        </a>
                    </div>

                    <!-- Course PDF -->
                    <iframe 
                        src="<?php echo ($row->getContent()); ?>" 
                        class="w-full h-64" 
                        allowfullscreen>
                    </iframe>
                    <!-- Course Details -->
                    <div class="p-4">
                        <!-- Category -->
                        <span class="text-sm text-blue-600 font-semibold"><?php echo ($row->getCategories()); ?></span>

                        <!-- Course Title -->
                        <h3 class="text-lg font-bold mt-2 text-gray-800"><?php echo ($row->getTitle()); ?></h3>

                        <!-- Tags -->
                        <div class="flex flex-wrap gap-2 mt-2 mb-4">
                            <?php foreach (explode(',', $row->getTages()) as $tag): ?>
                                <span class="bg-gray-100 text-gray-700 px-2 py-1 text-xs rounded"><?php echo (trim($tag)); ?></span>
                            <?php endforeach; ?>
                        </div>

                        <!-- Description -->
                        <p class="text-gray-600 mb-4">
                            <?php echo ($row->getDescription()); ?>
                        </p>

                        <!-- Price and Button -->
                        <div class="flex justify-between items-center">
                            <p class="text-lg font-bold text-blue-600">$39.00</p>
                            <a href="\src\views\etudiant\etudiant.php?=<?php echo ($row->getId()); ?>">
                                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors duration-300">
                                    Enroll Now
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php }else{?>
                <!-- Error State: No Courses Available -->
                <div class="flex flex-col items-center justify-center h-full p-8 bg-gray-50 rounded-lg">
                    <!-- Icon -->
                    <i class="fas fa-folder-open text-6xl text-gray-400 mb-4"></i> <!-- Folder icon for no courses -->
                    
                    <!-- Message -->
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">No Courses Available</h3>
                    <p class="text-gray-600 text-center">
                        It looks like you haven't enrolled in any courses yet. <br>
                        Explore our catalog and start learning today!
                    </p>

                    <!-- Call-to-Action Button -->
                    <a href="\src\views\etudiant\etudiant.php" class="mt-6 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-300">
                        Browse Courses
                    </a>
                </div>
                <?php }?>
                
        </div>
    </main>
</div>
<?php include_once __DIR__ . '../../heder_footer/footer.php'; ?>