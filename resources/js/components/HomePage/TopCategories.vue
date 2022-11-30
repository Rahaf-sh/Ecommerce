<template>
	 <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3" v-for="category in CategoriesList" v-bind:key="category.id">
                        <div class="categories__item set-bg">
							<img :src="category.image" />
							<h5><a :href="'/category-products/'+category.id">{{category.name}}</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
