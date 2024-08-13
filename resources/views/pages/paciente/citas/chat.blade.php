<x-app-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-2xl w-full">
            <!-- Chat Bubble -->
            <ul class="list-none space-y-6">
                <!-- Chat -->
                <li class="max-w-lg flex gap-x-2 sm:gap-x-4 me-11">
                    <!-- Card -->
                    <div class="bg-white border border-gray-200 rounded-lg p-4 space-y-3">
                        <p class="text-sm text-gray-800">
                            Preline UI is an open-source set of prebuilt UI components based on the utility-first
                            Tailwind CSS framework.
                        </p>
                    </div>
                    <!-- End Card -->
                </li>
                <!-- End Chat -->

                <!-- Chat -->
                <li class="flex ms-auto gap-x-2 sm:gap-x-4 my-4">
                    <div class="grow text-end space-y-3">
                        <!-- Card -->
                        <div class="inline-block bg-blue-600 rounded-lg p-4 shadow-sm">
                            <p class="text-sm text-white">
                                what's preline ui?
                            </p>
                        </div>
                        <!-- End Card -->
                    </div>
                </li>
                <!-- End Chat -->

                <!-- Chat Bubble -->
                <li class="max-w-lg flex gap-x-2 sm:gap-x-4 me-11">
                    <!-- Card -->
                    <div class="bg-white border border-gray-200 rounded-lg p-4 space-y-3">
                        <p class="text-sm text-gray-800">
                            Preline UI is an open-source set of prebuilt UI components based on the utility-first
                            Tailwind CSS framework.
                        </p>
                    </div>
                    <!-- End Card -->
                </li>
                <!-- End Chat Bubble -->
            </ul>
            <!-- End Chat Bubble -->

            <!-- Chat Input -->
            <div class="mt-6">
                <form>
                    <label for="chat" class="sr-only">Your message</label>
                    <div class="flex items-center px-3 py-2 rounded-lg bg-gray-100">
                        <textarea id="chat" rows="1" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Your message..."></textarea>
                        <button type="submit" class="py-2 ml-3 px-4 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>  

        </div>
    </div>
</x-app-layout>
