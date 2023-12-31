  <!-- Menu Start -->
  <div class="menu-container flex-grow-1">
    <ul id="menu" class="menu">
      <li>
        <a href="{{ route('admin.dashbord') }}">
          <i data-cs-icon="shop" class="icon" data-cs-size="18"></i>
          <span class="label">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="#category" data-href="Products.html">
          <i data-cs-icon="cupcake" class="icon" data-cs-size="18"></i>
          <span class="label">Category</span>
        </a>
        <ul id="category">
          <li>
            <a href="{{ route('category.index') }}">
              <span class="label">Category List</span>
            </a>
          </li>
          <li>
            <a href="{{ route('category.create') }}">
              <span class="label">Add Category</span>
            </a>
          </li>
        </ul>
      </li>


      <li>
        <a href="#products" data-href="Products.html">
          <i data-cs-icon="cupcake" class="icon" data-cs-size="18"></i>
          <span class="label">Product</span>
        </a>
        <ul id="products">
          <li>
            <a href="{{ route('products.index') }}">
              <span class="label">Product List</span>
            </a>
          </li>
          <li>
            <a href="{{ route('products.create') }}">
              <span class="label">Add Product</span>
            </a>
          </li>
        </ul>
      </li>


      <li>
        <a href="#orders" data-href="Orders.html">
          <i data-cs-icon="cart" class="icon" data-cs-size="18"></i>
          <span class="label">Testimonial</span>
        </a>
        <ul id="orders">
          <li>
            <a href="{{ route('testimonial.index') }}">
              <span class="label">Testimonial List</span>
            </a>
          </li>
          <li>
            <a href="{{ route('testimonial.create') }}">
              <span class="label">Create Testimonial</span>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="#customers" data-href="{{ route('customer.data') }}">
          <i data-cs-icon="user" class="icon" data-cs-size="18"></i>
          <span class="label">Customers</span>
        </a>
        <ul id="customers">
          <li>
            <a href="{{ route('customer.data') }}">
              <span class="label">List</span>
            </a>
          </li>

        </ul>
      </li>

      <li>
        <a href="{{ route('order.data') }}">
          <i data-cs-icon="shipping" class="icon" data-cs-size="18"></i>
          <span class="label">Order</span>
        </a>
      </li>
      <li>
        <a href="{{ route('coupon.create') }}">
          <i data-cs-icon="tag" class="icon" data-cs-size="18"></i>
          <span class="label">Coupon</span>
        </a>
      </li>
      {{-- <li>
        <a href="Settings.html">
          <i data-cs-icon="gear" class="icon" data-cs-size="18"></i>
          <span class="label">Settings</span>
        </a>
      </li> --}}
    </ul>
  </div>
  <!-- Menu End -->
