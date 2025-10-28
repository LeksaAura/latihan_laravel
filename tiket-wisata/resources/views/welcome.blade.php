<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistem Tiket Wisata</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

:root {
  --bg-dark: radial-gradient(circle at top left, #831843, #3b0764);
  --bg-light: linear-gradient(135deg, #fff0f6, #ffe4e6);
  --text-dark: #fdf2f8;
  --text-light: #3b0764;
  --accent: #ec4899;
  --btn-dark: linear-gradient(135deg, #db2777, #be185d);
  --btn-light: linear-gradient(135deg, #f472b6, #fb7185);
}

/* Basic layout */
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

/* Sprinkle bokeh */
.bokeh {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  overflow: hidden;
  z-index: 0;
  pointer-events: none;
}
.bokeh span {
  position: absolute;
  display: block;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(255,192,203,0.3), transparent 70%);
  animation: drift 18s linear infinite;
}
@keyframes drift {
  0% { transform: translateY(100vh) scale(0.5); opacity: 0.6; }
  50% { opacity: 0.8; }
  100% { transform: translateY(-10vh) scale(1.2); opacity: 0; }
}

/* Card */
.card {
  position: relative;
  z-index: 1;
  background: rgba(255,255,255,0.08);
  border: 1px solid rgba(255,255,255,0.15);
  border-radius: 20px;
  backdrop-filter: blur(20px);
  padding: 50px 60px;
  text-align: center;
  width: 420px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.3);
  transition: all 0.5s ease;
}
h1 { font-size: 28px; margin-bottom: 10px; color: var(--text-dark); }
p { color: #fbcfe8; margin-bottom: 25px; }
.accent { color: #f472b6; }

.btn {
  display: block;
  margin: 10px auto;
  padding: 12px 25px;
  background: var(--btn-dark);
  border-radius: 12px;
  color: white;
  text-decoration: none;
  font-weight: 500;
  transition: all 0.3s ease;
  box-shadow: 0 4px 14px rgba(236,72,153,0.3);
  width: 250px;
}
.btn:hover {
  transform: translateY(-3px) scale(1.02);
  box-shadow: 0 8px 20px rgba(236,72,153,0.4);
}

footer { margin-top: 25px; font-size: 13px; color: #f9a8d4; }

/* Toggle button + ripple */
.toggle-btn {
  position: absolute;
  top: 20px; right: 20px;
  background: rgba(255,255,255,0.1);
  border: none;
  border-radius: 50%;
  width: 50px; height: 50px;
  cursor: pointer;
  font-size: 22px;
  color: white;
  box-shadow: 0 4px 10px rgba(0,0,0,0.2);
  overflow: hidden;
  z-index: 10;
  transition: all 0.3s ease;
}
.toggle-btn:hover {
  transform: scale(1.05);
}
.toggle-btn::after {
  content: "";
  position: absolute;
  width: 10px;
  height: 10px;
  background: rgba(255,255,255,0.4);
  border-radius: 50%;
  transform: scale(0);
  opacity: 0;
  pointer-events: none;
  transition: all 0.5s ease;
}
.toggle-btn.ripple::after {
  transform: scale(10);
  opacity: 0;
}

/* Light Mode */
body.light {
  background: var(--bg-light);
  color: var(--text-light);
}
body.light .card {
  background: rgba(255,255,255,0.75);
  border: 1px solid rgba(255,255,255,0.6);
  box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}
body.light h1 {
  color: #831843;
  background: linear-gradient(90deg, #ec4899, #f472b6);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
body.light p { color: #7e22ce; }
body.light .btn {
  background: var(--btn-light);
  color: white;
  box-shadow: 0 4px 18px rgba(244,114,182,0.3);
}
body.light footer { color: #be185d; }
body.light .toggle-btn {
  background: rgba(0,0,0,0.05);
  color: #831843;
}
body.light .bokeh span {
  background: radial-gradient(circle, rgba(244,114,182,0.15), transparent 70%);
}
</style>
</head>
<body>
  <button class="toggle-btn" id="themeToggle">🌙</button>

  <div class="bokeh">
    <span style="left:10%; width:80px; height:80px; animation-delay:0s; animation-duration:20s;"></span>
    <span style="left:25%; width:60px; height:60px; animation-delay:3s; animation-duration:18s;"></span>
    <span style="left:45%; width:100px; height:100px; animation-delay:6s; animation-duration:22s;"></span>
    <span style="left:65%; width:70px; height:70px; animation-delay:2s; animation-duration:17s;"></span>
    <span style="left:80%; width:90px; height:90px; animation-delay:5s; animation-duration:21s;"></span>
  </div>

  <div class="card">
    <h1>🎟 <span class="accent">Sistem Tiket Wisata</span></h1>
    <p>Pilih destinasi wisata untuk melihat harga tiket:</p>

    <a href="{{ url('/tiket/Papuma/20000') }}" class="btn">Tiket Papuma — Rp 20.000</a>
    <a href="{{ url('/tiket/WatuUlo/15000') }}" class="btn">Tiket Watu Ulo — Rp 15.000</a>
    <a href="{{ url('/tiket/PancerPuger/10000') }}" class="btn">Tiket Pancer Puger — Rp 10.000</a>

    <footer>© 2025 <span class="accent">Sistem Tiket Wisata</span></footer>
  </div>

<script>
  // Fade transition
  document.querySelectorAll("a").forEach(link => {
    link.addEventListener("click", e => {
      e.preventDefault();
      document.body.classList.add("fade-out");
      setTimeout(() => window.location = link.href, 600);
    });
  });

  // Theme Toggle + Ripple
  const toggle = document.getElementById("themeToggle");
  toggle.addEventListener("click", e => {
    toggle.classList.remove("ripple");
    void toggle.offsetWidth;
    toggle.classList.add("ripple");
    document.body.classList.toggle("light");
    toggle.textContent = document.body.classList.contains("light") ? "🌞" : "🌙";
  });
</script>
</body>
</html>
