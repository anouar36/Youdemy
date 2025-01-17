<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\Controllers\AuthEnseignant;

session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header('Location:\src\views\auth\login.php'); // Redirect to login if session is not set
    exit();
}

$idUser = $_SESSION['id'];

$resulte = new AuthEnseignant();
$rows = $resulte->showCoursesEn($idUser);

// Handle course enrollment
if (isset($_GET['id'])) {
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Course Platform</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
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
            <!-- Header -->
            <header class="bg-white shadow-md p-6 mb-8 rounded-lg">
                <h1 class="text-2xl font-bold text-gray-800">Professional Course Platform</h1>
            </header>

            <!-- Course Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($rows as $row): ?>
                    <!-- Course Card Container -->
                <!-- Course Card Container -->
                <div class="flex items-start gap-4 group relative">
                    <!-- Course Card -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow transform hover:scale-105 transition-transform duration-300 flex-1">
                        <!-- Course PDF -->
                        <div class="w-full h-64 overflow-hidden">
                            <iframe 
                                src="https://www.youtube.com/embed/eOZLDQm9c2E?si=DxcHPQ4KWHLwitIA" 
                                title="YouTube video player" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                referrerpolicy="strict-origin-when-cross-origin" 
                                class="w-full h-full object-cover"
                                allowfullscreen>
                            </iframe>
                        </div>

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
                                <a href="\src\views\etudiant\etudiant.php?id=<?php echo ($row->getId()); ?>">
                                    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors duration-300">
                                        Enroll Now
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Delete and Update Icons (Centered and Larger with Hover Effect) -->
                    <div class="absolute inset-0 flex items-center justify-center gap-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-50 rounded-lg">
                        <!-- Delete Icon -->
                        <a href="\src\views\enseignant\enseignant.php?id=<?php echo ($row->getId()); ?>" class="text-red-500 hover:text-red-700 text-3xl">
                            <i class="fas fa-trash"></i>
                        </a>
                        <!-- Update Icon -->
                        <a href="#" class="text-blue-500 hover:text-blue-700 text-3xl">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>

    <?php include_once __DIR__ . '../../heder_footer/footer.php'; ?>
</body>
</html>