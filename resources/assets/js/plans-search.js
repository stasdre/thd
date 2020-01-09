window.Vue = require("vue");

Vue.component("plans-list", require("./components/PlansList.vue"));
Vue.component("promo", require("./components/Promo.vue"));

const plans = new Vue({
  el: "#plans-search"
});
