I didn't write this, I found it somewhere on the Internet years ago. No idea who owns the copyright.

When I found this it didn't work on Nginx so this is merely a reference for of implementing on Nginx when also using PHP-FPM.

* GZIP compression needed to be disabled for the Ajax to work on both the IPv4 and IPv6 sub-domains: `gzip off;`
* Only on the IPv6 sub-domain one must allow cross origin headers: `add_header Access-Control-Allow-Origin *;`
