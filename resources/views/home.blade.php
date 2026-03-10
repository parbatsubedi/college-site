<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fusion College of Technology - Quality Education for Future Professionals</title>
    <script src="/_sdk/element_sdk.js"></script>
    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #077E86;
            --primary-light: #2A7970;
            --secondary: #CF5E1C;
            --accent: #FD6406;
            --accent-light: #FDF0E6;
            --midnight: #172566;
            --bg-light: #ffffff;
            --bg-section: #f8f9fa;
            --text-dark: #1a1a1a;
            --text-muted: #6b7280;
            --card-bg: #ffffff;
            --border-color: #e5e7eb;
            --footer-bg: #172566;
            --shadow: rgba(0, 0, 0, 0.1);
        }

        [data-theme="dark"] {
            --primary: #0aa5af;
            --primary-light: #2A7970;
            --secondary: #FD6406;
            --accent: #CF5E1C;
            --accent-light: #3a2a1a;
            --midnight: #1e3170;
            --bg-light: #0f172a;
            --bg-section: #1e293b;
            --text-dark: #f1f5f9;
            --text-muted: #94a3b8;
            --card-bg: #1e293b;
            --border-color: #334155;
            --footer-bg: #020617;
            --shadow: rgba(0, 0, 0, 0.3);
        }

        body {
            background-color: var(--bg-light);
            color: var(--text-dark);
            transition: all 0.3s ease;
            overflow-x: hidden;
        }

        /* Header Styles */
        .main-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: var(--bg-light);
            box-shadow: 0 2px 10px var(--shadow);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .top-bar {
            background: var(--midnight);
            color: white;
            padding: 8px 0;
            font-size: 13px;
            max-height: 50px;
            opacity: 1;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .nav-pill-wrapper {
            padding: 0;
            transition: padding 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .main-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            background: transparent;
            border-radius: 0;
            border: 1px solid transparent;
            box-shadow: none;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* === SCROLLED: Pill transformation === */
        .main-header.scrolled {
            background: transparent;
            box-shadow: none;
        }

        .main-header.scrolled .top-bar {
            max-height: 0;
            padding: 0;
            opacity: 0;
        }

        .main-header.scrolled .nav-pill-wrapper {
            padding: 10px 20px;
        }

        .main-header.scrolled .main-nav {
            padding: 8px 25px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 50px;
            border: 1px solid var(--border-color);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
        }

        [data-theme="dark"] .main-header.scrolled .main-nav {
            background: rgba(15, 23, 42, 0.95);
            border: 1px solid var(--border-color);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--primary);
            transition: color 0.4s ease;
        }

        .logo-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .main-header.scrolled .logo-icon {
            width: 38px;
            height: 38px;
            border-radius: 8px;
        }

        .logo-text {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -0.5px;
            transition: font-size 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .main-header.scrolled .logo-text {
            font-size: 17px;
        }

        .logo-tagline {
            font-size: 11px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .main-header.scrolled .logo-tagline {
            font-size: 9px;
        }

        /* Navigation Menu */
        .nav-menu {
            display: flex;
            list-style: none;
            gap: 5px;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            display: block;
            padding: 12px 18px;
            color: var(--text-dark);
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .main-header.scrolled .nav-link {
            padding: 8px 14px;
            font-size: 14px;
            border-radius: 25px;
        }

        .nav-link:hover,
        .nav-link.active {
            background: var(--primary);
            color: white;
        }

        .nav-link.has-dropdown::after {
            content: '▼';
            font-size: 8px;
            margin-left: 6px;
            vertical-align: middle;
        }

        /* Mega Menu */
        .mega-menu {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(10px);
            background: var(--card-bg);
            min-width: 700px;
            border-radius: 12px;
            box-shadow: 0 20px 50px var(--shadow);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            padding: 25px;
            border: 1px solid var(--border-color);
        }

        .nav-item:hover .mega-menu {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }

        .mega-menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .mega-menu-column h4 {
            color: var(--primary);
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
            padding-bottom: 8px;
            border-bottom: 2px solid var(--secondary);
        }

        .mega-menu-column ul {
            list-style: none;
        }

        .mega-menu-column li {
            margin-bottom: 8px;
        }

        .mega-menu-column a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 14px;
            display: block;
            padding: 6px 0;
            transition: all 0.2s ease;
        }

        .mega-menu-column a:hover {
            color: var(--primary);
            padding-left: 8px;
        }

        /* Dropdown Menu */
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: var(--card-bg);
            min-width: 220px;
            border-radius: 8px;
            box-shadow: 0 10px 30px var(--shadow);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            transform: translateY(10px);
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        .nav-item:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-menu a {
            display: block;
            padding: 12px 20px;
            color: var(--text-dark);
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s ease;
            border-bottom: 1px solid var(--border-color);
        }

        .dropdown-menu a:last-child {
            border-bottom: none;
        }

        .dropdown-menu a:hover {
            background: var(--primary);
            color: white;
        }

        /* Theme Toggle */
        .theme-toggle {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 16px;
            background: var(--bg-section);
            border-radius: 30px;
            cursor: pointer;
            border: 1px solid var(--border-color);
        }

        .toggle-switch {
            width: 44px;
            height: 24px;
            background: var(--border-color);
            border-radius: 12px;
            position: relative;
            transition: all 0.3s ease;
        }

        .toggle-switch::after {
            content: '';
            position: absolute;
            width: 18px;
            height: 18px;
            background: white;
            border-radius: 50%;
            top: 3px;
            left: 3px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        [data-theme="dark"] .toggle-switch {
            background: var(--primary);
        }

        [data-theme="dark"] .toggle-switch::after {
            left: 23px;
        }

        .theme-icon {
            font-size: 16px;
        }

        /* Hero Section */
        .hero {
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .hero-slider {
            position: relative;
            height: 100%;
        }

        .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease;
        }

        .hero-slide.active {
            opacity: 1;
        }

        .hero-slide-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
        }

        .hero-slide-1 .hero-slide-bg {
            background: linear-gradient(135deg, #077E86 0%, #2A7970 50%, #077E86 100%);
        }

        .hero-slide-2 .hero-slide-bg {
            background: linear-gradient(135deg, #172566 0%, #1e3170 50%, #172566 100%);
        }

        .hero-slide-3 .hero-slide-bg {
            background: linear-gradient(135deg, #077E86 0%, #172566 50%, #2A7970 100%);
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
        }

        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            width: 90%;
            max-width: 900px;
            z-index: 10;
        }

        .hero-badge {
            display: inline-block;
            background: var(--secondary);
            color: var(--primary);
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
            animation: fadeInUp 0.8s ease;
        }

        .hero-title {
            font-size: 52px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 20px;
            text-shadow: 2px 4px 20px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 0.8s ease 0.2s both;
        }

        .hero-subtitle {
            font-size: 20px;
            opacity: 0.95;
            margin-bottom: 35px;
            line-height: 1.6;
            animation: fadeInUp 0.8s ease 0.4s both;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 0.8s ease 0.6s both;
        }

        .btn {
            display: inline-block;
            padding: 16px 35px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background: var(--secondary);
            color: var(--primary);
        }

        .btn-primary:hover {
            background: var(--accent);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(201, 162, 39, 0.4);
        }

        .btn-outline {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-outline:hover {
            background: white;
            color: var(--primary);
            transform: translateY(-3px);
        }

        .hero-indicators {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
            z-index: 10;
        }

        .hero-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .hero-indicator.active {
            background: var(--secondary);
            width: 35px;
            border-radius: 6px;
        }

        /* Campus Graphics in Hero */
        .hero-graphics {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .building-silhouette {
            position: absolute;
            bottom: 0;
            fill: rgba(255, 255, 255, 0.1);
        }

        /* About Section */
        .section {
            padding: 100px 0;
        }

        .section-alt {
            background: var(--bg-section);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-badge {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            padding: 6px 18px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }

        .section-title {
            font-size: 40px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .section-subtitle {
            font-size: 18px;
            color: var(--text-muted);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.7;
        }

        /* About Grid */
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .about-content h3 {
            font-size: 32px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
        }

        .about-content p {
            color: var(--text-muted);
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .about-features {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 30px;
        }

        .about-feature {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .about-feature-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
        }

        .about-feature span {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .about-image {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 30px 60px var(--shadow);
        }

        .about-image-main {
            width: 100%;
            height: 450px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        /* Campus Scene SVG */
        .campus-scene {
            width: 100%;
            height: 100%;
        }

        .about-badge {
            position: absolute;
            bottom: 30px;
            right: 30px;
            background: var(--secondary);
            color: var(--primary);
            padding: 20px 25px;
            border-radius: 12px;
            text-align: center;
        }

        .about-badge-number {
            font-size: 36px;
            font-weight: 700;
            display: block;
        }

        .about-badge-text {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Stats */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-top: 60px;
        }

        .stat-card {
            background: var(--card-bg);
            padding: 35px 25px;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 10px 40px var(--shadow);
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }

        .stat-card:hover {
            transform: translateY(-10px);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 24px;
            color: white;
        }

        .stat-number {
            font-size: 42px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 8px;
        }

        .stat-label {
            font-size: 14px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Accreditations */
        .accreditations {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 50px;
            flex-wrap: wrap;
        }

        .accreditation-badge {
            display: flex;
            align-items: center;
            gap: 12px;
            background: var(--card-bg);
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 5px 20px var(--shadow);
            border: 1px solid var(--border-color);
        }

        .accreditation-icon {
            width: 45px;
            height: 45px;
            background: var(--primary);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 12px;
        }

        .accreditation-text {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-dark);
        }

        /* Courses Section */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .course-card {
            background: var(--card-bg);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 40px var(--shadow);
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }

        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px var(--shadow);
        }

        .course-image {
            height: 180px;
            position: relative;
            overflow: hidden;
        }

        .course-image-bg {
            width: 100%;
            height: 100%;
            transition: transform 0.5s ease;
        }

        .course-card:hover .course-image-bg {
            transform: scale(1.1);
        }

        .course-category {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--secondary);
            color: var(--primary);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .course-content {
            padding: 25px;
        }

        .course-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 12px;
        }

        .course-description {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .course-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }

        .course-duration {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: var(--text-muted);
        }

        .btn-small {
            padding: 10px 20px;
            font-size: 13px;
        }

        /* Campus Life */
        .campus-gallery {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .gallery-item {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            aspect-ratio: 1;
            cursor: pointer;
        }

        .gallery-item:nth-child(1) {
            grid-column: span 2;
            grid-row: span 2;
        }

        .gallery-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-item:hover .gallery-image {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: flex-end;
            padding: 20px;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-title {
            color: white;
            font-size: 16px;
            font-weight: 600;
        }

        /* SVG Campus Images */
        .campus-svg {
            width: 100%;
            height: 100%;
        }

        /* Events Section */
        .events-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .event-card {
            background: var(--card-bg);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 40px var(--shadow);
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }

        .event-card:hover {
            transform: translateY(-8px);
        }

        .event-image {
            height: 160px;
            position: relative;
        }

        .event-date {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--primary);
            color: white;
            padding: 12px 15px;
            border-radius: 10px;
            text-align: center;
        }

        .event-day {
            font-size: 24px;
            font-weight: 700;
            display: block;
        }

        .event-month {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .event-content {
            padding: 25px;
        }

        .event-category {
            display: inline-block;
            background: var(--bg-section);
            color: var(--primary);
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .event-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .event-location {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: var(--text-muted);
        }

        /* Testimonials */
        .testimonials-slider {
            position: relative;
            max-width: 900px;
            margin: 0 auto;
        }

        .testimonial-card {
            background: var(--card-bg);
            padding: 50px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 20px 60px var(--shadow);
            border: 1px solid var(--border-color);
        }

        .testimonial-quote {
            font-size: 22px;
            line-height: 1.8;
            color: var(--text-dark);
            margin-bottom: 30px;
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .testimonial-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid var(--secondary);
        }

        .testimonial-avatar svg {
            width: 100%;
            height: 100%;
        }

        .testimonial-info h4 {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 4px;
        }

        .testimonial-info span {
            font-size: 14px;
            color: var(--text-muted);
        }

        .testimonial-dots {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }

        .testimonial-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--border-color);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .testimonial-dot.active {
            background: var(--primary);
            width: 30px;
            border-radius: 5px;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--primary) 0%, #0f172a 100%);
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .cta-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.1;
        }

        .cta-content {
            position: relative;
            text-align: center;
            color: white;
            z-index: 1;
        }

        .cta-title {
            font-size: 44px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .cta-subtitle {
            font-size: 18px;
            opacity: 0.9;
            margin-bottom: 35px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Footer */
        .footer {
            background: var(--footer-bg);
            color: #94a3b8;
            padding: 80px 0 30px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 50px;
            margin-bottom: 60px;
        }

        .footer-brand .logo {
            color: white;
            margin-bottom: 20px;
        }

        .footer-brand .logo-icon {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%);
        }

        .footer-brand p {
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .footer-social {
            display: flex;
            gap: 12px;
        }

        .footer-social a {
            width: 40px;
            height: 40px;
            background: #1e293b;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-social a:hover {
            background: var(--primary);
            color: white;
        }

        .footer-column h4 {
            color: white;
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: #94a3b8;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s ease;
        }

        .footer-links a:hover {
            color: var(--secondary);
            padding-left: 5px;
        }

        .footer-bottom {
            padding-top: 30px;
            border-top: 1px solid #1e293b;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .footer-copyright {
            font-size: 14px;
        }

        .footer-policies {
            display: flex;
            gap: 25px;
        }

        .footer-policies a {
            color: #94a3b8;
            text-decoration: none;
            font-size: 13px;
            transition: color 0.2s ease;
        }

        .footer-policies a:hover {
            color: var(--secondary);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Mobile Navigation */
        .mobile-menu-btn {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 10px;
        }

        .mobile-menu-btn span {
            width: 25px;
            height: 3px;
            background: var(--text-dark);
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        /* Page Banner */
        .page-banner {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            padding: 120px 0 80px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .page-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .page-banner-content {
            position: relative;
            z-index: 1;
        }

        .page-banner h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .page-banner p {
            font-size: 18px;
            opacity: 0.9;
        }

        .breadcrumb {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
            font-size: 14px;
        }

        .breadcrumb a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            color: white;
        }

        .breadcrumb span {
            opacity: 0.6;
        }

        /* Contact Form */
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
        }

        .contact-info-card {
            background: var(--card-bg);
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 40px var(--shadow);
            border: 1px solid var(--border-color);
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
        }

        .contact-info-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            flex-shrink: 0;
        }

        .contact-info-content h4 {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .contact-info-content p {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.6;
        }

        .contact-form {
            background: var(--card-bg);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px var(--shadow);
            border: 1px solid var(--border-color);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid var(--border-color);
            border-radius: 10px;
            font-size: 15px;
            background: var(--bg-light);
            color: var(--text-dark);
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(30, 58, 95, 0.1);
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* Map */
        .map-container {
            margin-top: 60px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px var(--shadow);
        }

        .map-placeholder {
            height: 400px;
            background: var(--bg-section);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Page Navigation */
        .page-nav {
            background: var(--bg-section);
            padding: 15px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .page-nav-links {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .page-nav-link {
            padding: 10px 20px;
            color: var(--text-dark);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .page-nav-link:hover,
        .page-nav-link.active {
            background: var(--primary);
            color: white;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .nav-menu {
                display: none;
            }

            .mobile-menu-btn {
                display: flex;
            }

            .hero-title {
                font-size: 36px;
            }

            .about-grid,
            .contact-grid {
                grid-template-columns: 1fr;
            }

            .courses-grid,
            .events-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .campus-gallery {
                grid-template-columns: repeat(2, 1fr);
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .hero {
                height: 100vh;
            }

            .hero-title {
                font-size: 28px;
            }

            .section {
                padding: 60px 0;
            }

            .section-title {
                font-size: 28px;
            }

            .courses-grid,
            .events-grid {
                grid-template-columns: 1fr;
            }

            .campus-gallery {
                grid-template-columns: 1fr;
            }

            .campus-gallery .gallery-item:nth-child(1) {
                grid-column: span 1;
                grid-row: span 1;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .mega-menu {
                min-width: 100%;
                left: 0;
                transform: translateX(0);
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .cta-title {
                font-size: 28px;
            }
        }

        /* Mobile Menu Overlay */
        .mobile-menu {
            position: fixed;
            top: 0;
            left: -100%;
            width: 85%;
            max-width: 350px;
            height: 100%;
            background: var(--bg-light);
            z-index: 2000;
            transition: left 0.3s ease;
            overflow-y: auto;
            box-shadow: 5px 0 30px rgba(0, 0, 0, 0.2);
        }

        .mobile-menu.open {
            left: 0;
        }

        .mobile-menu-header {
            padding: 20px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .mobile-menu-close {
            width: 40px;
            height: 40px;
            background: var(--bg-section);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 24px;
            color: var(--text-dark);
        }

        .mobile-menu-nav {
            padding: 20px;
        }

        .mobile-menu-nav a {
            display: block;
            padding: 15px 0;
            color: var(--text-dark);
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            border-bottom: 1px solid var(--border-color);
        }

        .mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .mobile-menu-overlay.open {
            opacity: 1;
            visibility: visible;
        }

        /* Toast Notification */
        .toast {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: var(--primary);
            color: white;
            padding: 16px 24px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 3000;
        }

        .toast.show {
            transform: translateY(0);
            opacity: 1;
        }
    </style>
</head>

<body>
    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay" id="mobileOverlay"></div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-menu-header">
            <a href="#" class="logo">
                <div class="logo-icon">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none">
                        <path d="M15 2L3 9v12l12 7 12-7V9L15 2z" fill="white" fill-opacity="0.2" />
                        <path d="M15 5L6 10v10l9 5 9-5V10l-9-5z" fill="white" />
                        <circle cx="15" cy="15" r="4" fill="#077E86" />
                    </svg>
                </div>
                <div>
                    <div class="logo-text">Fusion College</div>
                </div>
            </a>
            <button class="mobile-menu-close" id="mobileClose">×</button>
        </div>
        <nav class="mobile-menu-nav">
            <a href="#home">Home</a>
            <a href="#about">About Us</a>
            <a href="#courses">Courses</a>
            <a href="#admissions">Admissions</a>
            <a href="#events">Events</a>
            <a href="#contact">Contact</a>
            <a href="#">Student Portal</a>
        </nav>
    </div>

    <!-- Toast Notification -->
    <div class="toast" id="toast">Message sent successfully!</div>

    <!-- Header -->
    <header class="main-header">
        <!-- Top Bar -->
        <div class="top-bar">
            <div class="nav-container">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; gap: 25px;">
                        <span>📞 1300 123 456</span>
                        <span>✉️ info@pacificinstitute.edu.au</span>
                        <span>📍 Sydney, Australia</span>
                    </div>
                    <div style="display: flex; gap: 15px; align-items: center;">
                        <span>RTO: 45123</span>
                        <span>CRICOS: 03456J</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->
        <div class="nav-container nav-pill-wrapper">
            <nav class="main-nav">
                <a href="#home" class="logo">
                    <div class="logo-icon">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none">
                            <path d="M15 2L3 9v12l12 7 12-7V9L15 2z" fill="white" fill-opacity="0.3" />
                            <path d="M15 5L6 10v10l9 5 9-5V10l-9-5z" fill="white" />
                            <circle cx="15" cy="15" r="4" fill="#077E86" />
                        </svg>
                    </div>
                    <div>
                        <div class="logo-text">Fusion College</div>
                        <div class="logo-tagline">of Technology</div>
                    </div>
                </a>

                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#home" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link has-dropdown">About Us</a>
                        <div class="dropdown-menu">
                            <a href="#about">Our Story</a>
                            <a href="#about">Mission & Vision</a>
                            <a href="#about">Leadership</a>
                            <a href="#about">Campus & Facilities</a>
                            <a href="#about">Accreditations</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#courses" class="nav-link has-dropdown">Courses</a>
                        <div class="mega-menu">
                            <div class="mega-menu-grid">
                                <div class="mega-menu-column">
                                    <h4>Information Technology</h4>
                                    <ul>
                                        <li><a href="#courses">Diploma of Information Technology</a></li>
                                        <li><a href="#courses">Advanced Diploma of IT</a></li>
                                        <li><a href="#courses">Certificate IV in Programming</a></li>
                                        <li><a href="#courses">Diploma of Cybersecurity</a></li>
                                    </ul>
                                </div>
                                <div class="mega-menu-column">
                                    <h4>Business & Management</h4>
                                    <ul>
                                        <li><a href="#courses">Diploma of Business</a></li>
                                        <li><a href="#courses">Advanced Diploma of Leadership</a></li>
                                        <li><a href="#courses">Certificate IV in Accounting</a></li>
                                        <li><a href="#courses">Diploma of Project Management</a></li>
                                    </ul>
                                </div>
                                <div class="mega-menu-column">
                                    <h4>Other Programs</h4>
                                    <ul>
                                        <li><a href="#courses">Early Childhood Education</a></li>
                                        <li><a href="#courses">English Programs (ELICOS)</a></li>
                                        <li><a href="#courses">Humanities & Social Sciences</a></li>
                                        <li><a href="#courses">View All Courses</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#admissions" class="nav-link has-dropdown">Admissions</a>
                        <div class="dropdown-menu">
                            <a href="#admissions">How to Apply</a>
                            <a href="#admissions">Entry Requirements</a>
                            <a href="#admissions">International Students</a>
                            <a href="#admissions">Fees & Payment Plans</a>
                            <a href="#admissions">Policies & Forms</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#events" class="nav-link has-dropdown">Events</a>
                        <div class="dropdown-menu">
                            <a href="#events">Upcoming Events</a>
                            <a href="#events">Workshops</a>
                            <a href="#events">Graduation Ceremony</a>
                            <a href="#events">Student Activities</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Contact</a>
                    </li>
                </ul>

                <div style="display: flex; align-items: center; gap: 15px;">
                    <div class="theme-toggle" id="themeToggle">
                        <span class="theme-icon">☀️</span>
                        <div class="toggle-switch"></div>
                        <span class="theme-icon">🌙</span>
                    </div>
                    <a href="#" class="btn btn-primary btn-small" style="display: none;">Student Portal</a>
                    <div class="mobile-menu-btn" id="mobileMenuBtn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-slider">
            <div class="hero-slide hero-slide-1 active">
                <div class="hero-slide-bg">
                    <!-- Campus Building SVG Background -->
                    <svg class="campus-scene" viewBox="0 0 1920 1080" preserveAspectRatio="xMidYMid slice">
                        <defs>
                            <linearGradient id="skyGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" style="stop-color:#077E86" />
                                <stop offset="100%" style="stop-color:#2d5a8e" />
                            </linearGradient>
                            <linearGradient id="buildingGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" style="stop-color:#34495e" />
                                <stop offset="100%" style="stop-color:#2c3e50" />
                            </linearGradient>
                        </defs>
                        <rect width="1920" height="1080" fill="url(#skyGrad)" />

                        <!-- Stars -->
                        <g fill="white" opacity="0.3">
                            <circle cx="100" cy="100" r="2" />
                            <circle cx="300" cy="150" r="1.5" />
                            <circle cx="500" cy="80" r="2" />
                            <circle cx="700" cy="200" r="1" />
                            <circle cx="900" cy="120" r="2" />
                            <circle cx="1100" cy="90" r="1.5" />
                            <circle cx="1300" cy="180" r="2" />
                            <circle cx="1500" cy="60" r="1" />
                            <circle cx="1700" cy="140" r="2" />
                            <circle cx="1800" cy="200" r="1.5" />
                        </g>

                        <!-- Ground -->
                        <rect x="0" y="750" width="1920" height="330" fill="#1a472a" />

                        <!-- Main Building -->
                        <g transform="translate(400, 300)">
                            <rect x="0" y="150" width="500" height="300" fill="#3d566e" rx="5" />
                            <rect x="50" y="200" width="400" height="250" fill="#2c3e50" />

                            <!-- Windows -->
                            <g fill="#f39c12" opacity="0.8">
                                <rect x="80" y="220" width="50" height="60" rx="3" />
                                <rect x="150" y="220" width="50" height="60" rx="3" />
                                <rect x="220" y="220" width="50" height="60" rx="3" />
                                <rect x="290" y="220" width="50" height="60" rx="3" />
                                <rect x="360" y="220" width="50" height="60" rx="3" />

                                <rect x="80" y="300" width="50" height="60" rx="3" />
                                <rect x="150" y="300" width="50" height="60" rx="3" />
                                <rect x="220" y="300" width="50" height="60" rx="3" />
                                <rect x="290" y="300" width="50" height="60" rx="3" />
                                <rect x="360" y="300" width="50" height="60" rx="3" />
                            </g>

                            <!-- Central Tower -->
                            <rect x="175" y="50" width="150" height="100" fill="#3d566e" />
                            <polygon points="250,0 175,50 325,50" fill="#5d6d7e" />

                            <!-- Clock -->
                            <circle cx="250" cy="90" r="25" fill="#ecf0f1" />
                            <line x1="250" y1="90" x2="250" y2="72" stroke="#2c3e50" stroke-width="2" />
                            <line x1="250" y1="90" x2="262" y2="90" stroke="#2c3e50" stroke-width="2" />

                            <!-- Entrance -->
                            <rect x="200" y="380" width="100" height="70" fill="#2c3e50" />
                            <rect x="215" y="390" width="70" height="60" fill="#1a252f" />

                            <!-- Columns -->
                            <rect x="190" y="350" width="15" height="100" fill="#bdc3c7" />
                            <rect x="295" y="350" width="15" height="100" fill="#bdc3c7" />
                        </g>

                        <!-- Side Building Left -->
                        <g transform="translate(100, 400)">
                            <rect x="0" y="100" width="250" height="250" fill="#34495e" />
                            <g fill="#f39c12" opacity="0.7">
                                <rect x="30" y="130" width="40" height="50" rx="2" />
                                <rect x="90" y="130" width="40" height="50" rx="2" />
                                <rect x="150" y="130" width="40" height="50" rx="2" />
                                <rect x="30" y="200" width="40" height="50" rx="2" />
                                <rect x="90" y="200" width="40" height="50" rx="2" />
                                <rect x="150" y="200" width="40" height="50" rx="2" />
                                <rect x="30" y="270" width="40" height="50" rx="2" />
                                <rect x="90" y="270" width="40" height="50" rx="2" />
                                <rect x="150" y="270" width="40" height="50" rx="2" />
                            </g>
                        </g>

                        <!-- Side Building Right -->
                        <g transform="translate(960, 380)">
                            <rect x="0" y="100" width="300" height="270" fill="#34495e" />
                            <rect x="0" y="0" width="300" height="100" fill="#3d566e" />
                            <g fill="#f39c12" opacity="0.7">
                                <rect x="30" y="30" width="45" height="55" rx="2" />
                                <rect x="95" y="30" width="45" height="55" rx="2" />
                                <rect x="160" y="30" width="45" height="55" rx="2" />
                                <rect x="225" y="30" width="45" height="55" rx="2" />
                                <rect x="30" y="130" width="45" height="55" rx="2" />
                                <rect x="95" y="130" width="45" height="55" rx="2" />
                                <rect x="160" y="130" width="45" height="55" rx="2" />
                                <rect x="225" y="130" width="45" height="55" rx="2" />
                                <rect x="30" y="210" width="45" height="55" rx="2" />
                                <rect x="95" y="210" width="45" height="55" rx="2" />
                                <rect x="160" y="210" width="45" height="55" rx="2" />
                                <rect x="225" y="210" width="45" height="55" rx="2" />
                            </g>
                        </g>

                        <!-- Trees -->
                        <g fill="#2d5016">
                            <ellipse cx="180" cy="720" rx="60" ry="80" />
                            <ellipse cx="350" cy="730" rx="50" ry="70" />
                            <ellipse cx="1350" cy="720" rx="55" ry="75" />
                            <ellipse cx="1550" cy="735" rx="45" ry="65" />
                            <ellipse cx="1700" cy="720" rx="60" ry="80" />
                        </g>
                        <g fill="#5d4e37">
                            <rect x="170" y="720" width="20" height="60" />
                            <rect x="340" y="730" width="18" height="50" />
                            <rect x="1340" y="720" width="20" height="55" />
                            <rect x="1540" y="735" width="16" height="45" />
                            <rect x="1690" y="720" width="20" height="60" />
                        </g>

                        <!-- Pathway -->
                        <path d="M650 780 Q700 900 750 1000 L850 1000 Q800 900 750 780 Z" fill="#7f8c8d"
                            opacity="0.5" />

                        <!-- Students Group -->
                        <g transform="translate(700, 700)">
                            <!-- Student 1 -->
                            <circle cx="0" cy="-25" r="12" fill="#f5d0c5" />
                            <rect x="-15" y="-10" width="30" height="45" fill="#3498db" rx="5" />
                            <rect x="-12" y="35" width="10" height="25" fill="#2c3e50" />
                            <rect x="2" y="35" width="10" height="25" fill="#2c3e50" />

                            <!-- Student 2 -->
                            <g transform="translate(50, 5)">
                                <circle cx="0" cy="-25" r="12" fill="#d4a574" />
                                <rect x="-15" y="-10" width="30" height="45" fill="#e74c3c" rx="5" />
                                <rect x="-12" y="35" width="10" height="25" fill="#34495e" />
                                <rect x="2" y="35" width="10" height="25" fill="#34495e" />
                            </g>

                            <!-- Student 3 -->
                            <g transform="translate(-45, 10)">
                                <circle cx="0" cy="-25" r="12" fill="#f5d0c5" />
                                <rect x="-15" y="-10" width="30" height="45" fill="#9b59b6" rx="5" />
                                <rect x="-12" y="35" width="10" height="25" fill="#2c3e50" />
                                <rect x="2" y="35" width="10" height="25" fill="#2c3e50" />
                            </g>

                            <!-- Student 4 -->
                            <g transform="translate(100, 0)">
                                <circle cx="0" cy="-25" r="12" fill="#c4a882" />
                                <rect x="-15" y="-10" width="30" height="45" fill="#27ae60" rx="5" />
                                <rect x="-12" y="35" width="10" height="25" fill="#34495e" />
                                <rect x="2" y="35" width="10" height="25" fill="#34495e" />
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="hero-overlay"></div>
            </div>

            <div class="hero-slide hero-slide-2">
                <div class="hero-slide-bg">
                    <!-- Library/Study Scene -->
                    <svg class="campus-scene" viewBox="0 0 1920 1080" preserveAspectRatio="xMidYMid slice">
                        <rect width="1920" height="1080" fill="#0f172a" />

                        <!-- Interior Background -->
                        <rect x="100" y="100" width="1720" height="880" fill="#1e293b" />

                        <!-- Bookshelves -->
                        <g fill="#3f3f46">
                            <rect x="150" y="200" width="300" height="500" />
                            <rect x="1470" y="200" width="300" height="500" />
                        </g>

                        <!-- Books on shelves -->
                        <g>
                            <rect x="160" y="220" width="20" height="60" fill="#ef4444" />
                            <rect x="185" y="230" width="18" height="50" fill="#3b82f6" />
                            <rect x="208" y="225" width="22" height="55" fill="#22c55e" />
                            <rect x="235" y="220" width="15" height="60" fill="#f59e0b" />
                            <rect x="255" y="228" width="20" height="52" fill="#8b5cf6" />

                            <rect x="160" y="300" width="22" height="55" fill="#06b6d4" />
                            <rect x="187" y="295" width="18" height="60" fill="#ec4899" />
                            <rect x="210" y="302" width="20" height="53" fill="#84cc16" />
                            <rect x="235" y="298" width="16" height="57" fill="#f97316" />
                        </g>

                        <!-- Study Tables -->
                        <g fill="#78350f">
                            <rect x="550" y="550" width="350" height="20" rx="3" />
                            <rect x="1020" y="550" width="350" height="20" rx="3" />
                        </g>

                        <!-- Table Legs -->
                        <g fill="#92400e">
                            <rect x="560" y="570" width="15" height="120" />
                            <rect x="875" y="570" width="15" height="120" />
                            <rect x="1030" y="570" width="15" height="120" />
                            <rect x="1345" y="570" width="15" height="120" />
                        </g>

                        <!-- Students at tables -->
                        <!-- Student 1 - Studying -->
                        <g transform="translate(650, 450)">
                            <circle cx="0" cy="0" r="25" fill="#fcd9bd" />
                            <rect x="-30" y="25" width="60" height="80" fill="#3b82f6" rx="8" />
                            <!-- Laptop -->
                            <rect x="-35" y="85" width="70" height="45" fill="#374151" rx="3" />
                            <rect x="-30" y="90" width="60" height="35" fill="#60a5fa" />
                        </g>

                        <!-- Student 2 -->
                        <g transform="translate(800, 460)">
                            <circle cx="0" cy="0" r="25" fill="#d4a574" />
                            <rect x="-30" y="25" width="60" height="80" fill="#ef4444" rx="8" />
                            <!-- Books -->
                            <rect x="-40" y="90" width="30" height="40" fill="#fbbf24" />
                            <rect x="-5" y="95" width="25" height="35" fill="#34d399" />
                        </g>

                        <!-- Student 3 -->
                        <g transform="translate(1120, 455)">
                            <circle cx="0" cy="0" r="25" fill="#fcd9bd" />
                            <rect x="-30" y="25" width="60" height="80" fill="#8b5cf6" rx="8" />
                            <!-- Tablet -->
                            <rect x="-25" y="85" width="50" height="40" fill="#1f2937" rx="5" />
                            <rect x="-20" y="90" width="40" height="30" fill="#a78bfa" />
                        </g>

                        <!-- Student 4 -->
                        <g transform="translate(1270, 465)">
                            <circle cx="0" cy="0" r="25" fill="#c4a882" />
                            <rect x="-30" y="25" width="60" height="80" fill="#22c55e" rx="8" />
                            <!-- Notebook -->
                            <rect x="-30" y="90" width="60" height="35" fill="#fef3c7" />
                            <line x1="-20" y1="100" x2="20" y2="100" stroke="#9ca3af" stroke-width="1" />
                            <line x1="-20" y1="108" x2="20" y2="108" stroke="#9ca3af" stroke-width="1" />
                            <line x1="-20" y1="116" x2="15" y2="116" stroke="#9ca3af" stroke-width="1" />
                        </g>

                        <!-- Pendant Lights -->
                        <g fill="#fbbf24">
                            <ellipse cx="725" cy="150" rx="40" ry="25" />
                            <ellipse cx="1195" cy="150" rx="40" ry="25" />
                        </g>
                        <g stroke="#78350f" stroke-width="2">
                            <line x1="725" y1="0" x2="725" y2="125" />
                            <line x1="1195" y1="0" x2="1195" y2="125" />
                        </g>

                        <!-- Light glow effect -->
                        <ellipse cx="725" cy="400" rx="200" ry="150" fill="#fef3c7" opacity="0.1" />
                        <ellipse cx="1195" cy="400" rx="200" ry="150" fill="#fef3c7" opacity="0.1" />

                        <!-- Windows -->
                        <g fill="#077E86">
                            <rect x="500" y="150" width="150" height="200" rx="5" />
                            <rect x="700" y="150" width="150" height="200" rx="5" />
                            <rect x="1070" y="150" width="150" height="200" rx="5" />
                            <rect x="1270" y="150" width="150" height="200" rx="5" />
                        </g>

                        <!-- Window frames -->
                        <g stroke="#94a3b8" stroke-width="3" fill="none">
                            <rect x="500" y="150" width="150" height="200" rx="5" />
                            <line x1="575" y1="150" x2="575" y2="350" />
                            <line x1="500" y1="250" x2="650" y2="250" />

                            <rect x="700" y="150" width="150" height="200" rx="5" />
                            <line x1="775" y1="150" x2="775" y2="350" />
                            <line x1="700" y1="250" x2="850" y2="250" />

                            <rect x="1070" y="150" width="150" height="200" rx="5" />
                            <line x1="1145" y1="150" x2="1145" y2="350" />
                            <line x1="1070" y1="250" x2="1220" y2="250" />

                            <rect x="1270" y="150" width="150" height="200" rx="5" />
                            <line x1="1345" y1="150" x2="1345" y2="350" />
                            <line x1="1270" y1="250" x2="1420" y2="250" />
                        </g>

                        <!-- Floor -->
                        <rect x="100" y="690" width="1720" height="290" fill="#292524" />
                    </svg>
                </div>
                <div class="hero-overlay"></div>
            </div>

            <div class="hero-slide hero-slide-3">
                <div class="hero-slide-bg">
                    <!-- Graduation Scene -->
                    <svg class="campus-scene" viewBox="0 0 1920 1080" preserveAspectRatio="xMidYMid slice">
                        <defs>
                            <linearGradient id="gradSky" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" style="stop-color:#164e63" />
                                <stop offset="100%" style="stop-color:#0891b2" />
                            </linearGradient>
                        </defs>
                        <rect width="1920" height="1080" fill="url(#gradSky)" />

                        <!-- Clouds -->
                        <g fill="white" opacity="0.3">
                            <ellipse cx="200" cy="150" rx="100" ry="40" />
                            <ellipse cx="280" cy="140" rx="80" ry="35" />
                            <ellipse cx="150" cy="160" rx="60" ry="25" />

                            <ellipse cx="1600" cy="120" rx="90" ry="35" />
                            <ellipse cx="1680" cy="130" rx="70" ry="30" />

                            <ellipse cx="900" cy="100" rx="120" ry="45" />
                            <ellipse cx="1000" cy="90" rx="80" ry="30" />
                        </g>

                        <!-- Stage/Platform -->
                        <rect x="200" y="600" width="1520" height="200" fill="#1e293b" />
                        <rect x="200" y="600" width="1520" height="20" fill="#334155" />

                        <!-- Podium -->
                        <rect x="880" y="450" width="160" height="170" fill="#475569" />
                        <rect x="895" y="460" width="130" height="100" fill="#077E86" />
                        <circle cx="960" cy="510" r="30" fill="#c9a227" opacity="0.8" />

                        <!-- Graduation Banner -->
                        <rect x="400" y="200" width="1120" height="150" fill="#077E86" rx="10" />
                        <text x="960" y="290" text-anchor="middle" fill="white" font-size="48" font-weight="bold"
                            font-family="Arial">GRADUATION 2024</text>

                        <!-- Graduates Row 1 -->
                        <g transform="translate(300, 520)">
                            <!-- Graduate 1 -->
                            <g transform="translate(0, 0)">
                                <rect x="-25" y="20" width="50" height="100" fill="#1e293b" rx="5" />
                                <circle cx="0" cy="0" r="20" fill="#fcd9bd" />
                                <rect x="-20" y="-35" width="40" height="8" fill="#1e293b" />
                                <polygon points="0,-45 -25,-35 25,-35" fill="#1e293b" />
                                <line x1="0" y1="-45" x2="20" y2="-55" stroke="#c9a227" stroke-width="2" />
                                <circle cx="20" cy="-55" r="5" fill="#c9a227" />
                            </g>

                            <!-- Graduate 2 -->
                            <g transform="translate(100, 10)">
                                <rect x="-25" y="20" width="50" height="100" fill="#1e293b" rx="5" />
                                <circle cx="0" cy="0" r="20" fill="#d4a574" />
                                <rect x="-20" y="-35" width="40" height="8" fill="#1e293b" />
                                <polygon points="0,-45 -25,-35 25,-35" fill="#1e293b" />
                                <line x1="0" y1="-45" x2="20" y2="-55" stroke="#c9a227" stroke-width="2" />
                                <circle cx="20" cy="-55" r="5" fill="#c9a227" />
                            </g>

                            <!-- Graduate 3 -->
                            <g transform="translate(200, 5)">
                                <rect x="-25" y="20" width="50" height="100" fill="#1e293b" rx="5" />
                                <circle cx="0" cy="0" r="20" fill="#fcd9bd" />
                                <rect x="-20" y="-35" width="40" height="8" fill="#1e293b" />
                                <polygon points="0,-45 -25,-35 25,-35" fill="#1e293b" />
                                <line x1="0" y1="-45" x2="20" y2="-55" stroke="#c9a227" stroke-width="2" />
                                <circle cx="20" cy="-55" r="5" fill="#c9a227" />
                            </g>
                        </g>

                        <!-- Graduates Row 2 -->
                        <g transform="translate(1120, 520)">
                            <!-- Graduate 4 -->
                            <g transform="translate(0, 0)">
                                <rect x="-25" y="20" width="50" height="100" fill="#1e293b" rx="5" />
                                <circle cx="0" cy="0" r="20" fill="#c4a882" />
                                <rect x="-20" y="-35" width="40" height="8" fill="#1e293b" />
                                <polygon points="0,-45 -25,-35 25,-35" fill="#1e293b" />
                                <line x1="0" y1="-45" x2="20" y2="-55" stroke="#c9a227" stroke-width="2" />
                                <circle cx="20" cy="-55" r="5" fill="#c9a227" />
                            </g>

                            <!-- Graduate 5 -->
                            <g transform="translate(100, 8)">
                                <rect x="-25" y="20" width="50" height="100" fill="#1e293b" rx="5" />
                                <circle cx="0" cy="0" r="20" fill="#fcd9bd" />
                                <rect x="-20" y="-35" width="40" height="8" fill="#1e293b" />
                                <polygon points="0,-45 -25,-35 25,-35" fill="#1e293b" />
                                <line x1="0" y1="-45" x2="20" y2="-55" stroke="#c9a227" stroke-width="2" />
                                <circle cx="20" cy="-55" r="5" fill="#c9a227" />
                            </g>

                            <!-- Graduate 6 -->
                            <g transform="translate(200, 3)">
                                <rect x="-25" y="20" width="50" height="100" fill="#1e293b" rx="5" />
                                <circle cx="0" cy="0" r="20" fill="#d4a574" />
                                <rect x="-20" y="-35" width="40" height="8" fill="#1e293b" />
                                <polygon points="0,-45 -25,-35 25,-35" fill="#1e293b" />
                                <line x1="0" y1="-45" x2="20" y2="-55" stroke="#c9a227" stroke-width="2" />
                                <circle cx="20" cy="-55" r="5" fill="#c9a227" />
                            </g>
                        </g>

                        <!-- Confetti -->
                        <g>
                            <rect x="150" y="300" width="15" height="15" fill="#ef4444"
                                transform="rotate(45 157 307)" />
                            <rect x="350" y="250" width="12" height="12" fill="#3b82f6"
                                transform="rotate(30 356 256)" />
                            <rect x="550" y="320" width="14" height="14" fill="#22c55e"
                                transform="rotate(60 557 327)" />
                            <rect x="750" y="280" width="13" height="13" fill="#f59e0b"
                                transform="rotate(15 756 286)" />
                            <rect x="1150" y="260" width="15" height="15" fill="#8b5cf6"
                                transform="rotate(45 1157 267)" />
                            <rect x="1350" y="310" width="12" height="12" fill="#ec4899"
                                transform="rotate(30 1356 316)" />
                            <rect x="1550" y="270" width="14" height="14" fill="#06b6d4"
                                transform="rotate(75 1557 277)" />
                            <rect x="1700" y="340" width="13" height="13" fill="#84cc16"
                                transform="rotate(20 1706 346)" />
                        </g>

                        <!-- Ground/Grass -->
                        <rect x="0" y="800" width="1920" height="280" fill="#166534" />

                        <!-- Audience silhouettes -->
                        <g fill="#0f172a" opacity="0.5">
                            <ellipse cx="400" cy="900" rx="80" ry="60" />
                            <ellipse cx="550" cy="910" rx="70" ry="55" />
                            <ellipse cx="700" cy="895" rx="85" ry="65" />
                            <ellipse cx="850" cy="905" rx="75" ry="58" />
                            <ellipse cx="1000" cy="900" rx="80" ry="60" />
                            <ellipse cx="1150" cy="910" rx="70" ry="55" />
                            <ellipse cx="1300" cy="895" rx="85" ry="65" />
                            <ellipse cx="1450" cy="905" rx="75" ry="58" />
                            <ellipse cx="1600" cy="900" rx="80" ry="60" />
                        </g>
                    </svg>
                </div>
                <div class="hero-overlay"></div>
            </div>
        </div>

        <div class="hero-content">
            <span class="hero-badge">RTO: 45123 | CRICOS: 03456J</span>
            <h1 class="hero-title" id="heroTitle">Empowering Future Professionals Through Quality Education</h1>
            <p class="hero-subtitle">Join Australia's leading vocational education provider. Gain industry-recognized
                qualifications with hands-on learning experiences.</p>
            <div class="hero-buttons">
                <a href="#admissions" class="btn btn-primary">Apply Now</a>
                <a href="#courses" class="btn btn-outline">Explore Courses</a>
            </div>
        </div>

        <div class="hero-indicators">
            <div class="hero-indicator active" data-slide="0"></div>
            <div class="hero-indicator" data-slide="1"></div>
            <div class="hero-indicator" data-slide="2"></div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section" id="about">
        <div class="container">
            <div class="about-grid fade-in">
                <div class="about-content">
                    <span class="section-badge">About Us</span>
                    <h3>Building Careers, Shaping Futures Since 2005</h3>
                    <p>Fusion College of Technology is a premier registered training organisation (RTO) committed to
                        delivering high-quality vocational education and training. We prepare students for successful
                        careers through industry-relevant curriculum and practical learning experiences.</p>
                    <p>Our dedicated team of experienced educators and industry professionals ensures that every student
                        receives personalized attention and guidance throughout their educational journey.</p>

                    <div class="about-features">
                        <div class="about-feature">
                            <div class="about-feature-icon">✓</div>
                            <span>Industry-Recognized Qualifications</span>
                        </div>
                        <div class="about-feature">
                            <div class="about-feature-icon">✓</div>
                            <span>Experienced Trainers</span>
                        </div>
                        <div class="about-feature">
                            <div class="about-feature-icon">✓</div>
                            <span>Modern Facilities</span>
                        </div>
                        <div class="about-feature">
                            <div class="about-feature-icon">✓</div>
                            <span>Career Support Services</span>
                        </div>
                    </div>
                </div>

                <div class="about-image">
                    <div class="about-image-main">
                        <svg viewBox="0 0 500 450" class="campus-scene">
                            <!-- Modern classroom scene -->
                            <rect width="500" height="450" fill="#2d5a8e" />

                            <!-- Whiteboard -->
                            <rect x="50" y="30" width="400" height="180" fill="white" rx="5" />
                            <rect x="60" y="40" width="380" height="160" fill="#f8fafc" />

                            <!-- Writing on board -->
                            <text x="80" y="80" fill="#077E86" font-size="16" font-weight="bold">Welcome to Pacific
                                Institute</text>
                            <line x1="80" y1="100" x2="350" y2="100" stroke="#64748b" stroke-width="2" />
                            <line x1="80" y1="120" x2="300" y2="120" stroke="#64748b" stroke-width="2" />
                            <line x1="80" y1="140" x2="280" y2="140" stroke="#64748b" stroke-width="2" />

                            <!-- Diagram -->
                            <circle cx="380" cy="130" r="40" fill="none" stroke="#3b82f6" stroke-width="2" />
                            <line x1="380" y1="90" x2="380" y2="130" stroke="#3b82f6" stroke-width="2" />
                            <line x1="380" y1="130" x2="410" y2="150" stroke="#3b82f6" stroke-width="2" />

                            <!-- Desks Row 1 -->
                            <g transform="translate(50, 250)">
                                <rect x="0" y="40" width="120" height="8" fill="#78350f" rx="2" />
                                <!-- Student 1 -->
                                <circle cx="40" cy="20" r="18" fill="#fcd9bd" />
                                <rect x="20" y="38" width="40" height="50" fill="#3b82f6" rx="4" />

                                <!-- Student 2 -->
                                <circle cx="100" cy="25" r="18" fill="#d4a574" />
                                <rect x="80" y="43" width="40" height="50" fill="#ef4444" rx="4" />
                            </g>

                            <g transform="translate(200, 250)">
                                <rect x="0" y="40" width="120" height="8" fill="#78350f" rx="2" />
                                <!-- Student 3 -->
                                <circle cx="40" cy="22" r="18" fill="#fcd9bd" />
                                <rect x="20" y="40" width="40" height="50" fill="#22c55e" rx="4" />

                                <!-- Student 4 -->
                                <circle cx="100" cy="18" r="18" fill="#c4a882" />
                                <rect x="80" y="36" width="40" height="50" fill="#8b5cf6" rx="4" />
                            </g>

                            <g transform="translate(350, 250)">
                                <rect x="0" y="40" width="100" height="8" fill="#78350f" rx="2" />
                                <!-- Student 5 -->
                                <circle cx="50" cy="20" r="18" fill="#fcd9bd" />
                                <rect x="30" y="38" width="40" height="50" fill="#f59e0b" rx="4" />
                            </g>

                            <!-- Teacher -->
                            <g transform="translate(240, 180)">
                                <circle cx="0" cy="0" r="22" fill="#fcd9bd" />
                                <rect x="-25" y="22" width="50" height="60" fill="#077E86" rx="5" />
                            </g>

                            <!-- Floor -->
                            <rect x="0" y="380" width="500" height="70" fill="#1e293b" />
                        </svg>
                    </div>
                    <div class="about-badge">
                        <span class="about-badge-number">19+</span>
                        <span class="about-badge-text">Years of Excellence</span>
                    </div>
                </div>
            </div>

            <!-- Statistics -->
            <div class="stats-grid">
                <div class="stat-card fade-in">
                    <div class="stat-icon">🎓</div>
                    <div class="stat-number" data-target="5000">0</div>
                    <div class="stat-label">Graduates</div>
                </div>
                <div class="stat-card fade-in">
                    <div class="stat-icon">📚</div>
                    <div class="stat-number" data-target="45">0</div>
                    <div class="stat-label">Courses Offered</div>
                </div>
                <div class="stat-card fade-in">
                    <div class="stat-icon">👨‍🏫</div>
                    <div class="stat-number" data-target="120">0</div>
                    <div class="stat-label">Expert Trainers</div>
                </div>
                <div class="stat-card fade-in">
                    <div class="stat-icon">🌍</div>
                    <div class="stat-number" data-target="50">0</div>
                    <div class="stat-label">Partner Countries</div>
                </div>
            </div>

            <!-- Accreditations -->
            <div class="accreditations fade-in">
                <div class="accreditation-badge">
                    <div class="accreditation-icon">ASQA</div>
                    <span class="accreditation-text">ASQA Registered</span>
                </div>
                <div class="accreditation-badge">
                    <div class="accreditation-icon">CRICOS</div>
                    <span class="accreditation-text">CRICOS Provider</span>
                </div>
                <div class="accreditation-badge">
                    <div class="accreditation-icon">TEQSA</div>
                    <span class="accreditation-text">Quality Assured</span>
                </div>
                <div class="accreditation-badge">
                    <div class="accreditation-icon">ISO</div>
                    <span class="accreditation-text">ISO 9001:2015</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section class="section section-alt" id="courses">
        <div class="container">
            <div class="section-header fade-in">
                <span class="section-badge">Our Programs</span>
                <h2 class="section-title">Popular Courses</h2>
                <p class="section-subtitle">Discover industry-focused qualifications designed to advance your career and
                    achieve your professional goals.</p>
            </div>

            <div class="courses-grid">
                <!-- Course 1 -->
                <div class="course-card fade-in">
                    <div class="course-image">
                        <svg class="course-image-bg" viewBox="0 0 400 180" preserveAspectRatio="xMidYMid slice">
                            <rect width="400" height="180" fill="#077E86" />
                            <g transform="translate(100, 30)">
                                <!-- Computer/Laptop -->
                                <rect x="50" y="60" width="100" height="70" fill="#374151" rx="5" />
                                <rect x="55" y="65" width="90" height="55" fill="#60a5fa" />
                                <!-- Code on screen -->
                                <text x="65" y="85" fill="#077E86" font-size="8"
                                    font-family="monospace">&lt;html&gt;</text>
                                <text x="70" y="95" fill="#22c55e" font-size="8"
                                    font-family="monospace">function()</text>
                                <text x="70" y="105" fill="#f59e0b" font-size="8" font-family="monospace">return
                                    true</text>
                                <!-- Keyboard -->
                                <rect x="40" y="135" width="120" height="8" fill="#4b5563" rx="2" />
                                <!-- Binary decoration -->
                                <text x="10" y="50" fill="white" opacity="0.2" font-size="10">101010</text>
                                <text x="160" y="80" fill="white" opacity="0.2" font-size="10">010101</text>
                            </g>
                        </svg>
                        <span class="course-category">Technology</span>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">Diploma of Information Technology</h3>
                        <p class="course-description">Master programming, networking, and cybersecurity fundamentals
                            with hands-on projects and industry certifications.</p>
                        <div class="course-meta">
                            <span class="course-duration">⏱️ 12 Months</span>
                            <a href="#courses" class="btn btn-primary btn-small">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Course 2 -->
                <div class="course-card fade-in">
                    <div class="course-image">
                        <svg class="course-image-bg" viewBox="0 0 400 180" preserveAspectRatio="xMidYMid slice">
                            <rect width="400" height="180" fill="#164e63" />
                            <g transform="translate(80, 20)">
                                <!-- Chart bars -->
                                <rect x="40" y="100" width="30" height="60" fill="#22c55e" rx="3" />
                                <rect x="80" y="70" width="30" height="90" fill="#3b82f6" rx="3" />
                                <rect x="120" y="40" width="30" height="120" fill="#f59e0b" rx="3" />
                                <rect x="160" y="60" width="30" height="100" fill="#ef4444" rx="3" />
                                <!-- Axis -->
                                <line x1="30" y1="160" x2="210" y2="160" stroke="white" stroke-width="2" />
                                <line x1="30" y1="30" x2="30" y2="160" stroke="white" stroke-width="2" />
                                <!-- Trend line -->
                                <polyline points="55,100 95,70 135,40 175,60" fill="none" stroke="white"
                                    stroke-width="2" stroke-dasharray="5,5" />
                            </g>
                        </svg>
                        <span class="course-category">Business</span>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">Diploma of Business Administration</h3>
                        <p class="course-description">Develop essential business skills in management, finance,
                            marketing, and strategic planning for organizational success.</p>
                        <div class="course-meta">
                            <span class="course-duration">⏱️ 12 Months</span>
                            <a href="#courses" class="btn btn-primary btn-small">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Course 3 -->
                <div class="course-card fade-in">
                    <div class="course-image">
                        <svg class="course-image-bg" viewBox="0 0 400 180" preserveAspectRatio="xMidYMid slice">
                            <rect width="400" height="180" fill="#7c3aed" />
                            <g transform="translate(100, 25)">
                                <!-- Children figures -->
                                <circle cx="50" cy="50" r="20" fill="#fcd9bd" />
                                <rect x="35" y="70" width="30" height="40" fill="#ef4444" rx="5" />
                                <circle cx="120" cy="55" r="18" fill="#d4a574" />
                                <rect x="107" y="73" width="26" height="35" fill="#3b82f6" rx="5" />
                                <circle cx="180" cy="52" r="19" fill="#fcd9bd" />
                                <rect x="166" y="71" width="28" height="38" fill="#22c55e" rx="5" />
                                <!-- Toys/blocks -->
                                <rect x="30" y="120" width="25" height="25" fill="#f59e0b" rx="3" />
                                <rect x="60" y="130" width="20" height="15" fill="#ec4899" rx="2" />
                                <circle cx="160" cy="135" r="12" fill="#06b6d4" />
                                <!-- ABC decoration -->
                                <text x="90" y="25" fill="white" opacity="0.3" font-size="20"
                                    font-weight="bold">ABC</text>
                            </g>
                        </svg>
                        <span class="course-category">Education</span>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">Diploma of Early Childhood Education</h3>
                        <p class="course-description">Learn to nurture and educate young minds with child development
                            theory and practical teaching methodologies.</p>
                        <div class="course-meta">
                            <span class="course-duration">⏱️ 18 Months</span>
                            <a href="#courses" class="btn btn-primary btn-small">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Course 4 -->
                <div class="course-card fade-in">
                    <div class="course-image">
                        <svg class="course-image-bg" viewBox="0 0 400 180" preserveAspectRatio="xMidYMid slice">
                            <rect width="400" height="180" fill="#059669" />
                            <g transform="translate(80, 20)">
                                <!-- Leadership figures -->
                                <circle cx="120" cy="40" r="25" fill="#fcd9bd" />
                                <rect x="95" y="65" width="50" height="70" fill="#077E86" rx="6" />
                                <!-- Team members -->
                                <circle cx="50" cy="60" r="18" fill="#d4a574" />
                                <rect x="35" y="78" width="30" height="50" fill="#3b82f6" rx="4" />
                                <circle cx="190" cy="60" r="18" fill="#fcd9bd" />
                                <rect x="175" y="78" width="30" height="50" fill="#8b5cf6" rx="4" />
                                <!-- Connection lines -->
                                <line x1="70" y1="70" x2="95" y2="60" stroke="white" stroke-width="2"
                                    stroke-dasharray="3,3" />
                                <line x1="145" y1="60" x2="170" y2="70" stroke="white" stroke-width="2"
                                    stroke-dasharray="3,3" />
                                <!-- Star badge -->
                                <polygon points="120,10 123,18 132,18 125,23 128,32 120,27 112,32 115,23 108,18 117,18"
                                    fill="#f59e0b" />
                            </g>
                        </svg>
                        <span class="course-category">Management</span>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">Advanced Diploma of Leadership</h3>
                        <p class="course-description">Cultivate executive leadership skills, strategic thinking, and
                            organizational management capabilities.</p>
                        <div class="course-meta">
                            <span class="course-duration">⏱️ 24 Months</span>
                            <a href="#courses" class="btn btn-primary btn-small">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Course 5 -->
                <div class="course-card fade-in">
                    <div class="course-image">
                        <svg class="course-image-bg" viewBox="0 0 400 180" preserveAspectRatio="xMidYMid slice">
                            <rect width="400" height="180" fill="#dc2626" />
                            <g transform="translate(100, 30)">
                                <!-- Books stack -->
                                <rect x="30" y="80" width="80" height="15" fill="#fef3c7" rx="2" />
                                <rect x="25" y="95" width="90" height="15" fill="#dbeafe" rx="2" />
                                <rect x="35" y="110" width="70" height="15" fill="#dcfce7" rx="2" />
                                <!-- Globe -->
                                <circle cx="150" cy="80" r="40" fill="#3b82f6" opacity="0.8" />
                                <ellipse cx="150" cy="80" rx="40" ry="15" fill="none" stroke="white" stroke-width="2" />
                                <line x1="150" y1="40" x2="150" y2="120" stroke="white" stroke-width="2" />
                                <!-- Pen -->
                                <rect x="60" y="40" width="8" height="50" fill="#f59e0b" rx="1" />
                                <polygon points="64,90 60,100 68,100" fill="#1e293b" />
                                <!-- Speech bubbles -->
                                <ellipse cx="40" cy="25" rx="25" ry="15" fill="white" opacity="0.3" />
                                <text x="30" y="30" fill="#077E86" font-size="10" font-weight="bold">Hi!</text>
                            </g>
                        </svg>
                        <span class="course-category">Language</span>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">English Language Programs (ELICOS)</h3>
                        <p class="course-description">Improve your English proficiency with comprehensive programs for
                            academic and professional purposes.</p>
                        <div class="course-meta">
                            <span class="course-duration">⏱️ 10-50 Weeks</span>
                            <a href="#courses" class="btn btn-primary btn-small">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Course 6 -->
                <div class="course-card fade-in">
                    <div class="course-image">
                        <svg class="course-image-bg" viewBox="0 0 400 180" preserveAspectRatio="xMidYMid slice">
                            <rect width="400" height="180" fill="#0891b2" />
                            <g transform="translate(80, 25)">
                                <!-- Security shield -->
                                <path
                                    d="M120,20 L160,35 L160,80 C160,110 120,130 120,130 C120,130 80,110 80,80 L80,35 Z"
                                    fill="#077E86" opacity="0.9" />
                                <path
                                    d="M120,30 L150,42 L150,78 C150,100 120,115 120,115 C120,115 90,100 90,78 L90,42 Z"
                                    fill="#3b82f6" />
                                <!-- Lock icon -->
                                <rect x="108" y="65" width="24" height="20" fill="white" rx="3" />
                                <rect x="112" y="55" width="16" height="15" fill="none" stroke="white" stroke-width="3"
                                    rx="8" />
                                <!-- Binary background -->
                                <text x="20" y="50" fill="white" opacity="0.2" font-size="12">10110</text>
                                <text x="180" y="80" fill="white" opacity="0.2" font-size="12">01001</text>
                                <text x="30" y="120" fill="white" opacity="0.2" font-size="12">11010</text>
                            </g>
                        </svg>
                        <span class="course-category">Security</span>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">Diploma of Cybersecurity</h3>
                        <p class="course-description">Protect digital assets with advanced knowledge in network
                            security, ethical hacking, and risk management.</p>
                        <div class="course-meta">
                            <span class="course-duration">⏱️ 12 Months</span>
                            <a href="#courses" class="btn btn-primary btn-small">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div style="text-align: center; margin-top: 50px;" class="fade-in">
                <a href="#courses" class="btn btn-primary">View All Courses</a>
            </div>
        </div>
    </section>

    <!-- Campus Life Section -->
    <section class="section" id="campus">
        <div class="container">
            <div class="section-header fade-in">
                <span class="section-badge">Student Experience</span>
                <h2 class="section-title">Campus Life</h2>
                <p class="section-subtitle">Experience vibrant campus culture with modern facilities, diverse
                    activities, and a supportive community.</p>
            </div>

            <div class="campus-gallery">
                <!-- Gallery Item 1 - Large -->
                <div class="gallery-item fade-in">
                    <svg class="gallery-image" viewBox="0 0 600 600" preserveAspectRatio="xMidYMid slice">
                        <rect width="600" height="600" fill="#077E86" />
                        <!-- Group study scene -->
                        <rect x="50" y="300" width="500" height="250" fill="#2d5a8e" />
                        <!-- Large table -->
                        <rect x="100" y="380" width="400" height="15" fill="#78350f" rx="3" />
                        <!-- Students around table -->
                        <g transform="translate(150, 280)">
                            <circle cx="0" cy="0" r="35" fill="#fcd9bd" />
                            <rect x="-35" y="35" width="70" height="80" fill="#3b82f6" rx="8" />
                        </g>
                        <g transform="translate(300, 290)">
                            <circle cx="0" cy="0" r="35" fill="#d4a574" />
                            <rect x="-35" y="35" width="70" height="80" fill="#ef4444" rx="8" />
                        </g>
                        <g transform="translate(450, 285)">
                            <circle cx="0" cy="0" r="35" fill="#fcd9bd" />
                            <rect x="-35" y="35" width="70" height="80" fill="#22c55e" rx="8" />
                        </g>
                        <!-- Books and laptops -->
                        <rect x="120" y="330" width="80" height="50" fill="#374151" rx="3" />
                        <rect x="280" y="340" width="60" height="40" fill="#fef3c7" />
                        <rect x="400" y="335" width="70" height="45" fill="#374151" rx="3" />
                        <!-- Window -->
                        <rect x="200" y="100" width="200" height="150" fill="#0ea5e9" opacity="0.5" rx="5" />
                        <line x1="300" y1="100" x2="300" y2="250" stroke="white" stroke-width="3" />
                        <line x1="200" y1="175" x2="400" y2="175" stroke="white" stroke-width="3" />
                        <!-- Plants -->
                        <ellipse cx="80" cy="520" rx="30" ry="40" fill="#166534" />
                        <rect x="70" y="520" width="20" height="30" fill="#78350f" />
                    </svg>
                    <div class="gallery-overlay">
                        <span class="gallery-title">Collaborative Learning Spaces</span>
                    </div>
                </div>

                <!-- Gallery Item 2 -->
                <div class="gallery-item fade-in">
                    <svg class="gallery-image" viewBox="0 0 300 300" preserveAspectRatio="xMidYMid slice">
                        <rect width="300" height="300" fill="#7c3aed" />
                        <!-- Computer lab -->
                        <g transform="translate(30, 80)">
                            <!-- Desk row -->
                            <rect x="0" y="100" width="240" height="10" fill="#4b5563" />
                            <!-- Monitors -->
                            <rect x="20" y="50" width="50" height="40" fill="#1f2937" rx="3" />
                            <rect x="25" y="55" width="40" height="30" fill="#60a5fa" />
                            <rect x="100" y="50" width="50" height="40" fill="#1f2937" rx="3" />
                            <rect x="105" y="55" width="40" height="30" fill="#60a5fa" />
                            <rect x="180" y="50" width="50" height="40" fill="#1f2937" rx="3" />
                            <rect x="185" y="55" width="40" height="30" fill="#60a5fa" />
                            <!-- Students -->
                            <circle cx="45" cy="25" r="15" fill="#fcd9bd" />
                            <rect x="30" y="40" width="30" height="40" fill="#3b82f6" rx="4" />
                            <circle cx="125" cy="25" r="15" fill="#d4a574" />
                            <rect x="110" y="40" width="30" height="40" fill="#ef4444" rx="4" />
                            <circle cx="205" cy="25" r="15" fill="#fcd9bd" />
                            <rect x="190" y="40" width="30" height="40" fill="#22c55e" rx="4" />
                        </g>
                    </svg>
                    <div class="gallery-overlay">
                        <span class="gallery-title">Modern Computer Labs</span>
                    </div>
                </div>

                <!-- Gallery Item 3 -->
                <div class="gallery-item fade-in">
                    <svg class="gallery-image" viewBox="0 0 300 300" preserveAspectRatio="xMidYMid slice">
                        <rect width="300" height="300" fill="#059669" />
                        <!-- Library scene -->
                        <g transform="translate(20, 40)">
                            <!-- Bookshelves -->
                            <rect x="0" y="0" width="60" height="180" fill="#78350f" />
                            <rect x="200" y="0" width="60" height="180" fill="#78350f" />
                            <!-- Books -->
                            <rect x="5" y="10" width="12" height="35" fill="#ef4444" />
                            <rect x="20" y="15" width="10" height="30" fill="#3b82f6" />
                            <rect x="33" y="12" width="14" height="33" fill="#f59e0b" />
                            <rect x="205" y="10" width="12" height="35" fill="#8b5cf6" />
                            <rect x="220" y="15" width="10" height="30" fill="#22c55e" />
                            <rect x="233" y="12" width="14" height="33" fill="#ec4899" />
                            <!-- Reading area -->
                            <rect x="80" y="120" width="100" height="10" fill="#92400e" />
                            <!-- Student reading -->
                            <circle cx="130" cy="85" r="20" fill="#fcd9bd" />
                            <rect x="110" y="105" width="40" height="50" fill="#6366f1" rx="5" />
                            <!-- Book on desk -->
                            <rect x="100" y="100" width="30" height="20" fill="#fef3c7" />
                        </g>
                    </svg>
                    <div class="gallery-overlay">
                        <span class="gallery-title">Extensive Library</span>
                    </div>
                </div>

                <!-- Gallery Item 4 -->
                <div class="gallery-item fade-in">
                    <svg class="gallery-image" viewBox="0 0 300 300" preserveAspectRatio="xMidYMid slice">
                        <rect width="300" height="300" fill="#dc2626" />
                        <!-- Cafeteria scene -->
                        <g transform="translate(30, 60)">
                            <!-- Tables -->
                            <ellipse cx="60" cy="150" rx="50" ry="25" fill="#78350f" />
                            <ellipse cx="180" cy="150" rx="50" ry="25" fill="#78350f" />
                            <!-- Students at table 1 -->
                            <circle cx="40" cy="100" r="18" fill="#fcd9bd" />
                            <rect x="25" y="118" width="30" height="45" fill="#3b82f6" rx="4" />
                            <circle cx="80" cy="105" r="18" fill="#d4a574" />
                            <rect x="65" y="123" width="30" height="45" fill="#22c55e" rx="4" />
                            <!-- Students at table 2 -->
                            <circle cx="160" cy="102" r="18" fill="#fcd9bd" />
                            <rect x="145" y="120" width="30" height="45" fill="#f59e0b" rx="4" />
                            <circle cx="200" cy="108" r="18" fill="#c4a882" />
                            <rect x="185" y="126" width="30" height="45" fill="#8b5cf6" rx="4" />
                            <!-- Food/drinks -->
                            <circle cx="60" cy="140" r="8" fill="#fcd34d" />
                            <rect x="170" y="135" width="15" height="20" fill="#06b6d4" rx="2" />
                        </g>
                    </svg>
                    <div class="gallery-overlay">
                        <span class="gallery-title">Student Cafeteria</span>
                    </div>
                </div>

                <!-- Gallery Item 5 -->
                <div class="gallery-item fade-in">
                    <svg class="gallery-image" viewBox="0 0 300 300" preserveAspectRatio="xMidYMid slice">
                        <rect width="300" height="300" fill="#0891b2" />
                        <!-- Outdoor scene -->
                        <!-- Sky -->
                        <rect x="0" y="0" width="300" height="150" fill="#38bdf8" />
                        <!-- Grass -->
                        <rect x="0" y="150" width="300" height="150" fill="#166534" />
                        <!-- Trees -->
                        <ellipse cx="50" cy="140" rx="35" ry="45" fill="#15803d" />
                        <rect x="43" y="140" width="14" height="40" fill="#78350f" />
                        <ellipse cx="250" cy="145" rx="30" ry="40" fill="#15803d" />
                        <rect x="244" y="145" width="12" height="35" fill="#78350f" />
                        <!-- Students walking -->
                        <g transform="translate(100, 160)">
                            <circle cx="0" cy="0" r="15" fill="#fcd9bd" />
                            <rect x="-15" y="15" width="30" height="50" fill="#3b82f6" rx="4" />
                            <rect x="-12" y="65" width="10" height="25" fill="#1e293b" />
                            <rect x="2" y="65" width="10" height="25" fill="#1e293b" />
                        </g>
                        <g transform="translate(140, 165)">
                            <circle cx="0" cy="0" r="15" fill="#d4a574" />
                            <rect x="-15" y="15" width="30" height="50" fill="#ef4444" rx="4" />
                            <rect x="-12" y="65" width="10" height="25" fill="#1e293b" />
                            <rect x="2" y="65" width="10" height="25" fill="#1e293b" />
                        </g>
                        <g transform="translate(180, 158)">
                            <circle cx="0" cy="0" r="15" fill="#fcd9bd" />
                            <rect x="-15" y="15" width="30" height="50" fill="#22c55e" rx="4" />
                            <rect x="-12" y="65" width="10" height="25" fill="#1e293b" />
                            <rect x="2" y="65" width="10" height="25" fill="#1e293b" />
                        </g>
                        <!-- Pathway -->
                        <rect x="90" y="220" width="120" height="80" fill="#9ca3af" rx="5" />
                        <!-- Sun -->
                        <circle cx="250" cy="50" r="25" fill="#fcd34d" />
                    </svg>
                    <div class="gallery-overlay">
                        <span class="gallery-title">Campus Grounds</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section class="section section-alt" id="events">
        <div class="container">
            <div class="section-header fade-in">
                <span class="section-badge">Stay Connected</span>
                <h2 class="section-title">Upcoming Events</h2>
                <p class="section-subtitle">Join our community events, workshops, and activities designed to enhance
                    your learning experience.</p>
            </div>

            <div class="events-grid">
                <!-- Event 1 -->
                <div class="event-card fade-in">
                    <div class="event-image">
                        <svg viewBox="0 0 400 160" preserveAspectRatio="xMidYMid slice">
                            <rect width="400" height="160" fill="#077E86" />
                            <!-- Open day scene -->
                            <rect x="100" y="60" width="200" height="80" fill="#2d5a8e" rx="5" />
                            <text x="200" y="100" text-anchor="middle" fill="white" font-size="14"
                                font-weight="bold">OPEN DAY</text>
                            <text x="200" y="120" text-anchor="middle" fill="#c9a227" font-size="10">WELCOME!</text>
                            <!-- Balloons -->
                            <ellipse cx="80" cy="50" rx="20" ry="25" fill="#ef4444" />
                            <line x1="80" y1="75" x2="80" y2="110" stroke="#ef4444" stroke-width="2" />
                            <ellipse cx="320" cy="45" rx="20" ry="25" fill="#3b82f6" />
                            <line x1="320" y1="70" x2="320" y2="105" stroke="#3b82f6" stroke-width="2" />
                        </svg>
                        <div class="event-date">
                            <span class="event-day">15</span>
                            <span class="event-month">Mar</span>
                        </div>
                    </div>
                    <div class="event-content">
                        <span class="event-category">Open Day</span>
                        <h3 class="event-title">Campus Open Day 2024</h3>
                        <p class="event-location">📍 Main Campus, Sydney</p>
                        <a href="#events" class="btn btn-primary btn-small" style="margin-top: 15px;">Register Now</a>
                    </div>
                </div>

                <!-- Event 2 -->
                <div class="event-card fade-in">
                    <div class="event-image">
                        <svg viewBox="0 0 400 160" preserveAspectRatio="xMidYMid slice">
                            <rect width="400" height="160" fill="#7c3aed" />
                            <!-- Workshop scene -->
                            <g transform="translate(100, 30)">
                                <!-- Whiteboard -->
                                <rect x="30" y="20" width="140" height="80" fill="white" rx="3" />
                                <!-- Speaker -->
                                <circle cx="20" cy="70" r="20" fill="#fcd9bd" />
                                <rect x="5" y="90" width="30" height="40" fill="#077E86" rx="4" />
                                <!-- Attendees -->
                                <circle cx="100" cy="120" r="12" fill="#d4a574" />
                                <circle cx="130" cy="118" r="12" fill="#fcd9bd" />
                                <circle cx="160" cy="122" r="12" fill="#c4a882" />
                            </g>
                        </svg>
                        <div class="event-date">
                            <span class="event-day">22</span>
                            <span class="event-month">Mar</span>
                        </div>
                    </div>
                    <div class="event-content">
                        <span class="event-category">Workshop</span>
                        <h3 class="event-title">Career Development Workshop</h3>
                        <p class="event-location">📍 Room B204, Building B</p>
                        <a href="#events" class="btn btn-primary btn-small" style="margin-top: 15px;">Register Now</a>
                    </div>
                </div>

                <!-- Event 3 -->
                <div class="event-card fade-in">
                    <div class="event-image">
                        <svg viewBox="0 0 400 160" preserveAspectRatio="xMidYMid slice">
                            <rect width="400" height="160" fill="#059669" />
                            <!-- Graduation scene -->
                            <g transform="translate(80, 20)">
                                <!-- Stage -->
                                <rect x="0" y="100" width="240" height="40" fill="#1e293b" rx="3" />
                                <!-- Graduates -->
                                <g transform="translate(40, 50)">
                                    <circle cx="0" cy="0" r="18" fill="#fcd9bd" />
                                    <rect x="-18" y="-30" width="36" height="8" fill="#1e293b" />
                                    <polygon points="0,-38 -22,-30 22,-30" fill="#1e293b" />
                                    <rect x="-15" y="18" width="30" height="45" fill="#1e293b" rx="3" />
                                </g>
                                <g transform="translate(120, 45)">
                                    <circle cx="0" cy="0" r="18" fill="#d4a574" />
                                    <rect x="-18" y="-30" width="36" height="8" fill="#1e293b" />
                                    <polygon points="0,-38 -22,-30 22,-30" fill="#1e293b" />
                                    <rect x="-15" y="18" width="30" height="45" fill="#1e293b" rx="3" />
                                </g>
                                <g transform="translate(200, 52)">
                                    <circle cx="0" cy="0" r="18" fill="#fcd9bd" />
                                    <rect x="-18" y="-30" width="36" height="8" fill="#1e293b" />
                                    <polygon points="0,-38 -22,-30 22,-30" fill="#1e293b" />
                                    <rect x="-15" y="18" width="30" height="45" fill="#1e293b" rx="3" />
                                </g>
                            </g>
                        </svg>
                        <div class="event-date">
                            <span class="event-day">10</span>
                            <span class="event-month">Apr</span>
                        </div>
                    </div>
                    <div class="event-content">
                        <span class="event-category">Graduation</span>
                        <h3 class="event-title">Graduation Ceremony 2024</h3>
                        <p class="event-location">📍 Sydney Convention Centre</p>
                        <a href="#events" class="btn btn-primary btn-small" style="margin-top: 15px;">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section">
        <div class="container">
            <div class="section-header fade-in">
                <span class="section-badge">Student Voices</span>
                <h2 class="section-title">What Our Students Say</h2>
                <p class="section-subtitle">Hear from our graduates about their transformative educational journey with
                    us.</p>
            </div>

            <div class="testimonials-slider fade-in">
                <div class="testimonial-card" id="testimonialCard">
                    <p class="testimonial-quote" id="testimonialQuote">"Fusion College provided me with the skills
                        and confidence I needed to launch my career in IT. The hands-on training and supportive
                        instructors made all the difference in my professional development."</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">
                            <svg viewBox="0 0 70 70">
                                <circle cx="35" cy="35" r="35" fill="#3b82f6" />
                                <circle cx="35" cy="25" r="15" fill="#fcd9bd" />
                                <ellipse cx="35" cy="55" rx="20" ry="15" fill="#fcd9bd" />
                            </svg>
                        </div>
                        <div class="testimonial-info">
                            <h4 id="testimonialName">Sarah Chen</h4>
                            <span id="testimonialRole">Diploma of IT Graduate, 2023</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-dots">
                    <div class="testimonial-dot active" data-index="0"></div>
                    <div class="testimonial-dot" data-index="1"></div>
                    <div class="testimonial-dot" data-index="2"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <svg class="cta-pattern" viewBox="0 0 1920 400" preserveAspectRatio="xMidYMid slice">
            <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="0.5" />
            </pattern>
            <rect width="1920" height="400" fill="url(#grid)" />
        </svg>
        <div class="container">
            <div class="cta-content fade-in">
                <h2 class="cta-title">Ready to Start Your Journey?</h2>
                <p class="cta-subtitle">Take the first step towards a rewarding career. Apply now and join thousands of
                    successful graduates.</p>
                <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
                    <a href="#admissions" class="btn btn-primary">Apply Now</a>
                    <a href="#contact" class="btn btn-outline">Contact Us</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section section-alt" id="contact">
        <div class="container">
            <div class="section-header fade-in">
                <span class="section-badge">Get in Touch</span>
                <h2 class="section-title">Contact Us</h2>
                <p class="section-subtitle">Have questions? We're here to help. Reach out to our friendly team.</p>
            </div>

            <div class="contact-grid">
                <div class="fade-in">
                    <div class="contact-info-card">
                        <div class="contact-info-icon">📍</div>
                        <div class="contact-info-content">
                            <h4>Our Location</h4>
                            <p>Level 5, 123 George Street<br>Sydney NSW 2000, Australia</p>
                        </div>
                    </div>

                    <div class="contact-info-card">
                        <div class="contact-info-icon">📞</div>
                        <div class="contact-info-content">
                            <h4>Phone Number</h4>
                            <p id="contactPhone">1300 123 456<br>+61 2 9000 0000</p>
                        </div>
                    </div>

                    <div class="contact-info-card">
                        <div class="contact-info-icon">✉️</div>
                        <div class="contact-info-content">
                            <h4>Email Address</h4>
                            <p id="contactEmail">info@pacificinstitute.edu.au<br>admissions@pacificinstitute.edu.au</p>
                        </div>
                    </div>

                    <div class="contact-info-card">
                        <div class="contact-info-icon">🕐</div>
                        <div class="contact-info-content">
                            <h4>Office Hours</h4>
                            <p>Monday - Friday: 9:00 AM - 5:00 PM<br>Saturday: 10:00 AM - 2:00 PM</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form fade-in">
                    <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 25px; color: var(--text-dark);">Send Us
                        a Message</h3>
                    <form id="contactForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" id="firstName" name="firstName" placeholder="Enter your first name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" id="lastName" name="lastName" placeholder="Enter your last name"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select id="subject" name="subject" required>
                                <option value="">Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="admissions">Admissions</option>
                                <option value="courses">Course Information</option>
                                <option value="fees">Fees & Payments</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" placeholder="Type your message here..."
                                required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
                    </form>
                </div>
            </div>

            <div class="map-container fade-in">
                <div class="map-placeholder">
                    <svg viewBox="0 0 1200 400" style="width: 100%; height: 100%;">
                        <rect width="1200" height="400" fill="#e2e8f0" />
                        <!-- Map grid -->
                        <g stroke="#cbd5e1" stroke-width="1">
                            <line x1="0" y1="80" x2="1200" y2="80" />
                            <line x1="0" y1="160" x2="1200" y2="160" />
                            <line x1="0" y1="240" x2="1200" y2="240" />
                            <line x1="0" y1="320" x2="1200" y2="320" />
                            <line x1="200" y1="0" x2="200" y2="400" />
                            <line x1="400" y1="0" x2="400" y2="400" />
                            <line x1="600" y1="0" x2="600" y2="400" />
                            <line x1="800" y1="0" x2="800" y2="400" />
                            <line x1="1000" y1="0" x2="1000" y2="400" />
                        </g>
                        <!-- Roads -->
                        <rect x="0" y="180" width="1200" height="40" fill="#94a3b8" />
                        <rect x="580" y="0" width="40" height="400" fill="#94a3b8" />
                        <!-- Buildings -->
                        <rect x="100" y="100" width="80" height="60" fill="#64748b" rx="3" />
                        <rect x="250" y="80" width="100" height="80" fill="#64748b" rx="3" />
                        <rect x="700" y="90" width="120" height="70" fill="#64748b" rx="3" />
                        <rect x="900" y="100" width="90" height="60" fill="#64748b" rx="3" />
                        <rect x="100" y="260" width="100" height="80" fill="#64748b" rx="3" />
                        <rect x="300" y="280" width="80" height="60" fill="#64748b" rx="3" />
                        <rect x="700" y="250" width="150" height="90" fill="#64748b" rx="3" />
                        <rect x="950" y="270" width="100" height="70" fill="#64748b" rx="3" />
                        <!-- College marker -->
                        <g transform="translate(600, 200)">
                            <ellipse cx="0" cy="30" rx="30" ry="10" fill="rgba(30, 58, 95, 0.3)" />
                            <path
                                d="M0,-50 C-20,-50 -25,-30 -25,0 C-25,20 0,30 0,30 C0,30 25,20 25,0 C25,-30 20,-50 0,-50"
                                fill="#077E86" />
                            <circle cx="0" cy="-15" r="12" fill="white" />
                            <text x="0" y="-10" text-anchor="middle" fill="#077E86" font-size="12"
                                font-weight="bold">📍</text>
                        </g>
                        <!-- Legend -->
                        <rect x="50" y="340" width="200" height="50" fill="white" rx="5" />
                        <circle cx="75" cy="365" r="8" fill="#077E86" />
                        <text x="95" y="370" fill="#077E86" font-size="14">Fusion College</text>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Admissions Section -->
    <section class="section" id="admissions">
        <div class="container">
            <div class="section-header fade-in">
                <span class="section-badge">Join Us</span>
                <h2 class="section-title">Admissions</h2>
                <p class="section-subtitle">Start your educational journey with Fusion College. Follow our simple
                    admission process.</p>
            </div>

            <div class="stats-grid" style="grid-template-columns: repeat(4, 1fr);">
                <div class="stat-card fade-in" style="text-align: left; padding: 30px;">
                    <div
                        style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 20px; font-weight: 700; margin-bottom: 15px;">
                        1</div>
                    <h4 style="font-size: 18px; font-weight: 700; color: var(--text-dark); margin-bottom: 10px;">Choose
                        Your Course</h4>
                    <p style="font-size: 14px; color: var(--text-muted); line-height: 1.6;">Browse our course catalog
                        and select the program that aligns with your career goals.</p>
                </div>

                <div class="stat-card fade-in" style="text-align: left; padding: 30px;">
                    <div
                        style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 20px; font-weight: 700; margin-bottom: 15px;">
                        2</div>
                    <h4 style="font-size: 18px; font-weight: 700; color: var(--text-dark); margin-bottom: 10px;">Submit
                        Application</h4>
                    <p style="font-size: 14px; color: var(--text-muted); line-height: 1.6;">Complete the online
                        application form and submit required documents.</p>
                </div>

                <div class="stat-card fade-in" style="text-align: left; padding: 30px;">
                    <div
                        style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 20px; font-weight: 700; margin-bottom: 15px;">
                        3</div>
                    <h4 style="font-size: 18px; font-weight: 700; color: var(--text-dark); margin-bottom: 10px;">
                        Assessment</h4>
                    <p style="font-size: 14px; color: var(--text-muted); line-height: 1.6;">Our admissions team will
                        review your application and conduct any required assessments.</p>
                </div>

                <div class="stat-card fade-in" style="text-align: left; padding: 30px;">
                    <div
                        style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 20px; font-weight: 700; margin-bottom: 15px;">
                        4</div>
                    <h4 style="font-size: 18px; font-weight: 700; color: var(--text-dark); margin-bottom: 10px;">Enroll
                        & Begin</h4>
                    <p style="font-size: 14px; color: var(--text-muted); line-height: 1.6;">Accept your offer, complete
                        enrollment, and start your learning journey.</p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 50px;" class="fade-in">
                <a href="#contact" class="btn btn-primary">Start Application</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="#home" class="logo">
                        <div class="logo-icon">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none">
                                <path d="M15 2L3 9v12l12 7 12-7V9L15 2z" fill="#077E86" fill-opacity="0.3" />
                                <path d="M15 5L6 10v10l9 5 9-5V10l-9-5z" fill="#077E86" />
                                <circle cx="15" cy="15" r="4" fill="#c9a227" />
                            </svg>
                        </div>
                        <div>
                            <div class="logo-text" id="collegeName">Fusion College</div>
                            <div class="logo-tagline">of Technology</div>
                        </div>
                    </a>
                    <p>Fusion College of Technology is a leading registered training organisation dedicated to
                        providing quality vocational education and training to domestic and international students.</p>
                    <div class="footer-social">
                        <a href="#">📘</a>
                        <a href="#">🐦</a>
                        <a href="#">📷</a>
                        <a href="#">💼</a>
                        <a href="#">▶️</a>
                    </div>
                </div>

                <div class="footer-column">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#courses">Our Courses</a></li>
                        <li><a href="#admissions">Admissions</a></li>
                        <li><a href="#events">Events</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                        <li><a href="#">Student Portal</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>Programs</h4>
                    <ul class="footer-links">
                        <li><a href="#courses">Information Technology</a></li>
                        <li><a href="#courses">Business & Management</a></li>
                        <li><a href="#courses">Early Childhood Education</a></li>
                        <li><a href="#courses">English Programs</a></li>
                        <li><a href="#courses">Leadership</a></li>
                        <li><a href="#courses">Cybersecurity</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>Contact Info</h4>
                    <ul class="footer-links">
                        <li>📍 Level 5, 123 George Street, Sydney NSW 2000</li>
                        <li>📞 1300 123 456</li>
                        <li>✉️ info@pacificinstitute.edu.au</li>
                        <li>🕐 Mon-Fri: 9AM-5PM</li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p class="footer-copyright">© 2024 Fusion College of Technology. All rights reserved. RTO: 45123 |
                    CRICOS: 03456J</p>
                <div class="footer-policies">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Refund Policy</a>
                    <a href="#">Student Handbook</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Default configuration
        const defaultConfig = {
            college_name: 'Fusion College',
            hero_headline: 'Empowering Future Professionals Through Quality Education',
            contact_phone: '1300 123 456',
            contact_email: 'info@pacificinstitute.edu.au',
            primary_color: '#077E86',
            secondary_color: '#c9a227',
            text_color: '#1a1a1a',
            background_color: '#ffffff',
            font_family: 'Arial'
        };

        let config = { ...defaultConfig };

        // Element SDK initialization
        if (window.elementSdk) {
            window.elementSdk.init({
                defaultConfig,
                onConfigChange: async (newConfig) => {
                    config = { ...defaultConfig, ...newConfig };

                    // Update college name
                    const collegeNameEl = document.getElementById('collegeName');
                    if (collegeNameEl) {
                        collegeNameEl.textContent = config.college_name || defaultConfig.college_name;
                    }

                    // Update hero headline
                    const heroTitleEl = document.getElementById('heroTitle');
                    if (heroTitleEl) {
                        heroTitleEl.textContent = config.hero_headline || defaultConfig.hero_headline;
                    }

                    // Update contact info
                    const contactPhoneEl = document.getElementById('contactPhone');
                    if (contactPhoneEl) {
                        contactPhoneEl.innerHTML = (config.contact_phone || defaultConfig.contact_phone) + '<br>+61 2 9000 0000';
                    }

                    const contactEmailEl = document.getElementById('contactEmail');
                    if (contactEmailEl) {
                        contactEmailEl.innerHTML = (config.contact_email || defaultConfig.contact_email) + '<br>admissions@pacificinstitute.edu.au';
                    }

                    // Update CSS variables for colors
                    document.documentElement.style.setProperty('--primary', config.primary_color || defaultConfig.primary_color);
                    document.documentElement.style.setProperty('--secondary', config.secondary_color || defaultConfig.secondary_color);
                },
                mapToCapabilities: (config) => ({
                    recolorables: [
                        {
                            get: () => config.primary_color || defaultConfig.primary_color,
                            set: (value) => {
                                config.primary_color = value;
                                window.elementSdk.setConfig({ primary_color: value });
                            }
                        },
                        {
                            get: () => config.secondary_color || defaultConfig.secondary_color,
                            set: (value) => {
                                config.secondary_color = value;
                                window.elementSdk.setConfig({ secondary_color: value });
                            }
                        }
                    ],
                    borderables: [],
                    fontEditable: {
                        get: () => config.font_family || defaultConfig.font_family,
                        set: (value) => {
                            config.font_family = value;
                            window.elementSdk.setConfig({ font_family: value });
                        }
                    },
                    fontSizeable: undefined
                }),
                mapToEditPanelValues: (config) => new Map([
                    ['college_name', config.college_name || defaultConfig.college_name],
                    ['hero_headline', config.hero_headline || defaultConfig.hero_headline],
                    ['contact_phone', config.contact_phone || defaultConfig.contact_phone],
                    ['contact_email', config.contact_email || defaultConfig.contact_email]
                ])
            });
        }

        // Theme Toggle
        const themeToggle = document.getElementById('themeToggle');
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-theme', savedTheme);

        themeToggle.addEventListener('click', () => {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
        });

        // Hero Slider
        const heroSlides = document.querySelectorAll('.hero-slide');
        const heroIndicators = document.querySelectorAll('.hero-indicator');
        let currentSlide = 0;

        function showSlide(index) {
            heroSlides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
            heroIndicators.forEach((indicator, i) => {
                indicator.classList.toggle('active', i === index);
            });
            currentSlide = index;
        }

        // Auto slide
        setInterval(() => {
            currentSlide = (currentSlide + 1) % heroSlides.length;
            showSlide(currentSlide);
        }, 5000);

        // Indicator click handlers
        heroIndicators.forEach((indicator) => {
            indicator.addEventListener('click', () => {
                const slideIndex = parseInt(indicator.dataset.slide);
                showSlide(slideIndex);
            });
        });

        // Testimonials Slider
        const testimonialSlides = [
            {
                quote: '"Fusion College provided me with the skills and confidence I needed to launch my career in IT. The hands-on training and supportive instructors made all the difference in my professional development."',
                name: 'Sarah Chen',
                role: 'Diploma of IT Graduate, 2023'
            },
            {
                quote: '"The hands-on approach to learning at Fusion College helped me gain practical skills that I use every day in my job. The career support team was amazing in helping me find employment after graduation."',
                name: 'Michael Rodriguez',
                role: 'Diploma of Business Graduate, 2022'
            },
            {
                quote: '"Choosing Fusion College was the best decision I made for my career. The industry-experienced trainers and modern facilities provided me with a world-class education."',
                name: 'Emma Thompson',
                role: 'Advanced Diploma of Leadership Graduate, 2023'
            }
        ];

        let currentTestimonial = 0;

        function showTestimonial(index) {
            const quoteEl = document.getElementById('testimonialQuote');
            const nameEl = document.getElementById('testimonialName');
            const roleEl = document.getElementById('testimonialRole');
            const dots = document.querySelectorAll('.testimonial-dot');

            if (quoteEl && testimonialSlides[index]) {
                quoteEl.textContent = testimonialSlides[index].quote;
                nameEl.textContent = testimonialSlides[index].name;
                roleEl.textContent = testimonialSlides[index].role;
            }

            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });

            currentTestimonial = index;
        }

        // Testimonial dot click handlers
        document.querySelectorAll('.testimonial-dot').forEach((dot) => {
            dot.addEventListener('click', () => {
                const index = parseInt(dot.dataset.index);
                showTestimonial(index);
            });
        });

        // Auto testimonial slide
        setInterval(() => {
            currentTestimonial = (currentTestimonial + 1) % testimonialSlides.length;
            showTestimonial(currentTestimonial);
        }, 5000);

        // Mobile Menu
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileOverlay = document.getElementById('mobileOverlay');
        const mobileClose = document.getElementById('mobileClose');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.add('open');
            mobileOverlay.classList.add('open');
        });

        function closeMobileMenu() {
            mobileMenu.classList.remove('open');
            mobileOverlay.classList.remove('open');
        }

        mobileClose.addEventListener('click', closeMobileMenu);
        mobileOverlay.addEventListener('click', closeMobileMenu);

        // Mobile menu links
        document.querySelectorAll('.mobile-menu-nav a').forEach((link) => {
            link.addEventListener('click', closeMobileMenu);
        });

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });

        // Scroll animations
        const fadeElements = document.querySelectorAll('.fade-in');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        fadeElements.forEach((el) => observer.observe(el));

        // Stats counter animation
        const statNumbers = document.querySelectorAll('.stat-number[data-target]');

        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const target = parseInt(entry.target.dataset.target);
                    animateCounter(entry.target, target);
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        statNumbers.forEach((stat) => statsObserver.observe(stat));

        function animateCounter(element, target) {
            let current = 0;
            const increment = target / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current).toLocaleString();
                }
            }, 30);
        }

        // Contact Form
        const contactForm = document.getElementById('contactForm');
        const toast = document.getElementById('toast');

        if (contactForm) {
            contactForm.addEventListener('submit', function (e) {
                e.preventDefault();

                // Show success toast
                toast.classList.add('show');

                // Reset form
                contactForm.reset();

                // Hide toast after 3 seconds
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000);
            });
        }

        // Pill navbar: add solid background on scroll
        const header = document.querySelector('.main-header');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 80) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>
