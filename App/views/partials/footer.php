<?php

use Framework\Session;

?>

<footer class="bg-indigo-900 text-white mt-8">
    <div class="container mx-auto py-10" style="padding-left: 2rem; padding-right: 2rem;">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Brand -->
            <div>
                <h2 class="text-2xl font-semibold text-white mb-2">Jobseeker</h2>
                <p class="text-gray-300 text-sm leading-relaxed">
                    Connecting talented professionals with their dream careers. Find opportunities that match your skills and ambitions.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-3">Quick Links</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="/" class="text-gray-300 hover:text-white hover:underline transition duration-200">Home</a></li>
                    <li><a href="/listings" class="text-gray-300 hover:text-white hover:underline transition duration-200">Browse Jobs</a></li>
                    <li><a href="/job-match" class="text-gray-300 hover:text-white hover:underline transition duration-200">Job Match</a></li>
                    <?php if (Session::has('user')) : ?>
                    <li><a href="/listings/create" class="text-gray-300 hover:text-white hover:underline transition duration-200">Post a Job</a></li>
                    <?php else : ?>
                    <li><a href="/auth/login" class="text-gray-300 hover:text-white hover:underline transition duration-200">Login</a></li>
                    <li><a href="/auth/register" class="text-gray-300 hover:text-white hover:underline transition duration-200">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Contact / Social -->
            <div>
                <h3 class="text-lg font-semibold text-white mb-3">Connect With Us</h3>
                <div class="flex space-x-4 mb-4">
                    <a href="#" class="text-gray-300 hover:text-white transition duration-200 text-xl">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white transition duration-200 text-xl">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white transition duration-200 text-xl">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white transition duration-200 text-xl">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
                <p class="text-gray-300 text-sm">
                    <i class="fa fa-envelope mr-2"></i>support@jobseeker.com
                </p>
            </div>

        </div>

        <!-- Divider & Copyright -->
        <div class="border-t border-gray-600 mt-8 pt-6 text-center text-sm text-gray-400">
            <p>&copy; <?= date('Y') ?> Jobseeker. All rights reserved.</p>
        </div>
    </div>
</footer>
