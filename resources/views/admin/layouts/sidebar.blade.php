<div class="deznav" style="left:0%; ">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a href="{{route('home')}}" class=" ai-icon" href="javascript:void()" >
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                        
                    </li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="fa-solid fa-cart-shopping"></i>
							<span class="nav-text">Sales</span>
							<span class="badge badge-xs badge-danger">New</span>
						</a>
                        <ul aria-expanded="false">
							<!-- <li><a href="{{route('add_sales')}}">Add Sales</a></li> -->
							<li><a href="{{route('add_sales_biller')}}">New Sale</a></li>
							<li><a href="{{route('saleslist')}}">Sales List</a></li>
							<li><a href="{{route('salereturn_list')}}">Sales Return</a></li>
							<li><a href="{{route('salextimate')}}">Estimate</a></li>
							<li><a href="{{route('Purchase_order_sale')}}">Purchase Order</a></li>
							<li><a href="{{route('pay.in')}}">Payment in</a></li>
			
						</ul>
                    </li>
				
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="fa-solid fa-user"></i>
							<span class="nav-text">Contacts</span>
							
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('customer')}}">Add Customer</a></li>
							<li><a href="{{route('customer_list')}}">Customer List</a></li>	
                            <li><a href="{{route('add_supplier')}}">Add Supplier</a></li>
							<li><a href="{{route('list_supplier')}}">Supplier List</a></li>
								
						</ul>
                    </li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="fa-sharp fa-regular fa-money-bill"></i>
							<span class="nav-text">Advance</span>
							
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('advanceadd')}}">Add Advance</a></li>
							<li><a href="{{route('advancelist')}}">Advance List</a></li>	
								
						</ul>
                    </li>
					
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="fa-solid fa-bag-shopping"></i>
							<span class="nav-text">Purchase</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('new_purchase')}}">New Purchase</a></li>
							<li><a href="{{route('purchase_list')}}">Purchase List</a></li>
                     		<li><a href="{{route('purchase.return.list')}}">Purchase Return List</a></li>  
					 		<li><a href="{{route('pay.out')}}">Payment Out</a></li>
                            </li>
                            
                        </ul>
                    </li>
                   <!--  <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="fa-solid fa-receipt"></i>
							<span class="nav-text">Account</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('account')}}">Add Account</a></li>
                            <li><a href="{{route('account_list')}}">Account List</a></li>
                            
                            
                        </ul>
                    </li> -->
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-controls-3"></i>
							<span class="nav-text">Items</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('new_item')}}">New Item</a></li>
                            <li><a href="{{route('itemlist')}}">Item List</a></li>
                            <li><a href="{{route('category')}}">Category List</a></li>
                            <li><a href="{{route('brand')}}">Brand List</a></li>
                            
                        </ul>
                    </li>
                    <!-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-internet"></i>
							<span class="nav-text">Stock</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('adjestlist')}}">Adjustment List</a></li>
                            <li><a href="{{route('transferlist')}}">Transfer List</a></li>
							
                            

                        </ul>
                    </li> -->
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="fa-solid fa-gear"></i>
							<span class="nav-text">Store</span>
							
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('store')}}">Add Store</a></li>
							<li><a href="{{route('store_list')}}">Store List</a></li>	
                    
								
						</ul>
                    </li>
                  <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-heart"></i>
							<span class="nav-text">Expenses</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('expense')}}">Expences List</a></li>
                            <li><a href="{{route('expense.category')}}">Categories List</a></li>
                         
                         
                        </ul>
                    </li> 
				 	<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-settings-2"></i>
							<span class="nav-text">Reports</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('salesreport')}}">Sales Reports</a></li>
							<li><a href="{{route('purchasereport')}}">Purchase Reports</a></li>
							<li><a href="{{route('ledgerreport')}}">Ledger Report</a></li>

							<li><a href="{{route('closing.list')}}">Daily Closing</a></li>
						
							
						</ul>
                    </li> 
                   
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-notepad"></i>
							<span class="nav-text">Users</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('userlist')}}">Users</a></li>
							<li><a href="{{route('userroles')}}">Users Roles</a></li>
                        </ul>
                    </li>
                 <!--    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-network"></i>
							<span class="nav-text">Warehouse</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('ware')}}">New Warehouse</a></li>
                            <li><a href="{{route('warelist')}}">Warehouse List</a></li>
                        </ul>
                    </li> -->
                    

					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="fa-solid fa-gear"></i>
							<span class="nav-text">Settings</span>
							
						</a>
                        <ul aria-expanded="false">
						<li><a href="{{route('coresetting')}}">Core Settings</a></li>
                            <li><a href="{{route('tax')}}">Tax List</a></li>
							<li><a href="{{route('country')}}">Country Settings</a></li>
							<li><a href="{{route('unit')}}">Unit List</a></li>
							<li><a href="{{route('secondryunitlist')}}">Secondery Unit List</a></li>
						</ul>
                    </li>
					
                </ul>
           
              
			</div>
           
         
        </div>