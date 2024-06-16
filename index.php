<!DOCTYPE html>
<html>
	<head>
		<title>Mikufiku.codes</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="icon" type="image/png" href="images/webicon.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="scripts/roundbuttons.js"></script>
		<script src="scripts/navbar.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>
			// Get sites from json file
			var sites = $.getJSON("sites.json", function(json) {
				$.each(json, function(s_path, d) {
					// s_path - Path inside search box
					let f_path = [0]; // Path to file
					let title = d[1]; // Title
					let navbar = d[2]; // True/False

					if (navbar) {
						addNavButton(title, s_path);
					}
				});
				sites = json;
				loadUrl();
			});

			// Function to load site via ajax
			function loadUrl() {
				let hash = window.location.hash.substring(1) || "home";
				if (hash == "") {
					hash = "home";
				}

				let f_path = "main.html";
				if (Object.entries(sites).find(key => key[0] == hash)) {
					[_, [f_path, __]] = Object.entries(sites).find(key => key[0] == hash);
				} else {
					f_path = "err404.html";
				}

				$.ajax({
					url: f_path,
					type: "GET",
					success: function (res) {
						$("#front").html(res);
				}});
			}

			// Function to change hash of site and call loadUrl()
			function openUrl(s_path) {
				let hash = "/#" + s_path;

				history.pushState({page: s_path}, s_path, hash);
				loadUrl();
			}
			
			// Hashchange handler
			$(window).on("hashchange", function() {
				loadUrl()
			});

			// If hash is empty go to home
			if (window.location.hash == "") {
				openUrl("home");
			}
		</script>
	</head>
	<body>
		<div id="navbar">
			<p id="login_name"></p>
		</div>
		<div id="front">
		</div>
	</body>
</html>