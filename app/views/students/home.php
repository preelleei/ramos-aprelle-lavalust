<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home | LavaLust</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600;700;800&family=Unbounded:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

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

        html { scroll-behavior: smooth; }
        body {
            font-family: var(--sans);
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            opacity: .6;
        }

        body::after {
            content: '';
            position: fixed;
            inset: 0;
            background-image: linear-gradient(var(--border) 1px, transparent 1px), linear-gradient(90deg, var(--border) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
            mask-image: radial-gradient(ellipse 80% 60% at 50% 0%, black 30%, transparent 100%);
        }

        nav {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 6%;
            border-bottom: 1px solid var(--border);
            background: rgba(16,23,20,.75);
            backdrop-filter: blur(12px);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: .6rem;
            color: var(--text);
            text-decoration: none;
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

        .nav-links { display: flex; gap: .35rem; align-items: center; }
        .nav-links a {
            color: var(--muted);
            text-decoration: none;
            font-size: .78rem;
            padding: .5rem .8rem;
            border-radius: 6px;
        }
        .nav-links a:hover { color: var(--text); background: var(--bg3); }
        .nav-links .active { color: #17351f; background: var(--lava); }

        main {
            position: relative;
            z-index: 1;
            width: min(1050px, 88%);
            margin: 0 auto;
            padding: 6rem 0;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .35rem .9rem;
            border: 1px solid var(--border-hot);
            border-radius: 999px;
            color: var(--pink);
            background: rgba(243,166,184,.08);
            font: 600 .72rem var(--mono);
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--lava);
            box-shadow: 0 0 8px var(--lava);
        }

        h1 {
            margin: 1.6rem 0 .9rem;
            font-size: clamp(2.8rem, 7vw, 5.8rem);
            line-height: 1;
            letter-spacing: -.05em;
        }

        h1 span { color: var(--lava); }
        .intro { max-width: 700px; color: var(--muted); line-height: 1.8; font-size: .9rem; }

        .card {
            margin-top: 3rem;
            padding: 2rem;
            background: rgba(21,29,25,.9);
            border: 1px solid var(--border);
            border-radius: 14px;
        }

        .card h2 { font-size: 1.3rem; margin-bottom: 1.5rem; }
        .grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 1px; background: var(--border); border: 1px solid var(--border); }
        .item { background: var(--bg2); padding: 1.2rem; }
        .label { display: block; color: var(--muted); font: 600 .68rem var(--mono); text-transform: uppercase; letter-spacing: .08em; margin-bottom: .45rem; }
        .value { font-size: .85rem; }

        .actions { display: flex; gap: .8rem; margin-top: 1.6rem; flex-wrap: wrap; }
        .button {
            display: inline-block;
            padding: .75rem 1rem;
            border-radius: 6px;
            text-decoration: none;
            font-size: .78rem;
            font-weight: 700;
        }
        .primary { background: var(--lava); color: #17351f; }
        .secondary { color: var(--text); border: 1px solid var(--border); background: var(--bg3); }
        .button:hover { opacity: .9; }

        @media (max-width: 700px) {
            nav { padding: 1.2rem 5%; }
            .nav-links a { padding: .45rem .5rem; }
            main { width: 90%; padding: 4rem 0; }
            .grid { grid-template-columns: 1fr; }
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
            <a class="active" href="<?= site_url('student'); ?>">Home</a>
            <a href="<?= site_url('student/profile'); ?>">Profile</a>
        </div>
    </nav>

    <main>
        <span class="badge">Student Portal</span>
        <h1>Hello, <span><?= html_escape($student['name']); ?></span></h1>
        <p class="intro">Student information and profile details.</p>

        <section class="card">
            <h2>Student Information</h2>
            <div class="grid">
                <div class="item"><span class="label">Student ID</span><span class="value"><?= html_escape($student['student_id']); ?></span></div>
                <div class="item"><span class="label">Name</span><span class="value"><?= html_escape($student['name']); ?></span></div>
                <div class="item"><span class="label">Course</span><span class="value"><?= html_escape($student['course']); ?></span></div>
                <div class="item"><span class="label">Year</span><span class="value"><?= html_escape($student['year']); ?></span></div>
                <div class="item"><span class="label">Section</span><span class="value"><?= html_escape($student['section']); ?></span></div>
                <div class="item"><span class="label">Email</span><span class="value"><?= html_escape($student['email']); ?></span></div>
            </div>
            <div class="actions">
                <a class="button primary" href="<?= site_url('student/profile'); ?>">View Profile →</a>
                <a class="button secondary" href="<?= site_url(); ?>">Back to LavaLust</a>
            </div>
        </section>
    </main>
</body>
</html>
