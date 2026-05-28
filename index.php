<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>dollhouse - welcome to my world</title>
  
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,700;12..96,800&family=Courier+Prime&family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
  
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary-container": "#ffb7e1",
            "surface-container-high": "#e7e8ed",
            "surface": "#f8f9fe",
            "on-error-container": "#93000a",
            "inverse-primary": "#f9b1db",
            "on-secondary-fixed": "#1f0b52",
            "surface-tint": "#854b70",
            "primary-fixed": "#ffd8ec",
            "tertiary-fixed-dim": "#9dd1bf",
            "secondary-container": "#c2b0fd",
            "on-primary": "#ffffff",
            "on-tertiary-container": "#2d5f50",
            "outline-variant": "#d4c2c9",
            "surface-container-highest": "#e1e2e7",
            "on-primary-container": "#7c4468",
            "on-secondary-fixed-variant": "#4b3c7f",
            "tertiary": "#366758",
            "on-surface-variant": "#50434a",
            "secondary": "#645499",
            "secondary-fixed": "#e8deff",
            "surface-bright": "#f8f9fe",
            "on-primary-fixed-variant": "#6a3457",
            "primary-fixed-dim": "#f9b1db",
            "tertiary-container": "#a3d7c5",
            "on-surface": "#191c1f",
            "surface-container-lowest": "#ffffff",
            "on-tertiary-fixed-variant": "#1c4f41",
            "outline": "#82737a",
            "on-background": "#191c1f",
            "surface-variant": "#e1e2e7",
            "primary": "#854b70",
            "on-primary-fixed": "#36082a",
            "on-secondary-container": "#504084",
            "on-secondary": "#ffffff",
            "inverse-surface": "#2e3134",
            "on-tertiary-fixed": "#002018",
            "surface-container": "#eceef3",
            "error": "#ba1a1a",
            "tertiary-fixed": "#b9eedb",
            "background": "#f8f9fe",
            "error-container": "#ffdad6",
            "secondary-fixed-dim": "#cdbdff",
            "surface-container-low": "#f2f3f8",
            "on-error": "#ffffff",
            "surface-dim": "#d8dadf",
            "inverse-on-surface": "#eff0f5",
            "on-tertiary": "#ffffff"
          },
          borderRadius: {
            DEFAULT: "0.25rem",
            lg: "0.5rem",
            xl: "0.75rem",
            full: "9999px"
          },
          spacing: {
            "stack-overlap": "-1rem",
            "container-padding": "2rem",
            base: "8px",
            gutter: "1.5rem",
            "window-gap": "2rem"
          },
          fontFamily: {
            "headline-lg": ["Bricolage Grotesque"],
            "headline-lg-mobile": ["Bricolage Grotesque"],
            "label-mono": ["Courier Prime"],
            "display-xl": ["Bricolage Grotesque"],
            "button-text": ["Plus Jakarta Sans"],
            "body-md": ["Plus Jakarta Sans"]
          },
          fontSize: {
            "headline-lg": ["2.5rem", { lineHeight: "1.2", fontWeight: "700" }],
            "headline-lg-mobile": ["1.75rem", { lineHeight: "1.2", fontWeight: "700" }],
            "label-mono": ["0.875rem", { lineHeight: "1.4", letterSpacing: "0.05em", fontWeight: "400" }],
            "display-xl": ["4.5rem", { lineHeight: "1.1", letterSpacing: "-0.02em", fontWeight: "800" }],
            "button-text": ["0.938rem", { lineHeight: "1", fontWeight: "700" }],
            "body-md": ["1rem", { lineHeight: "1.6", fontWeight: "400" }]
          }
        }
      }
    };
  </script>
  
  <script>
    // --- LUNERA MODAL LOGIC ---
    function openLuneraModal() {
      document.getElementById('luneraModal').classList.remove('hidden');
    }

    function closeLuneraModal() {
      document.getElementById('luneraModal').classList.add('hidden');
    }

    function switchLuneraTab(tabName) {
      const tabs = ['overview', 'backend', 'qa'];
      tabs.forEach(t => {
        const contentBlock = document.getElementById(`luneraTab-${t}`);
        const currentBtn = document.getElementById(`tabBtn-${t}`);
        if (t === tabName) {
          contentBlock.classList.remove('hidden');
          currentBtn.className = "px-4 py-1 text-xs font-label-mono bg-white border-t-2 border-x-2 border-outline -mb-[5px] relative z-10 font-bold text-primary";
        } else {
          contentBlock.classList.add('hidden');
          currentBtn.className = "px-4 py-1 text-xs font-label-mono bg-surface-container border border-outline opacity-70 hover:opacity-100";
        }
      });
    }

    // --- REAL-TIME CLOCK & CALENDAR LOGIC (JAKARTA TIME) ---
    function updateTimeAndDate() {
      const timeOptions = { timeZone: 'Asia/Jakarta', hour: 'numeric', minute: '2-digit', hour12: true };
      const dateOptions = { timeZone: 'Asia/Jakarta' };
      const now = new Date();
      
      // Taskbar Clock
      const timeString = new Intl.DateTimeFormat('en-US', timeOptions).format(now);
      document.getElementById('taskbar-clock').textContent = timeString + " GMT +7";

      // Calendar App
      const month = new Intl.DateTimeFormat('en-US', { ...dateOptions, month: 'short' }).format(now);
      const year = new Intl.DateTimeFormat('en-US', { ...dateOptions, year: 'numeric' }).format(now);
      const dayName = new Intl.DateTimeFormat('en-US', { ...dateOptions, weekday: 'long' }).format(now);
      const dayNumber = new Intl.DateTimeFormat('en-US', { ...dateOptions, day: 'numeric' }).format(now);

      document.getElementById('cal-month-year').textContent = `${month} ${year}`;
      document.getElementById('cal-day-number').textContent = dayNumber;
      document.getElementById('cal-day-name').textContent = dayName;
    }

    window.onload = function() {
      updateTimeAndDate();
      setInterval(updateTimeAndDate, 1000);
    };
  </script>
  
  <style>
    body {
      background-color: #f8f9fe;
      background-image:
        url('data:image/svg+xml;utf8,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><filter id="noise"><feTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="4" stitchTiles="stitch"/></filter><rect width="100%" height="100%" filter="url(%23noise)" opacity="0.05"/></svg>'),
        radial-gradient(circle at 15% 50%, rgba(255, 183, 225, 0.2), transparent 40%),
        radial-gradient(circle at 85% 30%, rgba(194, 176, 253, 0.2), transparent 40%);
      background-attachment: fixed;
      cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="%23854b70" stroke="white" stroke-width="2" d="M3 3l7.07 16.97 2.51-7.39 7.39-2.51L3 3z"/></svg>') 1 1, auto;
    }

    .y2k-window {
      background: rgba(255, 255, 255, 0.9);
      border: 2px solid #82737a;
      box-shadow: 4px 4px 0px rgba(130, 115, 122, 0.2);
      border-radius: 0;
      overflow: hidden;
    }

    .y2k-window-header {
      background: linear-gradient(90deg, #c2b0fd, #ffb7e1);
      padding: 4px 12px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 2px solid #82737a;
    }

    .y2k-window-header-title {
      display: flex;
      align-items: center;
      gap: 4px;
    }

    .y2k-controls {
      display: flex;
      gap: 4px;
    }

    .y2k-control-btn {
      width: 16px;
      height: 16px;
      background: white;
      border: 1px solid #82737a;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 10px;
      cursor: pointer;
      color: #82737a;
    }

    .y2k-sticker {
      background: #ffb7e1;
      border: 2px solid #191c1f;
      color: #191c1f;
      box-shadow: 2px 2px 0px #191c1f;
      transition: all 0.1s;
      font-weight: bold;
    }

    .y2k-sticker:active {
      transform: translate(2px, 2px);
      box-shadow: 0px 0px 0px #191c1f;
    }

    .floating-element {
      animation: float 6s ease-in-out infinite;
      position: absolute;
      z-index: 0;
      pointer-events: none;
    }

    @keyframes float {
      0% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-15px) rotate(5deg); }
      100% { transform: translateY(0px) rotate(0deg); }
    }

    .pixel-border {
      image-rendering: pixelated;
    }

    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }

    .custom-scroll::-webkit-scrollbar {
      width: 12px;
      height: 12px;
    }

    .custom-scroll::-webkit-scrollbar-track {
      background: #f2f3f8;
      border: 1px solid #82737a;
    }

    .custom-scroll::-webkit-scrollbar-thumb {
      background: #d4c2c9;
      border: 1px solid #82737a;
    }
  </style>
</head>
<body class="font-body-md text-body-md text-on-surface min-h-screen flex flex-col pt-[60px] pb-[40px] relative overflow-x-hidden">

  <div class="floating-element top-20 left-10 text-primary-container">
    <span class="material-symbols-outlined" style="font-size: 48px;">star</span>
  </div>
  <div class="floating-element top-40 right-20 text-secondary-container" style="animation-delay: 1s;">
    <span class="material-symbols-outlined" style="font-size: 32px;">auto_awesome</span>
  </div>
  <div class="floating-element top-1/2 left-5 text-tertiary-container" style="animation-delay: 2s;">
    <span class="material-symbols-outlined" style="font-size: 40px;">favorite</span>
  </div>
  <div class="floating-element bottom-40 right-10 text-primary-fixed" style="animation-delay: 1.5s;">
    <span class="material-symbols-outlined" style="font-size: 56px;">star</span>
  </div>
  <div class="floating-element bottom-20 left-1/4 text-secondary-fixed" style="animation-delay: 0.5s;">
    <span class="material-symbols-outlined" style="font-size: 36px;">filter_vintage</span>
  </div>

  <header class="fixed w-full z-50 top-0 border-b-2 border-outline bg-surface-container-low shadow-[0_2px_0_rgba(130,115,122,0.2)]">
    <nav class="flex justify-between items-center w-full px-container-padding py-2 max-w-[1440px] mx-auto">
      <div class="font-display-xl text-primary text-3xl italic tracking-tight drop-shadow-[2px_2px_0px_#ffffff]">
        dollhouse
      </div>
      <div class="hidden md:flex items-center gap-6">
        <a class="font-button-text text-button-text text-primary flex flex-col items-center gap-1 hover:text-on-primary-container" href="#home">
          <span class="material-symbols-outlined text-xl">home</span>
          home
        </a>
        <a class="font-button-text text-button-text text-on-surface-variant flex flex-col items-center gap-1 hover:text-primary" href="#about">
          <span class="material-symbols-outlined text-xl">favorite</span>
          about
        </a>
        <a class="font-button-text text-button-text text-on-surface-variant flex flex-col items-center gap-1 hover:text-primary" href="#projects">
          <span class="material-symbols-outlined text-xl">folder</span>
          projects
        </a>
        <a class="font-button-text text-button-text text-on-surface-variant flex flex-col items-center gap-1 hover:text-primary" href="#skills">
          <span class="material-symbols-outlined text-xl">star</span>
          skills
        </a>
        <a class="font-button-text text-button-text text-on-surface-variant flex flex-col items-center gap-1 hover:text-primary" href="#contact">
          <span class="material-symbols-outlined text-xl">mail</span>
          contact
        </a>
      </div>
      <div class="flex items-center gap-2">
        <div class="relative bg-white border border-outline flex items-center px-2 py-1">
          <input class="border-none outline-none text-sm w-32 focus:ring-0 p-0" placeholder="search..." type="text" />
          <span class="material-symbols-outlined text-sm text-outline">search</span>
        </div>
        <button class="y2k-sticker p-1 flex items-center justify-center">
          <span class="material-symbols-outlined text-sm">search</span>
        </button>
      </div>
    </nav>
  </header>

  <main class="flex-grow w-full max-w-[1440px] mx-auto px-4 sm:px-container-padding py-8 flex flex-col gap-6 relative z-10" id="home">
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
      <div class="lg:col-span-3 flex flex-col gap-6">
        <div class="y2k-window">
          <div class="y2k-window-header">
            <div class="y2k-window-header-title">
              <span class="material-symbols-outlined text-sm">person</span>
              <span class="font-label-mono text-label-mono text-on-surface">profile.exe</span>
            </div>
            <div class="y2k-controls">
              <button class="y2k-control-btn">_</button>
              <button class="y2k-control-btn">□</button>
              <button class="y2k-control-btn">×</button>
            </div>
          </div>
          <div class="p-4 flex flex-col items-center gap-4 bg-surface-container-low">
            <div class="w-24 h-24 rounded-full overflow-hidden border-2 border-primary bg-surface-container shadow-[2px_2px_0px_#854b70]">
              <img alt="A cute stylized portrait of a young woman" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBoaRs9JO9MkfPwe4Msu0VIlHeXW_B5BrTt2pu_IV1xJvtp6uesCSi9X1I7oK2nZ8MbPxgw6FSMubjlyqjF3rhQldDzx2DWeMRJiyF3RQrCKAwbvjc4PBVmVg-r2X9Kt1xuUDO-I5Har03mYTd8U3Lvv5x65jISZo6AED5C_TtUtEF1EWt7nAqmtulPIBMpUk2sU_W9IgudBSfjZEdh4Jp58CwrR2cmp87PutcE2Og8jyu2nTfJcVO-w9L_sQ5rtg-WlULvLcBfmSw" />
            </div>
            <div class="text-center">
              <h2 class="font-headline-lg-mobile text-xl text-primary">Debra Stevenson</h2>
              <p class="font-label-mono text-label-mono text-on-surface-variant mt-1">status: trying my best...</p>
            </div>
            <div class="w-full border-t border-outline border-dashed pt-4 flex flex-col gap-2">
              <a class="flex justify-between items-center text-sm font-label-mono hover:text-primary hover:bg-primary-container/20 px-2 py-1" href="#about">
                <span class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">favorite</span> about me</span>
                <span>></span>
              </a>
              <a class="flex justify-between items-center text-sm font-label-mono hover:text-primary hover:bg-primary-container/20 px-2 py-1" href="#skills">
                <span class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">star</span> skills</span>
                <span>></span>
              </a>
              <a class="flex justify-between items-center text-sm font-label-mono hover:text-primary hover:bg-primary-container/20 px-2 py-1" href="#contact">
                <span class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">mail</span> contact</span>
                <span>></span>
              </a>
            </div>
          </div>
        </div>
        
        <div class="bg-[#ffffa5] p-4 border border-[#e5e594] shadow-[4px_4px_0px_rgba(0,0,0,0.1)] transform rotate-2 w-4/5 mx-auto">
          <ul class="font-label-mono text-sm leading-loose list-none">
            <li><span class="material-symbols-outlined text-xs mr-1 align-middle">star</span>don't forget</li>
            <li><span class="material-symbols-outlined text-xs mr-1 align-middle">star</span>drink water</li>
            <li><span class="material-symbols-outlined text-xs mr-1 align-middle">star</span>write clean code</li>
            <li><span class="material-symbols-outlined text-xs mr-1 align-middle">star</span>have fun!</li>
          </ul>
        </div>
      </div>

      <div class="lg:col-span-9">
        <div class="y2k-window h-full">
          <div class="y2k-window-header">
            <div class="y2k-window-header-title">
              <span class="material-symbols-outlined text-sm">terminal</span>
              <span class="font-label-mono text-label-mono text-on-surface">welcome.exe</span>
            </div>
            <div class="y2k-controls">
              <button class="y2k-control-btn">_</button>
              <button class="y2k-control-btn">□</button>
              <button class="y2k-control-btn">×</button>
            </div>
          </div>
          <div class="p-8 md:p-12 flex flex-col items-center justify-center text-center gap-6 h-full relative overflow-hidden bg-white/50">
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#854b70 1px, transparent 1px); background-size: 20px 20px;"></div>
            <h1 class="font-display-xl text-4xl md:text-6xl text-primary drop-shadow-[3px_3px_0px_#ffb7e1] relative z-10">
              welcome to<br/>my portfolio
            </h1>
            <p class="font-label-mono text-base md:text-lg text-on-surface-variant max-w-lg relative z-10 bg-white/80 p-4 border border-outline border-dashed">
              Hello, my name is Debra. <br> 
              I'm a Full Stack Developer student at CEP CCIT FTUI and Asia E University. <br>
              This is my portfolio about some of my projects that I've done while studying at CCIT FTUI 𑣲⋆
            </p>
            <div class="flex gap-4 mt-4 relative z-10">
              <button class="y2k-sticker font-button-text text-button-text px-8 py-2 rounded-none uppercase tracking-wider flex items-center gap-2">
                enter <span class="material-symbols-outlined text-sm">arrow_forward</span>
              </button>
              <button class="bg-surface-container-low border-2 border-outline px-6 py-2 font-button-text uppercase tracking-wider shadow-[2px_2px_0px_#82737a] hover:bg-surface-container transition-colors">
                about us
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6" id="projects">
      <div class="y2k-window">
        <div class="y2k-window-header bg-gradient-to-r from-secondary-container to-secondary-fixed">
          <div class="y2k-window-header-title">
            <span class="material-symbols-outlined text-sm">star</span>
            <span class="font-label-mono text-label-mono text-on-surface">lunera_app.exe</span>
          </div>
          <div class="y2k-controls">
            <button class="y2k-control-btn">_</button>
            <button class="y2k-control-btn">□</button>
            <button class="y2k-control-btn">×</button>
          </div>
        </div>
        <div class="p-6 bg-surface">
          <div class="aspect-video bg-surface-container-high border border-outline mb-4 flex items-center justify-center overflow-hidden">
              <img alt="Screenshot of Lunera Project" class="w-full h-full object-cover" src="img/lunera-search.png" />
          </div>
          <div class="flex justify-between items-start mb-2">
            <h3 class="font-headline-lg-mobile text-xl text-primary">Project Lunera</h3>
            <span class="bg-secondary-container px-2 py-1 text-xs font-label-mono border border-secondary text-on-secondary-fixed">CI4 + SQA</span>
          </div>
          <p class="font-body-md text-sm text-on-surface-variant mb-4">
            A robust web platform engineered using CodeIgniter 4. Features intelligent Search API route architectures fully tested with automated Gherkin-style behaviors.
          </p>
          <div class="flex gap-2">
            <button onclick="openLuneraModal()" class="y2k-sticker px-4 py-1 text-sm flex items-center gap-1">
              <span class="material-symbols-outlined text-xs">visibility</span> view case study
            </button>
            <button class="border border-outline px-4 py-1 text-sm bg-white hover:bg-surface-container-low font-label-mono flex items-center gap-1">
              <span class="material-symbols-outlined text-xs">code</span> github repo
            </button>
          </div>
        </div>
      </div>

      <div class="y2k-window flex flex-col">
        <div class="y2k-window-header bg-gradient-to-r from-tertiary-container to-tertiary-fixed">
          <div class="y2k-window-header-title">
            <span class="material-symbols-outlined text-sm">description</span>
            <span class="font-label-mono text-label-mono text-on-surface">resume.pdf</span>
          </div>
          <div class="y2k-controls">
            <button class="y2k-control-btn">_</button>
            <button class="y2k-control-btn">□</button>
            <button class="y2k-control-btn">×</button>
          </div>
        </div>
        <div class="flex-grow bg-surface-container-low p-4 flex flex-col items-center justify-center gap-4 relative overflow-hidden">
          <div class="w-3/4 aspect-[1/1.4] bg-white border border-outline shadow-md p-4 flex flex-col gap-2 relative z-10 custom-scroll overflow-y-auto">
            <div class="h-4 bg-outline-variant w-1/2 mb-4"></div>
            <div class="h-2 bg-surface-variant w-full"></div>
            <div class="h-2 bg-surface-variant w-full"></div>
            <div class="h-2 bg-surface-variant w-5/6 mb-4"></div>
            <div class="h-3 bg-outline-variant w-1/3 mb-2"></div>
            <div class="h-2 bg-surface-variant w-full"></div>
            <div class="h-2 bg-surface-variant w-4/5"></div>
            <div class="h-2 bg-surface-variant w-full"></div>
          </div>
          <button class="y2k-sticker px-6 py-2 mt-2 flex items-center gap-2 relative z-10 w-3/4 justify-center">
            <span class="material-symbols-outlined">download</span>
            DOWNLOAD CV
          </button>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 pb-10">
      <div class="lg:col-span-8 flex flex-col gap-6">
        <div class="y2k-window">
          <div class="y2k-window-header bg-gradient-to-r from-secondary-container to-secondary-fixed">
            <div class="y2k-window-header-title">
              <span class="material-symbols-outlined text-sm">folder</span>
              <span class="font-label-mono text-label-mono text-on-surface">campus_projects.exe</span>
            </div>
            <div class="y2k-controls">
              <button class="y2k-control-btn">_</button>
              <button class="y2k-control-btn">□</button>
              <button class="y2k-control-btn">×</button>
            </div>
          </div>
          <div class="p-6 bg-surface grid grid-cols-1 sm:grid-cols-2 gap-4 h-72 overflow-y-auto custom-scroll border-t border-outline/30">
            <div class="bg-surface-container-low border border-outline p-3 hover:bg-surface-container transition-colors shadow-[2px_2px_0px_#82737a]">
              <div class="aspect-video bg-secondary-fixed-dim mb-3 border border-outline border-dashed flex items-center justify-center opacity-80">
                <span class="material-symbols-outlined text-secondary text-4xl">design_services</span>
              </div>
              <h4 class="font-button-text text-sm text-primary mb-1">UI Design Workshop</h4>
              <p class="font-body-md text-xs text-on-surface-variant leading-relaxed">Organized and led a comprehensive workshop focusing on accessible color palettes and retro interface patterns.</p>
            </div>
            <div class="bg-surface-container-low border border-outline p-3 hover:bg-surface-container transition-colors shadow-[2px_2px_0px_#82737a]">
              <div class="aspect-video bg-tertiary-fixed-dim mb-3 border border-outline border-dashed flex items-center justify-center opacity-80">
                <span class="material-symbols-outlined text-tertiary text-4xl">smartphone</span>
              </div>
              <h4 class="font-button-text text-sm text-primary mb-1">App Prototype</h4>
              <p class="font-body-md text-xs text-on-surface-variant leading-relaxed">Developed an interactive Figma prototype aimed at improving campus navigation and resource discovery.</p>
            </div>
            <div class="bg-surface-container-low border border-outline p-3 hover:bg-surface-container transition-colors shadow-[2px_2px_0px_#82737a]">
              <div class="aspect-video bg-primary-fixed-dim mb-3 border border-outline border-dashed flex items-center justify-center opacity-80">
                <span class="material-symbols-outlined text-primary text-4xl">code</span>
              </div>
              <h4 class="font-button-text text-sm text-primary mb-1">Hackathon Portal</h4>
              <p class="font-body-md text-xs text-on-surface-variant leading-relaxed">Built the frontend interface for the annual spring hackathon registration system.</p>
            </div>
            <div class="bg-surface-container-low border border-outline p-3 hover:bg-surface-container transition-colors shadow-[2px_2px_0px_#82737a]">
              <div class="aspect-video bg-[#ffffa5] mb-3 border border-outline border-dashed flex items-center justify-center opacity-80">
                <span class="material-symbols-outlined text-outline text-4xl">palette</span>
              </div>
              <h4 class="font-button-text text-sm text-primary mb-1">Design System</h4>
              <p class="font-body-md text-xs text-on-surface-variant leading-relaxed">Created a foundational component library for student club websites.</p>
            </div>
          </div>
        </div>

        <div class="y2k-window">
          <div class="y2k-window-header bg-gradient-to-r from-primary-container to-primary-fixed">
            <div class="y2k-window-header-title">
              <span class="material-symbols-outlined text-sm">photo_library</span>
              <span class="font-label-mono text-label-mono text-on-surface">past_orgs_gallery</span>
            </div>
            <div class="y2k-controls">
              <button class="y2k-control-btn">_</button>
              <button class="y2k-control-btn">□</button>
              <button class="y2k-control-btn">×</button>
            </div>
          </div>
          <div class="p-6 bg-surface-container-highest flex gap-6 overflow-x-auto custom-scroll border-t border-outline/30 items-center min-h-[220px]">
            <div class="min-w-[150px] bg-white p-3 pb-8 border border-outline shadow-[4px_4px_0px_rgba(130,115,122,0.3)] transform rotate-[-3deg] hover:rotate-0 hover:-translate-y-2 transition-all cursor-pointer">
              <div class="aspect-square bg-primary-container mb-3 border border-outline border-dashed flex items-center justify-center opacity-90">
                <span class="material-symbols-outlined text-primary text-5xl">event_available</span>
              </div>
              <p class="font-label-mono text-xs text-center text-on-surface font-bold">Event Coordinator</p>
              <p class="font-label-mono text-[10px] text-center text-on-surface-variant mt-1">Tech Club '22</p>
            </div>
            <div class="min-w-[150px] bg-white p-3 pb-8 border border-outline shadow-[4px_4px_0px_rgba(130,115,122,0.3)] transform rotate-[4deg] hover:rotate-0 hover:-translate-y-2 transition-all cursor-pointer">
              <div class="aspect-square bg-secondary-container mb-3 border border-outline border-dashed flex items-center justify-center opacity-90">
                <span class="material-symbols-outlined text-secondary text-5xl">brush</span>
              </div>
              <p class="font-label-mono text-xs text-center text-on-surface font-bold">Design Lead</p>
              <p class="font-label-mono text-[10px] text-center text-on-surface-variant mt-1">Creative Collective</p>
            </div>
            <div class="min-w-[150px] bg-white p-3 pb-8 border border-outline shadow-[4px_4px_0px_rgba(130,115,122,0.3)] transform rotate-[-2deg] hover:rotate-0 hover:-translate-y-2 transition-all cursor-pointer">
              <div class="aspect-square bg-tertiary-container mb-3 border border-outline border-dashed flex items-center justify-center opacity-90">
                <span class="material-symbols-outlined text-tertiary text-5xl">campaign</span>
              </div>
              <p class="font-label-mono text-xs text-center text-on-surface font-bold">PR Manager</p>
              <p class="font-label-mono text-[10px] text-center text-on-surface-variant mt-1">Student Union</p>
            </div>
            <div class="min-w-[150px] bg-white p-3 pb-8 border border-outline shadow-[4px_4px_0px_rgba(130,115,122,0.3)] transform rotate-[2deg] hover:rotate-0 hover:-translate-y-2 transition-all cursor-pointer">
              <div class="aspect-square bg-surface-variant mb-3 border border-outline border-dashed flex items-center justify-center opacity-90">
                <span class="material-symbols-outlined text-outline text-5xl">group</span>
              </div>
              <p class="font-label-mono text-xs text-center text-on-surface font-bold">Mentor</p>
              <p class="font-label-mono text-[10px] text-center text-on-surface-variant mt-1">Freshman Welcome</p>
            </div>
          </div>
        </div>
      </div>

      <div class="lg:col-span-4 flex flex-col gap-6">
        
        <div class="y2k-window">
          <div class="y2k-window-header bg-gradient-to-r from-tertiary-container to-tertiary-fixed">
            <div class="y2k-window-header-title">
              <span class="material-symbols-outlined text-sm">music_note</span>
              <span class="font-label-mono text-label-mono text-on-surface">music_player.exe</span>
            </div>
            <div class="y2k-controls">
              <button class="y2k-control-btn">_</button>
              <button class="y2k-control-btn">□</button>
              <button class="y2k-control-btn">×</button>
            </div>
          </div>
          <div class="p-3 bg-surface-container-low">
            <div class="bg-inverse-surface text-inverse-on-surface p-2 mb-2 border border-outline shadow-[inset_2px_2px_0px_rgba(0,0,0,0.3)]">
              <div class="flex justify-between items-center mb-1">
                <span class="font-label-mono text-[8px] uppercase tracking-tighter opacity-70">now playing</span>
                <span class="material-symbols-outlined text-[10px]">equalizer</span>
              </div>
              <div class="font-label-mono truncate">
                <p class="text-xs text-tertiary-fixed">dreaming.mp3</p>
              </div>
              <div class="mt-2">
                <div class="w-full h-1 bg-surface-variant relative">
                  <div class="absolute top-0 left-0 h-full w-1/3 bg-tertiary"></div>
                </div>
              </div>
            </div>
            <div class="flex justify-center items-center gap-1.5">
              <button class="y2k-control-btn w-6 h-6 flex items-center justify-center">
                <span class="material-symbols-outlined text-xs">skip_previous</span>
              </button>
              <button class="y2k-sticker w-8 h-8 flex items-center justify-center">
                <span class="material-symbols-outlined text-base">play_arrow</span>
              </button>
              <button class="y2k-control-btn w-6 h-6 flex items-center justify-center">
                <span class="material-symbols-outlined text-xs">pause</span>
              </button>
              <button class="y2k-control-btn w-6 h-6 flex items-center justify-center">
                <span class="material-symbols-outlined text-xs">skip_next</span>
              </button>
            </div>
          </div>
        </div>

        <div class="y2k-window" id="calendar-app">
          <div class="y2k-window-header bg-gradient-to-r from-primary-container to-secondary-container">
            <div class="y2k-window-header-title">
              <span class="material-symbols-outlined text-sm">calendar_today</span>
              <span class="font-label-mono text-label-mono text-on-surface">calendar.exe</span>
            </div>
            <div class="y2k-controls">
              <button class="y2k-control-btn">_</button>
              <button class="y2k-control-btn">□</button>
              <button class="y2k-control-btn">×</button>
            </div>
          </div>
          <div class="p-3 bg-surface text-center">
            <div class="bg-white border border-outline p-2 mb-2 shadow-[2px_2px_0px_rgba(130,115,122,0.3)]">
              <p id="cal-month-year" class="font-label-mono text-[10px] text-on-surface-variant uppercase tracking-widest font-bold">Loading...</p>
              <p id="cal-day-number" class="font-display-xl text-4xl text-primary mt-1 drop-shadow-[1px_1px_0px_#ffb7e1]">...</p>
              <p id="cal-day-name" class="font-label-mono text-xs text-secondary mt-1">...</p>
            </div>
            <div class="grid grid-cols-7 gap-1 text-[8px] font-label-mono text-on-surface-variant">
              <div>S</div><div>M</div><div>T</div><div>W</div><div class="text-primary font-bold">T</div><div>F</div><div>S</div>
            </div>
            <div class="w-full h-[2px] bg-outline-variant my-1"></div>
            <p class="font-label-mono text-[9px] text-tertiary">Timezone: WIB (Jakarta)</p>
          </div>
        </div>

        <div class="y2k-window" id="contact">
          <div class="y2k-window-header bg-gradient-to-r from-primary-container to-primary-fixed">
            <div class="y2k-window-header-title">
              <span class="material-symbols-outlined text-sm">mail</span>
              <span class="font-label-mono text-label-mono text-on-surface">let's be friends!</span>
            </div>
            <div class="y2k-controls">
              <button class="y2k-control-btn">×</button>
            </div>
          </div>
          <div class="p-3 bg-surface-container flex flex-col justify-center gap-2">
            <p class="font-label-mono text-[9px] text-center text-on-surface-variant">connect with me</p>
            <div class="grid grid-cols-4 gap-2 px-1">
              <a class="flex flex-col items-center gap-0.5 hover:-translate-y-1 transition-transform" href="mailto:debra.nethania.s@gmail.com">
                <div class="w-8 h-8 bg-white border border-outline flex items-center justify-center shadow-[2px_2px_0px_#82737a]">
                  <span class="material-symbols-outlined text-primary text-base">mail</span>
                </div>
                <span class="font-label-mono text-[7px]">email</span>
              </a>
              <a class="flex flex-col items-center gap-0.5 hover:-translate-y-1 transition-transform" href="#">
                <div class="w-8 h-8 bg-white border border-outline flex items-center justify-center shadow-[2px_2px_0px_#82737a]">
                  <span class="material-symbols-outlined text-secondary text-base">terminal</span>
                </div>
                <span class="font-label-mono text-[7px]">github</span>
              </a>
              <a class="flex flex-col items-center gap-0.5 hover:-translate-y-1 transition-transform" href="#">
                <div class="w-8 h-8 bg-white border border-outline flex items-center justify-center shadow-[2px_2px_0px_#82737a]">
                  <span class="material-symbols-outlined text-tertiary text-base">work</span>
                </div>
                <span class="font-label-mono text-[7px]">linkedin</span>
              </a>
              <a class="flex flex-col items-center gap-0.5 hover:-translate-y-1 transition-transform" href="#">
                <div class="w-8 h-8 bg-white border border-outline flex items-center justify-center shadow-[2px_2px_0px_#82737a]">
                  <span class="material-symbols-outlined text-outline text-base">link</span>
                </div>
                <span class="font-label-mono text-[7px]">links</span>
              </a>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </main>

  <footer class="fixed bottom-0 w-full z-50 flex items-center h-10 bg-surface-container-highest border-t-2 border-outline shadow-[0_-2px_0_rgba(130,115,122,0.2)]">
    <div class="flex justify-between items-center px-2 w-full h-full gap-4 max-w-[1440px] mx-auto">
      <div class="flex gap-2 h-full items-center">
        <button class="bg-surface-container-lowest border border-outline px-3 py-1 font-button-text text-sm flex items-center gap-1 shadow-[inset_-1px_-1px_0px_rgba(0,0,0,0.2),inset_1px_1px_0px_rgba(255,255,255,0.8)] active:shadow-[inset_1px_1px_0px_rgba(0,0,0,0.2)]">
          <span class="material-symbols-outlined text-sm text-primary">start</span>
          <span class="font-bold">start</span>
        </button>
        <div class="h-6 w-px bg-outline mx-1 hidden sm:block"></div>
        <div class="hidden sm:flex items-center bg-surface-container border border-outline px-2 h-7 shadow-[inset_1px_1px_0px_rgba(0,0,0,0.1)] gap-2">
          <span class="material-symbols-outlined text-sm">terminal</span>
          <span class="font-label-mono text-xs truncate max-w-[100px]">welcome.exe</span>
        </div>
      </div>
      <div class="flex items-center gap-2 h-full">
        <div class="flex items-center border border-outline bg-surface px-2 h-7 shadow-[inset_1px_1px_0px_rgba(0,0,0,0.1)] gap-2">
          <span class="material-symbols-outlined text-xs">volume_up</span>
          <span class="material-symbols-outlined text-xs">wifi</span>
          <span class="material-symbols-outlined text-xs">battery_full</span>
          <span id="taskbar-clock" class="font-label-mono text-xs ml-1">Loading...</span>
        </div>
      </div>
    </div>
  </footer>

  <div id="luneraModal" class="hidden fixed inset-0 z-[100] bg-on-surface/40 flex items-center justify-center p-4 backdrop-blur-xs">
    <div class="y2k-window w-full max-w-2xl max-h-[85vh] flex flex-col bg-surface shadow-[8px_8px_0px_rgba(130,115,122,0.4)]">
      <div class="y2k-window-header bg-gradient-to-r from-primary-container to-secondary-container">
        <div class="y2k-window-header-title">
          <span class="material-symbols-outlined text-sm">terminal</span>
          <span class="font-label-mono text-label-mono text-on-surface">lunera_deep_dive.doc</span>
        </div>
        <div class="y2k-controls">
          <button onclick="closeLuneraModal()" class="y2k-control-btn font-bold">×</button>
        </div>
      </div>
      
      <div class="flex border-b border-outline bg-surface-container-low p-1 gap-1">
        <button id="tabBtn-overview" onclick="switchLuneraTab('overview')" class="px-4 py-1 text-xs font-label-mono bg-white border-t-2 border-x-2 border-outline -mb-[5px] relative z-10 font-bold text-primary">
          Overview
        </button>
        <button id="tabBtn-backend" onclick="switchLuneraTab('backend')" class="px-4 py-1 text-xs font-label-mono bg-surface-container border border-outline opacity-70 hover:opacity-100">
          Backend & API
        </button>
        <button id="tabBtn-qa" onclick="switchLuneraTab('qa')" class="px-4 py-1 text-xs font-label-mono bg-surface-container border border-outline opacity-70 hover:opacity-100">
          QA & Testing
        </button>
      </div>

      <div class="p-6 overflow-y-auto custom-scroll flex-grow font-body-md text-sm text-on-surface-variant space-y-4 bg-white">
        
        <div id="luneraTab-overview" class="space-y-3">
          <h4 class="text-primary font-headline-lg-mobile text-lg border-b border-outline border-dashed pb-1">Project Summary</h4>
          <p>
            <strong>Lunera</strong> was built to solve specific challenges in real-time information lookups. Developed as a full-stack system, it targets rapid, reliable data rendering while ensuring high operational stability under active user load.
          </p>
          <div class="bg-surface-container-low border border-outline p-3 rounded-none font-label-mono text-xs">
            <p><strong>Role:</strong> Full-Stack Developer & SQA Engineer</p>
            <p><strong>Timeline:</strong> Academic Development Term</p>
            <p><strong>Core Stack:</strong> CodeIgniter 4, MySQL, Automated QA Suites</p>
          </div>
        </div>

        <div id="luneraTab-backend" class="hidden space-y-3">
          <h4 class="text-secondary font-headline-lg-mobile text-lg border-b border-outline border-dashed pb-1">Architecture & Search API</h4>
          <p>
            The backend engine leverages <strong>CodeIgniter 4</strong> following precise MVC guidelines. The highlight is an optimized dynamic <code>SearchAPI</code> logic layer designed to execute multi-column queries across the MySQL database securely.
          </p>
          <div class="bg-inverse-surface text-tertiary-fixed-dim p-3 rounded-none font-label-mono text-xs shadow-[inset_2px_2px_4px_rgba(0,0,0,0.5)] overflow-x-auto whitespace-pre">
// Search API Controller Action Example
public function searchAPI() {
    $keyword = $this->request->getVar('q');
    $results = $this->luneraModel->searchData($keyword);
    return $this->response->setJSON($results);
}</div>
        </div>

        <div id="luneraTab-qa" class="hidden space-y-3">
          <h4 class="text-tertiary font-headline-lg-mobile text-lg border-b border-outline border-dashed pb-1">Software Quality Assurance</h4>
          <p>
            Instead of basic manual checks, this project stands out through thorough structural auditing. Feature behaviors were validated utilizing automated framework tests paired with declarative test parameters.
          </p>
          <div class="bg-surface-container-low border border-outline p-3 rounded-none font-label-mono text-xs">
            <p class="text-primary font-bold mb-1"># Gherkin Behavior Specification:</p>
            <p class="text-on-surface"><span class="text-secondary font-bold">Feature:</span> Live Query Auto-Suggestions</p>
            <p class="pl-4"><span class="text-tertiary font-bold">Scenario:</span> Successfully matching active database records</p>
            <p class="pl-8"><span class="text-outline font-bold">Given</span> I am logged into the main dashboard resource</p>
            <p class="pl-8"><span class="text-outline font-bold">When</span> I type "diagnostic" into the search endpoint</p>
            <p class="pl-8"><span class="text-outline font-bold">Then</span> the JSON payloads should resolve status code 200</p>
          </div>
        </div>
      </div>

      <div class="p-3 bg-surface-container-low border-t border-outline flex justify-end">
        <button onclick="closeLuneraModal()" class="y2k-sticker px-6 py-1 text-xs">
          OK
        </button>
      </div>
    </div>
  </div>
</body>
</html>