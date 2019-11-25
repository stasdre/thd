import Vue from "vue";

const plans = new Vue({
  el: "#plans-search",
  data: {
    isLoading: true,
    plans: [],
    last_page: 1,
    total: 0,
    current_page: 1,
    views: 24,
    order: "popular"
  }
});
