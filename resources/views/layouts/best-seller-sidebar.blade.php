<div class="col-12 col-md-4 contact-us-right-sidebar mobile-off">
  <div class="search-results" id="plans-search" v-cloak>
    <plans-list :no-filter=true :colums=1 :view=3 :best-selling=true :promo-block=false></plans-list>
  </div>
</div>

@push('scripts')
<script src="/js/plans-search.js"></script>
@endpush