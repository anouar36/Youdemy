<?php
session_start();
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\Controllers\AuthEnseignant;


// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header('Location:\src\views\auth\login.php'); 
    exit();
}

 
$resulte = new AuthEnseignant();
$rows = $resulte->showCoursesEn();



if (isset($_POST['delet'])){
    $getIdCours=$_POST['id'];
    $SoftDelet= new AuthEnseignant();
    $SoftDelet->DeletCours($getIdCours); 
}
if (isset($_POST['updat'])){
    $getIdCours=$_POST['id'];
    $SoftDelet= new AuthEnseignant($getIdCours);
    $SoftDelet->UpdateCours($getIdCours);   
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
                    <li><a href="#" class="hover:text-yellow-400 flex items-center"><i class="fa-solid fa-folder-plus mr-3"></i>My courses</a></li>
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
            <!-- Header -->
            <header class="bg-white shadow-md p-6 mb-8 rounded-lg">
                <h1 class="text-2xl font-bold text-gray-800">Professional Course Platform</h1>
            </header>

            <!-- Course Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <?php if($rows){
                 foreach ($rows as $row): ?>
                    <!-- Course Card Container -->
                <!-- Course Card Container -->
                <div class="flex items-start gap-4 group relative">
                    <!-- Course Card -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow transform hover:scale-105 transition-transform duration-300 flex-1">
                        <!-- Course PDF -->
                        <div class="w-full h-64 overflow-hidden">
                            <iframe 
                                src="<?php echo ($row->getContent()); ?>" 
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
                                <!-- <a href="\src\views\etudiant\etudiant.php?id=<?php echo ($row->getId()); ?>"> -->
                                    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors duration-300">
                                        Enroll Now
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Delete and Update Icons (Centered and Larger with Hover Effect) -->
                    <div class="absolute inset-0 flex items-center justify-center gap-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-50 rounded-lg">
                        <!-- Delete Form -->
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo ($row->getId()); ?>">
                            <button type="submit" name="delet" value="delete" class="text-red-500 hover:text-red-700 text-3xl">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        <!-- Update Form -->
                        <a href="\src\views\enseignant\UpdateCourse.php?id=<?php echo ($row->getId()); ?>">
                        <input type="hidden" name="id" value="">
                            <button type="submit" name="update" value="update" class="text-blue-500 hover:text-blue-700 text-3xl">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php }else{?>
                <!-- Error State: No Courses Created -->
                    <div class="flex flex-col items-center justify-center h-full p-8 bg-gray-50 rounded-lg">
                        <!-- Icon -->
                        <i class="fas fa-chalkboard-teacher text-6xl text-gray-400 mb-4"></i> <!-- Teacher icon for no courses -->

                        <!-- Message -->
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">No Courses Created</h3>
                        <p class="text-gray-600 text-center">
                            It looks like you haven't created any courses yet. <br>
                            Start creating your first course and share your knowledge with students!
                        </p>

                        <!-- Call-to-Action Button -->
                        <a href="\src\views\enseignant\addCourse.php" class="mt-6 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-300">
                            Create a Course
                        </a>
                    </div>
                    <?php }?>
                
            </div>
        </main>
    </div>

    <?php include_once __DIR__ . '../../heder_footer/footer.php'; ?>
</body>
</html>