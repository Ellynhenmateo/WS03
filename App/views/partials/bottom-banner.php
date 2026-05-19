<?php

use Framework\Session;

?>

<!-- Bottom Banner -->
<section class="bottom-banner container mx-auto">
    <div class="bottom-banner-card p-4 flex items-center justify-between">
        <div>
            <?php if (Session::has('user')) : ?>
            <h2 class="text-xl font-semibold">Hiring IT talent?</h2>
            <p class="text-lg mt-2">
                Post roles for developers, support specialists, analysts, and tech teams.
            </p>
            <?php else : ?>
            <h2 class="text-xl font-semibold">Explore your next tech role.</h2>
            <p class="text-lg mt-2">
                Compare IT listings, check matches, and find work that fits your skill set.
            </p>
            <?php endif; ?>
        </div>
        <?php if (Session::has('user')) : ?>
        <a href="/listings/create"
            class="bottom-banner-action px-4 py-2 rounded transition duration-300">
            <i class="fa fa-edit"></i> Post a Job
        </a>
        <?php endif; ?>
    </div>
</section>
