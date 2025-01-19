<?php
require_once __DIR__ ."/../../../vendor/autoload.php";
use App\Controllers\Authadmin;

if (isset($_POST['ajoute'])) {
    if (empty($_POST['nameTag']) ) {
        $error = ' error ';
    } else {
            $nameTag = $_POST['nameTag'];
            $addtag = new Authadmin();
            $addtag->addTag($nameTag);
    }
}

if (isset($_GET['id'])) {
    if (empty($_GET['id']) ) {
        $error = ' error ';
    } else {
            $idDelet = $_GET['id'];
            $deletTage = new Authadmin();
            $deletTage->deletTag($idDelet);
    }
}


?>
<?php include_once __DIR__ . '../../heder_footer/header.php'; ?>
    <div class="flex relative" x-data="{navOpen: false}">
        <!-- NAV -->
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
                        <li><a href="\src\views\admin\administrateur.php" class="hover:text-yellow-400 flex items-center"><i class="fa-solid fa-folder-plus mr-3"></i>Users</a></li>
                        <li><a href="\src\views\admin\adminTage.php" class="hover:text-yellow-400 flex items-center"><i class="fas fa-book-open mr-3"></i>Tags</a></li>
                        <li><a href="\src\views\admin\adminCategories.php" class="hover:text-yellow-400 flex items-center"><i class="fas fa-briefcase mr-3"></i>Categorise </a></li>
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

        <!-- PAGE CONTENT -->
        <main class="flex-1 h-screen overflow-y-scroll overflow-x-hidden">
            <div class="md:hidden justify-between items-center bg-black text-white flex">
                <h1 class="text-2xl font-bold px-4">Better Code</h1>
                <button @click="navOpen = !navOpen" class="btn p-4 focus:outline-none hover:bg-gray-800">
                    <svg class="w-6 h-6 fill-current" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>
            <section class="max-w-7xl mx-auto py-4 px-5">
                <div class="flex justify-between items-center border-b border-gray-300">
                    <h1 class="text-2xl font-semibold pt-2 pb-6">Tages</h1>
                </div>
                <form action="" method="post">
                    <div>
                        <div>
                            <label for="nameTag" class="block text-sm font-medium text-gray-700">name Tag:</label>
                            <input type="text" id="nameTag" value="" name="nameTag" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm">
                        </div>
                    <div>
                    </div>
                        <button type="submit" name="ajoute" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-green-600">add tag</button>
                    </div>

                </form>
                
          
                
                <!-- TABLE -->
                <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-left">id</th>
                                <th class="py-3 px-6 text-center">Users</th>
                                <th class="py-3 px-6 text-center">Potion</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm">
                            <?php
                            require_once ('../../../vendor/autoload.php');

                            use App\Controllers\AuthTages;

                            $candidat = new AuthTages();
                            $result = $candidat->desplayTags();
                            if ($result) {
                                foreach ($result as $row) {
                                    ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                        </div>
                                        <span><?= $row->getNameTage()?></span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center ">
                                    <?= $row->getId() ?>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs"> </span>
                                </td>
                                <td class="py-3 px-6 flex justify-center text-center">
                                    <!-- First Button -->
                                    <a href="\src\views\admin\adminModificationTags.php?id=<?= $row->getId() ?>">
                                        <div class="w-4 mx-3 transform hover:text-purple-500 hover:scale-110 cursor-pointer">
                                            <input type="hidden" name="user_id">
                                            <button type="update" name="update" class="flex items-center justify-center w-4 transform hover:text-purple-500 hover:scale-110 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </a>
                                    <a href="\src\views\admin\adminTage.php?id=<?= $row->getId()?>">
                                        <div class="flex items-center space-x-4">
                                            <div class="w-4 mx-3 transform hover:text-purple-500 hover:scale-110 cursor-pointer">
                                                <input type="hidden" name="user_id" value="<?= $row->getId() ?>">
                                                <button type="delet" name="delet" class="flex items-center justify-center w-4 transform hover:text-purple-500 hover:scale-110 cursor-pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                        
                                    
                                </td>
                            </tr>
                            <?php
                            }
                            } else {
                                echo ('nothing to display');
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
<?php include_once __DIR__ . '../../heder_footer/footer.php' ?>
