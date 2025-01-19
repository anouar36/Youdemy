<?php
session_start();
require_once __DIR__ ."/../../../vendor/autoload.php";
use App\Controllers\Authadmin;


if(isset($_POST['delet'])){
    $idUsre = $_POST['user_id'];
    $deletUser = new Authadmin();
    $deletUser->delet($idUsre);
}



// if(isset($_POST['update'])){
//     $idUsre = $_POST['user_id'];
//     $updatUser = new Authadmin();
//     $updatUser->update($idUsre);
// }
?>

<?php include_once __DIR__.'../../heder_footer/header.php';?>
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
                        <li><a href="#" class="hover:text-yellow-400 flex items-center"><i class="fa-solid fa-folder-plus mr-3"></i>Users</a></li>
                        <li><a href="\src\views\admin\adminTage.php" class="hover:text-yellow-400 flex items-center"><i class="fas fa-book-open mr-3"></i>Tags</a></li>
                        <li><a href="\src\views\admin\adminCategories.php" class="hover:text-yellow-400 flex items-center"><i class="fas fa-briefcase mr-3"></i>Categorise </a></li>
                        <li><a href="#" class="hover:text-yellow-400 flex items-center"><i class="fas fa-folder-open mr-3"></i>My accente</a></li>
                    </ul>
                </div>

                <div>
                    <a href="\src\Controllers\AuthLogout.php">
                        <h3 class="hover:text-yellow-400 text-xl font-semibold flex items-center">
                            <i class="fa-solid fa-person-walking mr-3"></i> Out
                        </h3>
                    </a>
                </div>
            </nav>
        </aside>
        <!-- END OF NAV -->

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
                    <h1 class="text-2xl font-semibold pt-2 pb-6">Dashboard</h1>
                </div>

                <!-- STATISTICS -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 py-6">
                    <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
                        <div class="space-y-2">
                            <p class="text-xs text-gray-400 uppercase">Value</p>
                            <div class="flex items-center space-x-2">
                                <h1 class="text-xl font-semibold">$13,500</h1>
                                <p class="text-xs bg-green-50 text-green-500 px-1 rounded">+4.5</p>
                            </div>
                        </div>
                        <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>

                    <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
                        <div class="space-y-2">
                            <p class="text-xs text-gray-400 uppercase">Users</p>
                            <div class="flex items-center space-x-2">
                                <h1 class="text-xl font-semibold">819</h1>
                                <p class="text-xs bg-green-50 text-green-500 px-1 rounded">+7.4</p>
                            </div>
                        </div>
                        <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>                    
                    </div>

                    <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
                        <div class="space-y-2">
                            <p class="text-xs text-gray-400 uppercase">Orders</p>
                            <div class="flex items-center space-x-2">
                                <h1 class="text-xl font-semibold">121</h1>
                                <p class="text-xs bg-red-50 text-red-500 px-1 rounded">-2.9</p>
                            </div>
                        </div>
                        <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    </div>

                    <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
                        <div class="space-y-2">
                            <p class="text-xs text-gray-400 uppercase">Tickets</p>
                            <div class="flex items-center space-x-2">
                                <h1 class="text-xl font-semibold">243</h1>
                                <p class="text-xs bg-green-50 text-green-500 px-1 rounded">+3.1</p>
                            </div>
                        </div>
                        <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                    </div>
                </div>
                <!-- END OF STATISTICS -->
                
                <!-- TABLE -->
                <form action="process_selected_user.php" method="POST">
                    <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Role</th>
                                    <th class="py-3 px-6 text-left">Username</th>
                                    <th class="py-3 px-6 text-left">Email</th>
                                    <th class="py-3 px-6 text-left">Status</th> 
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm">
                                <?php
                                require_once("../../../vendor/autoload.php");
                                use App\Controllers\AuthUsers;
                                $candidat = new AuthUsers();
                                $result = $candidat->desplayUsers();
                                if($result){
                                    foreach($result as $row){
                                ?>
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <!-- Role -->
                                        <td class="py-3 px-6 text-left">
                                            <?= $row->getRole() ?>
                                        </td>
                                        <!-- Username -->
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <div class="mr-2">
                                                    <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                                </div>
                                                <span><?= $row->getUsername() ?></span>
                                            </div>
                                        </td>
                                        <!-- Email -->
                                        <td class="py-3 px-6 text-left">
                                            <?= $row->getEmail() ?>
                                        </td>
                                        <!-- Block/Unblock Dropdown -->
                                        <td class="py-3 px-6 text-left">
                                            <select name="user_status[<?= $row->getId() ?>]" class="form-select block w-full mt-1 rounded-md border-gray-300 shadow-sm">
                                                <option value="unblock">Unblock</option>
                                                <option value="block">Block</option>
                                            </select>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="4" class="py-3 px-6 text-center">No users found.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Action Buttons -->
                    <div class="mt-4">
                        <button type="submit" name="action" value="update_status" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Update Status
                        </button>
                    </div>
                </form>
            </section>
        </main>
    </div>
<?php include_once __DIR__.'../../heder_footer/footer.php'?>