
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Aqar Property Portal')</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --aqar-primary: #1F4E78;
            --aqar-secondary: #163D60;
            --aqar-background: #F4F6F9;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: var(--aqar-background);
            color: #252525;
        }

        .aqar-sidebar {
            width: 288px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #fff;
            border-right: 1px solid #eee7e7;
            padding: 24px 16px;
            overflow-y: auto;
        }

        .aqar-logo {
            color: var(--aqar-primary);
            font-size: 24px;
            font-weight: 700;
            padding: 0 12px 28px;
        }

        .aqar-sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            margin-bottom: 4px;
            border-radius: 9px;
            text-decoration: none;
            color: #625b5c;
            font-size: 14px;
        }

        .aqar-sidebar a:hover,
        .aqar-sidebar a.active {
            background: var(--aqar-primary);
            color: #fff;
        }

        .aqar-main {
            margin-left: 288px;
            min-height: 100vh;
        }

        .aqar-topbar {
            height: 64px;
            background: #fff;
            border-bottom: 1px solid #eee7e7;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
        }

        .aqar-content {
            padding: 28px;
        }

        @media (max-width: 768px) {
            .aqar-sidebar {
                position: static;
                width: 100%;
                height: auto;
            }

            .aqar-main {
                margin-left: 0;
            }

            .aqar-topbar {
                padding: 0 16px;
            }
        }
    </style>
</head>

<body>
    <aside class="aqar-sidebar">
        <div class="aqar-logo">Aqar</div>

        <nav>
            <a href="/" class="active">
                <span class="material-symbols-outlined">dashboard</span>
                Dashboard
            </a>

            <a href="#">
                <span class="material-symbols-outlined">apartment</span>
                Properties
            </a>

            <a href="#">
                <span class="material-symbols-outlined">meeting_room</span>
                Units
            </a>

            <a href="#">
                <span class="material-symbols-outlined">person</span>
                Owners
            </a>

            <a href="#">
                <span class="material-symbols-outlined">groups</span>
                Tenants
            </a>

            <a href="#">
                <span class="material-symbols-outlined">calendar_month</span>
                Bookings
            </a>

            <a href="#">
                <span class="material-symbols-outlined">description</span>
                Contracts
            </a>

            <a href="#">
                <span class="material-symbols-outlined">payments</span>
                Payments
            </a>

            <a href="#">
                <span class="material-symbols-outlined">account_balance_wallet</span>
                Rent Collection
            </a>

            <a href="#">
                <span class="material-symbols-outlined">build</span>
                Maintenance
            </a>

            <a href="#">
                <span class="material-symbols-outlined">chair</span>
                Furniture Inventory
            </a>

            <a href="#">
                <span class="material-symbols-outlined">folder</span>
                Documents
            </a>

            <a href="#">
                <span class="material-symbols-outlined">bar_chart</span>
                Reports
            </a>

            <a href="#">
                <span class="material-symbols-outlined">settings</span>
                Settings
            </a>
        </nav>
    </aside>

    <div class="aqar-main">
        <header class="aqar-topbar">
            <span class="fw-semibold">Aqar Property Portal</span>
            <span class="text-secondary small">Operations Manager</span>
        </header>

        <main class="aqar-content">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
