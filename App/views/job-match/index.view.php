<?= loadPartial('head'); ?>
<?= loadPartial('navbar'); ?>
<?= loadPartial('top-banner'); ?>

<?php
$resultLabel = $score >= 70 ? 'Strong Match' : 'Needs Improvement';
$resultClass = $score >= 70 ? 'match-result-strong' : 'match-result-improve';
$portfolioText = $portfolio === 'yes' ? 'Portfolio ready' : 'Add a portfolio to improve your chances';
?>

<section class="match-page container mx-auto p-4 mt-4">
    <div class="match-hero bg-white rounded-lg shadow-md">
        <h2>Job Match Checker</h2>
        <p>Check how ready your profile is for a job opening.</p>
    </div>

    <div class="match-panel bg-white rounded-lg shadow-md">
        <form method="GET" action="/job-match">
            <div class="match-grid">
                <div>
                    <label for="experience">Experience</label>
                    <select id="experience" name="experience">
                        <option value="junior" <?= $experience === 'junior' ? 'selected' : '' ?>>Junior</option>
                        <option value="mid" <?= $experience === 'mid' ? 'selected' : '' ?>>Mid Level</option>
                        <option value="senior" <?= $experience === 'senior' ? 'selected' : '' ?>>Senior</option>
                    </select>
                </div>

                <div>
                    <label for="portfolio">Portfolio</label>
                    <select id="portfolio" name="portfolio">
                        <option value="no" <?= $portfolio === 'no' ? 'selected' : '' ?>>No portfolio yet</option>
                        <option value="yes" <?= $portfolio === 'yes' ? 'selected' : '' ?>>Has portfolio</option>
                    </select>
                </div>
            </div>

            <fieldset class="match-skills">
                <legend>Skills Match</legend>
                <div class="match-skill-grid">
                    <?php foreach ($availableSkills as $skill) : ?>
                    <label>
                        <input type="checkbox" name="skills[]" value="<?= escape($skill) ?>"
                            <?= in_array($skill, $skills, true) ? 'checked' : '' ?>>
                        <?= escape($skill) ?>
                    </label>
                    <?php endforeach; ?>
                </div>
            </fieldset>

            <div class="match-actions">
                <button type="submit" name="check_match" value="1" class="bg-blue-500 text-white rounded">
                    Check Match
                </button>
                <a href="/job-match" class="rounded">Reset</a>
            </div>
        </form>

        <?php if ($submitted) : ?>
        <div class="match-result <?= $resultClass ?>">
            <div>
                <span>Your Result</span>
                <strong><?= $resultLabel ?></strong>
            </div>
            <p>
                Your score is <?= escape($score) ?>%. <?= $score >= 70 ? 'You look ready to apply.' : 'Build more skills before applying.' ?>
            </p>
            <p><?= escape($portfolioText) ?></p>
        </div>
        <?php endif; ?>
    </div>
</section>

<?= loadPartial('bottom-banner'); ?>
<?= loadPartial('footer'); ?>
