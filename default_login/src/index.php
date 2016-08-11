<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><!-- InstanceBegin template="/Templates/Master_No_Nav.dwt" codeOutsideHTMLIsLocked="false" -->


	

	<link rel="stylesheet" rev="stylesheet" href="./web/style.css" type="text/css">
		
	
	
	
	
	
	<link rel="stylesheet" rev="stylesheet" href="./web/substyle_DIR-615.css" type="text/css"><!-- InstanceBeginEditable name="Page Title" --><title>D-LINK SYSTEMS, INC. | WIRELESS ROUTER : Login</title><!-- InstanceEndEditable --><!-- InstanceBeginEditable name="Local Styles" -->
	


	
	
	

	
	<style type="text/css">
	/*
	 * Styles used only on this page.
	 */
	fieldset label.duple {
		width: 300px;
	}
	</style><!-- InstanceEndEditable -->
	

	
		
	

	<script type="text/javascript" src="./web/ubicom.js"></script>
	<script type="text/javascript" src="./web/xml_data.js"></script>

	<script type="text/javascript">
	//<![CDATA[
		/*
		 * no_reboot_alt_location is for wizards, which want to return
		 * to the "launch page", instead of the same page.
		 */
		var no_reboot_alt_location = "";

		function do_reboot()
		{
			top.location = "/reboot.cgi?reset=false"
		}

		function no_reboot()
		{
			if (no_reboot_alt_location) {
				top.location = no_reboot_alt_location;
				return;
			}
			document.getElementById("maincontent_1col").style.display = "block";
			document.getElementById("rebootcontent_1col").style.display = "none";
		}

		// 

		function template_load()
		{
			// 

			/*
			 * Prepend "0" to Firmware minor version if it is less than 10
			 */
			global_fw_minor_version = "21";
			if (global_fw_minor_version < 10) {
				global_fw_minor_version = "0" + global_fw_minor_version;
				//document.getElementById("fw_minor_head").innerHTML = global_fw_minor_version;
			}

			//
			var fw_extend_ver = "";			
			//

			var fw_minor;

			fw_minor = global_fw_minor_version + fw_extend_ver;
			document.getElementById("fw_minor_head").innerHTML = fw_minor;
			global_fw_minor_version = fw_minor; // save to for device info use

			page_load();

			document.getElementById("loader_container").style.display = "none";
		}
	//]]>
	</script><!-- InstanceBeginEditable name="Scripts" -->

	
	<script type="text/javascript" src="./web/md5.js"></script>
	<script type="text/javascript">
	//<![CDATA[
	function page_load()
	{
		/* Detect browsers that cannot handle XML methods. */
		if (!document.getElementsByTagName || !((document.implementation && document.implementation.createDocument) || window.ActiveXObject)) {
			alert ("Your web browser is too old to use this web site. Please upgrade your browser.");
			return;
		}

		/* For debugging on a local client. */
		if ("" != "") {
			hide_all_ssi_tr();
		}
		document.forms.myform.password.focus();
	}

	function data_ready(xml)
	{
		var status = xml.getElementData("login");
		if (status) {
			if (status == "timeout") {
				alert("Session timeout, please try again.");
				location.replace ('/');
			} else if (status == "error") {
				alert("Invalid password, please try again.");
				location.replace ('/');
			} else {
				location.replace ('/' + status);
			}
		}
	}

	function data_timeout()
	{
		/* We did not get a reply from the server, the connection is likely down. */
		alert ("The network connection seems to be down. Press 'Ok' to try again.");
		location.reload(true);
	}

	function send_login()
	{
		/* Salt in hex, 8 chars long. */
		var salt = "c2ce9dd5";

		var password = document.forms.myform.password.value.substr(0,16);
		document.forms.myform.password.value = "";		// Make sure password never gets sent as clear text

		/* Pad the password to 16 chars. */
		for (var i = password.length; i < 16; i++) {
			password += String.fromCharCode(1);
		}

		/* Append the password to the salt and pad the result to 63 bytes. */
		var input = salt + password;
		for (var i = input.length; i < 63; i++) {
			input += String.fromCharCode(1);
		}

		/* Append a 'U' for user login, or a '\x01' for admin login. */
		input += (document.forms["myform"].username.value == 'user') ? 'U' : String.fromCharCode(1);

		/* MD5 hash of the salt. */
		var hash = hex_md5(input);

		/* Append the MD5 hash to the salt. */
		var login_hash = salt.concat(hash);

		/* Send the login hash to the server. */
		var xmlobj = new xmlDataObject(data_ready, data_timeout, 6000, "/post_login.xml?hash=" + login_hash);
		if (!xmlobj) {
			/* Browser does not support XML DOM. */
			alert ("Your web browser is too old to use this web site. Please upgrade your browser.");
			return;
		}
		xmlobj.retrieveData();
	}

	//]]>
	</script><!-- InstanceEndEditable --></head><body onload="template_load();">
	<div style="display: none;" id="loader_container" onclick="return false;">&nbsp;</div>
	<div id="outside_1col">
		<table id="table_shell" summary="" cellspacing="0"><colgroup><col span="1">
			</colgroup><tbody>
			<tr>
				<td>
					<div id="header_container">
						<div id="info_bar">
							<div class="fwv">Firmware Version:
							2.<span id="fw_minor_head">21</span>
							</div>
							<div class="hwv">Hardware Version:
							B2
							</div>
							<div class="pp">Product Page: <a href="#">DVA-G3810BN-TL</a></div>
						</div>
					</div>
					<table id="masthead_container" summary="" border="0" cellspacing="0">
						<tbody><tr>
							<td><div id="masthead_image"></div></td>
						</tr>
					</tbody></table>
					<table id="content_container" summary="" border="0" cellspacing="0">
						<tbody><tr>
							<td id="sidenav_container">&nbsp;</td>
							<td id="maincontent_container">
								<div id="rebootcontent_1col" style="display: none;">
									<div class="section">
										<div class="section_head">
											<h2>Reboot needed</h2>
											<p>
Your changes have been saved. The router must be rebooted for the
changes to take effect. You can reboot now, or you can continue to make
other changes and reboot later. </p>
											<input class="button_submit" value="Reboot Now" onclick="do_reboot()" type="button">
											<input class="button_submit" value="Reboot Later" onclick="no_reboot()" type="button">
										</div>
									</div> <!-- reboot_warning -->
								</div>
								<div id="maincontent_1col" style="display: block;">

									<!-- InstanceBeginEditable name="Main_Content" -->
			<div class="section">
				<div class="section_head"> 
<?php
$user = isset($_POST['username']) ? $_POST['username'] : '';
$pass = isset($_POST['password']) ? $_POST['password'] : '';
$passed = ($user == 'admin' && $pass == 'telus');
?>
<?php if($passed) : ?>
					<h2>Congratulations!</h2>
					<p>Here's the flag:</p>
					<i>&nbsp;&nbsp;flag{1_5h4ll_n3v3r_l34v3_p455w0rd5_45_7h31r_d3f4ul75}</i>
<?php else: ?>
					<h2>Login</h2>
					<noscript> 
						&lt;p class="warning"&gt;WARNING: JavaScript is not enabled for this browser!&lt;/p&gt;
					</noscript> 
					<p>Log in to the router:</p>
					<form id="myform" action="" method="post">
							<fieldset>
								<p>
									<label class="duple" for="username">User Name&nbsp;:</label>
									<input id="username" name="username">
								</p>
								<p> 
									<label class="duple" for="password">Password&nbsp;:</label>
									<input id="password" maxlength="15" name="password" value="" type="password">
									<input type="submit" value="Log In">
								</p>
							</fieldset>
					</form>
<?php endif; ?>
				</div>
			</div> <!-- section -->
									<!-- InstanceEndEditable -->

								</div>
								

							</td>
							<td id="sidehelp_container">&nbsp;</td>
						</tr>
					</tbody></table>
					<table id="footer_container" summary="" border="0" cellspacing="0">
						<tbody><tr>
							<td>
								<img src="./web/img_wireless_bottom.gif" alt="" height="35" width="114">
							</td>
							<td>&nbsp;</td>
						</tr>
					</tbody></table>
				</td>
			</tr>
			</tbody>
		</table>

		<div id="copyright">Copyright © 2004-2007 D-Link Systems, Inc.</div>
	</div>
<!-- InstanceEnd --></body></html>
