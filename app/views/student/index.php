<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile - Academic Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #003366; /* Classic solid school navy blue */
            --accent-blue: #0055a5;  /* Solid royal blue */
            --bg-color: #f4f6f9;
            --card-bg: #ffffff;
            --text-main: #222222;
            --text-muted: #666666;
            --border-color: #d1d5db;
        }

        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Top Navbar */
        .navbar {
            background-color: var(--card-bg);
            border-bottom: 2px solid var(--primary-blue);
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 700;
            font-size: 1.125rem;
            color: var(--primary-blue);
            text-decoration: none;
        }

        .navbar-nav {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .navbar-nav a {
            text-decoration: none;
            color: var(--text-muted);
            font-weight: 500;
            font-size: 0.9rem;
            transition: color 0.2s;
        }

        .navbar-nav a:hover, .navbar-nav a.active {
            color: var(--primary-blue);
            font-weight: 600;
        }

        .user-pill {
            background-color: #e6f0fa;
            color: var(--primary-blue);
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.85rem;
            border: 1px solid #b8d0e8;
        }

        /* Main Page Layout */
        .main-container {
            max-width: 900px;
            width: 100%;
            margin: 2.5rem auto;
            padding: 0 1.5rem;
            flex: 1;
        }

        .page-header {
            margin-bottom: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 0.75rem;
        }

        .page-header h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary-blue);
        }

        /* Content Card */
        .content-card {
            background-color: var(--card-bg);
            border-radius: 6px;
            border: 1px solid var(--border-color);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .card-top-bar {
            background-color: var(--primary-blue);
            color: white;
            padding: 1rem 1.5rem;
            font-weight: 600;
            font-size: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .grid-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            padding: 2rem;
        }

        .detail-group {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
            border-bottom: 1px solid #edf2f7;
            padding-bottom: 0.75rem;
        }

        .detail-group.full {
            grid-column: span 2;
        }

        .detail-label {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
        }

        .detail-value {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-main);
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 1.5rem;
            color: var(--text-muted);
            font-size: 0.85rem;
            border-top: 1px solid var(--border-color);
            background-color: var(--card-bg);
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .grid-details {
                grid-template-columns: 1fr;
            }
            .detail-group.full {
                grid-column: span 1;
            }
            .navbar {
                padding: 0 1rem;
            }
        }
    </style>
</head>
<body>

    <!-- Website Navbar -->
    <header class="navbar">
        <a href="<?= site_url('student'); ?>" class="navbar-brand">
            🏫 Student Portal
        </a>
        <nav class="navbar-nav">
            <a href="<?= site_url('student'); ?>">Home</a>
            <a href="<?= site_url('student/profile'); ?>" class="active">Student Profile</a>
            <div class="user-pill"><?= $student['name']; ?></div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main-container">
        <div class="page-header">
            <h1>Student Profile</h1>
        </div>

        <div class="content-card">
            <div class="card-top-bar">
                <span>Official Record Information</span>
                <span style="font-size: 0.85rem;">Enrolled</span>
            </div>

            <div class="grid-details">
                <div class="detail-group">
                    <span class="detail-label">Student ID</span>
                    <span class="detail-value"><?= $student['student_id']; ?></span>
                </div>

                <div class="detail-group">
                    <span class="detail-label">Year</span>
                    <span class="detail-value"><?= $student['year']; ?></span>
                </div>

                <div class="detail-group full">
                    <span class="detail-label">Name</span>
                    <span class="detail-value"><?= $student['name']; ?></span>
                </div>

                <div class="detail-group">
                    <span class="detail-label">Course</span>
                    <span class="detail-value"><?= $student['course']; ?></span>
                </div>

                <div class="detail-group">
                    <span class="detail-label">Section</span>
                    <span class="detail-value"><?= $student['section']; ?></span>
                </div>

                <div class="detail-group full">
                    <span class="detail-label">Email</span>
                    <span class="detail-value"><?= $student['email']; ?></span>
                </div>
            </div>
        </div>
    </main>

    <!-- Website Footer -->
    <footer class="footer">
        <p>&copy; <?= date('Y'); ?> Academic Institution. All rights reserved.</p>
    </footer>

</body>
</html>