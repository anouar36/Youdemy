<?php include_once __DIR__ . '/heder_footer/header.php'; ?>
    <main class="bg-gray-50 py-12">
        <div class="container mx-auto px-6 text-center">
            <div class="flex flex-col items-center lg:flex-row lg:items-center lg:justify-between">
                <!-- Image -->
                <div class="lg:w-1/2 mb-8 lg:mb-0">
                    <div class="relative w-80 h-80 mx-auto rounded-xl overflow-hidden bg-white shadow-lg">
                        <img src="https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Student smiling" class="object-cover w-full h-full">
                        <span class="absolute top-2 left-2 bg-yellow-400 w-6 h-6 rounded-full"></span>
                        <span class="absolute bottom-2 right-2 bg-orange-400 w-6 h-6 rotate-45"></span>
                    </div>
                </div>

                <!-- Text Section -->
                <div class="lg:w-1/2 text-center lg:text-left">
                    <h1 class="text-3xl lg:text-5xl font-extrabold text-gray-800 leading-snug">
                        For every student, <br> every classroom. <br> Real results.
                    </h1>
                    <p class="mt-4 text-gray-600 text-lg">
                        We’re a nonprofit with the mission to provide a free, world-class education for anyone, anywhere.
                    </p>

                    <!-- Search Section -->
                    <div class="mt-8">
                        <input type="text" placeholder="Search for courses..." class="w-full lg:w-2/3 px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300">
                    </div>

                    <!-- Categories Bar -->
                    <div class="mt-4 flex justify-center space-x-4">
                        <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Math</a>
                        <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Science</a>
                        <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">History</a>
                        <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Arts</a>
                    </div>
                </div>
            </div>

            <!-- Display Search Results -->
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Best Courses Based on Your Search</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Updated Course Card Template -->
                    <div class="bg-white border rounded-lg shadow-md p-6">
                        <div class="mb-4">
                            <img src="https://d1jnx9ba8s6j9r.cloudfront.net/imgver.1551437392/img/co_img_1520_1631891680.png" alt="Course image" class="w-full h-40 object-cover rounded-lg">
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Lorem ipsum dolor sit amet, consectetur</h3>
                        <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex space-x-2">
                                <span class="bg-gray-200 text-gray-600 px-2 py-1 rounded text-xs">tag1</span>
                                <span class="bg-gray-200 text-gray-600 px-2 py-1 rounded text-xs">tag2</span>
                                <span class="bg-gray-200 text-gray-600 px-2 py-1 rounded text-xs">tag3</span>
                            </div>
                            <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Begin</a>
                        </div>
                        <div class="mt-2 text-gray-500 text-sm">Avg. time: 2 hours</div>
                    </div>
                    <!-- Repeat the card for additional courses -->
                    <div class="bg-white border rounded-lg shadow-md p-6">
                        <div class="mb-4">
                            <img src="https://d1jnx9ba8s6j9r.cloudfront.net/imgver.1551437392/img/co_img_1520_1631891680.png" alt="Course image" class="w-full h-40 object-cover rounded-lg">
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Voluptate velit esse cillum dolore eu fugiat nulla pariatur</h3>
                        <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex space-x-2">
                                <span class="bg-gray-200 text-gray-600 px-2 py-1 rounded text-xs">tag1</span>
                                <span class="bg-gray-200 text-gray-600 px-2 py-1 rounded text-xs">tag2</span>
                                <span class="bg-gray-200 text-gray-600 px-2 py-1 rounded text-xs">tag3</span>
                            </div>
                            <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Begin</a>
                        </div>
                        <div class="mt-2 text-gray-500 text-sm">Avg. time: 3 hours</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once __DIR__ . '/heder_footer/footer.php' ?>


   


    

