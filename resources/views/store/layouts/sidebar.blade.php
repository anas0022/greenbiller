<div class="deznav" style="left:0%; ">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a href="{{route('store.dash')}}" class=" ai-icon" href="javascript:void()" >
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
							<li><a href="{{route('add_sales_biller.store')}}">New Sale</a></li>
		
							<li><a href="{{route('saleslist.store')}}">Sales List</a></li>
							<li><a href="{{route('salereturn_list.store')}}">Sales Return</a></li>
						</ul>
                    </li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="fa-solid fa-user"></i>
							<span class="nav-text">Contacts</span>
							
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('store_customer')}}">Add Customer</a></li>
							<li><a href="{{route('store_customer_list')}}">Customer List</a></li>	
                            <li><a href="{{route('store_add_supplier')}}">Add Supplier</a></li>
							<li><a href="{{route('store_list_supplier')}}">Supplier List</a></li>
								
						</ul>
                    </li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="fa-sharp fa-regular fa-money-bill"></i>
							<span class="nav-text">Advance</span>
							
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('store_advanceadd')}}">Add Advance</a></li>
							<li><a href="{{route('store_advancelist')}}">Advance List</a></li>	
								
						</ul>
                    </li>
					
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="fa-solid fa-bag-shopping"></i>
							<span class="nav-text">Purchase</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('store_new_purchase')}}">New Purchase</a></li>
							<li><a href="{{route('store_purchase_list')}}">Purchase List</a></li>
                            {{-- <li><a href="{{route('purchase_return')}}">Purchase Return</a></li> --}}
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
                            <li><a href="{{route('store_new_item')}}">New Item</a></li>
                            <li><a href="{{route('store_itemlist')}}">Item List</a></li>
                            <li><a href="{{route('store_category')}}">Category List</a></li>
                            <li><a href="{{route('store_brand')}}">Brand List</a></li>
                            
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
					<!-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="fa-solid fa-gear"></i>
							<span class="nav-text">Store</span>
							
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('store')}}">Add Store</a></li>
							<li><a href="{{route('store_list')}}">Store List</a></li>	
                    
								
						</ul>
                    </li> -->
                  <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-heart"></i>
							<span class="nav-text">Expenses</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('store_expense')}}">Expences List</a></li>
                            <li><a href="{{route('store_expense.category')}}">Categories List</a></li>
                         
                         
                        </ul>
                    </li> 
				<!-- 	<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-settings-2"></i>
							<span class="nav-text">Reports</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('salesreport')}}">Sales Reports</a></li>
							
							
						</ul>
                    </li> -->
                   
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-notepad"></i>
							<span class="nav-text">Users</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('store_userlist')}}">Users</a></li>
						{{-- 	<li><a href="{{route('user_role')}}">User Role</a></li> --}}
                         
                        </ul>
                    </li> 
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-network"></i>
							<span class="nav-text">Warehouse</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('store_ware')}}">New Warehouse</a></li>
                            <li><a href="{{route('store_warelist')}}">Warehouse List</a></li>
                        </ul>
                    </li> 
                    

					<li><a href="{{route('store.store_settings')}}"class="" href="javascript:void()" aria-expanded="false">
							<i class="fa-solid fa-gear"></i>
							<span class="nav-text">Store Settings</span>
							
						</a>
                        <!-- <ul aria-expanded="false">
						<li><a href="{{route('coresetting')}}">Core Settings</a></li>
                            <li><a href="{{route('tax')}}">Tax List</a></li>
							<li><a href="{{route('country')}}">Country Settings</a></li>
							<li><a href="{{route('unit')}}">Unit List</a></li>
                        
							<li><a href="">Payment Types</a></li>
							<li><a href="">Change Password</a></li>
                    
								
						</ul> -->
                    </li>
					
                </ul>
            
				<!-- <div class="add-menu-sidebar">
					<img src="i{{asset('admin-assets/mages/icon1.png')}}" alt="">
					<p>Organize your menus through button bellow</p>
					<a href="javascript:void(0);" class="btn bg-white text-black">+ Add Menus</a>
				</div>
				<div class="copyright">
					<p><strong>Davur - Restaurant Admin Dashboard</strong> ©2023 All Rights Reserved</p>
					<p>Made with <span class="heart"></span> by DexignZone</p>
				</div> -->
              
			</div>
           
         
        </div>