<div class="container-fluid page-item shadow-sm">
  <footer class="pt-5 p-3">
    <div class="row">
      <div class="col-md-2 mb-3">
        <div class="item_name mb-2 h4">Useful Links</div>
        <ul class="nav flex-column ms-3">
          <li class="nav-item mb-2"><a href="<?php echo base_url() ?>" class="nav-link p-0 text-body-secondary">Home</a></li>
          <li class="nav-item mb-2"><a href="<?php echo base_url('home/faqs') ?>" class="nav-link p-0 text-body-secondary">FAQs</a></li>
          <li class="nav-item mb-2"><a href="<?php echo base_url('home/about-us') ?>" class="nav-link p-0 text-body-secondary">About</a></li>
					<li class="nav-item mb-2"><a href="<?php echo base_url('home/terms-conditions') ?>" class="nav-link p-0 text-body-secondary">Term & conditions</a></li>
					<li class="nav-item mb-2"><a href="<?php echo base_url('home/privacy-policies') ?>" class="nav-link p-0 text-body-secondary">Privacy policy</a></li>
        </ul>
      </div>

			<div class="col-md-4 mb-3">
				<div class="item_name mb-3 h4">Popular Posts</div>

				<div class="col-auto mb-3">
					<a href="#" class="text-decoration-none nav-link">
						<div class="row g-0 border rounded overflow-hidden  shadow-sm position-relative">
							<div class="col-sm-4">
								<img src="<?php echo base_url("assets/system/no-thumbnail.jpg");?>" alt="Post Thumbnail">
							</div>
							<div class="col-sm-8 p-4 d-flex flex-column position-static">
								<h3 class="mb-0 text-primary clamp-2">Featured post</h3>
								<div class="mb-1 text-muted">Nov 12</div>
							</div>
						</div>
					</a>
				</div>

				<div class="col-auto mb-3">
					<a href="#" class="text-decoration-none nav-link">
						<div class="row g-0 border rounded overflow-hidden  shadow-sm position-relative">
						<div class="col-sm-4">
								<img src="<?php echo base_url("assets/system/no-thumbnail.jpg");?>" alt="Post Thumbnail">
							</div>
							<div class="col-sm-8 p-4 d-flex flex-column position-static">
								<h3 class="mb-0 text-primary clamp-2">Featured post</h3>
								<div class="mb-1 text-muted">Nov 13</div>
							</div>
						</div>
					</a>
				</div>

			</div>

      <div class="col-md-5  mb-3">
        <form method="get" action="<?php echo base_url('subscribe') ?>">
          <div class="item_name mb-2 h4">Subscribe to our newsletter</div>
          <p>Monthly digest of what's new and exciting from us.</p>
          <div class="d-flex flex-column flex-sm-row w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="email" class="form-control" placeholder="Email address" name="email">
						<button class="btn btn-subscribe" type="submit">Subscribe</button>
          </div>
        </form>
      </div>
    </div>

    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 mt-4 border-top">
      <p>&copy; <?php $current_year = date('Y'); echo $current_year . ' ' . $site_name; ?>. All rights reserved.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
      </ul>
    </div>
  </footer>
</div>
<script src="<?php echo base_url('assets/js/script.js') ?>"></script>
</body>
</html>
