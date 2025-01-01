// Dark Mode
const darkModeToggle = document.getElementById("dark-mode-toggle");
const body = document.body;

const darkMode = localStorage.getItem("darkMode");

const enableDarkMode = () => {
  body.classList.add("dark-mode");
  darkModeToggle.innerHTML = '<i class="ph ph-moon"></i>';
  localStorage.setItem("darkMode", "enabled");
};

const disableDarkMode = () => {
  body.classList.remove("dark-mode");
  darkModeToggle.innerHTML = '<i class="ph ph-sun"></i>';
  localStorage.setItem("darkMode", null);
};

if (darkMode === "enabled") {
  enableDarkMode();
}

darkModeToggle.addEventListener("click", () => {
  const darkMode = localStorage.getItem("darkMode");
  if (darkMode !== "enabled") {
    enableDarkMode();
  } else {
    disableDarkMode();
  }
});

// Responsive Menu Navbar
const menuIcon = document.getElementById("menu-icon");
const menuList = document.getElementById("menu-list");

menuIcon.addEventListener("click", () => {
  menuList.classList.toggle("hidden");
});
