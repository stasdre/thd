window.Vue = require("vue");

Vue.component("footer-block", require("../components/FooterBlock"));
Vue.component("footer-block-item", require("../components/FooterBlockItem"));

const plans = new Vue({
  el: "#footer-blocks"
});
