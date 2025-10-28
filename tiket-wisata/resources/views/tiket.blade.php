<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Informasi Tiket Wisata</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

:root {
    --bg-dark: radial-gradient(circle at top right, #831843, #3b0764);
    --bg-light: radial-gradient(circle at top right, #ffe4e6, #fff0f6);
    --text-dark: #fdf2f8;
    --text-light: #3b0764;
    --accent: #f472b6;
    --btn-dark: linear-gradient(135deg, #db2777, #be185d);
    --btn-light: linear-gradient(135deg, #f472b6, #fb7185);
    --harga: #ec4899;
}

body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    height: 100vh;
    background: var(--bg-dark);
    color: var(--text-dark);
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    opacity: 0;
    animation: fadeInPage 1.2s ease forwards;
    transition: all 0.8s ease;
}
@keyframes fadeInPage {
    from { opacity: 0; transform: scale(1.02); }
    to { opacity: 1; transform: scale(1); }
}
.fade-out {
    animation: fadeOutPage 0.8s ease forwards;
}
@keyframes fadeOutPage {
    from { opacity: 1; transform: scale(1); }
    to { opacity: 0; transform: scale(0.98); }
}

/* Bokeh background */
.bokeh {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    overflow: hidden;
    z-index: 0;
}
.bokeh span {
    position: absolute;
    display: block;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(255,192,203,0.3), transparent 70%);
    animation: drift 18s linear infinite;
}
@keyframes drift {
    0% { transform: translateY(100vh) scale(0.6); opacity: 0.6; }
    50% { opacity: 0.8; }
    100% { transform: translateY(-10vh) scale(1.1); opacity: 0; }
}

/* Card style */
.card {
    position: relative;
    z-index: 1;
    background: rgba(255,255,255,0.1);
    border-radius: 18px;
    border: 1px solid rgba(255,255,255,0.2);
    backdrop-filter: blur(18px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    padding: 40px 55px;
    text-align: center;
    transition: all 0.5s ease;
}
h2 {
    color: var(--accent);
    margin-bottom: 20px;
    font-size: 26px;
}
p {
    font-size: 18px;
    color: #fbcfe8;
    margin: 10px 0;
}
.harga {
    color: var(--harga);
    font-weight: 600;
}
.btn {
    display: inline-block;
    margin-top: 25px;
    padding: 12px 25px;
    background: var(--btn-dark);
    border-radius: 10px;
    color: white;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    box-shadow: 0 4px 14px rgba(236,72,153,0.3);
}
.btn:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(236,72,153,0.4);
}

/* Light Mode */
body.light {
    background: var(--bg-light);
    color: var(--text-light);
}
body.light .card {
    background: rgba(255,255,255,0.7);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}
body.light h2 {
    background: linear-gradient(90deg, #ec4899, #f472b6);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
body.light p { color: #7e22ce; }
body.light .btn {
    background: var(--btn-light);
}
body.light .harga {
    color: #be185d;
}
</style>
</head>
<body>
    <button class="toggle-btn" id="themeToggle"
        style="position:absolute; top:20px; right:20px; background:rgba(255,255,255,0.1);
        border:none; border-radius:30px; width:50px; height:50px; cursor:pointer;
        font-size:22px; color:white; box-shadow:0 4px 10px rgba(0,0,0,0.2); z-index:10;">🌙</button>

    <div class="bokeh">
        <span style="left:10%; width:80px; height:80px; animation-delay:1s; animation-duration:20s;"></span>
        <span style="left:30%; width:60px; height:60px; animation-delay:3s; animation-duration:18s;"></span>
        <span style="left:50%; width:100px; height:100px; animation-delay:5s; animation-duration:22s;"></span>
        <span style="left:70%; width:70px; height:70px; animation-delay:2s; animation-duration:17s;"></span>
        <span style="left:85%; width:90px; height:90px; animation-delay:4s; animation-duration:21s;"></span>
    </div>

    <div class="card">
        <h2>Informasi Tiket Wisata</h2>
        <p>Tempat Wisata: <b>{{ $tempat }}</b></p>
        <p>Harga Tiket: <span class="harga">Rp {{ number_format($harga, 0, ',', '.') }}</span></p>
        <a href="{{ url('/') }}" class="btn">⬅ Kembali ke Halaman Utama</a>
    </div>

<script>
    document.querySelectorAll("a").forEach(link => {
        link.addEventListener("click", e => {
            e.preventDefault();
            document.body.classList.add("fade-out");
            setTimeout(() => window.location = link.href, 600);
        });
    });
    const toggle = document.getElementById("themeToggle");
    toggle.addEventListener("click", () => {
        document.body.classList.toggle("light");
        toggle.textContent = document.body.classList.contains("light") ? "🌞" : "🌙";
    });
</script>
</body>
</html>
