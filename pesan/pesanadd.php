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
$pesan_add = new pesan_add();

// Run the page
$pesan_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pesan_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpesanadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpesanadd = currentForm = new ew.Form("fpesanadd", "add");

	// Validate form
	fpesanadd.validate = function() {
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
			<?php if ($pesan_add->nama->Required) { ?>
				elm = this.getElements("x" + infix + "_nama");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pesan_add->nama->caption(), $pesan_add->nama->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pesan_add->alamat->Required) { ?>
				elm = this.getElements("x" + infix + "_alamat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pesan_add->alamat->caption(), $pesan_add->alamat->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pesan_add->pesan->Required) { ?>
				elm = this.getElements("x" + infix + "_pesan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pesan_add->pesan->caption(), $pesan_add->pesan->RequiredErrorMessage)) ?>");
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
	fpesanadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpesanadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpesanadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pesan_add->showPageHeader(); ?>
<?php
$pesan_add->showMessage();
?>
<form name="fpesanadd" id="fpesanadd" class="<?php echo $pesan_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pesan">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pesan_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pesan_add->nama->Visible) { // nama ?>
	<div id="r_nama" class="form-group row">
		<label id="elh_pesan_nama" for="x_nama" class="<?php echo $pesan_add->LeftColumnClass ?>"><?php echo $pesan_add->nama->caption() ?><?php echo $pesan_add->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pesan_add->RightColumnClass ?>"><div <?php echo $pesan_add->nama->cellAttributes() ?>>
<span id="el_pesan_nama">
<input type="text" data-table="pesan" data-field="x_nama" name="x_nama" id="x_nama" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($pesan_add->nama->getPlaceHolder()) ?>" value="<?php echo $pesan_add->nama->EditValue ?>"<?php echo $pesan_add->nama->editAttributes() ?>>
</span>
<?php echo $pesan_add->nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pesan_add->alamat->Visible) { // alamat ?>
	<div id="r_alamat" class="form-group row">
		<label id="elh_pesan_alamat" for="x_alamat" class="<?php echo $pesan_add->LeftColumnClass ?>"><?php echo $pesan_add->alamat->caption() ?><?php echo $pesan_add->alamat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pesan_add->RightColumnClass ?>"><div <?php echo $pesan_add->alamat->cellAttributes() ?>>
<span id="el_pesan_alamat">
<input type="text" data-table="pesan" data-field="x_alamat" name="x_alamat" id="x_alamat" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($pesan_add->alamat->getPlaceHolder()) ?>" value="<?php echo $pesan_add->alamat->EditValue ?>"<?php echo $pesan_add->alamat->editAttributes() ?>>
</span>
<?php echo $pesan_add->alamat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pesan_add->pesan->Visible) { // pesan ?>
	<div id="r_pesan" class="form-group row">
		<label id="elh_pesan_pesan" for="x_pesan" class="<?php echo $pesan_add->LeftColumnClass ?>"><?php echo $pesan_add->pesan->caption() ?><?php echo $pesan_add->pesan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pesan_add->RightColumnClass ?>"><div <?php echo $pesan_add->pesan->cellAttributes() ?>>
<span id="el_pesan_pesan">
<textarea data-table="pesan" data-field="x_pesan" name="x_pesan" id="x_pesan" cols="35" rows="4" placeholder="<?php echo HtmlEncode($pesan_add->pesan->getPlaceHolder()) ?>"<?php echo $pesan_add->pesan->editAttributes() ?>><?php echo $pesan_add->pesan->EditValue ?></textarea>
</span>
<?php echo $pesan_add->pesan->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pesan_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pesan_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pesan_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pesan_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	document.getElementById("btn-action").innerHTML="<span class='fa fa-send'></span> Kirim Pesan",$("#btn-cancel").hide();
});
</script>
<?php include_once "footer.php"; ?>
<?php
$pesan_add->terminate();
?>