<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book — {{ $service->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:       #0d0d0d;
            --surface:  #161616;
            --border:   #2a2a2a;
            --gold:     #c9a84c;
            --text:     #e8e2d9;
            --muted:    #6b6460;
            --error:    #e05c5c;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        /* ── LEFT PANEL (service preview) ── */
        .preview {
            position: sticky;
            top: 0;
            height: 100vh;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        .preview-img {
            flex: 1;
            object-fit: cover;
            width: 100%;
            display: block;
        }
        .preview-placeholder {
            flex: 1;
            background: linear-gradient(135deg, #1a1a1a, #222);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 6rem;
            color: var(--border);
        }
        .preview-meta {
            padding: 28px 32px;
            background: var(--surface);
            border-top: 1px solid var(--border);
        }
        .preview-meta h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.9rem;
            font-weight: 300;
            line-height: 1.1;
        }
        .preview-meta .price {
            margin-top: 6px;
            color: var(--gold);
            font-size: .9rem;
            letter-spacing: .06em;
        }

        /* ── RIGHT PANEL (form) ── */
        .form-panel {
            padding: 60px 48px 80px;
            overflow-y: auto;
            border-left: 1px solid var(--border);
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--muted);
            text-decoration: none;
            font-size: .8rem;
            letter-spacing: .08em;
            text-transform: uppercase;
            margin-bottom: 48px;
            transition: color .2s;
        }
        .back-link:hover { color: var(--text); }

        .form-heading {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2rem, 3.5vw, 2.8rem);
            font-weight: 300;
            line-height: 1.1;
            margin-bottom: 8px;
        }
        .form-heading span { color: var(--gold); }
        .form-sub {
            font-size: .85rem;
            color: var(--muted);
            margin-bottom: 40px;
        }

        /* ── FORM FIELDS ── */
        .field { margin-bottom: 28px; }
        label {
            display: block;
            font-size: .72rem;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 8px;
        }
        input, select, textarea {
            width: 100%;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 2px;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: .95rem;
            padding: 13px 16px;
            transition: border-color .2s;
            outline: none;
            appearance: none;
            -webkit-appearance: none;
        }
        input:focus, select:focus, textarea:focus {
            border-color: var(--gold-dim, #8a6e30);
        }
        input::placeholder, textarea::placeholder { color: var(--muted); }
        textarea { resize: vertical; min-height: 100px; }

        /* select arrow */
        .select-wrap { position: relative; }
        .select-wrap::after {
            content: '▾';
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            pointer-events: none;
            font-size: .8rem;
        }
        select { padding-right: 36px; cursor: pointer; }
        select option { background: #1e1e1e; }

        /* row */
        .row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }

        /* errors */
        .error-msg {
            font-size: .78rem;
            color: var(--error);
            margin-top: 5px;
        }
        input.has-error, select.has-error, textarea.has-error {
            border-color: var(--error);
        }

        /* submit */
        .submit-btn {
            width: 100%;
            padding: 16px;
            background: var(--gold);
            color: #0d0d0d;
            border: none;
            font-family: 'DM Sans', sans-serif;
            font-size: .85rem;
            font-weight: 500;
            letter-spacing: .12em;
            text-transform: uppercase;
            cursor: pointer;
            margin-top: 8px;
            transition: background .2s;
        }
        .submit-btn:hover { background: #e0bc60; }

        /* ── RESPONSIVE ── */
        @media (max-width: 768px) {
            body { grid-template-columns: 1fr; }
            .preview { position: relative; height: 280px; }
            .form-panel { padding: 36px 24px 60px; border-left: none; border-top: 1px solid var(--border); }
            .row { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<!-- LEFT: service preview -->
<div class="preview">
    @if($service->image)
        <img class="preview-img"
             src="{{ asset('storage/' . $service->image) }}"
             alt="{{ $service->name }}">
    @else
        <div class="preview-placeholder">✦</div>
    @endif
    <div class="preview-meta">
        <h2>{{ $service->name }}</h2>
        <p class="price">${{ number_format($service->price, 2) }} per session</p>
    </div>
</div>

<!-- RIGHT: booking form -->
<div class="form-panel">

    <a class="back-link" href="{{ route('frontend_services.index') }}">
        ← All Services
    </a>

    <h1 class="form-heading">Book a <span>Session</span></h1>
    <p class="form-sub">Fill in your details and we'll confirm your appointment.</p>

    @if($errors->any())
        <div style="margin-bottom:28px; padding:14px 18px; background:#2a1a1a; border-left:3px solid var(--error); font-size:.85rem; color:#e08080;">
            Please fix the errors below.
        </div>
    @endif

    <form action="{{ route('frontend_services.submit-booking') }}" method="POST">
        @csrf

        <!-- Service selector (pre-selected) -->
        <div class="field">
            <label for="service_id">Service</label>
            <div class="select-wrap">
                <select name="service_id" id="service_id"
                        class="{{ $errors->has('service_id') ? 'has-error' : '' }}">
                    @foreach($services as $s)
                        <option value="{{ $s->id }}"
                            {{ (old('service_id', $service->id) == $s->id) ? 'selected' : '' }}>
                            {{ $s->name }} — ${{ number_format($s->price, 2) }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('service_id')
                <p class="error-msg">{{ $message }}</p>
            @enderror
        </div>

        <!-- Name & Email -->
        <div class="row">
            <div class="field">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name"
                       value="{{ old('name') }}"
                       placeholder="Jane Doe"
                       class="{{ $errors->has('name') ? 'has-error' : '' }}">
                @error('name') <p class="error-msg">{{ $message }}</p> @enderror
            </div>
            <div class="field">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email"
                       value="{{ old('email') }}"
                       placeholder="jane@example.com"
                       class="{{ $errors->has('email') ? 'has-error' : '' }}">
                @error('email') <p class="error-msg">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Phone & Date -->
        <div class="row">
            <div class="field">
                <label for="phone">Phone (optional)</label>
                <input type="tel" name="phone" id="phone"
                       value="{{ old('phone') }}"
                       placeholder="+1 555 000 0000">
            </div>
            <div class="field">
                <label for="booking_date">Preferred Date</label>
                <input type="date" name="booking_date" id="booking_date"
                       value="{{ old('booking_date') }}"
                       min="{{ date('Y-m-d') }}"
                       class="{{ $errors->has('booking_date') ? 'has-error' : '' }}">
                @error('booking_date') <p class="error-msg">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Message -->
        <div class="field">
            <label for="message">Additional Notes (optional)</label>
            <textarea name="message" id="message"
                      placeholder="Any special requests or questions...">{{ old('message') }}</textarea>
        </div>

        <button type="submit" class="submit-btn">Confirm Booking →</button>
    </form>
</div>

</body>
</html>
