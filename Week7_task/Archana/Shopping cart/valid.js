var STORE = {
    my_constructors: {
        models: {},
        collections: {},
        views: {},
        router: {}
    },
    my_objects: {
        models: {},
        collections: {},
        views: {},
        router: {}
    }
};

//  DEFINING CONSTRUCTORS FOR THE APP

//  MODELS
STORE.my_constructors.models.Product = Backbone.Model.extend({
    initialize: function(){
        console.log('A new product has been created');
    },
    defaults: {
        name: 'NO NAME',
        description: 'NO DESCRIPTION',
        price: 'NO PRICE',
        category: 'NO CATEGORY', //  men, woman, kid
        quantity: 0
    }
});
STORE.my_constructors.models.CheckoutFormData = Backbone.Model.extend({
    initialize: function(){
        console.log('THE FORM DATA OBJECT HAS BEEN CREATED');
    },
    defaults: {
        name: 'NO NAME',
        last_name: 'NO LAST NAME',
        email: 'NO EMAIL',
        phone_number: 'NO PHONE NUMBER',
        credit_card_number: 'NO CREDIT CARD NUMBER'
    }
});
STORE.my_constructors.models.RegistrationFormData = Backbone.Model.extend({
    initialize: function(){
        console.log('THE REGISTRATION FORM DATA OBJECT HAS BEEN CREATED');
    },
    defaults: {
        name: 'NO NAME',
        last_name: 'NO LAST NAME',
        email: 'NO EMAIL',
        password: 'NO PASSWORD'
    }
});
//  COLLECTIONS

//  note: we will create three catalogs (man, woman, kid)
STORE.my_constructors.collections.Catalog = Backbone.Collection.extend({
    model: STORE.my_constructors.models.Product,
    initialize: function(){
        console.log('A new list of products has been created')
    }
});
STORE.my_constructors.collections.Bag = Backbone.Collection.extend({
    model: STORE.my_constructors.models.Product,
    initialize: function(){
        console.log('The Bag has been created');
        //  adding event listeners
        this.on('add', this.refresh);
    },
    refresh: function(){
        STORE.my_objects.views.HeaderSummary.refresh();
        /*
         STORE.my_objects.views.HeaderSummary.render();
         */
        /*STORE.my_objects.views.HeaderSummary.render();*/
    },
    getBagTotal: function(){
        var total = _.reduce(this.models, function(accumulator, item){
            accumulator = accumulator + (item.get('quantity')*item.get('price'));
            return accumulator;
        },0);
        return total;
    },
    getNumberOfItems: function(){
        var numItems = _.reduce(this.models, function(accumulator, item){
            accumulator = accumulator + item.get('quantity');
            return accumulator;
        },0);
        return numItems;
    }


});

//  VIEWS
STORE.my_constructors.views.CatalogContainer = Backbone.View.extend({

    initialize: function(){
        console.log('The product list view has been initialized');
    },
    render: function() {
        _.each(this.collection.models, function(item){
            console.log(item.toJSON());
            var itemView = new STORE.my_constructors.views.SingleProduct({model: item});
            this.$el.append(itemView.render().el);
        }, this);
    }
});
STORE.my_constructors.views.SingleProduct = Backbone.View.extend({
    initialize: function(){
        this.render();
    },
    template: _.template($("#product_template").html()),
    render: function(){
        this.$el.html(this.template(this.model.toJSON()));
        return this;
    },
    events: {
        'click .add': 'addToBag',
        'click .quick_view': 'showQuickView'
    },
    addToBag: function(){
        //this.$el.fadeTo( "slow" , 0.5, function() {});
        if (STORE.my_objects.collections.myBag.contains(this.model)){
            /*increase quantity property*/
            var index = _.indexOf(STORE.my_objects.collections.myBag.models, this.model);
            var prevQTY = STORE.my_objects.collections.myBag.models[index].get('quantity');
            var newQTY = prevQTY + 1;
            STORE.my_objects.collections.myBag.models[index].set('quantity',newQTY);
            console.log('the product is already in the bag');
        } else {
            STORE.my_objects.collections.myBag.add([this.model]);
            var index = _.indexOf(STORE.my_objects.collections.myBag.models, this.model);
            var prevQTY = STORE.my_objects.collections.myBag.models[index].get('quantity');
            var newQTY = prevQTY + 1;
            STORE.my_objects.collections.myBag.models[index].set('quantity',newQTY);
            console.log('A new product has been added to the Bag');
        }
        STORE.my_objects.views.BagSummary.$el.html('');
        STORE.my_objects.views.BagSummary.render();
        STORE.my_objects.views.HeaderSummary.refresh();


    },
    showQuickView: function(){
        STORE.my_objects.views.Quick_view = new STORE.my_constructors.views.QuickLook(
                {
                    el: '#quick',
                    model: this.model
                }
        );
        console.log('QUICK VIEW HAS BEEN ACTIVATED');
    }
});
STORE.my_constructors.views.QuickLook = Backbone.View.extend({
    initialize: function(){
        this.render();
    },
    template: _.template($("#quick_view_template").html()),
    render: function(){
        this.$el.html(this.template(this.model.toJSON()));
        return this;
    }/*,
     events: {
     'mouseover .zoom': 'startMagnifier'
     },
     startMagnifier: function(){
     $('.zoom').okzoom({
     width: 250,
     height: 250,
     round: true,
     background: "#000000",
     backgroundRepeat: "no-repeat",
     shadow: "0 0 0px #000",
     border: "1px solid black"
     });
     }*/
});
STORE.my_constructors.views.ShoppingCartSummary = Backbone.View.extend({
    el: '#shopping_container',
    initialize: function(){
        console.log('THE SHOPPING CART SUMMARY AREA VIEW HAS BEEN INITIALIZED');
        //this.collection = STORE.my_objects.collections.myBag;
        //this.render();
    },
    render: function() {
        _.each(STORE.my_objects.collections.myBag.models, function(item){
            console.log(item.toJSON());
            var itemView = new STORE.my_constructors.views.ShoppingCartItem({model: item});
            this.$el.append(itemView.render().el);
        }, this);
    }
});
STORE.my_constructors.views.ShoppingCartItem = Backbone.View.extend({
    initialize: function(){
        this.render();
    },
    template: _.template($("#bag_item").html()),
    render: function(){
        this.$el.html(this.template(this.model.toJSON()));
        return this;
    },
    events: {
        'click .remove_item': 'removeItem',
        'click .bag_item_name': 'increaseQty'
    },
    removeItem: function(){
        this.$el.fadeOut(500, function(){
            $(this).remove();
        });
        console.log(STORE.my_objects.collections.myBag.toJSON());
        STORE.my_objects.collections.myBag.remove(this.model);
        console.log('ELEMENT REMOVED');
        console.log(STORE.my_objects.collections.myBag.toJSON());
        STORE.my_objects.views.HeaderSummary.refresh();
    },
    increaseQty: function(){
        console.log('qty increased');   //TODO this still needs some work.
    }
});
STORE.my_constructors.views.TestView = Backbone.View.extend({
    initialize: function(){
        this.render();
    },
    render: function(){
        this.$el.html('<p>hello test</p> <p>hello test</p>');
        return this;
    }
});
STORE.my_constructors.views.Map = Backbone.View.extend({
    initialize: function(){
        this.render();
    },
    template: _.template($("#map_template").html()),
    render: function(){

        this.$el.html(this.template);
    }
});
STORE.my_constructors.views.CheckoutForm = Backbone.View.extend({
    el: '#shopping_container',
    initialize: function(){
        this.render();
    },
    template: _.template($("#checkout_form_template").html()),
    render: function(){
        this.$el.html(this.template);
        return this;
    },
    events: {
        'click #order_btn': 'sendOrderData'
    },
    sendOrderData: function(){
        STORE.my_objects.models.FormData.set(
                {
                    name: $("[name='name']").val(),
                    last_name: $("[name='lastname']").val(),
                    email: $("[name='email']").val(),
                    phone_number: $("[name='phone']").val(),
                    credit_card_number: $("[name='creditcard']").val()
                }
        );
        var purchase_order = {
            customer: STORE.my_objects.models.FormData,
            products: STORE.my_objects.collections.myBag
        };
        console.log(JSON.stringify(STORE.my_objects.models.FormData.toJSON()));
        $.ajax(
                {
                    url:"http://localhost:8080/max/webapi/storeRESTendpoint/send_email",
                    type: 'POST',
                    contentType: "application/json; charset=utf-8",
                    dataType: 'json',
                    data: JSON.stringify(purchase_order)
                }
        );
        this.$el.html('Your order has been placed');
        /*STORE.my_objects.views.BagSummary.render();*/
    }
});
STORE.my_constructors.views.SessionSummary = Backbone.View.extend({
    el: '#user_session',
    initialize: function(){
        this.render();
    },
    template: _.template($("#session_summary").html()),
    render: function(){
        this.$el.html(this.template(this.model.toJSON()));
        return this;
    },
    refresh: function(){
        var myMod = Backbone.Model.extend({
            defaults: {
                qty: STORE.my_objects.collections.myBag.getNumberOfItems(),
                tot: STORE.my_objects.collections.myBag.getBagTotal()
            }
        });

        var t = new myMod();
        //  creating the summary view at the header
        STORE.my_objects.views.HeaderSummary = new STORE.my_constructors.views.SessionSummary(
                {
                    model: t
                }
        );
        STORE.my_objects.views.HeaderSummary.$el.html('');
        STORE.my_objects.views.HeaderSummary.render();
    }
});
STORE.my_constructors.views.RegisterForm = Backbone.View.extend({
    el: '#quick',
    initialize: function(){
        this.render();
    },
    template: _.template($("#register_form_template").html()),
    render: function(){
        this.$el.html(this.template);
        return this;
    },
    events: {
        'click #registration_btn': 'sendRegistrationData'
    },
    sendRegistrationData: function(){

        var data = {
            name: $("[name='name']").val(),
            lastname: $("[name='lastname']").val(),
            email: $("[name='email']").val(),
            password: $("[name='password']").val()
        };

        console.log(JSON.stringify(data));
        $.ajax(
                {
                    url:"http://10.0.0.3:8080/max/webapi/storeRESTendpoint/registration",
                    type: 'POST',
                    contentType: "application/json; charset=utf-8",
                    dataType: 'json',
                    data: JSON.stringify(data)
                }
        );
        this.$el.html('You have been registered');

    }
});
STORE.my_constructors.views.LoginForm = Backbone.View.extend({
    el: '#quick',
    initialize: function(){
        this.render();
    },
    template: _.template($("#login_form_template").html()),
    render: function(){
        this.$el.html(this.template);
        return this;
    },
    events: {
        'click #login_btn': 'sendLoginData'
    },
    sendLoginData: function(){
        var data = {
            email: $("[name='email']").val(),
            password: $("[name='password']").val()
        };
        console.log(JSON.stringify(data));
        /* $.ajax(
         {
         url:"http://localhost:8080/max/webapi/storeRESTendpoint/registration",
         type: 'POST',
         contentType: "application/json; charset=utf-8",
         dataType: 'json',
         data: JSON.stringify(data)
         }
         );
         */ this.$el.html('You are now logged in');

        console.log('login sent');
    }

});

//  ROUTER
STORE.my_constructors.router.AppRouter = Backbone.Router.extend({
    routes: {
        "home": "handleRoute0",
        "man": "handleRoute1",
        "woman": "handleRoute2",
        "kid": "handleRoute3",
        "stores": "handleRoute4",
        "check": "handleRoute5",
        /*'*path':  "handleRoute1",*/ // this is the default route
        "": "handleInitRoute",
        "register": "handleRegister",
        "login": "handleLogin"
    },
    handleInitRoute: function(){
        //  populating the catalogs
        var p1 = new STORE.my_constructors.models.Product({
            name: 'shirt 1',
            description: 'Cool t shirt',
            price: '1000.12',
            category: 'NO CATEGORY', //  men, woman, kid
            quantity: 0
        });
        var p2 = new STORE.my_constructors.models.Product({
                    name: 'shirt 2',
                    description: 'Cool t shirt',
                    price: '600.12',
                    category: 'NO CATEGORY', //  men, woman, kid
                    quantity: 0
                }
        );
        var p3 = new STORE.my_constructors.models.Product({
                    name: 'shirt 3',
                    description: 'Cool t shirt',
                    price: '2500.15',
                    category: 'NO CATEGORY', //  men, woman, kid
                    quantity: 0
                }
        );
        var p4 = new STORE.my_constructors.models.Product({
            name: 'shirt 4',
            description: 'Cool t shirt',
            price: '1000.14',
            category: 'NO CATEGORY', //  men, woman, kid
            quantity: 0
        });
        var p5 = new STORE.my_constructors.models.Product({
            name: 'shirt 5',
            description: 'Cool t shirt',
            price: '9.99',
            category: 'NO CATEGORY', //  men, woman, kid
            quantity: 0
        });

        STORE.my_objects.collections.Man_Catalog.add([p1,p2,p3,p4,p5]);
        console.log(p1);
        STORE.my_objects.views.Man_CatalogContainer = new STORE.my_constructors.views.CatalogContainer(
                {
                    el: '#right',
                    collection: STORE.my_objects.collections.Man_Catalog
                }
        );
        STORE.my_objects.views.Man_CatalogContainer.$el.html('');
        STORE.my_objects.views.Man_CatalogContainer.render();

        STORE.my_objects.collections.Woman_Catalog.add([p1,p2,p3]);
        STORE.my_objects.collections.Kid_Catalog.add([p1,p2]);

        var myMod = Backbone.Model.extend({
            defaults: {
                qty: STORE.my_objects.collections.myBag.getNumberOfItems(),
                tot: STORE.my_objects.collections.myBag.getBagTotal()
            }
        });

        var t = new myMod();
        //  creating the summary view at the header
        STORE.my_objects.views.HeaderSummary = new STORE.my_constructors.views.SessionSummary(
                {
                    model: t
                }
        );
        STORE.my_objects.views.HeaderSummary.$el.html('');
        STORE.my_objects.views.HeaderSummary.render();

    },
    handleRoute0: function(){
        console.log('route home working');
    },
    handleRoute1: function(){
        STORE.my_objects.views.Man_CatalogContainer = new STORE.my_constructors.views.CatalogContainer(
                {
                    el: '#right',
                    collection: STORE.my_objects.collections.Man_Catalog
                }
        );
        STORE.my_objects.views.Man_CatalogContainer.$el.html('');
        STORE.my_objects.views.Man_CatalogContainer.render();

        var myMod = Backbone.Model.extend({
            defaults: {
                qty: STORE.my_objects.collections.myBag.getNumberOfItems(),
                tot: STORE.my_objects.collections.myBag.getBagTotal()
            }
        });

        var t = new myMod();
        //  creating the summary view at the header
        STORE.my_objects.views.HeaderSummary = new STORE.my_constructors.views.SessionSummary(
                {
                    model: t
                }
        );
        STORE.my_objects.views.HeaderSummary.$el.html('');
        STORE.my_objects.views.HeaderSummary.render();




        console.log('route man working');
    },
    handleRoute2: function(){
        STORE.my_objects.views.Woman_CatalogContainer = new STORE.my_constructors.views.CatalogContainer(
                {
                    el: '#right',
                    collection: STORE.my_objects.collections.Woman_Catalog
                }
        );
        STORE.my_objects.views.Woman_CatalogContainer.$el.html('');
        STORE.my_objects.views.Woman_CatalogContainer.render();
        console.log('route woman working');
    },
    handleRoute3: function(){
        STORE.my_objects.views.Kid_CatalogContainer = new STORE.my_constructors.views.CatalogContainer(
                {
                    el: '#right',
                    collection: STORE.my_objects.collections.Kid_Catalog
                }
        );
        STORE.my_objects.views.Kid_CatalogContainer.$el.html('');
        STORE.my_objects.views.Kid_CatalogContainer.render();
        console.log('route kid working');
    },
    handleRoute4: function(){
        STORE.my_objects.views.myMap = new STORE.my_constructors.views.Map({el: '#right'});
        STORE.my_objects.map = L.map('map').setView([51.505, -0.09], 8);
        L.tileLayer('http://{s}.tile.stamen.com/toner-lite/{z}/{x}/{y}.png',
                {
                    attribution: '',
                    subdomains: 'abcd',
                    minZoom: 0,
                    maxZoom: 20
                }
        ).addTo(STORE.my_objects.map);
        L.marker([51.5, -0.09]).addTo(STORE.my_objects.map);
        L.marker([52.0, -0.20]).addTo(STORE.my_objects.map);
        L.marker([51.0, -0.20]).addTo(STORE.my_objects.map);
        STORE.my_objects.views.Quick_view.$el.empty();
        console.log('route stores working');
    },
    handleRoute5: function(){
        console.log('route checkout working');
        //  GET request
        var request1 = $.ajax("http://localhost:8080/max/webapi/storeRESTendpoint/man_catalog");
        request1.done(function(){
            console.log('Request 1 Completed');
            STORE.my_objects.views.Checkout = new STORE.my_constructors.views.CheckoutForm();
        });
        //  POST request
        var data_test = JSON.stringify(STORE.my_objects.collections.myBag.toJSON());
        console.log(data_test);
        var request2 = $.ajax(
                {
                    url:"http://api.openweathermap.org/data/2.5/forecast/city?id=2172797&APPID=1111111111",
                    type: 'POST',
                    data: data_test
                }
        );
        request2.done(function(){
            console.log('Request 2 Completed');
        });

    },
    handleRegister: function(){
        console.log('register route working');
        STORE.my_objects.RegistrationForm = new STORE.my_constructors.views.RegisterForm();

    },
    handleLogin: function(){
        console.log('login route working');
        STORE.my_objects.LoginForm = new STORE.my_constructors.views.LoginForm();
    }
});

//  creating the bag
STORE.my_objects.collections.myBag = new STORE.my_constructors.collections.Bag;

//  creating the man, woman and kid catalogs collections
STORE.my_objects.collections.Man_Catalog = new STORE.my_constructors.collections.Catalog();
STORE.my_objects.collections.Woman_Catalog = new STORE.my_constructors.collections.Catalog();
STORE.my_objects.collections.Kid_Catalog = new STORE.my_constructors.collections.Catalog();


STORE.my_objects.views.BagSummary = new STORE.my_constructors.views.ShoppingCartSummary;

//  creating the form data object
STORE.my_objects.models.FormData = new STORE.my_constructors.models.CheckoutFormData;


console.log(_.size(STORE.my_objects.collections.Man_Catalog));
console.log(_.size(STORE.my_objects.collections.Woman_Catalog));
console.log(_.size(STORE.my_objects.collections.Kid_Catalog));

console.log(_.size(STORE.my_objects.collections.myBag));


STORE.my_objects.router.StoreRouter = new STORE.my_constructors.router.AppRouter;
Backbone.history.start(); //    this line is necessary for the router to work

