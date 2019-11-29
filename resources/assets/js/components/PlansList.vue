<template>
  <div :class="{ loading: isLoading }">
    <i class="loading-icon fas fa-sync-alt fa-6x fa-spin"></i>
    <div v-if="showFilter" class="page-name mt-3 py-2 px-2 mobile-off">
      <div class="row align-items-center">
        <div class="col-sm-3 col-md-5 col-lg-4">
          <form action class="form-inline">
            <div class="form-group">
              <label for>Sort:</label>
              <select v-model="order" class="form-control form-control-sm rounded-0">
                <option value="popular">Most Popular</option>
                <option value="recent">Newest</option>
                <option value="s_l">Small to Large</option>
                <option value="l_s">Large to Small</option>
              </select>
            </div>
            <div class="form-group ml-2">
              <label for>Views:</label>
              <select v-model="views" class="form-control form-control-sm rounded-0">
                <option value="24">24</option>
                <option value="50">50</option>
              </select>
            </div>
          </form>
        </div>
        <br />
        <div class="col-sm-4 col-md-6 col-lg-3 text-center">
          <!-- <div class="row align-items-center no-gutters">
            <div class="col-6 save-search">
              <h6 class="font-futura m-0 ls-1 text-right pr-2">SAVE SEARCH</h6>
            </div>
            <div class="col-6">
              <div class="form-group text-left m-0">
                <div class="input-group input-group-sm">
                  <input
                    type="text"
                    class="form-control rounded-0 border-secondary"
                    placeholder="Nickname"
                  />
                  <div class="input-group-append">
                    <button
                      class="btn btn-primary rounded-0 text-white font-weight-semi-bold"
                      type="button"
                    >
                      Save
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>-->
        </div>
        <div class="col-sm-5 col-md-12 col-lg-5">
          <div class="text-center text-sm-right search_pagination">
            <ul class="list-inline m-0 paging">
              <li class="list-inline-item">
                <button
                  class="btn btn-sm btn-secondary rounded-0"
                  :disabled="current_page === 1"
                  @click.prevent="prev"
                >&lt; Prev</button>
              </li>
              <li class="list-inline-item text-secondary">Page</li>
              <li class="list-inline-item">
                <input
                  type="text"
                  class="form-control rounded-0"
                  @keyup.enter="goToPage"
                  v-model="current_page"
                />
              </li>
              <li class="list-inline-item">
                <span class="text-secondary">of</span>
                {{ last_page }}
              </li>
              <li class="list-inline-item">
                <button
                  class="btn btn-sm btn-secondary rounded-0"
                  :disabled="current_page === last_page"
                  @click.prevent="next"
                >&gt; Next</button>
              </li>
              <li class="list-inline-item ml-2">
                <strong>
                  <span class="text-primary">PLANS:</span>
                  {{ total }}
                </strong>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Sorting on mobile -->
    <div v-if="showFilter" class="desktop-off">
      <br />
      <div class="row page-name sort-by-sec">
        <div class="col-6">
          <span>
            SORT BY
            <button style="font-size:12px;padding : 0;">
              <i class="fa fa-caret-down"></i>
            </button>
          </span>
        </div>
        <div class="col-6 navbar-light" style="text-align: right;padding-right: 0;">
          <span>Filter</span>
          <span class="navbar-toggler-icon" style="height : 24px;"></span>
          &nbsp;
          <span class="blue-text" style="font-size : 12px;">PLANS :</span>
          <span>{{ total }}</span>
        </div>
      </div>

      <div class="row ind_search_div">
        <br />
        <!-- <div class="col-6 save-search">
          <span>SAVE YOUR SEARCH</span>
        </div>
        <div class="col-6">
          <input type="text" placeholder="Nickname" style="width : 75%" class="save_search_box" />
          <button
            class="btn btn-primary rounded-0 text-white font-weight-semi-bold with_padding save_search_button"
            type="button"
          >Save</button>
        </div>-->
      </div>
    </div>
    <!-- Sorting on mobile -->

    <div class="row">
      <div
        v-for="(plan, index) in plans"
        :class="[cols, index === 1 && showPromo ? 'mt-3 black_banner' : '']"
        :style="{backgroundImage: index === 1 && showPromo ? 'url(\'/images/black-banner.jpg\')' : ''}"
        :key="plan.id"
      >
        <h5
          v-if="bestSellingPlans && index === 0"
          style="font-weight: bold;font-size: 18px;"
          class="contact-right-sidebar-heading"
        >View Our Best-Selling House Plans</h5>
        <promo v-if="index === 1 && showPromo"></promo>
        <div v-else class="plan-list mt-3">
          <div class="row align-items-center py-2 px-1">
            <div class="col-8">
              <p class="plan-name font-weight-bold mb-0">
                {{ plan.square_ft ? plan.square_ft.str_total : "" }} sq ft |
                <span
                  class="text-white"
                >plan {{ plan.plan_number }}</span>
              </p>
            </div>
            <div class="col-4">
              <ul class="list-inline mb-0 text-right font-icons">
                <li class="list-inline-item icon-heart-mob">
                  <a href="#" @click.prevent="savePlan(plan, index)">
                    <i :class="[plan.saved_plans.length ? 'fas' : 'far', 'fa-heart', 'plan-heart']"></i>
                  </a>
                </li>
                <!-- <li class="list-inline-item icon-search-mob">
                  <a href="#">
                    <i class="fas fa-search" style="color:white"></i>
                  </a>
                </li>-->
              </ul>
            </div>
          </div>
          <div class="position-relative">
            <div
              :id="'plan' + plan.id"
              class="carousel slide"
              data-ride="carousel"
              data-interval="false"
            >
              <a :href="'/plan/' + plan.plan_number" class="carousel-inner">
                <div
                  class="carousel-item"
                  :class="{ active: index === 0 }"
                  v-for="(image, index) in plan.images"
                  :key="image.id"
                >
                  <img
                    :src="
                      '/storage/plans/' + plan.id + '/thumb/' + image.file_name
                    "
                    alt
                    class="img-fluid d-block w-100"
                  />
                  <a v-if="image.camera_icon" href="#" class="position-absolute icon-camera">
                    <img src="/images/icons/icon-camera.png" alt />
                  </a>
                </div>
              </a>
              <a
                class="carousel-control-prev"
                @click.prevent
                :href="'#plan' + plan.id"
                role="button"
                data-slide="prev"
              >
                <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a
                class="carousel-control-next"
                @click.prevent
                :href="'#plan' + plan.id"
                role="button"
                data-slide="next"
              >
                <span class="carousel-control-next-icon" aria-hidden="false"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <div class="media planinfo text-left position-absolute placeholder-black">
              <img
                class="mr-1 align-self-center"
                src="/images/icons/logo-placeholder.png"
                alt="Generic placeholder image"
              />
              <div class="media-body">
                <h5 class="mb-0 text-white">
                  plan
                  <span class="text-secondary">{{ plan.plan_number }}</span>
                </h5>
                <h5 class="m-0 text-white">
                  davidwiggins
                  <span class="text-secondary">houseplans.com</span>
                </h5>
              </div>
            </div>
            <!-- <a href="#" class="position-absolute pinterest">
              <img src="/images/icons/icon-pinterest.png" alt />
            </a>-->
          </div>
          <div class="row no-gutters plan-info">
            <div class="col bg-light">
              bed
              <strong class="d-block">
                {{
                plan.rooms ? plan.rooms.r_bedrooms : ""
                }}
              </strong>
            </div>
            <div class="col">
              bath
              <strong class="d-block">
                {{
                plan.rooms ? plan.rooms.r_full_baths : ""
                }}
              </strong>
            </div>
            <div class="col bg-light">
              story
              <strong class="d-block">
                {{
                plan.dimensions ? plan.dimensions.stories : ""
                }}
              </strong>
            </div>
            <div class="col">
              gar
              <strong class="d-block">
                {{
                plan.garage ? plan.garage.car : ""
                }}
              </strong>
            </div>
            <div class="col bg-light">
              width
              <span class="d-block">
                {{ plan.dimensions ? plan.dimensions.width_ft : "" }}’
                {{ plan.dimensions ? plan.dimensions.width_in : "" }}"
              </span>
            </div>
            <div class="col">
              depth
              <span class="d-block">
                {{ plan.dimensions ? plan.dimensions.depth_ft : "" }}’
                {{ plan.dimensions ? plan.dimensions.depth_in : "" }}”
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import VueRouter from "vue-router";
import axios from "axios";

const router = new VueRouter({
  mode: "history"
});

export default {
  router,
  props: [
    "style-id",
    "collection-id",
    "noFilter",
    "colums",
    "view",
    "bestSelling",
    "promo-block",
    "saved-user"
  ],
  data: function() {
    return {
      isLoading: false,
      plans: [],
      last_page: 1,
      total: 0,
      current_page: 1,
      views: this.view ? this.view : 24,
      order: "popular",
      showFilter: this.noFilter === true ? false : true,
      cols:
        this.colums === 2
          ? "col-md-6"
          : this.colums === 1
          ? "col-sm-12"
          : "col-sm-4",
      bestSellingPlans: this.bestSelling === true ? 1 : "",
      showPromo: this.promoBlock === true ? true : false,
      txt: this.$route.query.txt ? this.$route.query.txt : "",
      sq_min: this.$route.query.sq_min ? this.$route.query.sq_min : "",
      sq_max: this.$route.query.sq_max ? this.$route.query.sq_max : "",
      beds: this.$route.query.beds ? this.$route.query.beds : "",
      baths: this.$route.query.baths ? this.$route.query.baths : "",
      garages: this.$route.query.garages ? this.$route.query.garages : "",
      stories: this.$route.query.stories ? this.$route.query.stories : "",
      width_min: this.$route.query.width_min ? this.$route.query.width_min : "",
      width_max: this.$route.query.width_max ? this.$route.query.width_max : "",
      depth_min: this.$route.query.depth_min ? this.$route.query.depth_min : "",
      depth_max: this.$route.query.depth_max ? this.$route.query.depth_max : "",
      bf: this.$route.query["bf[]"] ? this.$route.query["bf[]"].join() : "",
      kf: this.$route.query["kf[]"] ? this.$route.query["kf[]"].join() : "",
      rf: this.$route.query["rf[]"] ? this.$route.query["rf[]"].join() : "",
      gf: this.$route.query["gf[]"] ? this.$route.query["gf[]"].join() : "",
      ef: this.$route.query["ef[]"] ? this.$route.query["ef[]"].join() : "",
      styles: this.styleId
        ? this.styleId
        : this.$route.query["styles[]"]
        ? this.$route.query["styles[]"].join()
        : "",
      collections: this.collectionId
        ? this.collectionId
        : this.$route.query["collections[]"]
        ? this.$route.query["collections[]"].join()
        : "",
      style_or_collection: this.$route.query.style_or_collection
        ? this.$route.query.style_or_collection
        : ""
    };
  },
  methods: {
    next() {
      if (this.current_page < this.last_page) {
        this.current_page++;
        this.search();
      }
    },
    prev() {
      if (this.current_page > 1) {
        this.current_page--;
        this.search();
      }
    },
    goToPage() {
      if (this.current_page <= this.last_page && this.current_page >= 1) {
        this.search();
      }
    },
    search() {
      this.isLoading = true;
      axios
        .get("/search/result", {
          params: {
            page: this.current_page,
            views: this.views,
            order: this.order,
            txt: this.txt ? this.txt : "",
            sq_min: this.sq_min,
            sq_max: this.sq_max,
            beds: this.beds,
            baths: this.baths,
            garages: this.garages,
            stories: this.stories,
            width_min: this.width_min,
            width_max: this.width_max,
            depth_min: this.depth_min,
            depth_max: this.depth_max,
            bf: this.bf,
            kf: this.kf,
            rf: this.rf,
            gf: this.gf,
            ef: this.ef,
            styles: this.styles,
            collections: this.collections,
            style_or_collection: this.style_or_collection,
            b_s_p: this.bestSellingPlans,
            saved_user: this.savedUser
          }
        })
        .then(response => {
          this.plans = response.data.data;
          this.last_page = response.data.last_page;
          this.total = response.data.total;
          this.current_page = response.data.current_page;
        })
        .then(() => {
          this.isLoading = false;
        });
    },
    savePlan(plan, index) {
      axios
        .post(`/save-plan/${plan.id}`)
        .then(response => {
          if (response.data.status == "add") {
            this.$set(this.plans[index], "saved_plans", "saved");
          } else if (response.data.status == "del") {
            this.$set(this.plans[index], "saved_plans", []);
            if (this.savedUser) {
              this.plans = this.plans.filter(item => {
                return plan.id !== item.id;
              });
              this.total -= 1;
            }
          }
        })
        .catch(error => {
          if (error.response.status === 401) {
            window.location.href = "/register";
          }
        });
    }
  },
  watch: {
    views: function() {
      this.search();
    },
    order: function() {
      this.search();
    }
  },
  created: function() {
    this.search();
  }
};
</script>
