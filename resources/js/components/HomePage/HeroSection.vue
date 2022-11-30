<template>
   <!-- Hero Section Begin -->
   <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All categories</span>
                        </div>
                        <ul v-for="category in CategoriesList" v-bind:key="category.id">
                            <li><a :href="'/category-products/'+category.id">{{category.name}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->


</template>
<script>
  import axios from 'axios';

  export default {
    name: 'CategoriesList',
    data() {
      return {
        CategoriesList: null,
      };
    },
    created: function() {
      axios
        .get('http://localhost:8000/api/categories')
        .then(res => {
          this.CategoriesList = res.data;
        })
    }
  }
</script>

<style>
  h3 {
    margin-bottom: 5%;
  }
</style>