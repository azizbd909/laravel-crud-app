<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:        #0d0d0d;
            --surface:   #161616;
            --border:    #2a2a2a;
            --gold:      #c9a84c;
            --gold-dim:  #8a6e30;
            --text:      #e8e2d9;
            --muted:     #6b6460;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            padding: 0 0 80px;
        }

        /* ── HEADER ── */
        header {
            padding: 60px 40px 40px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
        }
        header h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2.4rem, 5vw, 4rem);
            font-weight: 300;
            letter-spacing: -0.02em;
            line-height: 1;
        }
        header h1 span { color: var(--gold); }
        header p {
            font-size: .85rem;
            color: var(--muted);
            letter-spacing: .08em;
            text-transform: uppercase;
            max-width: 220px;
            text-align: right;
        }

        /* ── FLASH ── */
        .flash {
            margin: 32px 40px 0;
            padding: 14px 20px;
            background: #1a2e1a;
            border-left: 3px solid #4caf50;
            border-radius: 4px;
            font-size: .9rem;
            color: #a8d5a2;
        }

        /* ── GRID ── */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2px;
            margin-top: 2px;
        }

        /* ── CARD ── */
        .card {
            position: relative;
            overflow: hidden;
            background: var(--surface);
            cursor: pointer;
            aspect-ratio: 3/4;
            display: flex;
            flex-direction: column;
        }
        .card:hover .card-img { transform: scale(1.07); }
        .card:hover .card-overlay { opacity: 1; }
        .card:hover .book-btn { transform: translateY(0); opacity: 1; }

        .card-img-wrap {
            flex: 1;
            overflow: hidden;
            position: relative;
        }
        .card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform .6s cubic-bezier(.25,.46,.45,.94);
        }
        /* placeholder when no image */
        .card-img-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #1e1e1e 0%, #2a2a2a 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: var(--border);
        }

        .card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,.85) 0%, transparent 60%);
            opacity: .5;
            transition: opacity .4s;
            pointer-events: none;
        }

        .book-btn {
            position: absolute;
            bottom: 90px;
            left: 50%;
            transform: translateX(-50%) translateY(12px);
            opacity: 0;
            transition: transform .35s ease, opacity .35s ease;
            background: var(--gold);
            color: #0d0d0d;
            border: none;
            padding: 10px 28px;
            font-family: 'DM Sans', sans-serif;
            font-size: .8rem;
            font-weight: 500;
            letter-spacing: .1em;
            text-transform: uppercase;
            cursor: pointer;
            white-space: nowrap;
            text-decoration: none;
        }
        .book-btn:hover { background: #e0bc60; }

        .card-info {
            padding: 18px 20px 20px;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.25rem;
            font-weight: 400;
            letter-spacing: .01em;
        }
        .card-price {
            font-size: .85rem;
            color: var(--gold);
            font-weight: 500;
            letter-spacing: .04em;
        }

        /* ── EMPTY STATE ── */
        .empty {
            text-align: center;
            padding: 120px 40px;
            color: var(--muted);
        }
        .empty svg { width: 56px; height: 56px; margin-bottom: 16px; opacity: .3; }
        .empty p { font-size: 1rem; letter-spacing: .05em; }

        @media (max-width: 600px) {
            header { flex-direction: column; align-items: flex-start; }
            header p { text-align: left; }
            .book-btn { opacity: 1; transform: translateX(-50%) translateY(0); }
        }
    </style>
</head>
<body>

<header>
    <h1>Our <span>Services</span></h1>
    <p>Click any service to book an appointment</p>
</header>

@if(session('success'))
    <div class="flash">✓ {{ session('success') }}</div>
@endif

@if($services->isEmpty())
    <div class="empty">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                  d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
        </svg>
        <p>No services available yet.</p>
    </div>
@else
    <div class="grid">
        @foreach($services as $service)
            <div class="card">
                <div class="card-img-wrap">
                    @if($service->image)
                        <img
                            class="card-img"
                            src="{{ asset('storage/' . $service->image) }}"
                            alt="{{ $service->name }}"
                        >
                    @else
                        <div class="card-img-placeholder">✦</div>
                    @endif

                    <div class="card-overlay"></div>

                    <a class="book-btn" href="#">
                        Book Now
                    </a>
                </div>

                <div class="card-info">
                    <span class="card-name">{{ $service->name }}</span>
                    <span class="card-price">${{ $service->mrp_price }}</span>
                </div>
            </div>
        @endforeach
    </div>
@endif

</body>
</html>
