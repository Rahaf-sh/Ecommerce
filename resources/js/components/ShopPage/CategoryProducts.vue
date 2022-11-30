<template>
    <div>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Categories</h4>
                        <ul  v-for="category in CategoriesList" v-bind:key="category.id">
                            <li><a :href="'/category-products/'+category.id">{{category.name}}</a></li>
                        </ul>
                    </div>
                   
                </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>16</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6" v-for="product in Data" v-bind:key="product.id">
                            <div class="product__item">
                                <div class="product__item__pic set-bg">
                                    <img :src="product.image" class="img-circle" />
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li> <a href="#" @click="$store.commit('addProductToCart', product)"><i class="fa fa-shopping-cart"></i></a> </li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a :href="'/product-details/'+product.id">{{product.name}}</a></h6>
                                <h5>{{product.price}}</h5>
                                </div>
                            </div>
                        </div>
             
                    </div>
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    
    </section>
    </div>
    <!-- Product Section End -->
    </template>

<script>
    export default {
        name: 'CategoriesList',
       props: ['categoryData'],
         data() {
            
           return {
            CategoriesList: null
           }
        },
        mounted() {
            this.Data =JSON.parse(this.categoryData)
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
    
    