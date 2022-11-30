<template>
    <div>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <p id="success"></p>
                        <form @submit.prevent="placeOrder">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>First Name<span>*</span></p>
                                        <input type="text" name="first_name" v-model="first_name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="last_name" v-model="last_name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="country" v-model="country" required>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="street" v-model="street" placeholder="Street Address" class="checkout__input__add" required>
                            </div>
                            <div class="checkout__input">
                                <p>City<span>*</span></p>
                                <input type="text" name="city" v-model="city" required>
                            </div>
                            <div class="checkout__input">
                                <p>State<span>*</span></p>
                                <input type="text" name="state" v-model="state" required>
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="zipcode"  v-model="zipcode" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" v-model="phone"  required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" name="email" v-model="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Create an account?
                                    <input type="checkbox" id="acc" required>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Create an account by entering the information below. If you are a returning customer
                                please login at the top of the page</p>
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="password" name="password" v-model="password"  required>
                            </div>
                            
                            <div class="checkout__input">
                                <p>Order notes</p>
                                <input type="text" name="note" v-model="note"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul v-for="(product, index) in getCart" :key="index">
                                    <li>{{ product.name }}* {{ product.quantity }}<span>{{ product.price }}</span></li>
                               
                                </ul>
                                <div class="checkout__order__total">Total <span>{{totalPrice}}</span></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Cash on Delivery
                                        <input type="checkbox" id="payment" required>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                              
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->


        </div>
        </template>
        <script>
        export default {
            data(){
            return {
                first_name: '',
                last_name: '',
                email: '',
                password: '',
                phone: '',
                country: '',
                state: '',
                city: '',
                street:'',
                zipcode: '',
                note: '',
            }
        },
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
            },
            methods: {
            placeOrder(){
                let data = {
                    first_name: this.first_name,
                    last_name: this.last_name,
                    email: this.email,
                    password: this.password,
                    phone: this.phone,
                    street: this.street,
                    country: this.country,
                    state: this.state,
                    city: this.city,
                    zipcode: this.zipcode,
                    note: this.note,
                    cart: JSON.stringify(this.$store.state.cart),
                    totalPrice: this.$store.state.cart.reduce((acc, current) => acc + current.price * current.quantity, 0)
                   
                }
                axios.post('/api/checkout',data)
                .then((response)=>{
                if (response.data.status === 'success') {
                window.location.href = response.data.url+'?msg'
                } 
                window.localStorage.clear();
             
                })
            }
           
        },
        mounted() {
                
                let uri = window.location.href.split('?');
                console.log(uri[1])
                if(uri[1] === 'msg'){
                    var msg = "Your order has been created successfuly";
                    document.getElementById("success").append(msg);
    
                }
                }
        
        }
        
        </script>