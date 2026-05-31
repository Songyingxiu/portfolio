// --- SEARCH ENGINE LOGIC ---
function performSearch() {
  const query = document
    .getElementById("searchInput")
    .value.toLowerCase()
    .trim();
  if (!query) return;

  if (query.includes("resume") || query.includes("cv")) {
    document
      .getElementById("resume-window")
      .scrollIntoView({ behavior: "smooth", block: "center" });
  } else if (query.includes("about") || query.includes("profile")) {
    openAboutModal();
  } else if (query.includes("skill")) {
    openSkillsModal();
  } else if (
    query.includes("project") ||
    query.includes("portfolio") ||
    query.includes("work")
  ) {
    document.getElementById("projects").scrollIntoView({ behavior: "smooth" });
  } else if (
    query.includes("contact") ||
    query.includes("email") ||
    query.includes("github") ||
    query.includes("linkedin")
  ) {
    document
      .getElementById("contact")
      .scrollIntoView({ behavior: "smooth", block: "center" });
  } else if (query.includes("music") || query.includes("spotify")) {
    document
      .getElementById("music-player")
      .scrollIntoView({ behavior: "smooth", block: "center" });
  } else if (query.includes("calendar") || query.includes("date")) {
    document
      .getElementById("calendar-app")
      .scrollIntoView({ behavior: "smooth", block: "center" });
  } else {
    alert("Error 404: File not found for '" + query + ".exe'");
  }

  // Clear the input after searching
  document.getElementById("searchInput").value = "";
}

// --- GENERIC DYNAMIC MODAL LOGIC (ADDED FOR PROJECTS) ---
function openModal(modalId) {
  document.getElementById(modalId).classList.remove("hidden");
}
function closeModal(modalId) {
  document.getElementById(modalId).classList.add("hidden");
}

// --- LUNERA MODAL LOGIC ---
function openLuneraModal() {
  document.getElementById("luneraModal").classList.remove("hidden");
}

function closeLuneraModal() {
  document.getElementById("luneraModal").classList.add("hidden");
}

function switchLuneraTab(tabName) {
  const tabs = ["overview", "backend", "qa"];
  tabs.forEach((t) => {
    const contentBlock = document.getElementById(`luneraTab-${t}`);
    const currentBtn = document.getElementById(`tabBtn-${t}`);
    if (t === tabName) {
      contentBlock.classList.remove("hidden");
      currentBtn.className =
        "px-4 py-1 text-xs font-label-mono bg-white border-t-2 border-x-2 border-outline -mb-[5px] relative z-10 font-bold text-primary";
    } else {
      contentBlock.classList.add("hidden");
      currentBtn.className =
        "px-4 py-1 text-xs font-label-mono bg-surface-container border border-outline opacity-70 hover:opacity-100";
    }
  });
}

// --- REAL-TIME CLOCK & CALENDAR LOGIC (JAKARTA TIME) ---
function updateTimeAndDate() {
  const timeOptions = {
    timeZone: "Asia/Jakarta",
    hour: "numeric",
    minute: "2-digit",
    hour12: true,
  };
  const dateOptions = { timeZone: "Asia/Jakarta" };
  const now = new Date();

  // Taskbar Clock
  const timeString = new Intl.DateTimeFormat("en-US", timeOptions).format(now);
  document.getElementById("taskbar-clock").textContent = timeString + " GMT +7";

  // Calendar App
  const month = new Intl.DateTimeFormat("en-US", {
    ...dateOptions,
    month: "short",
  }).format(now);
  const year = new Intl.DateTimeFormat("en-US", {
    ...dateOptions,
    year: "numeric",
  }).format(now);
  const dayName = new Intl.DateTimeFormat("en-US", {
    ...dateOptions,
    weekday: "long",
  }).format(now);
  const dayNumber = new Intl.DateTimeFormat("en-US", {
    ...dateOptions,
    day: "numeric",
  }).format(now);

  document.getElementById("cal-month-year").textContent = `${month} ${year}`;
  document.getElementById("cal-day-number").textContent = dayNumber;
  document.getElementById("cal-day-name").textContent = dayName;
}

// --- ABOUT & SKILLS MODAL LOGIC ---
function openAboutModal() {
  document.getElementById("aboutModal").classList.remove("hidden");
}
function closeAboutModal() {
  document.getElementById("aboutModal").classList.add("hidden");
}

function openSkillsModal() {
  document.getElementById("skillsModal").classList.remove("hidden");
}
function closeSkillsModal() {
  document.getElementById("skillsModal").classList.add("hidden");
}

// --- RESUME MAXIMIZE & MINIMIZE LOGIC ---
function maximizeResume() {
  document.getElementById("resume-window").classList.add("y2k-maximized");
}
function minimizeResume() {
  document.getElementById("resume-window").classList.remove("y2k-maximized");
}

window.onload = function () {
  updateTimeAndDate();
  setInterval(updateTimeAndDate, 1000);

  // Listen for the "Enter" key on the search bar
  document
    .getElementById("searchInput")
    .addEventListener("keypress", function (e) {
      if (e.key === "Enter") {
        performSearch();
      }
    });
};
