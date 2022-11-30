<template>
	<!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Oranges</li>
                            <li data-filter=".fresh-meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat" v-for="product in ProductsList" v-bind:key="product.id">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" >
							<img :src="product.image" class="img-circle" />

							<ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li> <a href="#" @click="$store.commit('addProductToCart', product)"><i class="fa fa-shopping-cart"></i></a> </li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a :href="'/product-details/'+product.id">{{product.name}}</a></h6>
                            <h5>{{product.price}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->
</template>

<script>
  import axios from 'axios';

  export default {
    name: 'ProductsList',
    data() {
      return {
        ProductsList: null,
      };
    },
    created: function() {
      axios
        .get('http://localhost:8000/api/products')
        .then(res => {
          this.ProductsList = res.data;
        })
    }
  }
</script>

