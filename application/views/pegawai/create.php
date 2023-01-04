<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?= $title ?></title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
			crossorigin="anonymous"
		/>
	</head>

	<body>
		<div clas="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="page-title-box">
						<h4 class="page-title"><?= $title ?></h4>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="d-flex justify-content-between mb-3">
						<div class="align-self-center">
							<a
								class="btn btn-sm btn-primary"
								href="<?= base_url('pegawai') ?>"
								>Kembali</a
							>		
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 mx-auto">
					<div class="card">
						<div class="card-body">
            <form class="row g-3 needs-validation" action="<?= base_url('create-pegawai') ?>" method="POST">
							<div class="mb-3">
								<label for="name_pegawai" class="form-label">Nama</label>
								<input
									type="text"
									class="form-control"
									id="name_pegawai"
									name="name_pegawai"
									placeholder="Masukkan Nama Lengkap Anda"
								/>
							</div>
							<div class="mb-3">
								<select class="form-select" name="department_id" id="department_id">
									<option selected>-Pilih Department-</option>
                  <?php foreach ($departemen as $item) { ?>
                    <option value="<?= $item->id ?>"><?= $item->name_department ?> </option>
  
                <?php  } ?>
								</select>
							</div>
              <div class="d-grid gap-2 col-4 mx-auto">
								<button class="btn btn-primary" type="submit">Kirim</button>
              </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
			crossorigin="anonymous"
		></script>
	</body>
</html>
