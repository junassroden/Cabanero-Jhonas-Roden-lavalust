<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to LavaLust</title>
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --primary: #ff5722;
            --primary-glow: rgba(255, 87, 34, 0.2);
            --bg-base: #060608;
            --bg-card: #0e0e12;
            --bg-card-hover: #16161c;
            --border: rgba(255, 255, 255, 0.08);
            --border-active: rgba(255, 87, 34, 0.4);
            --text-main: #ededef;
            --text-muted: #9898a0;
            --font-sans: 'Plus Jakarta Sans', sans-serif;
            --font-mono: 'JetBrains Mono', monospace;
        }

        body {
            font-family: var(--font-sans);
            background-color: var(--bg-base);
            color: var(--text-main);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        .bg-glow {
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, var(--primary-glow) 0%, transparent 70%);
            top: -150px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 0;
            pointer-events: none;
            filter: blur(60px);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 1;
        }

        header {
            padding: 1.5rem 0;
            border-bottom: 1px solid var(--border);
            background: rgba(6, 6, 8, 0.8);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 800;
            font-size: 1.25rem;
            letter-spacing: -0.03em;
            color: var(--text-main);
            text-decoration: none;
        }

        .logo-badge {
            background: linear-gradient(135deg, #ff5722, #ff9800);
            color: #fff;
            padding: 0.35rem 0.6rem;
            border-radius: 8px;
            font-size: 1rem;
            box-shadow: 0 4px 15px var(--primary-glow);
        }

        .nav-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
            text-decoration: none;
            transition: all 0.25s ease;
            cursor: pointer;
        }

        .btn-outline {
            background: transparent;
            color: var(--text-muted);
            border: 1px solid var(--border);
        }

        .btn-outline:hover {
            color: var(--text-main);
            border-color: var(--text-muted);
            background: var(--bg-card);
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
            box-shadow: 0 4px 20px var(--primary-glow);
        }

        .btn-primary:hover {
            background: #f4511e;
            transform: translateY(-1px);
            box-shadow: 0 6px 25px rgba(255, 87, 34, 0.4);
        }

        .hero {
            padding: 7rem 0 5rem;
            text-align: center;
        }

        .version-tag {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--bg-card);
            border: 1px solid var(--border-active);
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-family: var(--font-mono);
            font-size: 0.75rem;
            color: var(--primary);
            margin-bottom: 2rem;
            box-shadow: inset 0 0 10px var(--primary-glow);
        }

        .hero h1 {
            font-size: clamp(2.5rem, 6vw, 5rem);
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: -0.04em;
            margin-bottom: 1.5rem;
        }

        .hero h1 span {
            background: linear-gradient(135deg, #fff 30%, #71717a 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero h1 .highlight {
            background: linear-gradient(135deg, #ff5722 0%, #ffb74d 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 1.15rem;
            color: var(--text-muted);
            max-width: 600px;
            margin: 0 auto 2.5rem;
            line-height: 1.6;
        }

        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            margin-bottom: 6rem;
        }

        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            padding: 1.75rem;
            border-radius: 14px;
            text-align: center;
            transition: border-color 0.3s ease;
        }

        .stat-card:hover {
            border-color: var(--border-active);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text-main);
            margin-bottom: 0.25rem;
            font-family: var(--font-mono);
        }

        .stat-number span { color: var(--primary); }

        .stat-label {
            font-size: 0.85rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .section-header {
            margin-bottom: 3rem;
        }

        .section-tag {
            font-family: var(--font-mono);
            font-size: 0.75rem;
            color: var(--primary);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 0.75rem;
            display: block;
        }

        .section-title {
            font-size: 2.25rem;
            font-weight: 800;
            letter-spacing: -0.03em;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 1.5rem;
            margin-bottom: 6rem;
        }

        .feature-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            padding: 2rem;
            border-radius: 16px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            background: var(--bg-card-hover);
            border-color: var(--border-active);
            transform: translateY(-3px);
        }

        .feature-icon {
            font-size: 1.5rem;
            background: rgba(255, 87, 34, 0.1);
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            margin-bottom: 1.25rem;
            border: 1px solid var(--border-active);
        }

        .feature-card h3 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .feature-card p {
            font-size: 0.925rem;
            color: var(--text-muted);
            line-height: 1.6;
        }

        .structure-container {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 6rem;
        }

        .dir-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }

        .dir-pill {
            background: var(--bg-base);
            border: 1px solid var(--border);
            padding: 0.85rem 1rem;
            border-radius: 10px;
            font-family: var(--font-mono);
            font-size: 0.825rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.2s ease;
        }

        .dir-pill:hover {
            border-color: var(--border-active);
            color: var(--text-main);
            background: var(--bg-card-hover);
        }

        footer {
            border-top: 1px solid var(--border);
            padding: 2.5rem 0;
            background: var(--bg-base);
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .footer-metrics {
            font-family: var(--font-mono);
            font-size: 0.8rem;
            color: var(--text-muted);
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .footer-metrics span span { color: var(--text-main); }

        .footer-links {
            display: flex;
            gap: 1.5rem;
        }

        .footer-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s;
        }

        .footer-links a:hover { color: var(--primary); }

        @media(max-width: 768px) {
            .hero { padding: 4rem 0 3rem; }
            .structure-container { padding: 1.5rem; }
        }
    </style>
</head>
<body>

<div class="bg-glow"></div>

<!-- HEADER / NAV -->
<header>
    <div class="container nav-content">
        <a href="#" class="logo">
            <div class="logo-badge">🔥</div>
            LavaLust
        </a>
        <div class="nav-actions">
            <a href="https://github.com/ronmarasigan/LavaLust" target="_blank" class="btn btn-outline">GitHub</a>
            <a href="https://lavalust.netlify.app/docs/" target="_blank" class="btn btn-primary">Documentation</a>
        </div>
    </div>
</header>

<main class="container">
    <!-- HERO SECTION -->
    <section class="hero">
        <div class="version-tag">
            <span>●</span> Version <?php echo config_item('VERSION') ?? '4.x'; ?> Available
        </div>
        <h1>HI JHonas Cabanero<br><span class="highlight">Welcome Back!</span></h1>
        <p>A lightweight, high-performance PHP MVC framework designed for developers who want robust features without framework bloat.</p>
        <div class="hero-buttons">
            <a href="https://lavalust.netlify.app/docs/" target="_blank" class="btn btn-primary">Get Started</a>
            <a href="https://github.com/ronmarasigan/LavaLust" target="_blank" class="btn btn-outline">Explore Repository</a>
        </div>
    </section>

    <!-- STATS -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number">MVC<span>+</span></div>
            <div class="stat-label">Architecture</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><span>4</span></div>
            <div class="stat-label">DB Drivers</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">HMVC<span>✓</span></div>
            <div class="stat-label">Modular Support</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">REST<span>*</span></div>
            <div class="stat-label">API Ready</div>
        </div>
    </div>

    <!-- FEATURES -->
    <section style="margin-bottom: 6rem;">
        <div class="section-header">
            <span class="section-tag">// Core Features</span>
            <h2 class="section-title">Everything you need to ship fast.</h2>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Blazing Fast Routing</h3>
                <p>Advanced routing engine supporting parameter constraints, HTTP methods, route groups, and closures.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🗄️</div>
                <h3>Eloquent-Style ORM</h3>
                <p>Clean query building with powerful relationship handling, eager loading, soft deletes, and automatic timestamps.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📦</div>
                <h3>HMVC Modular Design</h3>
                <p>Scale applications easily using self-contained modules containing their own controllers, models, and views.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🛡️</div>
                <h3>Security & Validation</h3>
                <p>Built-in CSRF protection, comprehensive input filtering, session handling, and robust form validation helpers.</p>
            </div>
        </div>
    </section>

    <!-- PROJECT STRUCTURE -->
    <div class="structure-container">
        <span class="section-tag">// Layout Architecture</span>
        <h2 class="section-title">Clean Directory Tree</h2>
        <p style="color: var(--text-muted); margin-top: 0.5rem;">A sensible file tree blueprint designed to keep large applications cleanly separated.</p>
        
        <div class="dir-grid">
            <?php
            $dirs = [
                ['app/config', '⚙'],
                ['app/controllers', '🎮'],
                ['app/helpers', '🔧'],
                ['app/libraries', '📚'],
                ['app/language', '🌐'],
                ['app/middlewares', '🛡️'],
                ['app/migrations', '🔄'],
                ['app/models', '🗄'],
                ['app/modules', '📦'],
                ['app/views', '🖼'],
                ['public/', '🌍'],
                ['runtime/', '⚡'],
            ];
            foreach ($dirs as [$name, $icon]): ?>
            <div class="dir-pill">
                <span><?php echo $icon; ?></span>
                <span><?php echo $name; ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<!-- FOOTER -->
<footer>
    <div class="container footer-content">
        <div class="footer-metrics">
            <span>Rendered: <span><?php echo lava_instance()->performance->elapsed_time('lavalust'); ?>s</span></span>
            <span>Memory: <span><?php echo lava_instance()->performance->memory_usage(); ?></span></span>
            <?php if(config_item('environment') === 'development'): ?>
            <span style="color: var(--primary);">● Dev Mode</span>
            <?php endif; ?>
        </div>
        <div class="footer-links">
            <a href="https://github.com/ronmarasigan/LavaLust" target="_blank">GitHub</a>
            <a href="https://lavalust.netlify.app/docs/" target="_blank">Documentation</a>
            <a href="https://opensource.org/licenses/MIT" target="_blank">MIT License</a>
        </div>
    </div>
</footer>

</body>
</html>