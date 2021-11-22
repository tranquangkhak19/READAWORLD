<div class="card">
	<form method="POST" action="ApplyFilter">
		<article class="card-group-item">
			<header class="card-header">
				<h6 class="title">Price (VND)</h6>
			</header>
			<div class="filter-content">
				<div class="card-body">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Min</label>
							<input type="number" name="minPrice" class="form-control" placeholder="0" min=0>
						</div>
						<div class="form-group col-md-6 text-right">
							<label>Max</label>
							<input type="number" name="maxPrice" class="form-control" placeholder="10000000" min=0>
						</div>
					</div>
				</div> <!-- card-body.// -->
			</div>
		</article> <!-- card-group-item.// -->
		<article class="card-group-item">
			<header class="card-header">
				<h6 class="title">Category </h6>
			</header>
			<div class="filter-content">
				<div class="card-body">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" name="categories[]" value="VAN HOC" class="custom-control-input" id="Check1">
						<label class="custom-control-label" for="Check1">Literature</label>
					</div> <!-- form-check.// -->

					<div class="custom-control custom-checkbox">
						<input type="checkbox" name="categories[]" value="CONG NGHE" class="custom-control-input" id="Check2">
						<label class="custom-control-label" for="Check2">Technology</label>
					</div> <!-- form-check.// -->

					<div class="custom-control custom-checkbox">
						<input type="checkbox" name="categories[]" value="TIEU THUYET" class="custom-control-input" id="Check3">
						<label class="custom-control-label" for="Check3">Novel</label>
					</div> <!-- form-check.// -->

					<div class="custom-control custom-checkbox">
						<input type="checkbox" name="categories[]" value="TRUYEN TRANH" class="custom-control-input" id="Check4">
						<label class="custom-control-label" for="Check4">Comic books</label>
					</div> <!-- form-check.// -->
				</div> <!-- card-body.// -->
			</div>
		</article> <!-- card-group-item.// -->
		<article class="card-group-item mx-auto">
			<input type="submit" name="submit" value="Apply" class="btn btn-primary m-3">
		</article> <!-- card-group-item.// -->
	</form>
</div> <!-- card.// -->