<?php
/* Admin */
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdjustmentController;
use App\Http\Controllers\AdvanceController;
use App\Http\Controllers\catController;
use App\Http\Controllers\ClosingController;
use App\Http\Controllers\CoresettingsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerLedgerUploadController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MakepaymentController;
use App\Http\Controllers\NewitemController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\QrviewController;
use App\Http\Controllers\RecieptController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SaleExtimateController;
use App\Http\Controllers\SalePurchaseOrderController;
use App\Http\Controllers\SalereturnController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\store\DashController;
use App\Http\Controllers\store\Store_advancedController;
use App\Http\Controllers\store\Store_brandController;
use App\Http\Controllers\store\Store_categoryController;
use App\Http\Controllers\store\Store_customerController;
use App\Http\Controllers\store\Store_expenseController;
use App\Http\Controllers\store\Store_ItemController;
use App\Http\Controllers\store\Store_purchaseController;
use App\Http\Controllers\store\Store_salesController;
use App\Http\Controllers\store\Store_settings;
use App\Http\Controllers\store\Store_supplierController;
use App\Http\Controllers\store\Store_userController;
use App\Http\Controllers\store\Store_wareController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StoresettingController;
use App\Http\Controllers\SupplierLedgerUploadController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\WarehousrController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalesController;



/* Store */




use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'loginpost'])->name('loginpost');
Route::get('/', [UserController::class, 'login'])->name('login');
Route::get('/qrview/{id}', [QrviewController::class, 'qrview'])->name('qrview');
Route::get('/store_itemsscan/{id}', [QrviewController::class, 'store_itemsscan'])->name('store_itemsscan');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin|superadmin']], function () {


    Route::get('/dashboard', [HomeController::class, 'home'])->name('home');
    Route::get('/pos', [SalesController::class, 'pos'])->name('pos');
    Route::get('/warehouse_add', [WarehousrController::class, 'warehouse'])->name('ware');
    Route::post('/warehouse_post', [WarehousrController::class, 'warepost'])->name('warepost');
    Route::get('/warehouse_list', [WarehousrController::class, 'warelist'])->name('warelist');
    Route::post('/warehouseupdate', [WarehousrController::class, 'updateStatus'])->name('updateStatus');
    Route::post('/delete', [WarehousrController::class, 'deleteware'])->name('deleteware');
    Route::post('/ware_edit', [WarehousrController::class, 'editware'])->name('edit.warehoues');
    Route::get('/edit_ware', [WarehousrController::class, 'wareedit'])->name('edit');
    Route::post('/update_ware', [WarehousrController::class, 'update_ware'])->name('update.ware');
    Route::get('/download-csv/{rows}', [WarehousrController::class, 'downloadCsv'])->name('download.csv');
    Route::get('/download-excel', [WarehousrController::class, 'downloadExcel'])->name('download.excel');
    Route::get('/admin/download-pdf', [WarehousrController::class, 'downloadPdf'])->name('download.pdf');
    Route::get('/brand', [ItemsController::class, 'brand'])->name('brand');
    Route::post('/brandpost', [ItemsController::class, 'brandpost'])->name('brandpost');
    Route::post('/brandstatusupdate', [ItemsController::class, 'updateStatus_brand'])->name('updateStatus.brand');
    Route::post('/deletebrand', [ItemsController::class, 'deletebrand'])->name('deletebrand');
    Route::post('/brand_edit', [ItemsController::class, 'editbrand'])->name('edit.brand');
    Route::post('/brand_update', [ItemsController::class, 'brand_update'])->name('brandupdate');
    Route::get('/category', [catController::class, 'category'])->name('category');
    Route::post('/category_post', [catController::class, 'categorypost'])->name('category.post');
    Route::post('/catstatusupdate', [catController::class, 'updateStatus_cat'])->name('updateStatus.cat');
    Route::post('/cat_update', [catController::class, 'cat_update'])->name('category.edit'); // For editing an existing category
    Route::post('/cat_delete', [catController::class, 'cat_delte'])->name('category.delete');
    Route::get('/new_item', [NewitemController::class, 'new_item'])->name('new_item');
    Route::get('/tax', [SettingsController::class, 'tax'])->name('tax');
    Route::post('/tax_post', [SettingsController::class, 'tax_post'])->name('taxpost');
    Route::post('/tax_edit', [SettingsController::class, 'tax_edit'])->name('tax.edit');
    Route::post('/tax_delete', [SettingsController::class, 'tax_delete'])->name('deletetax');
    Route::post('/tax_statuschange', [SettingsController::class, 'tax_status'])->name('updateStatus.tax');
    Route::get('/unit', [SettingsController::class, 'unit'])->name('unit');
    Route::post('/unit_post', [SettingsController::class, 'unit_post'])->name('unit.post');
    Route::post('/unit_edit', [SettingsController::class, 'unit_edit'])->name('unit.edit');
    Route::post('/tax_unit', [SettingsController::class, 'unit_status'])->name('updateStatus.unit');
    Route::post('/unit_delete', [SettingsController::class, 'unit_delete'])->name('deleteunit');
    Route::post('/item_post', [NewitemController::class, 'item_post'])->name('item_post');
    Route::get('/itemlist', [NewitemController::class, 'itemlist'])->name('itemlist');
    Route::post('/itemstatus', [NewitemController::class, 'itemstatus'])->name('updateStatus.items');
    Route::post('/itemedit', [NewitemController::class, 'edititem'])->name('edit.item');
    Route::post('/item_editpost', [NewitemController::class, 'item_edit'])->name('item_edit');
    Route::post('/deleteitem', [NewitemController::class, 'deleteitem'])->name('deleteitem');
    Route::get('/add_account', [AccountController::class, 'account'])->name('account');
    Route::get('/list_account', [AccountController::class, 'account_list'])->name('account_list');
    Route::post('/accountpost', [AccountController::class, 'account_post'])->name('account.post');
    Route::post('/accountstatus', [AccountController::class, 'account_status'])->name('account.status');
    Route::get('/add_customer', [CustomerController::class, 'customer'])->name('customer');
    Route::post('/customer_post', [CustomerController::class, 'customer_post'])->name('add.cu.admin');
    Route::get('/customer_list', [CustomerController::class, 'customer_list'])->name('customer_list');
    Route::post('/customer_status', [CustomerController::class, 'customer_status'])->name('customer.status');
    Route::post('/customer_edit', [CustomerController::class, 'editcustomer'])->name('edit.customer');
    Route::post('/customer_editpost', [CustomerController::class, 'customer_edit'])->name('customer_edit');
    Route::post('/deletecu', [CustomerController::class, 'deletecu'])->name('deletecu');
    Route::get('/add_supplier', [CustomerController::class, 'add_supplier'])->name('add_supplier');
    Route::post('/supplier_post', [CustomerController::class, 'supplier_post'])->name('add.su');
    Route::get('/list_supplier', [CustomerController::class, 'list_supplier'])->name('list_supplier');
    Route::post('/edit_supplier', [CustomerController::class, 'edit_supplier'])->name('edit.supplier');
    Route::post('/edit_supplierpost', [CustomerController::class, 'edit_supplierpost'])->name('edit.supplierpost');
    Route::post('/updateStatus_supplier', [CustomerController::class, 'updateStatus_supplier'])->name('updateStatus.supplier');
    Route::post('/deletesupplier', [CustomerController::class, 'deletesupplier'])->name('deletesupplier');
    Route::get('/advanceadd', [AdvanceController::class, 'advanceadd'])->name('advanceadd');
    Route::post('/advancepost', [AdvanceController::class, 'advancepost'])->name('aadvancepost');
    Route::get('/advancelist', [AdvanceController::class, 'advancelist'])->name('advancelist');
    Route::post('/status_advance', [AdvanceController::class, 'status_advance'])->name('status.advance');
    Route::post('/edit_advance', [AdvanceController::class, 'edit_advance'])->name('edit.advance');
    Route::post('/aadvanceedit', [AdvanceController::class, 'aadvanceedit'])->name('aadvanceedit');
    Route::post('/deleteadvance', [AdvanceController::class, 'deleteadvance'])->name('deleteadvance');
    Route::get('/adjustment', [AdjustmentController::class, 'adjest'])->name('adjestlist');
    Route::get('/add_adjustment', [AdjustmentController::class, 'addajustment'])->name('addajustment');
    Route::get('/search-items', [PurchaseController::class, 'searchItems'])->name('search-items');
    Route::get('/add-item', [PurchaseController::class, 'addItem'])->name('add-item');
    Route::get('/addItem_return',[SalereturnController::class,'addItem_return'])->name('addItem_return');
    Route::post('/adjust_post', [AdjustmentController::class, 'adjust_post'])->name('adjust.post');
    Route::post('/adjustmentview', [AdjustmentController::class, 'adjustmentview'])->name('adjustmentview');
    Route::post('/delete_adjustment', [AdjustmentController::class, 'delete_adjustment'])->name('delete.adjust');
    Route::get('/transferlist', [AdjustmentController::class, 'transferlist'])->name('transferlist');
    Route::get('/addtransfer', [AdjustmentController::class, 'addtransfer'])->name('addtransfer');
    Route::post('/search-adjust', [AdjustmentController::class, 'searchAdjest'])->name('searchAdjest');
    Route::get('/user_list', [UserController::class, 'userlist'])->name('userlist');
    Route::get('/Userpost', [UserController::class, 'Userpost'])->name('Userpost');
    Route::post('/useradd', [UserController::class, 'useradd'])->name('useradd');
    Route::post('/updateStatususer', [UserController::class, 'updateStatus_user'])->name('updateStatus.user');
    Route::post('/edituser', [UserController::class, 'edituser'])->name('useredit.user');
    Route::post('/useredit', [UserController::class, 'useredit'])->name('useredit');
    Route::post('/deleteuser', [UserController::class, 'deleteuser'])->name("deleteuser");
    Route::get('/expense', [ExpenseController::class, 'expense'])->name('expense');
    Route::get('/expense_cat', [ExpenseController::class, 'expense_category'])->name('expense.category');
    Route::post('/excategory_post', [ExpenseController::class, 'excategory_post'])->name('excategory.post');
    Route::post('/excategory_edit', [ExpenseController::class, 'excategory_edit'])->name('excategory.edit');
    Route::post('/updateStatus_excat', [ExpenseController::class, 'updateStatus_excat'])->name('updateStatus.excat');
    Route::post('/excategory_delete', [ExpenseController::class, 'excategory_delete'])->name('excategory.delete');
    Route::get('expense_add', [ExpenseController::class, 'expensepost'])->name('expensepost');
    Route::post('/addexpense', [ExpenseController::class, 'addexpense'])->name('addexpense');
    Route::post('/expenseedit', [ExpenseController::class, 'expenseedit'])->name('expenseedit');
    Route::post('/expenseedit_post', [ExpenseController::class, 'expenseedit_post'])->name('expenseedit.post');
    Route::post('/expensedelete', [ExpenseController::class, 'expensedelete'])->name('expensedelete');
    Route::get('/new_purchase', [PurchaseController::class, 'new_purchase'])->name('new_purchase');
    Route::get('/purchase_list', [PurchaseController::class, 'purchase_list'])->name('purchase_list');
    Route::get('/purchase_return', [PurchaseController::class, 'purchase_return'])->name('purchase_return');
    Route::get('/salesreport', [ReportsController::class, 'salesreport'])->name('salesreport');
    Route::post('/edit_account', [AccountController::class, 'edit_account'])->name('edit_account');
    Route::post('/acount_edit', [AccountController::class, 'acount_edit'])->name('acount.edit');
    Route::post('/account_delete', [AccountController::class, 'account_delete'])->name('account_delete');
    Route::get('/store', [StoreController::class, 'store'])->name('store');
    Route::get('/store_list', [StoreController::class, 'store_list'])->name('store_list');
    Route::post('/storeadd', [StoreController::class, 'storeadd'])->name('storeadd');
    Route::post('/storeedit', [StoreController::class, 'storeedit'])->name('storeedit');
    Route::post('/editstore', [StoreController::class, 'editstore'])->name('edit.store');
    Route::post('/updateStatus_store', [StoreController::class, 'updateStatus_store'])->name('updateStatus.store');
    Route::post('/store_delete', [StoreController::class, 'store_delete'])->name('store_delete');
    Route::post('/add_purchase', [PurchaseController::class, 'add_purchase'])->name('add_purchase');
    Route::get('/invoice-purchase/{purchase}', [InvoiceController::class, 'invoice_purchase'])->name('invoice_purchase.view');
    Route::get('/add-sales', [SalesController::class, 'add_sales'])->name('add_sales');
    Route::get('/invoice-purchase_return/{purchase}', [InvoiceController::class, 'invoice_purchase_return'])->name('invoice_purchase.return');
    Route::get('/add-sales-biller', [PosController::class, 'add_pos'])->name('add_sales_biller');

    Route::get('/get-tax-details', [SalesController::class, 'getTaxDetails'])->name('get-tax-details');
    Route::post('/addsale', [SalesController::class, 'addsale'])->name('addsale');
    Route::get('/sales_list', [SalesController::class, 'saleslist'])->name('saleslist');
    Route::get('/saleinvoice', [SalesController::class, 'sales_invoice'])->name('saleinvoice');
    Route::get('/invoice-sale', [InvoiceController::class, 'invoice_sale'])->name('invoice_sale');
    Route::get('/country_list', [SettingsController::class, 'country'])->name('country');
    Route::post('/countrysettings_post', [SettingsController::class, 'country_post'])->name('country_post');
    Route::post('/updateStatus_tax', [SettingsController::class, 'updateStatus_tax'])->name('updateStatus.tax');
    Route::post('/deletecountry', [SettingsController::class, 'deletecountry'])->name('deletecountry');
    Route::post('/item_bulkpost', [NewitemController::class, 'item_bulkpost'])->name('item_bulkpost');
    Route::get('/printdemo', [TemplateController::class, 'printdemo'])->name('printdemo');
    Route::post('/printdemopost', [TemplateController::class, 'printdemopost'])->name('printdemopost');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/store_settings', [StoresettingController::class, 'store_settings'])->name('store_settings');
    Route::get('/get-store-name/{id}', [StoreController::class, 'getStoreName'])->name('get-store-name');
    Route::post('/storepost', [StoresettingController::class, 'storepost'])->name('storepost');
    Route::get('/coresettings', [CoresettingsController::class, 'coresetting'])->name('coresetting');
    Route::post('/corepost', [CoresettingsController::class, 'corepost'])->name('corepost');

    Route::get('/find-customer', [CustomerController::class, 'findCustomer'])->name('findCustomer');
    Route::get('/salescode', [SalesController::class, 'salescode'])->name('salescode');
    Route::post('/customers/import', [CustomerController::class, 'import'])->name('customers.import');
    Route::post('/customer-ledger-import',[CustomerLedgerUploadController::class,'customer_ledger_import'])->name('customer_ledger_import');
    Route::post('/supplier/import', [CustomerController::class, 'supplier_import'])->name('supplier.import');
    Route::post('/supplier-ledger-import', [SupplierLedgerUploadController::class, 'supplier_ledger_import'])->name('supplier_ledger_import');
    Route::get('/get-customers', [SalesController::class, 'getCustomers'])->name('getCustomers');
    Route::get('/saleitem_editpost/{id}', [SalesController::class, 'saleitem_edit'])->name('admin_saleitem_edit');

    Route::get('/purchase_edit/{id}', [PurchaseController::class, 'purchase_edit'])->name('purchase.edit');
    Route::post('/invoice_customer', [InvoiceController::class, 'invoice_customer'])->name('invoice.customer');
    Route::put('/alt_qtywdit', [SalesController::class, 'alt_qtywdit'])->name('alt.qtywdit');
    Route::put('/part_noedit', [SalesController::class, 'part_noedit'])->name('part.noedit');
    Route::put('/customer_mobile', [SalesController::class, 'customer_mobile'])->name('customer.mobile');
    Route::put('/customer_email', [SalesController::class, 'customer_email'])->name('customer.email');
    Route::put('/customer_address', [SalesController::class, 'customer_address'])->name('customer.address');
    Route::put('/customer_gst', [SalesController::class, 'customer_gst'])->name('customer.gst');
    Route::post('/sale_edit', [SalesController::class, 'sale_edit'])->name('sale.edit');
    Route::get('/data.tables.data', [SalesController::class, 'data_tables_data'])->name('data.tables.data');

    Route::get('/invoice-sale-view/{id}/{sale_type}/{sale_id}', [SalesController::class, 'invoice_sale_view'])->name('invoice_sale.view');
    Route::get('/invoice-sale-main/{id}/{sale_type}/', [SalesController::class, 'invoice_sale_main'])->name('invoice_sale.main');



    Route::post('/billno_exist', [PurchaseController::class, 'billno_exist'])->name('billno_exist');
    Route::get('/purchasecode', [PurchaseController::class, 'purchasecode'])->name('purchasecode');
    Route::post('/makepayment', [MakepaymentController::class, 'makepayment'])->name('makepayment');
    Route::post('/makepayment_pur', [MakepaymentController::class, 'makepayment_purchase'])->name('makepayment.purchase');
    Route::get('/get-suppliers', [CustomerController::class, 'getSuppliers'])->name('get.suppliers');
    Route::post('/edit_purchase', [PurchaseController::class, 'edit_purchase'])->name('edit_purchase');
    Route::post('/sale_edit', [SalesController::class, 'sale_edit'])->name('sale_edit');
    Route::post('/item_delete_salebill', [SalesController::class, 'item_delete_salebill'])->name('item_delete_salebill');
    Route::get('payment_view/{id}', [SalesController::class, 'payment_view'])->name('payment.view');

    Route::get('payment_view_purchase/{id}', [PurchaseController::class, 'payment_view_purchase'])->name('payment.view_purchase');
    Route::get('/sale_return/{id}', [SalesController::class, 'sale_return'])->name('sale.return');
    Route::get('/purchase_return/{id}', [PurchaseController::class, 'purchase_return'])->name('purchase.return');
    Route::post('/return_post', [SalesController::class, 'return_post'])->name('return_post');
    Route::post('/purchase_return_post', [PurchaseController::class, 'purchase_return_post'])->name('purchase.return_post');
    Route::post('/sale_return_update', [SalesController::class, 'sale_return_update'])->name('sale_return_update');
    Route::post('/purchase_return_update', [PurchaseController::class, 'purchase_return_update'])->name('purchase_return_update');
    Route::get('/delete_purchase_row/{id}', [PurchaseController::class, 'delete_purchase_row'])->name('delete_purchase_row');
    Route::get('/sale_return_mass',[SalereturnController::class,'salereturn'])->name('Sale.return.mass');
    Route::get('/get-customers-by-store', [SaleReturnController::class, 'getCustomersByStore'])->name('get.customers.by.store');
    Route::get('/get-bill-by-customer', [SaleReturnController::class, 'getCustomersByStore'])->name('getbillcustomer');
    Route::get('/salextimate',[SaleExtimateController::class,'salextimate'])->name('salextimate');
    Route::get('/add_extimate',[SaleExtimateController::class,'add_extimate'])->name('add_extimate');
    Route::post('/extimate_create',[SaleExtimateController::class,'extimate_create'])->name('extimate_create');
    Route::get('/  invoice.sale.extimate/{id}/{sale_type}/', [InvoiceController::class, 'invoice_sale_extimate'])->name('invoice.sale.extimate');
    Route::get('/extimate_sale_add/{id}',[SaleExtimateController::class,'extimate_sale_add'])->name('extimate_sale_add');
    Route::get('/purchase_order_list',[PurchaseOrderController::class,'purchase_order_list'])->name('purchase_order_list');
    Route::get('/new_purchase_order',[PurchaseOrderController::class,'new_purchase_order'])->name('new_purchase_order');
    Route::post('/add_purchase_order',[PurchaseOrderController::class,'add_purchase_order'])->name('add_purchase_order');
    Route::get('/invoice_purchase_order/{purchase}/',[InvoiceController::class,'invoice_purchase_order'])->name('invoice_purchase.order');
    Route::get('/purchase.add.order/{id}',[PurchaseOrderController::class,'purchase_add_order'])->name('purchase_add_order');
    Route::post('/add_to_purchase_order',[PurchaseOrderController::class,'add_to_purchase_order'])->name('add_to_purchase_order');
    Route::get('/Purchase_order_sale',[SalePurchaseOrderController::class,'Purchase_order_sale'])->name('Purchase_order_sale');
    Route::get('/add_Purchase_order_sale',[SalePurchaseOrderController::class,'add_Purchase_order_sale'])->name('add_Purchase_order_sale');
    Route::post('/create_purchase_order_sale',[SalePurchaseOrderController::class,'create_purchase_order_sale'])->name('create_purchase_order_sale');
    Route::get('/invoice-purchase-sale-item/{id}',[InvoiceController::class,'invoice_purchase_sale'])->name('invoice.purchase.sale');
    Route::get('/create-purchase-order-sale-post/{id}',[SalePurchaseOrderController::class,'create_purchase_order_sale_post'])->name('create_purchase_order_sale_post');
    Route::get('/user-roles',[UserController::class,'userroles'])->name('userroles');
    Route::post('/add-user-role',[UserController::class,'add_user_role'])->name('add_user_role');
    Route::get('salereturn_list',[SalereturnController::class,'salereturn_list'])->name('salereturn_list');
    Route::get('/get-prefix-by-customer', [SalereturnController::class, 'getPrefixByCustomer'])->name('get.prefix.by.customer');
    Route::post('/return-sale-mass',[SalereturnController::class,'return_sale_mass'])->name('return.sale.mass');
   
    Route::get('/get-sale-items', [SalereturnController::class, 'getSaleItems'])->name('get.sale.items');
    Route::get('/daily-closing',[ClosingController::class,'daily_closing'])->name('daily.closing');
    Route::get('/reciept',[RecieptController::class,'reciept'])->name('reciept');
    Route::get('/add_reciept',[RecieptController::class,'add_reciept'])->name('add_reciept');
    Route::post('/reciept_add',[RecieptController::class,'reciept_add'])->name('reciept.add');
    Route::post('/get-customer-prefix', [RecieptController::class, 'getCustomerPrefix'])->name('get.customer.prefix');
    Route::get('/receipt/view/{id}', [RecieptController::class, 'view_receipt'])->name('reciept.view');
    Route::post('/daily_closing_post',[ClosingController::class,'daily_closing_post'])->name('daily.closing.post');
    Route::get('closing/bill/{id}', [ClosingController::class, 'closingBill'])->name('closing.bill');
    Route::get('closing-list',[ClosingController::class,'closing_list'])->name('closing.list');
});

Route::group(['prefix' => 'store', 'middleware' => 'auth'], function () {

    Route::get('/dasboard', [DashController::class, 'dashboard'])->name('store.dash');
    Route::get('add_sales', [Store_salesController::class, 'sales_add'])->name('sales_add');
    Route::put('/customer_address', [Store_salesController::class, 'customer_address'])->name('customer.address');
    Route::put('/customer_gst', [Store_salesController::class, 'customer_gst'])->name('customer.gst');
    Route::post('/sale_edit', [Store_salesController::class, 'customer_gst'])->name('customer_gst');
    Route::put('/customer_mobile', [Store_salesController::class, 'customer_mobile'])->name('customer.mobile');
    Route::put('/customer_email', [Store_salesController::class, 'customer_email'])->name('customer.email');
    Route::put('/part_noedit', [Store_salesController::class, 'part_noedit'])->name('part.noedit');
    Route::put('/alt_qtywdit', [Store_salesController::class, 'alt_qtywdit'])->name('alt.qtywdit');

    Route::get('/salescode', [Store_salesController::class, 'salescode'])->name('salescode');
    Route::get('/add-item', [Store_salesController::class, 'addItem'])->name('add-item');
    Route::get('/search-items', [Store_salesController::class, 'searchItems'])->name('search-items');
    Route::post('/addsale', [Store_salesController::class, 'addsale'])->name('store_addsale');
    Route::get('/find-customer', [Store_salesController::class, 'findCustomer'])->name('findCustomer');
    Route::get('/sales_list', [Store_SalesController::class, 'saleslist'])->name('store_saleslist');
    Route::get('/saleitem_editpost/{id}', [Store_salesController::class, 'saleitem_edit'])->name('saleitem_edit');
    Route::get('/add_customer', [Store_customerController::class, 'customer'])->name('store_customer');
    Route::post('/customer_post', [Store_customerController::class, 'customer_post'])->name('add.cu');
    Route::get('/customer_list', [Store_customerController::class, 'customer_list'])->name('store_customer_list');
    Route::post('/deletecu', [Store_customerController::class, 'deletecu'])->name('deletecu');
    Route::post('/customer_status', [Store_customerController::class, 'customer_status'])->name('customer.status');
    Route::post('/customer_edit', [Store_customerController::class, 'editcustomer'])->name('edit.customer');
    Route::post('/customer_editpost', [Store_customerController::class, 'customer_edit'])->name('customer_edit');
    Route::get('/add_supplier', [Store_supplierController::class, 'add_supplier'])->name('store_add_supplier');
    Route::post('/supplier_post', [Store_supplierController::class, 'supplier_post'])->name('store_add.su');
    Route::get('/list_supplier', [Store_supplierController::class, 'list_supplier'])->name('store_list_supplier');
    Route::post('/updateStatus_supplier', [Store_supplierController::class, 'updateStatus_supplier'])->name('store_updateStatus.supplier');
    Route::post('/deletesupplier', [Store_supplierController::class, 'deletesupplier'])->name('store_deletesupplier');
    Route::post('/edit_supplier', [Store_supplierController::class, 'edit_supplier'])->name('store_edit.supplier');
    Route::post('/edit_supplierpost', [Store_supplierController::class, 'edit_supplierpost'])->name('store_edit.supplierpost');
    Route::get('/advanceadd', [Store_advancedController::class, 'advanceadd'])->name('store_advanceadd');
    Route::post('/advancepost', [Store_advancedController::class, 'advancepost'])->name('store.advancepost');
    Route::get('/advancelist', [Store_advancedController::class, 'advancelist'])->name('store_advancelist');
    Route::post('/deleteadvance', [Store_advancedController::class, 'deleteadvance'])->name('store.deleteadvance');
    Route::post('/edit_advance', [Store_advancedController::class, 'edit_advance'])->name('store_edit.advance');
    Route::post('/aadvanceedit', [Store_advancedController::class, 'aadvanceedit'])->name('store_aadvanceedit');
    Route::get('/new_purchase', [Store_purchaseController::class, 'new_purchase'])->name('store_new_purchase');
    Route::post('/billno_exist', [Store_purchaseController::class, 'billno_exist'])->name('store.billno_exist');
    Route::get('/purchasecode', [Store_purchaseController::class, 'purchasecode'])->name('store.purchasecode');
    Route::post('/add_purchase', [Store_purchaseController::class, 'add_purchase'])->name('store_add_purchase');
    Route::get('/purchase_list', [Store_purchaseController::class, 'purchase_list'])->name('store_purchase_list');
    Route::get('/invoice-purchase', [Store_purchaseController::class, 'invoice_purchase'])->name('store_invoice_purchase');
    Route::get('/new_item', [Store_ItemController::class, 'new_item'])->name('store_new_item');
    Route::post('/item_post', [Store_ItemController::class, 'item_post'])->name('store_item_post');
    Route::get('/itemlist', [Store_ItemController::class, 'itemlist'])->name('store_itemlist');
    Route::post('/itemstatus', [Store_ItemController::class, 'itemstatus'])->name('store_updateStatus.items');
    Route::post('/itemedit', [Store_ItemController::class, 'edititem'])->name('store_edit.item');
    Route::post('/item_editpost', [Store_ItemController::class, 'item_edit'])->name('Store_item_edit');
    Route::post('/deleteitem', [Store_ItemController::class, 'deleteitem'])->name('store_deleteitem');
    Route::get('/category', [Store_categoryController::class, 'category'])->name('store_category');

    Route::post('/category_post', [Store_categoryController::class, 'categorypost'])->name('store_category.post');
    Route::post('/catstatusupdate', [Store_categoryController::class, 'updateStatus_cat'])->name('store_updateStatus.cat');
    Route::post('/cat_delete', [Store_categoryController::class, 'cat_delte'])->name('store_category.delete');
    Route::post('/cat_update', [Store_categoryController::class, 'cat_update'])->name('store_category.edit');
    Route::get('/brand', [Store_brandController::class, 'brand'])->name('store_brand');
    Route::post('/brandpost', [Store_brandController::class, 'brandpost'])->name('store_brandpost');
    Route::post('/brand_update', [Store_brandController::class, 'brand_update'])->name('store_brandupdate');
    Route::post('/brandstatusupdate', [Store_brandController::class, 'updateStatus_brand'])->name('store_updateStatus.brand');
    Route::post('/deletebrand', [Store_brandController::class, 'deletebrand'])->name('store_deletebrand');
    Route::get('/expense', [Store_expenseController::class, 'expense'])->name('store_expense');
    Route::get('expense_add', [Store_expenseController::class, 'expensepost'])->name('store_expensepost');
    Route::post('/addexpense', [Store_expenseController::class, 'addexpense'])->name('store_addexpense');
    Route::get('/expense_list', [Store_expenseController::class, 'expense_list'])->name('store_expense_list');
    Route::get('/expense_cat', [Store_expenseController::class, 'expense_category'])->name('store_expense.category');
    Route::post('/excategory_post', [Store_expenseController::class, 'excategory_post'])->name('store_excategory.post');
    Route::post('/excategory_delete', [Store_expenseController::class, 'excategory_delete'])->name('store_excategory.delete');
    Route::post('/excategory_edit', [Store_expenseController::class, 'excategory_edit'])->name('store_excategory.edit');
    Route::get('/store_settings', [Store_settings::class, 'store_setting'])->name('store.store_settings');
    Route::post('/storepost', [Store_settings::class, 'storepost'])->name('store_storepost');
    Route::get('/user_list', [Store_userController::class, 'userlist'])->name('store_userlist');
    Route::get('/Userpost', [Store_userController::class, 'Userpost'])->name('store_Userpost');
    Route::post('/useradd', [Store_userController::class, 'useradd'])->name('store_useradd');
    Route::post('/deleteuser', [Store_userController::class, 'deleteuser'])->name("store_deleteuser");
    Route::post('/edituser', [Store_userController::class, 'edituser'])->name('store_useredit');
    Route::post('/useredit', [Store_userController::class, 'useredit'])->name('store_userediting');
    Route::post('/deleteuser', [Store_userController::class, 'deleteuser'])->name("store_deleteuser");
    Route::get('/warehouse_add', [Store_wareController::class, 'warehouse'])->name('store_ware');
    Route::get('/warehouse_list', [Store_wareController::class, 'warelist'])->name('store_warelist');
    Route::post('/warehouse_post', [Store_wareController::class, 'warepost'])->name('store_warepost');
    Route::post('/warehouseupdate', [Store_wareController::class, 'updateStatus'])->name('store_updateStatus');
    Route::post('/update_ware', [Store_wareController::class, 'update_ware'])->name('store_update.ware');
    Route::post('/ware_edit', [Store_wareController::class, 'editware'])->name('store_edit.warehoues');
    Route::post('/delete', [Store_wareController::class, 'deleteware'])->name('store_deleteware');
});