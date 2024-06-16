function addRoundButton(title, title_bg, desc, s_path) {
	let b_parent = document.getElementById("align_buttons");

	let b_title = document.createElement("div");
	b_title.textContent = title;
	b_title.className = "round_buttons_title";
	b_title.style = "background-color: " + title_bg + ";"
	
	let b_desc = document.createElement("p");
	b_desc.className = "p";
	b_desc.textContent = desc;

	let b = document.createElement("div");
	b.className = "round_buttons";
	b.onclick = function () {
		openUrl(s_path);
	}

	b.appendChild(b_title);
	b.appendChild(b_desc);

	b_parent.appendChild(b);
}