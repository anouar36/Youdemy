<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\Controllers\AuthEtudiants;
$resulte = new AuthEtudiants();
$rows = $resulte->showCourses();

if(isset($_GET['id'])){
    $idCourse = $_GET['id'];
    new,
}  
?>


<?php include_once __DIR__ . '../../heder_footer/header.php'; ?>
    <!-- Main Layout -->
    <div class="flex">
        <!-- Sidebar -->
        <aside class="bg-white shadow-md w-64 min-h-screen p-4">
            <!-- Logo -->
            <div class="text-xl font-bold text-blue-600 mb-8">SIMPLON</div>

            <!-- Navigation Links -->
            <nav class="space-y-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Accueil</h3>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Promotion</h3>
                    <ul class="mt-2 space-y-2 pl-4">
                        <li><a href="#" class="text-gray-700 hover:text-blue-600">Dashboard</a></li>
                        <li><a href="#" class="text-gray-700 hover:text-blue-600">Educational Scenarios</a></li>
                        <li><a href="#" class="text-gray-700 hover:text-blue-600">Promo Briefs</a></li>
                        <li><a href="#" class="text-gray-700 hover:text-blue-600">Resources</a></li>
                        <li><a href="#" class="text-gray-700 hover:text-blue-600">Submissions</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Tracking</h3>
                    <ul class="mt-2 space-y-2 pl-4">
                        <li><a href="#" class="text-gray-700 hover:text-blue-600">Profile Settings</a></li>
                    </ul>
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
                <?php foreach($rows as $row): ?>
                <!-- Course Card -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow transform hover:scale-105 transition-transform duration-300">
                    <iframe 
                        src="https://api.baytalhikma2.org/api/v1/storages/66a7d5984d15f.pdf" 
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
                            <?php foreach(explode(',', $row->getTages()) as $tag): ?>
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
                            <a href="\src\views\etudiant\etudiant.php?=<?php echo ($row->getId());?>">
                                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors duration-300">
                                    Enroll Now
                                </button>
                            </a>
                            
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
<?php include_once __DIR__ . '../../heder_footer/footer.php' ?>

