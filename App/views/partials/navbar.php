<?php

use Framework\Session;

$user = Session::get('user');
$firstName = trim(explode(' ', $user['name'] ?? 'Job Seeker')[0]);
?>
<header class="bg-blue-900 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="/" class="text-white">Jobseeker</a>
        </h1>

        <nav class="flex items-center gap-4">
            <?php if (Session::has('user')) : ?>
            <span class="text-white">Welcome, <?= htmlspecialchars($firstName) ?></span>

            <form method="POST" action="/auth/logout" style="display:contents;">
                <button type="submit" class="text-white hover:underline cursor-pointer">
                    Logout
                </button>
            </form>

            <a href="/listings/create"
                class="inline-flex items-center bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded hover:shadow-md transition duration-300">
                <i class="fa fa-edit"></i> Post a Job
            </a>
            <?php else: ?>
            <span class="text-white">Welcome, Future Hire</span>
            <a href="/auth/login" class="text-white hover:underline">Login</a>
            <a href="/auth/register" class="text-white hover:underline">Register</a>
            <?php endif; ?>
        </nav>
    </div>
</header>