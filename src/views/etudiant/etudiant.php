<?php
session_start();
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\Controllers\AuthEtudiants;


$idUser = $_SESSION['id'];


$resulte = new AuthEtudiants();
$rows = $resulte->showCourses();

if (isset($_GET['id'])) {
    $idCourse = $_GET['id'];
    $resulte->EnrollNow($idCourse, $idUser);
}
$currentPage=1;
$totalPages=12;

?>

<?php include_once __DIR__ . '../../heder_footer/header.php'; ?>
<div class="flex ">
    <!-- Sidebar (Left Navigation Bar) -->
    <aside class="bg-gradient-to-b from-blue-800 to-blue-900 shadow-lg w-72 min-h-screen p-6 text-white">
        <!-- Logo -->
        <a href="/src/views/etudiant/etudiant.php" class="block mb-10 text-2xl font-bold text-yellow-500">
            <i class="fas fa-graduation-cap mr-3"></i> SIMPLON
        </a>

        <!-- Navigation Links -->
        <nav class="space-y-6">
            <div>
                <h3 class="text-xl font-semibold flex items-center text-gray-900">
                    <i class="fas fa-book-open mr-3"></i> All Course
                </h3>
            </div>

            <div>
                <h3 class="text-xl font-semibold flex items-center">
                    <i class="fa-solid fa-border-all mr-3"></i> Pages
                </h3>
                <ul class="mt-3 space-y-3 pl-6">
                    <li><a href="\src\views\etudiant\Dashboard.php" class="hover:text-yellow-400 flex items-center"><i class="fas fa-tachometer-alt mr-3"></i> My Courses</a></li>
                    <li><a href="\src\views\etudiant\etudiant.php" class="hover:text-yellow-400 flex items-center"><i class="fas fa-book-open mr-3"></i> All Courses</a></li>
                    <li><a href="#" class="hover:text-yellow-400 flex items-center"><i class="fas fa-briefcase mr-3"></i>My exercice </a></li>
                    <li><a href="#" class="hover:text-yellow-400 flex items-center"><i class="fas fa-folder-open mr-3"></i>My accente</a></li>
                </ul>
            </div>

            <div>
                <a href="\src\views\auth\login.php?out=out">
                    <h3 class="hover:text-yellow-400 text-xl font-semibold flex items-center">
                        <i class="fa-solid fa-person-walking mr-3"></i> Out
                    </h3>
                </a>
                
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ">
        <!-- Professional Header -->
        <header class="bg-white shadow-md">
            <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                <!-- Logo -->
                <div class="text-2xl font-bold text-blue-900 flex items-center">
                <i class="fa-sharp fa-solid fa-door-open m-2"></i> WELCOME
                    
                </div>

                
                <!-- Search Bar and User Profile -->
                <div class="flex items-center space-x-6">
                    <!-- Search Bar -->
                    <div class="relative">
                        <input 
                            type="text" 
                            placeholder="Search courses..." 
                            class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>

                    <!-- User Profile Dropdown -->
                    <div class="relative">
                        <button class="flex items-center focus:outline-none">
                            <img src="https://via.placeholder.com/40" alt="User" class="w-10 h-10 rounded-full">
                            <i class="fas fa-chevron-down ml-2 text-gray-600"></i>
                        </button>
                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden">
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Settings</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        

        <!-- Course Grid -->
        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <?php foreach ($rows as $row): ?>
                <!-- Course Card -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col justify-between h-full transform transition-transform duration-300 hover:scale-105 hover:shadow-lg">
                    <iframe 
                        src="<?php echo ($row->getContent()); ?>" 
                        class="w-full h-80 border-none rounded-t-lg" 
                        allowfullscreen>
                    </iframe>

                    <!-- Course Details -->
                    <div class="p-6 flex flex-col flex-grow justify-between">
                        <div>
                            <span class="block text-sm text-blue-700 font-semibold mb-2"><?php echo ($row->getCategories()); ?></span>
                            <h3 class="text-xl font-bold text-gray-800 mb-3"><?php echo ($row->getTitle()); ?></h3>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <?php foreach (explode(',', $row->getTages()) as $tag): ?>
                                <span class="bg-gray-200 text-gray-700 text-sm px-3 py-1 rounded-full"><?php echo (trim($tag)); ?></span>
                                <?php endforeach; ?>
                            </div>
                            <p class="text-gray-600 mb-4"><?php echo ($row->getDescription()); ?></p>
                        </div>

                        <!-- Price and Button -->
                        <div class="flex justify-between items-center mt-auto">
                            <p class="text-lg font-bold text-blue-700">$39.00</p>
                            <a href="\src\views\etudiant\etudiant.php?id=<?php echo($row->getId()); ?>">
                                <button class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800">Enroll Now</button>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
</div>

<!-- Pagination -->
<div class="flex justify-center mt-8">
    <nav class="flex space-x-2">
        <!-- Previous Button -->
        <?php if ($currentPage > 1): ?>
            <a 
                href="?page=<?php echo $currentPage - 1; ?>" 
                class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-blue-300 rounded-lg hover:bg-blue-50 hover:text-blue-800 transition duration-300"
            >
                <i class="fas fa-chevron-left"></i> Previous
            </a>
        <?php endif; ?>

        <!-- Page Numbers -->
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a 
                href="?page=<?php echo $i; ?>" 
                class="<?php echo $i == $currentPage ? 'bg-blue-600 text-white' : 'bg-white text-blue-700'; ?> px-4 py-2 text-sm font-medium border border-blue-300 rounded-lg hover:bg-blue-50 hover:text-blue-800 transition duration-300"
            >
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>

        <!-- Next Button -->
        <?php if ($currentPage < $totalPages): ?>
            <a 
                href="?page=<?php echo $currentPage + 1; ?>" 
                class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-blue-300 rounded-lg hover:bg-blue-50 hover:text-blue-800 transition duration-300"
            >
                Next <i class="fas fa-chevron-right"></i>
            </a>
        <?php endif; ?>
    </nav>
</div>

<?php include_once __DIR__ . '../../heder_footer/footer.php'; ?>