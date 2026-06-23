<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PetCare Stay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
            margin: 0;
            background: linear-gradient(135deg, #f6f9ff, #eef4ff);
            color: #0f172a;
        }

        .navbar {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 18px 11%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-size: 22px;
            font-weight: 800;
            color: #2563eb;
            text-decoration: none;
        }

        .brand span {
            margin-right: 8px;
        }

        .nav-links a,
        .nav-links button {
            margin-left: 16px;
            text-decoration: none;
            font-weight: 600;
            border: none;
            background: none;
            cursor: pointer;
            color: #0f172a;
        }

        .nav-links .primary {
            background: #2563eb;
            color: white;
            padding: 10px 18px;
            border-radius: 12px;
        }

        main {
            padding: 55px 11%;
            min-height: calc(100vh - 130px);
        }

        .hero {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            align-items: center;
            gap: 60px;
            margin-top: 20px;
        }

        .badge {
            display: inline-block;
            background: #dcfce7;
            color: #15803d;
            padding: 8px 15px;
            border-radius: 999px;
            font-weight: 800;
            font-size: 14px;
            margin-bottom: 18px;
        }

        .hero h1 {
            font-size: 46px;
            line-height: 1.1;
            margin: 0 0 20px;
            letter-spacing: -1px;
        }

        .hero p {
            color: #475569;
            font-size: 17px;
            line-height: 1.7;
        }

        .card, .auth-card {
            background: rgba(255,255,255,0.95);
            border: 1px solid #e5e7eb;
            border-radius: 24px;
            box-shadow: 0 25px 60px rgba(37,99,235,0.10);
        }

        .card {
            padding: 40px;
        }

        .pet-icon {
            font-size: 72px;
            margin-bottom: 18px;
        }

        .auth-card {
            max-width: 440px;
            margin: 25px auto;
            padding: 34px;
        }

        .auth-card h2 {
            text-align: center;
            margin: 0 0 8px;
            font-size: 28px;
        }

        .auth-card .subtitle {
            text-align: center;
            color: #64748b;
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            font-weight: 700;
            font-size: 14px;
            margin-bottom: 7px;
        }

        input, select {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #dbe3ef;
            border-radius: 13px;
            font-size: 15px;
            background: #f8fafc;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #2563eb;
            background: white;
            box-shadow: 0 0 0 4px rgba(37,99,235,0.10);
        }

        .btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            border: none;
            padding: 13px 18px;
            border-radius: 13px;
            font-weight: 800;
            text-decoration: none;
            cursor: pointer;
        }

        .btn.full {
            width: 100%;
            margin-top: 8px;
        }

        .auth-link {
            text-align: center;
            margin-top: 20px;
            color: #64748b;
        }

        .auth-link a {
            color: #2563eb;
            font-weight: 800;
            text-decoration: none;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 16px;
            font-size: 14px;
        }

        footer {
            text-align: center;
            color: #64748b;
            padding: 20px;
        }

        .page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 28px;
}

.page-header h1 {
    font-size: 34px;
    margin: 10px 0 6px;
}

.page-header p {
    color: #64748b;
    margin: 0;
}

.table-card,
.form-card {
    background: white;
    border-radius: 24px;
    padding: 28px;
    box-shadow: 0 20px 50px rgba(37, 99, 235, 0.10);
    border: 1px solid #e5e7eb;
}

.pretty-table {
    width: 100%;
    border-collapse: collapse;
}

.pretty-table th {
    background: #f1f5f9;
    color: #334155;
    padding: 16px;
    text-align: left;
    font-size: 14px;
}

.pretty-table td {
    padding: 16px;
    border-bottom: 1px solid #e5e7eb;
}

.actions-table {
    display: flex;
    gap: 8px;
}

.btn-small {
    border: none;
    padding: 8px 13px;
    border-radius: 10px;
    font-weight: 700;
    cursor: pointer;
    text-decoration: none;
    font-size: 13px;
}

.btn-small.edit {
    background: #2563eb;
    color: white;
}

.btn-small.delete {
    background: #fee2e2;
    color: #b91c1c;
}

.form-card {
    max-width: 760px;
    margin: 0 auto;
}

.form-card h1 {
    margin-bottom: 8px;
}

.form-card p {
    color: #64748b;
    margin-bottom: 24px;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
}

.form-actions {
    display: flex;
    gap: 10px;
    margin-top: 22px;
}

.pagination-wrap {
    margin-top: 18px;
}

.empty {
    text-align: center;
    color: #64748b;
}

textarea {
    width: 100%;
    padding: 13px 14px;
    border: 1px solid #dbe3ef;
    border-radius: 13px;
    font-size: 15px;
    background: #f8fafc;
    min-height: 100px;
    resize: vertical;
}

.full-row {
    grid-column: 1 / -1;
}

.info-box {
    background: #eff6ff;
    color: #1d4ed8;
    border: 1px solid #bfdbfe;
    padding: 14px 16px;
    border-radius: 14px;
    margin-top: 18px;
    font-weight: 600;
}

textarea {
    width: 100%;
    padding: 13px 14px;
    border: 1px solid #dbe3ef;
    border-radius: 13px;
    font-size: 15px;
    background: #f8fafc;
    min-height: 100px;
    resize: vertical;
}
    </style>
</head>
<body>

<nav class="navbar">
    <a href="{{ route('home') }}" class="brand">
        <span>🐾</span>PetCare Stay
    </a>

    <div class="nav-links">
        @guest
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}" class="primary">Daftar</a>
        @else
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endguest
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer>
    © 2026 PetCare Stay — Sistem Penitipan Hewan
</footer>

</body>
</html>