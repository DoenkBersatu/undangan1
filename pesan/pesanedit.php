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
$pesan_edit = new pesan_edit();

// Run the page
$pesan_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pesan_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpesanedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpesanedit = currentForm = new ew.Form("fpesanedit", "edit");

	// Validate form
	fpesanedit.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($pesan_edit->id_pesan->Required) { ?>
				elm = this.getElements("x" + infix + "_id_pesan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pesan_edit->id_pesan->caption(), $pesan_edit->id_pesan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pesan_edit->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pesan_edit->nama->caption(), $pesan_edit->nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pesan_edit->alamat->Required) { ?>
				elm = this.getElements("x" + infix + "_alamat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pesan_edit->alamat->caption(), $pesan_edit->alamat->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pesan_edit->pesan->Required) { ?>
				elm = this.getElements("x" + infix + "_pesan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pesan_edit->pesan->caption(), $pesan_edit->pesan->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fpesanedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpesanedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpesanedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pesan_edit->showPageHeader(); ?>
<?php
$pesan_edit->showMessage();
?>
<form name="fpesanedit" id="fpesanedit" class="<?php echo $pesan_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pesan">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pesan_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pesan_edit->id_pesan->Visible) { // id_pesan ?>
	<div id="r_id_pesan" class="form-group row">
		<label id="elh_pesan_id_pesan" class="<?php echo $pesan_edit->LeftColumnClass ?>"><?php echo $pesan_edit->id_pesan->caption() ?><?php echo $pesan_edit->id_pesan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pesan_edit->RightColumnClass ?>"><div <?php echo $pesan_edit->id_pesan->cellAttributes() ?>>
<span id="el_pesan_id_pesan">
<span<?php echo $pesan_edit->id_pesan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pesan_edit->id_pesan->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pesan" data-field="x_id_pesan" name="x_id_pesan" id="x_id_pesan" value="<?php echo HtmlEncode($pesan_edit->id_pesan->CurrentValue) ?>">
<?php echo $pesan_edit->id_pesan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pesan_edit->nama->Visible) { // nama ?>
	<div id="r_nama" class="form-group row">
		<label id="elh_pesan_nama" for="x_nama" class="<?php echo $pesan_edit->LeftColumnClass ?>"><?php echo $pesan_edit->nama->caption() ?><?php echo $pesan_edit->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pesan_edit->RightColumnClass ?>"><div <?php echo $pesan_edit->nama->cellAttributes() ?>>
<span id="el_pesan_nama">
<input type="text" data-table="pesan" data-field="x_nama" name="x_nama" id="x_nama" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($pesan_edit->nama->getPlaceHolder()) ?>" value="<?php echo $pesan_edit->nama->EditValue ?>"<?php echo $pesan_edit->nama->editAttributes() ?>>
</span>
<?php echo $pesan_edit->nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pesan_edit->alamat->Visible) { // alamat ?>
	<div id="r_alamat" class="form-group row">
		<label id="elh_pesan_alamat" for="x_alamat" class="<?php echo $pesan_edit->LeftColumnClass ?>"><?php echo $pesan_edit->alamat->caption() ?><?php echo $pesan_edit->alamat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pesan_edit->RightColumnClass ?>"><div <?php echo $pesan_edit->alamat->cellAttributes() ?>>
<span id="el_pesan_alamat">
<input type="text" data-table="pesan" data-field="x_alamat" name="x_alamat" id="x_alamat" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($pesan_edit->alamat->getPlaceHolder()) ?>" value="<?php echo $pesan_edit->alamat->EditValue ?>"<?php echo $pesan_edit->alamat->editAttributes() ?>>
</span>
<?php echo $pesan_edit->alamat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pesan_edit->pesan->Visible) { // pesan ?>
	<div id="r_pesan" class="form-group row">
		<label id="elh_pesan_pesan" for="x_pesan" class="<?php echo $pesan_edit->LeftColumnClass ?>"><?php echo $pesan_edit->pesan->caption() ?><?php echo $pesan_edit->pesan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pesan_edit->RightColumnClass ?>"><div <?php echo $pesan_edit->pesan->cellAttributes() ?>>
<span id="el_pesan_pesan">
<textarea data-table="pesan" data-field="x_pesan" name="x_pesan" id="x_pesan" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pesan_edit->pesan->getPlaceHolder()) ?>"<?php echo $pesan_edit->pesan->editAttributes() ?>><?php echo $pesan_edit->pesan->EditValue ?></textarea>
</span>
<?php echo $pesan_edit->pesan->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pesan_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pesan_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pesan_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pesan_edit->showPageFooter();
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
$pesan_edit->terminate();
?>