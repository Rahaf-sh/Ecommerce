<template>
<div>
<nav>
  <div class="container">
    <ul class="navbar-right">
      <li><a href="#" id="cart"><i class="fa fa-shopping-cart"></i> <span class="badge">{{ totalProduct }}</span></a></li>
    </ul> <!--end navbar-right -->
  </div> <!--end container -->
</nav>


<div class="container">
  <div class="shopping-cart">
    <div class="shopping-cart-header">
      <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">{{ totalProduct }} </span>
      <div class="shopping-cart-total">
        <span class="lighter-text">Total:</span>
        <span class="main-color-text">{{ totalPrice }}$</span>
      </div>
    </div> <!--end shopping-cart-header -->

    <ul class="shopping-cart-items" v-for="(product, index) in getCart" :key="index">
      <li class="clearfix">
        <img :src="product.image" class="img-circle" />
        <span class="item-name">{{ product.name }}</span>
        <span class="item-price">{{ product.price }}$</span>
        <span class="item-quantity">* {{product.quantity}}</span>
        <a href="#" @click="$store.commit('removeProductToCart', product)" class="font-semibold hover:text-red-500 text-gray-500 text-xs"><i class="fa fa-trash"></i></a>

      </li>

     

    </ul>

    <a href="/checkout" class="checkout-button">Checkout</a>
  </div> <!--end shopping-cart -->
</div> <!--end container -->

</div>
</template>

<script>
export default {
    computed: {
        getCart() {
          return this.$store.state.cart;
        },
        totalProduct() {
          return this.$store.state.cart.reduce((acc, current) => acc + current.quantity, 0);
        },
        totalPrice() {
            return this.$store.state.cart.reduce((acc, current) => acc + current.price * current.quantity, 0);
        }
    }
}

</script>