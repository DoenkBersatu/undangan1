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
$pesan_list = new pesan_list();

// Run the page
$pesan_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pesan_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pesan_list->isExport()) { ?>
<script>
var fpesanlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fpesanlist = currentForm = new ew.Form("fpesanlist", "list");
	fpesanlist.formKeyCountName = '<?php echo $pesan_list->FormKeyCountName ?>';
	loadjs.done("fpesanlist");
});
var fpesanlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fpesanlistsrch = currentSearchForm = new ew.Form("fpesanlistsrch");

	// Dynamic selection lists
	// Filters

	fpesanlistsrch.filterList = <?php echo $pesan_list->getFilterList() ?>;
	loadjs.done("fpesanlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pesan_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($pesan_list->TotalRecords > 0 && $pesan_list->ExportOptions->visible()) { ?>
<?php $pesan_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($pesan_list->ImportOptions->visible()) { ?>
<?php $pesan_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($pesan_list->SearchOptions->visible()) { ?>
<?php $pesan_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($pesan_list->FilterOptions->visible()) { ?>
<?php $pesan_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$pesan_list->renderOtherOptions();
?>
<?php if (!$pesan_list->isExport() && !$pesan->CurrentAction) { ?>
<form name="fpesanlistsrch" id="fpesanlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fpesanlistsrch-search-panel" class="<?php echo $pesan_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pesan">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $pesan_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($pesan_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($pesan_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $pesan_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($pesan_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($pesan_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($pesan_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($pesan_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php $pesan_list->showPageHeader(); ?>
<?php
$pesan_list->showMessage();
?>
<?php if ($pesan_list->TotalRecords > 0 || $pesan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($pesan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pesan">
<form name="fpesanlist" id="fpesanlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pesan">
<div id="gmp_pesan" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($pesan_list->TotalRecords > 0 || $pesan_list->isGridEdit()) { ?>
<table id="tbl_pesanlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$pesan->RowType = ROWTYPE_HEADER;

// Render list options
$pesan_list->renderListOptions();

// Render list options (header, left)
$pesan_list->ListOptions->render("header", "left");
?>
<?php if ($pesan_list->id_pesan->Visible) { // id_pesan ?>
	<?php if ($pesan_list->SortUrl($pesan_list->id_pesan) == "") { ?>
		<th data-name="id_pesan" class="<?php echo $pesan_list->id_pesan->headerCellClass() ?>"><div id="elh_pesan_id_pesan" class="pesan_id_pesan"><div class="ew-table-header-caption"><?php echo $pesan_list->id_pesan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id_pesan" class="<?php echo $pesan_list->id_pesan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pesan_list->SortUrl($pesan_list->id_pesan) ?>', 1);"><div id="elh_pesan_id_pesan" class="pesan_id_pesan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pesan_list->id_pesan->caption() ?></span><span class="ew-table-header-sort"><?php if ($pesan_list->id_pesan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pesan_list->id_pesan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pesan_list->nama->Visible) { // nama ?>
	<?php if ($pesan_list->SortUrl($pesan_list->nama) == "") { ?>
		<th data-name="nama" class="<?php echo $pesan_list->nama->headerCellClass() ?>"><div id="elh_pesan_nama" class="pesan_nama"><div class="ew-table-header-caption"><?php echo $pesan_list->nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="nama" class="<?php echo $pesan_list->nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pesan_list->SortUrl($pesan_list->nama) ?>', 1);"><div id="elh_pesan_nama" class="pesan_nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pesan_list->nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pesan_list->nama->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pesan_list->nama->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($pesan_list->alamat->Visible) { // alamat ?>
	<?php if ($pesan_list->SortUrl($pesan_list->alamat) == "") { ?>
		<th data-name="alamat" class="<?php echo $pesan_list->alamat->headerCellClass() ?>"><div id="elh_pesan_alamat" class="pesan_alamat"><div class="ew-table-header-caption"><?php echo $pesan_list->alamat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="alamat" class="<?php echo $pesan_list->alamat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $pesan_list->SortUrl($pesan_list->alamat) ?>', 1);"><div id="elh_pesan_alamat" class="pesan_alamat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $pesan_list->alamat->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($pesan_list->alamat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($pesan_list->alamat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$pesan_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($pesan_list->ExportAll && $pesan_list->isExport()) {
	$pesan_list->StopRecord = $pesan_list->TotalRecords;
} else {

	// Set the last record to display
	if ($pesan_list->TotalRecords > $pesan_list->StartRecord + $pesan_list->DisplayRecords - 1)
		$pesan_list->StopRecord = $pesan_list->StartRecord + $pesan_list->DisplayRecords - 1;
	else
		$pesan_list->StopRecord = $pesan_list->TotalRecords;
}
$pesan_list->RecordCount = $pesan_list->StartRecord - 1;
if ($pesan_list->Recordset && !$pesan_list->Recordset->EOF) {
	$pesan_list->Recordset->moveFirst();
	$selectLimit = $pesan_list->UseSelectLimit;
	if (!$selectLimit && $pesan_list->StartRecord > 1)
		$pesan_list->Recordset->move($pesan_list->StartRecord - 1);
} elseif (!$pesan->AllowAddDeleteRow && $pesan_list->StopRecord == 0) {
	$pesan_list->StopRecord = $pesan->GridAddRowCount;
}

// Initialize aggregate
$pesan->RowType = ROWTYPE_AGGREGATEINIT;
$pesan->resetAttributes();
$pesan_list->renderRow();
while ($pesan_list->RecordCount < $pesan_list->StopRecord) {
	$pesan_list->RecordCount++;
	if ($pesan_list->RecordCount >= $pesan_list->StartRecord) {
		$pesan_list->RowCount++;

		// Set up key count
		$pesan_list->KeyCount = $pesan_list->RowIndex;

		// Init row class and style
		$pesan->resetAttributes();
		$pesan->CssClass = "";
		if ($pesan_list->isGridAdd()) {
		} else {
			$pesan_list->loadRowValues($pesan_list->Recordset); // Load row values
		}
		$pesan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$pesan->RowAttrs->merge(["data-rowindex" => $pesan_list->RowCount, "id" => "r" . $pesan_list->RowCount . "_pesan", "data-rowtype" => $pesan->RowType]);

		// Render row
		$pesan_list->renderRow();

		// Render list options
		$pesan_list->renderListOptions();
?>
	<tr <?php echo $pesan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$pesan_list->ListOptions->render("body", "left", $pesan_list->RowCount);
?>
	<?php if ($pesan_list->id_pesan->Visible) { // id_pesan ?>
		<td data-name="id_pesan" <?php echo $pesan_list->id_pesan->cellAttributes() ?>>
<span id="el<?php echo $pesan_list->RowCount ?>_pesan_id_pesan">
<span<?php echo $pesan_list->id_pesan->viewAttributes() ?>><?php echo $pesan_list->id_pesan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pesan_list->nama->Visible) { // nama ?>
		<td data-name="nama" <?php echo $pesan_list->nama->cellAttributes() ?>>
<span id="el<?php echo $pesan_list->RowCount ?>_pesan_nama">
<span<?php echo $pesan_list->nama->viewAttributes() ?>><?php echo $pesan_list->nama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($pesan_list->alamat->Visible) { // alamat ?>
		<td data-name="alamat" <?php echo $pesan_list->alamat->cellAttributes() ?>>
<span id="el<?php echo $pesan_list->RowCount ?>_pesan_alamat">
<span<?php echo $pesan_list->alamat->viewAttributes() ?>><?php echo $pesan_list->alamat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$pesan_list->ListOptions->render("body", "right", $pesan_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$pesan_list->isGridAdd())
		$pesan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$pesan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($pesan_list->Recordset)
	$pesan_list->Recordset->Close();
?>
<?php if (!$pesan_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$pesan_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $pesan_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $pesan_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($pesan_list->TotalRecords == 0 && !$pesan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $pesan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$pesan_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pesan_list->isExport()) { ?>
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
$pesan_list->terminate();
?>