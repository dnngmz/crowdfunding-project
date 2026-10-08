<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrowdFund Demo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #0b0f19;
            --surface-color: #1a2235;
            --primary-color: #00f2fe;
            --secondary-color: #4facfe;
            --text-color: #e2e8f0;
            --text-muted: #94a3b8;
            --danger-color: #ff4b4b;
            --success-color: #00e676;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* Animated Background Gradient */
        .bg-gradient {
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at center, rgba(79, 172, 254, 0.05) 0%, rgba(0, 242, 254, 0.05) 30%, transparent 70%);
            z-index: -1;
            animation: pulse 15s infinite alternate ease-in-out;
        }

        @keyframes pulse {
            0% { transform: scale(1) translate(0, 0); }
            100% { transform: scale(1.1) translate(2%, 2%); }
        }

        nav {
            background-color: rgba(26, 34, 53, 0.8);
            backdrop-filter: blur(12px);
            padding: 1.5rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .brand {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .nav-links a {
            color: var(--text-color);
            text-decoration: none;
            margin-left: 2rem;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        main {
            flex: 1;
            padding: 3rem 5%;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            animation: fadeIn 0.8s ease-out forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 0.8rem 1.8rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
            font-family: inherit;
            font-size: 1rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            color: #000;
            box-shadow: 0 4px 15px rgba(0, 242, 254, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 242, 254, 0.4);
        }

        /* Cards */
        .card {
            background-color: var(--surface-color);
            border-radius: 20px;
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; height: 4px;
            background: linear-gradient(90deg, var(--secondary-color), var(--primary-color));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.5s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .card:hover::before {
            transform: scaleX(1);
        }

        /* Forms */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-muted);
        }

        .form-control {
            width: 100%;
            padding: 1rem;
            background-color: rgba(0,0,0,0.2);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            color: var(--text-color);
            font-family: inherit;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(0, 242, 254, 0.15);
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            background-color: rgba(0, 230, 118, 0.1);
            border: 1px solid var(--success-color);
            color: var(--success-color);
        }

        h1, h2, h3 {
            margin-bottom: 1rem;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
        }
    </style>
</head>
<body>
    <div class="bg-gradient"></div>

    <nav>
        <a href="{{ route('campaigns.index') }}" class="brand">CrowdFund</a>
        <div class="nav-links">
            <a href="{{ route('campaigns.index') }}">Explore</a>
            <a href="{{ route('campaigns.create') }}" class="btn btn-primary" style="margin-left: 2rem; color: #000;">Start a Campaign</a>
        </div>
    </nav>

    <main>
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
