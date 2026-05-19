<?php

use Framework\Session;

?>

<footer class="site-footer bg-indigo-900 text-white">
    <div class="site-footer-inner container mx-auto">
        <div class="site-footer-grid">

            <!-- Quick Links -->
            <div class="footer-quick-links">
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
                    <li><a href="/blog/lab1.php" class="text-gray-300 hover:text-white hover:underline transition duration-200">Blog Project</a></li>
                </ul>
            </div>

            <!-- Brand -->
            <div class="footer-brand">
                <h2 class="text-2xl font-semibold text-white mb-2">Jobseeker</h2>
                <p class="text-gray-300 text-sm leading-relaxed">
                    A focused IT job board for finding developer, support, analyst, and tech-focused opportunities that match your skills.
                </p>
            </div>

            <!-- Contact / Social -->
            <div class="footer-connect">
                <h3 class="text-lg font-semibold text-white mb-3">Stay Connected</h3>
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
