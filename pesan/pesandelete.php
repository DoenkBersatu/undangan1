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
$pesan_delete = new pesan_delete();

// Run the page
$pesan_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pesan_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpesandelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpesandelete = currentForm = new ew.Form("fpesandelete", "delete");
	loadjs.done("fpesandelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pesan_delete->showPageHeader(); ?>
<?php
$pesan_delete->showMessage();
?>
<form name="fpesandelete" id="fpesandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pesan">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pesan_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pesan_delete->id_pesan->Visible) { // id_pesan ?>
		<th class="<?php echo $pesan_delete->id_pesan->headerCellClass() ?>"><span id="elh_pesan_id_pesan" class="pesan_id_pesan"><?php echo $pesan_delete->id_pesan->caption() ?></span></th>
<?php } ?>
<?php if ($pesan_delete->nama->Visible) { // nama ?>
		<th class="<?php echo $pesan_delete->nama->headerCellClass() ?>"><span id="elh_pesan_nama" class="pesan_nama"><?php echo $pesan_delete->nama->caption() ?></span></th>
<?php } ?>
<?php if ($pesan_delete->alamat->Visible) { // alamat ?>
		<th class="<?php echo $pesan_delete->alamat->headerCellClass() ?>"><span id="elh_pesan_alamat" class="pesan_alamat"><?php echo $pesan_delete->alamat->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pesan_delete->RecordCount = 0;
$i = 0;
while (!$pesan_delete->Recordset->EOF) {
	$pesan_delete->RecordCount++;
	$pesan_delete->RowCount++;

	// Set row properties
	$pesan->resetAttributes();
	$pesan->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pesan_delete->loadRowValues($pesan_delete->Recordset);

	// Render row
	$pesan_delete->renderRow();
?>
	<tr <?php echo $pesan->rowAttributes() ?>>
<?php if ($pesan_delete->id_pesan->Visible) { // id_pesan ?>
		<td <?php echo $pesan_delete->id_pesan->cellAttributes() ?>>
<span id="el<?php echo $pesan_delete->RowCount ?>_pesan_id_pesan" class="pesan_id_pesan">
<span<?php echo $pesan_delete->id_pesan->viewAttributes() ?>><?php echo $pesan_delete->id_pesan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pesan_delete->nama->Visible) { // nama ?>
		<td <?php echo $pesan_delete->nama->cellAttributes() ?>>
<span id="el<?php echo $pesan_delete->RowCount ?>_pesan_nama" class="pesan_nama">
<span<?php echo $pesan_delete->nama->viewAttributes() ?>><?php echo $pesan_delete->nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pesan_delete->alamat->Visible) { // alamat ?>
		<td <?php echo $pesan_delete->alamat->cellAttributes() ?>>
<span id="el<?php echo $pesan_delete->RowCount ?>_pesan_alamat" class="pesan_alamat">
<span<?php echo $pesan_delete->alamat->viewAttributes() ?>><?php echo $pesan_delete->alamat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pesan_delete->Recordset->moveNext();
}
$pesan_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pesan_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pesan_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$pesan_delete->terminate();
?>