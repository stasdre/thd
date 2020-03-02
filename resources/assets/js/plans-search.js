window.Vue = require("vue");

Vue.component("plans-list", require("./components/PlansList.vue").default);
Vue.component("promo", require("./components/Promo.vue").default);

const plans = new Vue({
    el: "#plans-search"
});
