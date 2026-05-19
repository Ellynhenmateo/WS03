<?php
$title = "Happiness Happens, Not Planned";
$author = "Elly Nhen Mateo";
$date = "February 14, 2026"; // Hardcoded date
$reading_time = "3 min read";

// Blog content
$intro = "We often believe that building a good life starts with <strong>knowing exactly what we want</strong>. We plan, visualize, and chase a version of happiness we assume will fulfill us once we reach it. 

In <em>101 Essays That Will Change the Way You Think</em>, Brianna West challenges this belief in her first essay, “<em>Subconscious Behaviors That Are Keeping You From Having the Life You Want</em>.” She explains that <strong>humans are not actually capable of predicting what will make them happy</strong> — because the mind can only imagine what it already knows. 

What we want, then, is <strong>rarely a vision of the future</strong>. 

It is usually a <strong>reflection of the past.</strong>";

$body = "The brain works by recognition. When we imagine our future, we aren’t creating something new — we’re <strong>replaying familiar experiences, emotions, and outcomes</strong>. Even our dreams are often recycled versions of what once felt safe, successful, or meaningful. 

Because of this, when life unfolds differently than expected, we interpret it as <strong>failure</strong>. Not because it is worse, but because it feels unfamiliar. 
The mind mistakes unfamiliarity for something being wrong. 

Sometimes, we don’t fail at all. We simply create something better — something our brain doesn’t know how to recognize yet.";

$conclusion = "Happiness cannot be planned the way goals or schedules can. It can only be <strong>experienced as it happens, in the present moment</strong>. 

Living in the moment is not a spiritual luxury reserved for the enlightened. It is the only way to experience life without distortion from memory or expectation. 

What feels wrong, disappointing, or uncomfortable right now may not be a mistake. It may simply be something new.

<strong>Happiness happens when we stop trying to plan it.</strong>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | Elly's Journal</title>

    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;1,400&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                    serif: ['Lora', 'serif'],
                }
            }
        }
    }
    </script>
</head>

<body class="bg-stone-50 text-stone-800 antialiased selection:bg-stone-300 selection:text-black font-sans">

    <nav class="sticky top-0 z-50 bg-stone-50/90 backdrop-blur-sm border-b border-stone-200">
        <div class="max-w-5xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/blog/lab1.php" class="font-serif font-semibold text-xl text-stone-900 tracking-wide">Elly's Journal.</a>
            <div class="hidden md:flex space-x-8 text-sm font-medium text-stone-600">
                <a href="#article" class="hover:text-stone-900 transition-colors duration-200">Essay</a>
                <a href="#about" class="hover:text-stone-900 transition-colors duration-200">About</a>
                <a href="/" class="hover:text-stone-900 transition-colors duration-200">Jobseeker App</a>
            </div>
            <button class="md:hidden text-stone-600 hover:text-stone-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto px-6 py-10 md:py-16">

        <header class="max-w-3xl mx-auto text-center space-y-6 mb-10">
            <div class="text-xs font-semibold tracking-widest text-stone-500 uppercase">
                Reflections &middot; Psychology
            </div>

            <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-medium leading-tight text-stone-900">
                <?= $title ?>
            </h1>

            <div class="flex items-center justify-center space-x-4 pt-4">
                <img src="https://ui-avatars.com/api/?name=Elly+Nhen&background=d6d3d1&color=1c1917&rounded=true"
                    alt="Author Avatar" class="w-12 h-12 rounded-full shadow-sm">
                <div class="text-left font-sans">
                    <p class="font-medium text-stone-900 text-base"><?= $author ?></p>
                    <p class="text-sm text-stone-500"><?= $date ?> • <?= $reading_time ?></p>
                </div>
            </div>
        </header>

        <div class="w-full relative overflow-hidden rounded-lg shadow-md mb-12">
            <img src="hero.jpg" alt="Hero Image"
                class="w-full h-72 md:h-[500px] object-cover hover:scale-105 transition-transform duration-[1.5s] ease-in-out">
        </div>

        <article id="article" class="prose prose-lg prose-stone mx-auto font-serif leading-relaxed text-stone-700">

            <div>
                <?= nl2br($intro) ?>
            </div>

            <div class="flex justify-center py-8">
                <span class="text-2xl text-stone-500 font-bold tracking-[0.5em]">&middot; &middot; &middot;</span>
            </div>

            <div>
                <?= nl2br($body) ?>
            </div>

            <div class="flex justify-center py-8">
                <span class="text-2xl text-stone-500 font-bold tracking-[0.5em]">&middot; &middot; &middot;</span>
            </div>

            <div>
                <?= nl2br($conclusion) ?>
            </div>

        </article>

    </main>

    <footer id="about" class="bg-stone-100 border-t border-stone-200 mt-16 py-12">
        <div class="max-w-5xl mx-auto px-6 text-center font-sans">
            <h3 class="font-serif font-medium text-xl text-stone-900 mb-4">Elly's Journal.</h3>
            <p class="text-stone-500 text-sm mb-6">Thoughts on programming, life, and finding the balance in between.
            </p>

            <div class="flex justify-center space-x-6 text-sm font-medium text-stone-600 mb-8">
                <a href="/" class="hover:text-stone-900 transition-colors">Jobseeker App</a>
                <a href="/blog/lab1.php" class="hover:text-stone-900 transition-colors">Blog Project</a>
                <a href="https://github.com/Ellynhenmateo/WS03" class="hover:text-stone-900 transition-colors">GitHub Repo</a>
            </div>

            <p class="text-stone-400 text-xs tracking-wide uppercase">
                &copy; <?= date('Y') ?> <?= $author ?>. All rights reserved.
            </p>
        </div>
    </footer>

</body>

</html>
