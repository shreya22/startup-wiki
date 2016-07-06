<!DOCTYPE html>
<html lang="en">

<body>
<?php $session_data = $this->session->userdata('logged_in');
 echo "Welcome ".$session_data['name']; ?>
<br/><br/><br/>
<a href="home/logout">Logout</a>
</body>

</html>

