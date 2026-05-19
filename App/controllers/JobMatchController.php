<?php

namespace App\Controllers;

class JobMatchController
{
    public function index()
    {
        $availableSkills = ['PHP', 'JavaScript', 'HTML/CSS', 'SQL', 'Git', 'Problem Solving'];
        $submitted = isset($_GET['check_match']);

        $skills = $_GET['skills'] ?? [];
        $skills = is_array($skills) ? array_values(array_intersect($skills, $availableSkills)) : [];

        $experience = $_GET['experience'] ?? 'junior';
        $experience = in_array($experience, ['junior', 'mid', 'senior'], true) ? $experience : 'junior';

        $portfolio = $_GET['portfolio'] ?? 'no';
        $portfolio = in_array($portfolio, ['yes', 'no'], true) ? $portfolio : 'no';

        $skillPoints = min(count($skills) * 10, 50);
        $experiencePoints = $experience === 'senior' ? 30 : ($experience === 'mid' ? 20 : 10);
        $portfolioPoints = $portfolio === 'yes' ? 20 : 0;
        $score = $submitted ? min($skillPoints + $experiencePoints + $portfolioPoints, 100) : null;

        loadView('job-match/index', [
            'availableSkills' => $availableSkills,
            'skills' => $skills,
            'experience' => $experience,
            'portfolio' => $portfolio,
            'score' => $score,
            'submitted' => $submitted,
        ]);
    }
}
