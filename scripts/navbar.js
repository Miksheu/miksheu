function addNavButton(name, s_path) {
	let nav_parent = document.getElementById("navbar");
	let nav = document.createElement("div");
	nav.textContent = name;
	nav.onclick = function () {
		openUrl(s_path);
	}
	nav.className = "nav_button";
	nav_parent.appendChild(nav);
}