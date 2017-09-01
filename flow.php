<html>
<head><title>Flow of forms</title></head>
<body>
<h1>MasterControl upload workflow</h1>
<h2>Flow of events</h2>
<h3><a href="create_request.php">1 - Create request (Requestor)</a></h3>
<p><a href="register.php">1a - Register request (automated)</a></p>
<h3><a href="new_requests.php">2 - List of new requests (Creator/revisor) (status=1)</a></h3>
<h3><a href="create_doc.php">3 - Create document record (Creator/revisor)</a></h3>
<p><a href="submit_doc.php">3a - Submit document draft (automated)</a></p>
<h3><a href="drafts.php">4 - List of draft documents (Requestor) (status=2)</a></h3>
<h3><a href="submit_file.php">5 - Submit file(s) (Requestor)</a></h3>
<p><a href="complete_req.php">5a - Complete request record (automated)</a></p>
<h3><a href="completed.php">6 - List of completed requests (status=3)</a></h3>
<p><a href="finalise.php">6a - Finalise request (upload done) (automated)</a></p>
<h3><a href="completed_ups.php">7 - List of completed uploads (status=4)</a></h3>
<p><a href="reset_req.php">7a - Reset to requestor (automated)</a></p>

<h2>General functions</h2>
<h3><a href="display.php">Show record details</a></h3>
</body>
</html>




