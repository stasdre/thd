<footer class="py-3 mt-4">
  <div class="row">
    @foreach (Thd\FooterBlock::with('footer_items')->get() as $item)
    <div class="col-sm-4">
      <h3 class="font-weight-bold mb-3">{{$item->name}}</h3>
      <ul class="list-inline text-center">
        @foreach ($item->footer_items as $menu)
        <li><a href="{{ $menu->link }}">{{ $menu->name }}</a></li>
        @endforeach
      </ul>
    </div>
    @endforeach
    <div class="copyright">
      <div class="social-icons">
        <ul class="list-inline">


          <ul class="list-inline">
            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-houzz" aria-hidden="true"></i></a></li>
          </ul>
      </div>
      <div class="col-md-12">
        <p> © {{ date("Y") }} David E. Wiggins Architect House Plans®, LLC. All rights reserved. All house plans and
          images on David E. Wiggins Architect House Plans® website are protected under Federal and International
          Copyright Law. Reproductions of the illustrations or working drawings by any means is strictly prohibited.
          No part of this electronic publication may be reproduced, stored or transmitted in any form by any means
          without prior written permission of David E. Wiggins Architect House Plans®, LLC. </p>
      </div>
    </div>
  </div>
</footer>