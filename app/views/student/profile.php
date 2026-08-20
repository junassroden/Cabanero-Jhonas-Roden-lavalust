<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home | Academic Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #1e3a8a;
            --light-blue: #3b82f6;
            --accent-blue: #eff6ff;
            --bg-color: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
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
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .card {
            background-color: var(--card-bg);
            width: 100%;
            max-width: 550px;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(30, 58, 138, 0.08), 0 8px 10px -6px rgba(30, 58, 138, 0.08);
            border: 1px solid var(--border-color);
            overflow: hidden;
            position: relative;
        }

        .card-header {
            background-color: var(--primary-blue);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .card-header h1 {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            margin-bottom: 0.25rem;
        }

        .card-header p {
            font-size: 0.875rem;
            opacity: 0.85;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .card-body {
            padding: 2rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .info-group {
            background-color: var(--accent-blue);
            padding: 1rem;
            border-radius: 10px;
            border: 1px solid #dbeafe;
        }

        .info-group.full-width {
            grid-column: span 2;
        }

        .info-label {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            color: var(--text-muted);
            letter-spacing: 0.05em;
            margin-bottom: 0.3rem;
            display: block;
        }

        .info-value {
            font-size: 1rem;
            font-weight: 600;
            color: var(--primary-blue);
        }

        hr {
            border: none;
            height: 1px;
            background-color: var(--border-color);
            margin: 1.5rem 0;
        }

        .nav-links {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
        }

        .nav-links a {
            color: var(--light-blue);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.875rem;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: all 0.2s ease;
            background-color: var(--accent-blue);
        }

        .nav-links a:hover {
            background-color: var(--light-blue);
            color: white;
        }

        @media (max-width: 480px) {
            .info-grid {
                grid-template-columns: 1fr;
            }
            .info-group.full-width {
                grid-column: span 1;
            }
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="card-header">
            <h1>Student Information</h1>
            <p>Academic Portal</p>
        </div>

        <div class="card-body">
            <div class="info-grid">
                <div class="info-group">
                    <span class="info-label">Student ID</span>
                    <span class="info-value"><?= $student['student_id']; ?></span>
                </div>

                <div class="info-group">
                    <span class="info-label">Year Level</span>
                    <span class="info-value"><?= $student['year']; ?></span>
                </div>

                <div class="info-group full-width">
                    <span class="info-label">Name</span>
                    <span class="info-value"><?= $student['name']; ?></span>
                </div>

                <div class="info-group">
                    <span class="info-label">Course</span>
                    <span class="info-value"><?= $student['course']; ?></span>
                </div>

                <div class="info-group">
                    <span class="info-label">Section</span>
                    <span class="info-value"><?= $student['section']; ?></span>
                </div>

                <div class="info-group full-width">
                    <span class="info-label">Email</span>
                    <span class="info-value"><?= $student['email']; ?></span>
                </div>
            </div>

            <hr>

            <div class="nav-links">
                <a href="<?= site_url('student'); ?>">Home</a>
                <a href="<?= site_url('student/profile'); ?>">Student Profile</a>
            </div>
        </div>
    </div>

</body>
</html>