<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Academic Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-body: #f8fafc;
            --surface: #ffffff;
            --text-main: #18181b;
            --text-muted: #71717a;
            --border-color: #e4e4e7;
            --accent-red: #dc2626;
            --accent-red-hover: #b91c1c;
            --accent-red-light: #fef2f2;
            --radius: 6px;
            --shadow-subtle: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            line-height: 1.5;
            padding: 1.5rem;
        }

        .welcome-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 480px;
        }

        .welcome-card {
            background-color: var(--surface);
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            padding: 3rem 2.5rem;
            width: 100%;
            text-align: center;
            box-shadow: var(--shadow-subtle);
        }

        .welcome-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background-color: var(--accent-red-light);
            color: var(--accent-red);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            margin: 0 auto 1.5rem auto;
        }

        .welcome-card h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-main);
            letter-spacing: -0.025em;
            margin-bottom: 0.5rem;
        }

        .welcome-card p {
            font-size: 0.95rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
        }

        .btn-portal {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            background-color: var(--accent-red);
            color: white;
            border: none;
            width: 100%;
            padding: 0.75rem 1.25rem;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: var(--radius);
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.15s ease;
        }

        .btn-portal:hover {
            background-color: var(--accent-red-hover);
        }

        .activity-metadata {
            margin-top: 1.25rem;
            text-align: center;
            font-size: 0.85rem;
            color: var(--text-muted);
            line-height: 1.4;
        }

        .activity-metadata strong {
            color: var(--text-main);
            font-weight: 600;
        }
    </style>
</head>
<body>

    <div class="welcome-wrapper">
        <div class="welcome-card">
            <div class="welcome-icon">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <h1>Laboratory Acivity 4</h1>
            <p>By: Jhonas Roden S. Cabanero</p>
            
            <a href="/users" class="btn-portal">
                <i class="fa-solid fa-users"></i> View Student List
            </a>
        </div>
    </div>

</body>
</html>