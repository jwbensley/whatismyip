<!DOCTYPE html>
<html>
	<head><title>What is my IPv4 and IPv6 address?</title><meta charset="UTF-8"></head>
	<body>

	<h2>Your IPv4 address is: <span id="addr4">waiting...</span></h2>
	<h2>Your IPv6 address is: <span id="addr6">waiting...</span></h2>

	<script>
		// usually would use jquery or something for this sort of thing
		// but in the interest of keeping it small, let's use the horrible native XMLHttpRequest api
		function loaded4 () { loaded(4,this); }
		function loaded6 () { loaded(6,this); }
		function loaded (family,o) {
			if (o.readyState == 4) {
				if (o.status == 200) {
					var z = document.getElementById("addr" + family);
					a = document.createElement('a');
					a.href = 'https://apps.db.ripe.net/search/query.html?searchtext=' + o.responseText;
					t = document.createTextNode(o.responseText);
					a.appendChild(t);
					while (z.firstChild) { z.removeChild(z.firstChild); }
					z.appendChild(a);
				} else {
					document.getElementById("addr" + family).innerHTML = "Couldn't retrieve, probably don't have one.";
				}
			}
		};
		var r = new XMLHttpRequest();
		r.onreadystatechange = loaded4;
		r.open("GET", "http://ipv4.53bits.co.uk/", true);
		r.send();

		var q = new XMLHttpRequest();
		q.onreadystatechange = loaded6;
		q.open("GET", "http://ipv6.53bits.co.uk/", true);
		q.send();
	</script>
	</body>
</html>

