<?php 
	//include('scripts/loadUsers.php');
	if (!isset($_SESSION['current_user'])) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>AddressBook App</title>
	<link type="text/css" rel="stylesheet" href="css/mainStyles.css" media="all" />
	<script type="text/javascript" src="scripts/jquery.js"></script>
	<script type="text/javascript" src="scripts/jqueryUI.js"></script>
	<script type="text/javascript" src="scripts/scrollTo.js"></script>
	<script type="text/javascript" src="scripts/soundmanager2-nodebug-jsmin.js"></script>
	<script type="text/javascript" src="classes/UpdateChat.class.js"></script>
	<script type="text/javascript" src="classes/ChatApp.class.js"></script>
	<script type="text/javascript" src="classes/RenderErrors.class.js"></script>
	<script type="text/javascript" src="classes/EvalData.class.js"></script>
	<script type="text/javascript" src="classes/LoadConversations.class.js"></script>
	<script type="text/javascript" src="classes/EnableConversations.class.js"></script>
	<script type="text/javascript" src="classes/StartConversation.class.js"></script>
	<script type="text/javascript" src="classes/RenderConversation.class.js"></script>
	<script type="text/javascript" src="classes/SetWindowPosition.class.js"></script>
	<script type="text/javascript" src="classes/SetWindowFocus.class.js"></script>
	<script type="text/javascript" src="classes/RenderMessages.class.js"></script>
	<script type="text/javascript" src="classes/SendMessage.class.js"></script>
	<script type="text/javascript" src="classes/EndConversation.class.js"></script>
	<script type="text/javascript" src="scripts/chatApp.js"></script>
	<script type="text/javascript">
		soundManager.url = 'soundManager/';
		soundManager.waitForWindowLoad = true;
		soundManager.debugMode = false;
		soundManager.onload = function() {
			soundManager.createSound('correct', 'sounds/correct2.mp3');
			soundManager.createSound('error', 'sounds/error.mp3');
		}
	</script>

</head>

<body>
	<div id="wrapper">
		<h1>Logo</h1>
		<div id="controlPanel" class="interfaceElement">
			<div id="controlPanelTop">
				<h2>Control Panel</h2>
			</div>
			<div id="controlPanelBody">
				<h3 id="loggedIn"><?php echo $_SESSION['current_user']; ?></h3>
				<div class="listHeader">
					<p>Friend List</p>
				</div>
				<ul id="userList">
					<?php
						foreach($_SESSION['onlineUsers'] as $user) {
							echo "<li><span class=\"" . $user . "\">" . $user . "</span></li>";
						}
					?>
				</ul>
			</div>
			<div id="controlPanelFooter">
				<a href="scripts/logout.php">Logout</a>
			</div>
		</div>
		<span id="preloader"></span>
	</div>
</body>
</html>