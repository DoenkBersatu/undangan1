<?php
namespace PHPMaker2020\pesan;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$pesan_view = new pesan_view();

// Run the page
$pesan_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pesan_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pesan_view->isExport()) { ?>
<script>
var fpesanview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpesanview = currentForm = new ew.Form("fpesanview", "view");
	loadjs.done("fpesanview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pesan_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pesan_view->ExportOptions->render("body") ?>
<?php $pesan_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pesan_view->showPageHeader(); ?>
<?php
$pesan_view->showMessage();
?>
<form name="fpesanview" id="fpesanview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pesan">
<input type="hidden" name="modal" value="<?php echo (int)$pesan_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pesan_view->id_pesan->Visible) { // id_pesan ?>
	<tr id="r_id_pesan">
		<td class="<?php echo $pesan_view->TableLeftColumnClass ?>"><span id="elh_pesan_id_pesan"><?php echo $pesan_view->id_pesan->caption() ?></span></td>
		<td data-name="id_pesan" <?php echo $pesan_view->id_pesan->cellAttributes() ?>>
<span id="el_pesan_id_pesan">
<span<?php echo $pesan_view->id_pesan->viewAttributes() ?>><?php echo $pesan_view->id_pesan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pesan_view->nama->Visible) { // nama ?>
	<tr id="r_nama">
		<td class="<?php echo $pesan_view->TableLeftColumnClass ?>"><span id="elh_pesan_nama"><?php echo $pesan_view->nama->caption() ?></span></td>
		<td data-name="nama" <?php echo $pesan_view->nama->cellAttributes() ?>>
<span id="el_pesan_nama">
<span<?php echo $pesan_view->nama->viewAttributes() ?>><?php echo $pesan_view->nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pesan_view->alamat->Visible) { // alamat ?>
	<tr id="r_alamat">
		<td class="<?php echo $pesan_view->TableLeftColumnClass ?>"><span id="elh_pesan_alamat"><?php echo $pesan_view->alamat->caption() ?></span></td>
		<td data-name="alamat" <?php echo $pesan_view->alamat->cellAttributes() ?>>
<span id="el_pesan_alamat">
<span<?php echo $pesan_view->alamat->viewAttributes() ?>><?php echo $pesan_view->alamat->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pesan_view->pesan->Visible) { // pesan ?>
	<tr id="r_pesan">
		<td class="<?php echo $pesan_view->TableLeftColumnClass ?>"><span id="elh_pesan_pesan"><?php echo $pesan_view->pesan->caption() ?></span></td>
		<td data-name="pesan" <?php echo $pesan_view->pesan->cellAttributes() ?>>
<span id="el_pesan_pesan">
<span<?php echo $pesan_view->pesan->viewAttributes() ?>><?php echo $pesan_view->pesan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pesan_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pesan_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$pesan_view->terminate();
?>