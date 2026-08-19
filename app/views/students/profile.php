<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

function student_safe_url($url)
{
    return preg_match('/^https?:\/\//i', $url) ? $url : '#';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile | LavaLust</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600;700&family=Unbounded:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --lava: #8fd3a8;
            --pink: #f3a6b8;
            --bg: #101714;
            --bg2: #151d19;
            --bg3: #1c2722;
            --border: rgba(255,255,255,.08);
            --border-hot: rgba(243,166,184,.35);
            --text: #f4f8f5;
            --muted: #9aa8a0;
            --mono: 'Fira Code', monospace;
            --sans: 'Unbounded', sans-serif;
        }

        body {
            font-family: var(--sans);
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            pointer-events: none;
            background-image:
                linear-gradient(var(--border) 1px, transparent 1px),
                linear-gradient(90deg, var(--border) 1px, transparent 1px);
            background-size: 60px 60px;
            mask-image: radial-gradient(
                ellipse 80% 60% at 50% 0%,
                black 30%,
                transparent 100%
            );
        }

        nav {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.4rem 6%;
            border-bottom: 1px solid var(--border);
            background: rgba(16,23,20,.82);
            backdrop-filter: blur(12px);
        }

        .logo {
            color: var(--text);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: .6rem;
            font-size: 1rem;
            font-weight: 700;
        }

        .flame {
            width: 28px;
            height: 28px;
            display: grid;
            place-items: center;
            background: var(--lava);
            border-radius: 6px;
            font-size: 14px;
        }

        .nav-links {
            display: flex;
            gap: .35rem;
        }

        .nav-links a {
            color: var(--muted);
            text-decoration: none;
            font-size: .78rem;
            padding: .5rem .8rem;
            border-radius: 6px;
        }

        .nav-links a:hover {
            color: var(--text);
            background: var(--bg3);
        }

        .nav-links .active {
            color: #17351f;
            background: var(--lava);
        }

        main {
            position: relative;
            z-index: 1;
            width: min(1100px, 92%);
            margin: auto;
            padding: 4.5rem 0 6rem;
        }

        .badge {
            display: inline-flex;
            padding: .35rem .85rem;
            border: 1px solid var(--border-hot);
            border-radius: 999px;
            color: var(--pink);
            background: rgba(243,166,184,.08);
            font: 600 .7rem var(--mono);
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        h1 {
            margin: 1.3rem 0 .6rem;
            font-size: clamp(2.2rem, 6vw, 4rem);
            line-height: 1;
            letter-spacing: -.05em;
        }

        h1 span {
            color: var(--lava);
        }

        .intro {
            color: var(--muted);
            font-size: .86rem;
            line-height: 1.7;
        }

        .layout {
            display: grid;
            grid-template-columns: .85fr 1.5fr;
            gap: 1rem;
            margin-top: 2.5rem;
            align-items: stretch;
        }

        .card {
            background: rgba(21,29,25,.92);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 1.6rem;
        }

        .summary h2,
        .editor h2 {
            font-size: 1rem;
            margin-bottom: 1.2rem;
        }

        .avatar {
            width: 70px;
            height: 70px;
            display: grid;
            place-items: center;
            border: 1px solid var(--border-hot);
            border-radius: 12px;
            background: rgba(243,166,184,.1);
            color: var(--pink);
            font-size: 1.7rem;
            font-weight: 800;
        }

        .summary h3 {
            margin-top: 1.2rem;
            font-size: 1rem;
        }

        .role {
            margin-top: .45rem;
            color: var(--lava);
            font-size: .74rem;
            line-height: 1.6;
        }

        .description {
            margin-top: 1rem;
            color: var(--muted);
            font-size: .75rem;
            line-height: 1.8;
        }

        /* PROFILE INFORMATION */

        .profile-info {
            margin-top: 1.5rem;
            border-top: 1px solid var(--border);
        }

        .info-row {
            padding: .9rem 0;
            border-bottom: 1px solid var(--border);
        }

        .info-label {
            display: block;
            margin-bottom: .35rem;
            color: var(--muted);
            font: 600 .62rem var(--mono);
            text-transform: uppercase;
            letter-spacing: .07em;
        }

        .info-value {
            color: var(--text);
            font-size: .73rem;
            line-height: 1.6;
            word-break: break-word;
        }

        /* SOCIAL LINKS */

        .socials {
            display: flex;
            flex-wrap: wrap;
            gap: .5rem;
            margin-top: 1.2rem;
        }

        .socials a {
            color: var(--text);
            text-decoration: none;
            border: 1px solid var(--border);
            background: var(--bg3);
            padding: .55rem .7rem;
            border-radius: 6px;
            font: 600 .68rem var(--mono);
        }

        .socials a:hover {
            border-color: var(--border-hot);
            color: var(--pink);
        }

        .saved {
            margin-bottom: 1rem;
            padding: .75rem .9rem;
            border: 1px solid rgba(143,211,168,.35);
            background: rgba(143,211,168,.08);
            color: var(--lava);
            border-radius: 8px;
            font: 600 .72rem var(--mono);
        }

        /* FORM */

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: .4rem;
            color: var(--muted);
            font: 600 .66rem var(--mono);
            text-transform: uppercase;
            letter-spacing: .07em;
        }

        input,
        textarea {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 7px;
            background: var(--bg3);
            color: var(--text);
            padding: .75rem .8rem;
            font: 400 .75rem var(--mono);
            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: var(--lava);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
            line-height: 1.6;
        }

        .actions {
            display: flex;
            gap: .7rem;
            margin-top: 1.2rem;
            flex-wrap: wrap;
        }

        button,
        .button {
            display: inline-block;
            border: 0;
            padding: .75rem 1rem;
            border-radius: 6px;
            text-decoration: none;
            font: 700 .72rem var(--sans);
            cursor: pointer;
        }

        .primary {
            background: var(--lava);
            color: #17351f;
        }

        .secondary {
            background: var(--bg3);
            border: 1px solid var(--border);
            color: var(--text);
        }

        button:hover,
        .button:hover {
            opacity: .9;
        }

        @media (max-width: 800px) {
            .layout {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            nav {
                padding: 1.1rem 5%;
            }

            main {
                width: 92%;
                padding-top: 3.5rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .field.full {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>

    <nav>
        <a class="logo" href="<?= site_url(); ?>">
            <span class="flame">🔥</span>
            LavaLust
        </a>

        <div class="nav-links">
            <a href="<?= site_url('student'); ?>">Home</a>
            <a class="active" href="<?= site_url('student/profile'); ?>">Profile</a>
        </div>
    </nav>

    <main>

        <span class="badge">Student Profile</span>

        <h1>
            <?= html_escape($student['name']); ?>
        </h1>

        <p class="intro">
            <?= html_escape($student['course']); ?>
            · Year <?= html_escape($student['year']); ?>
            · <?= html_escape($student['section']); ?>
        </p>

        <div class="layout">

            <!-- LEFT SIDE: PROFILE INFORMATION -->
            <section class="card summary">

                <div class="avatar">
                    <?= html_escape(strtoupper(substr($student['name'], 0, 1))); ?>
                </div>

                <h3>
                    <?= html_escape($student['name']); ?>
                </h3>

                <p class="role">
                    <?= html_escape($student['course']); ?>
                    · Year <?= html_escape($student['year']); ?>
                </p>

                <p class="description">
                    <?= html_escape($student['description']); ?>
                </p>

                <div class="profile-info">

                    <div class="info-row">
                        <span class="info-label">Student ID</span>
                        <span class="info-value">
                            <?= html_escape($student['student_id'] ?? ''); ?>
                        </span>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Email</span>
                        <span class="info-value">
                            <?= html_escape($student['email'] ?? ''); ?>
                        </span>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Address</span>
                        <span class="info-value">
                            <?= html_escape($student['address'] ?? ''); ?>
                        </span>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Contact Number</span>
                        <span class="info-value">
                            <?= html_escape($student['contact'] ?? ''); ?>
                        </span>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Skills</span>
                        <span class="info-value">
                            <?= html_escape($student['skills'] ?? ''); ?>
                        </span>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Hobbies</span>
                        <span class="info-value">
                            <?= html_escape($student['hobbies'] ?? ''); ?>
                        </span>
                    </div>

                </div>

                <div class="socials">

                    <?php if (student_safe_url($student['instagram'] ?? '') !== '#'): ?>
                        <a
                            href="<?= html_escape(student_safe_url($student['instagram'] ?? '')); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            Instagram
                        </a>
                    <?php endif; ?>

                    <?php if (student_safe_url($student['facebook'] ?? '') !== '#'): ?>
                        <a
                            href="<?= html_escape(student_safe_url($student['facebook'] ?? '')); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            Facebook
                        </a>
                    <?php endif; ?>

                    <?php if (student_safe_url($student['tiktok'] ?? '') !== '#'): ?>
                        <a
                            href="<?= html_escape(student_safe_url($student['tiktok'] ?? '')); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            TikTok
                        </a>
                    <?php endif; ?>

                    <?php if (student_safe_url($student['github'] ?? '') !== '#'): ?>
                        <a
                            href="<?= html_escape(student_safe_url($student['github'] ?? '')); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            GitHub
                        </a>
                    <?php endif; ?>

                </div>

                <div class="actions">
                    <a
                        class="button secondary"
                        href="<?= site_url('student'); ?>"
                    >
                        ← Student Home
                    </a>
                </div>

            </section>


            <!-- RIGHT SIDE: EDIT PROFILE -->
            <section class="card editor">

                <h2>Edit Profile</h2>

                <?php if (!empty($saved_message)): ?>
                    <div class="saved">
                        <?= html_escape($saved_message); ?>
                    </div>
                <?php endif; ?>

                <form
                    method="post"
                    action="<?= site_url('student/profile'); ?>"
                >

                    <div class="form-grid">

                        <div class="field">
                            <label for="address">Address</label>

                            <input
                                id="address"
                                type="text"
                                name="address"
                                value="<?= html_escape($student['address'] ?? ''); ?>"
                            >
                        </div>


                        <div class="field">
                            <label for="contact">Contact Number</label>

                            <input
                                id="contact"
                                type="text"
                                name="contact"
                                value="<?= html_escape($student['contact'] ?? ''); ?>"
                            >
                        </div>


                        <div class="field">
                            <label for="skills">Skills</label>

                            <input
                                id="skills"
                                type="text"
                                name="skills"
                                value="<?= html_escape($student['skills'] ?? ''); ?>"
                            >
                        </div>


                        <div class="field">
                            <label for="hobbies">Hobbies</label>

                            <input
                                id="hobbies"
                                type="text"
                                name="hobbies"
                                value="<?= html_escape($student['hobbies'] ?? ''); ?>"
                            >
                        </div>


                        <div class="field full">
                            <label for="description">
                                Profile Description
                            </label>

                            <textarea
                                id="description"
                                name="description"
                            ><?= html_escape($student['description'] ?? ''); ?></textarea>
                        </div>


                        <div class="field">
                            <label for="instagram">Instagram</label>

                            <input
                                id="instagram"
                                type="url"
                                name="instagram"
                                value="<?= html_escape($student['instagram'] ?? ''); ?>"
                                placeholder="https://www.instagram.com/username/"
                            >
                        </div>


                        <div class="field">
                            <label for="facebook">Facebook</label>

                            <input
                                id="facebook"
                                type="url"
                                name="facebook"
                                value="<?= html_escape($student['facebook'] ?? ''); ?>"
                                placeholder="https://www.facebook.com/username/"
                            >
                        </div>


                        <div class="field">
                            <label for="tiktok">TikTok</label>

                            <input
                                id="tiktok"
                                type="url"
                                name="tiktok"
                                value="<?= html_escape($student['tiktok'] ?? ''); ?>"
                                placeholder="https://www.tiktok.com/@username"
                            >
                        </div>


                        <div class="field">
                            <label for="github">GitHub</label>

                            <input
                                id="github"
                                type="url"
                                name="github"
                                value="<?= html_escape($student['github'] ?? ''); ?>"
                                placeholder="https://github.com/username"
                            >
                        </div>

                    </div>


                    <div class="actions">

                        <button
                            class="primary"
                            type="submit"
                        >
                            Save Changes
                        </button>

                        <a
                            class="button secondary"
                            href="<?= site_url('student/profile'); ?>"
                        >
                            Reset
                        </a>

                    </div>

                </form>

            </section>

        </div>
 
    </main>

</body>
</html>